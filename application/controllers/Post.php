<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// Load Model
		$this->load->model(
			array(
				'Posts_model', 'Users_model', 'Comments_model'
			)
		);

		// Load Library
		$this->load->library(
			array(
				'globals', 'upload', 'session', 'form_validation', 'pagination', 'pdf'
			)
		);

		// Load Helper
		$this->load->helper(
			array(
				'form', 'url'
			)
		);
	}

	public function index()
	{
		// Declarations
		$uri_segment = $this->uri->segment(3);
		$num_rows = $this->Posts_model->num_rows();

		// Config Pagination
		$config['base_url'] = base_url() . 'post/list/';
		$config['total_rows'] = $num_rows;
		$config['per_page'] = 6;

		// Set Initialize Pagination to View
		$this->pagination->initialize($config);

		// Initialize Data
		$data['title'] = "Daftar Blogspot";
		$data['posts'] = $this->Posts_model->get_posts(FALSE, $config['per_page'], $uri_segment);

		// Check Input Keyword Search
		if( $this->input->get('keyword') != null ) {
			$data['posts'] = $this->Posts_model->get_search( $this->input->get('keyword') );
		}

		// Views
		$this->load->view('layout/header', $data);
		$this->load->view('post/list', $data);
		$this->load->view('layout/footer');
	}

	public function show($slug)
	{
		// Get Data Id
		$post_id = $this->Posts_model->get_posts( $slug )['id'];

		// Initialize Data
		$data['title'] = 'Halaman Detail Kiriman';
		$data['post'] = $this->Posts_model->get_posts( $slug );
		$data['comments'] = $this->Comments_model->get_comments( $post_id );
		$post = $data['post'];

		// var_dump( $data['comments'] ); die;

		// Views
		$this->load->view('layout/header', $data);
		$this->load->view('post/detail', $post);
		$this->load->view('layout/footer');
	}

	public function create()
	{
		// Check Isset Session
		if( empty( $this->session->id ) ) {
			redirect('post/list');
		}

		// Declarations
		$data['title'] = "Buat Kiriman Blogspot";

		// Validations Form
		$this->form_validation->set_rules('title', 'Title', 'required');
    	$this->form_validation->set_rules('subject', 'Text', 'required');

		// Check Conditions
		if ($this->form_validation->run() == TRUE) {
			// Insert Data to Database
			if( $this->Posts_model->set_posts() == 0 ) {
				$this->session->set_flashdata('error_msg', 'File yang diupload salah atau tidak ada!');

				redirect('post/create');
			}

			redirect('post/list');
		}

		// Views
		$this->load->view('layout/header', $data);
		$this->load->view('post/create');
		$this->load->view('layout/footer');
	}

	public function edit($id)
	{
		// Check Isset Session
		if( empty( $this->session->id ) ) {
			redirect('post/list');
		}

		// Declarations
		$data['title'] = 'Halaman Ubah Kiriman';
		$data['post'] = $this->Posts_model->get_posts($id);
		$post = $data['post'];

		// Validations Form
		$this->form_validation->set_rules('title', 'Title', 'required');
    	$this->form_validation->set_rules('subject', 'Text', 'required');

		// Check Conditions
		if ($this->form_validation->run() == TRUE) {

			// Insert Data to Database
			$this->Posts_model->update_post($id);
			redirect('post/list');

		}

		// Views
		$this->load->view('layout/header', $data);
		$this->load->view('post/edit', $post);
		$this->load->view('layout/footer');
	}

	public function delete()
	{
		// Check Isset Session
		if( empty( $this->session->id ) ) {
			redirect('post/list');
		}

		// Load Libraries
		$this->load->helper('url');

		// Declarations
		$slug = $this->uri->segment(3);

		// Delete Data in Database and Redirect Page
		$this->Posts_model->delete_post($slug);

		redirect('post/list');

	}


	/*
	* ===================================
	* This is for Comment Post Controller
	* ===================================
	*/

	public function create_comment($id)
	{
		// Declaration
		$post_slug = $this->Posts_model->get_slug( $id );

		// Check Isset Session
		if( empty( $this->session->id ) ) {
			$this->session->set_flashdata('error_msg', 'Untuk berkomentar, silahkan login terlebih dahulu!');
			redirect('post/' . $post_slug);
		}

		// Insert Data to Database
		$this->Comments_model->set_comment($id);

		redirect('post/' . $post_slug . '/#comment');
	}

	public function edit_comment($id)
	{
		// Get Post Slug in Comment Data
		$post_slug = $this->Comments_model->getPostSlug( $id );

		// Insert Data to Database
		$this->Comments_model->update_comment($id);

		redirect('post/' . $post_slug . '/#comment');
	}

	public function delete_comment($id)
	{
		// Get Post Slug in Comment Data
		$post_slug = $this->Comments_model->getPostSlug( $id );

		// Check Isset Session
		if( empty( $this->session->id ) ) {
			$this->session->set_flashdata('error_msg', 'Untuk berkomentar, silahkan login terlebih dahulu!');
			redirect('post/' . $post_slug);
		}

		// Insert Data to Database
		$this->Comments_model->delete_comment($id);

		redirect('post/' . $post_slug . '/#comment');
	}

	public function pdf()
	{
		/*
		*	$pdf->Cell(width, height, text, border, break, text-align);
		*/

		// Load FPDF with Configuration
		$pdf = new FPDF('P', 'mm', 'A4');

		// Create New Page
		$pdf->AddPage();

		// Print String
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(190, 7, 'List User of Blogspot', 0, 1, 'C');
		$pdf->SetFont('Arial', 'I', 10);
		$pdf->Cell(190, 7, 'List User of Blogspot', 0, 1, 'C');

		// Give Space
		$pdf->Cell(10,7,'',0,1);

		// Header Table
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(8,6,'No',1,0, 'C');
		$pdf->Cell(85,6,'Name',1,0);
		$pdf->Cell(27,6,'Username',1,1);

		// Body Table
		$pdf->SetFont('Arial','',10);
		$users = $this->Users_model->get_users();
		foreach( $users as $user ) {
			$pdf->Cell(8, 6, $user['id'], 1, 0, 'C');
			$pdf->Cell(85,6, $user['name'], 1, 0, 'C');
			$pdf->Cell(27,6, $user['username'], 1, 1, 'C');
		}
		$pdf->Output();
	}
}

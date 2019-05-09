<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
	}

	public function index()
	{
		if( isset( $this->session->id ) ) {
			redirect('post/list');
		}

		// Load Libraries
		$this->load->library('form_validation');

		// Declarations
		$data['title'] = "Halaman Login";

		// Views
		$this->load->view('layout/header', $data);
		$this->load->view('login');
		$this->load->view('layout/footer');
	}

	public function store()
	{
		// Load Libraries
		$this->load->helper(array('form', 'url'));

		// Declarations
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Get Data from Database
		$user = $this->Users_model->get_users( $username );

		// Check Isset Data User
		if( isset( $user ) ) {
			if( password_verify($password, $user['password']) ) {
				$this->session->set_userdata('id', $user['id']);
				$this->session->set_userdata('name', $user['name']);
				$this->session->set_userdata('image', $user['image']);
				$this->session->set_userdata('username', $user['username']);
				redirect('post/list');
			} else {
				$this->session->set_flashdata('error_msg', 'Kata Sandi Yang Anda Masukan Salah!');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('error_msg', 'Nama Pengguna Yang Anda Masukan Tidak Valid!');
			redirect('login');
		}
	}

	public function logout()
	{
		// Unset Session
		$this->session->unset_userdata('id');

		// Redirect Page
		redirect('login');
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('upload');
   }
   
   public function create()
	{
		// Declarations
		$data['title'] = "Halaman Pendaftaran";
		$username = $this->input->post('username');
		$password = $this->input->post('password');

      // Validations Form
      $this->form_validation->set_rules('name', 'Text', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');

		// Check Conditions
		if ($this->form_validation->run() == TRUE) {

			// Insert Data to Database
			$this->Users_model->set_users();

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
					redirect('login');
				}
			}

		}

		// Views
		$this->load->view('layout/header', $data);
		$this->load->view('user/create');
		$this->load->view('layout/footer');
	}
	
	public function posts($username)
	{
		// Check Username Valid
		$user = $this->Users_model->get_users( $username );
		if( empty( $user ) ) { 
			redirect('post/list');
		}

		// Declarations Pagination
		$username = $this->session->username;
		$uri_segment = $this->uri->segment(3);
		$num_rows = $this->Users_model->num_rows( $this->session->id );

		// Config Pagination
		$config['base_url'] = base_url() . 'user/' . $username . '/';
		$config['total_rows'] = $num_rows;
		$config['per_page'] = 6;
		
		// Set Initialize Pagination to View
		$this->pagination->initialize($config);

		// Initialize Data
		$data['title'] = "Daftar Kiriman Pengguna";
		$data['posts'] = $this->Users_model->hasPosts( $username, $config['per_page'], $uri_segment );

		// Check Input Keyword Search
		if( $this->input->get('keyword') != null ) {

			// Initialize Data
			$keyword = $this->input->get('keyword');

			// Get Data Posts User
			$data['posts'] = $this->Users_model->hasPosts( $username, $config['per_page'], $uri_segment, $keyword );
			
		}

		$this->load->view('layout/header', $data);
		$this->load->view('post/list', $data);
		$this->load->view('layout/footer');
	}

	public function index_setting()
	{
		// Declarations
		$data['title'] = "Pengaturan Pengguna";
		$data['user'] = $this->Users_model->get_users( $this->session->username );

		$this->load->view('layout/header', $data);
		$this->load->view('user/setting', $data);
		$this->load->view('layout/footer');
	}

	public function edit_photo()
	{
		if( $this->Users_model->change_photo() == 0 ) {
			$this->session->set_flashdata('error_msg', 'Foto yang diupload gagal!');
		}

		$this->session->set_flashdata('success_msg', 'Foto yang diupload berhasil!');

		redirect('user/setting');
	}

	public function delete_photo()
	{
		if( $this->Users_model->delete_photo() == 0 ) {
			$this->session->set_flashdata('error_msg', 'Menghapus Foto Profil Gagal!');
		}

		redirect('user/setting');
	}

	public function change_password()
	{
		// Declarations
		$username = $this->session->username;
		$oldPassword = $this->input->post('oldPassword');
		$password = $this->input->post('password');
		$passconf = $this->input->post('passconf');

		// Get Data from Database
		$user = $this->Users_model->get_users( $username );

		// Check Old Password
		if( !password_verify($oldPassword, $user['password']) ) {
			$this->session->set_flashdata('error_msg', 'Kata Sandi Lama Yang Anda Masukan Salah!');
			redirect('user/setting#passAlert');
		} elseif( $password !== $passconf ) {
			$this->session->set_flashdata('error_msg', 'Kata Sandi Baru dan Konfirmasi Kata Sandi Baru Yang Anda Masukan Tidak Sesuai!');
			redirect('user/setting#passAlert');
		}

		if( $this->Users_model->change_password() ) {
			$this->session->set_flashdata('success_msg_pass', 'Kata Sandi Berhasil Diubah!');
			redirect('user/setting#passAlert');
		}
	}
}
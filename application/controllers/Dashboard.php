<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

    // Load Model
		$this->load->model(
			array('Posts_model')
		);
	}

  public function posts()
  {
    $data['title'] = 'Post';
    $data['posts'] = $data['posts'] = $this->Posts_model->all();

    $this->load->view('layout/dash_header', $data);
    $this->load->view('layout/post_sider', $data);
    $this->load->view('dashboard/post', $data);
    $this->load->view('layout/dash_footer');
  }

	public function posts_publish()
	{
		$data['titlePost'] = 'Publish';
		$data['posts'] = $data['posts'] = $this->Posts_model->findByPublish();

		$this->load->view('ajax/ajax_post', $data);
	}

	public function posts_drafts()
	{
		$data['titlePost'] = 'Drafts';
		$data['posts'] = $data['posts'] = $this->Posts_model->findByDrafts();

		$this->load->view('ajax/ajax_post', $data);
	}

	public function posts_favorites()
	{
		$data['titlePost'] = 'Favorites';
		$data['posts'] = $data['posts'] = $this->Posts_model->findByFavorites();

		$this->load->view('ajax/ajax_post', $data);
	}

	public function posts_trash()
	{
		$data['titlePost'] = 'Trash';
		$data['posts'] = $data['posts'] = $this->Posts_model->findByTrash();

		$this->load->view('ajax/ajax_post', $data);
	}

	public function posts_create()
	{
		$data['title'] = 'Create Post';

		$this->load->view('layout/dash_header', $data);
    $this->load->view('layout/post_sider', $data);
    $this->load->view('dashboard/post_create', $data);
    $this->load->view('layout/dash_footer');
	}

	public function users()
	{
		$data['title'] = 'User';

		$this->load->view('layout/dash_header', $data);
    $this->load->view('dashboard/user', $data);
    $this->load->view('layout/dash_footer');
	}

	public function user_detail()
	{
		$data['title'] = 'User Detail';

		$this->load->view('layout/dash_header', $data);
    $this->load->view('dashboard/user_detail', $data);
    $this->load->view('layout/dash_footer');
	}

	public function settings()
	{
		$data['title'] = 'Setting';

		$this->load->view('layout/dash_header', $data);
    $this->load->view('dashboard/setting', $data);
    $this->load->view('layout/dash_footer');
	}

}

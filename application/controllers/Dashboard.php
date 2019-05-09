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

  public function posts($folder = 'all')
  {
    $data['title'] = 'Post';
    $data['posts'] = $data['posts'] = $this->Posts_model->all();

    if($folder == 'publish') {
      $data['posts'] = $data['posts'] = $this->Posts_model->findByPublish();
    } else if($folder == 'drafts') {
      $data['posts'] = $data['posts'] = $this->Posts_model->findByDrafts();
    } else if($folder == 'favorites') {
      $data['posts'] = $data['posts'] = $this->Posts_model->findByFavorites();
    } else if($folder == 'trash') {
      $data['posts'] = $data['posts'] = $this->Posts_model->findByTrash();
    }

    // var_dump( $data['posts'] ); die;

    $this->load->view('layout/dash_header', $data);
    $this->load->view('layout/post_sider', $data);
    $this->load->view('dashboard/post', $data);
    $this->load->view('layout/dash_footer');
  }

}

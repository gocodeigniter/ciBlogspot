<?php
class Posts_model extends CI_Model {

   public function __construct()
   {
      parent::__construct();
      $this->load->database();

      // Load Libraries
      $this->load->helper('url');
   }

   // Get All Data Post
   public function all()
   {
      $this->db->select('
        users.name, users.username,
        posts.id, posts.user_id, posts.title, posts.subject, posts.datetime
      ');
      $this->db->from('posts');
      $this->db->join('users', 'users.id = posts.user_id', 'left');

      $this->db->where_not_in('trash', 1);
      $this->db->order_by('datetime', 'DESC');

      $query = $this->db->get();

      return $query->result_array();
   }

   // Get Data Post by Publish
   public function findByPublish()
   {
      $this->db->select('
        users.name, users.username,
        posts.id, posts.user_id, posts.title, posts.subject, posts.datetime
      ');
      $this->db->from('posts');
      $this->db->join('users', 'users.id = posts.user_id', 'left');

      $this->db->where('posts.publish', 1);
      $this->db->order_by('datetime', 'DESC');

      $query = $this->db->get();

      return $query->result_array();
   }

   // Get Data Post by Drafts
   public function findByDrafts()
   {
      $this->db->select('
        users.name, users.username,
        posts.id, posts.user_id, posts.title, posts.subject, posts.datetime
      ');
      $this->db->from('posts');
      $this->db->join('users', 'users.id = posts.user_id', 'left');

      $this->db->where('posts.drafts', 1);
      $this->db->order_by('datetime', 'DESC');

      $query = $this->db->get();

      return $query->result_array();
   }

   // Get Data Post by Favorites
   public function findByFavorites()
   {
      $this->db->select('
        users.name, users.username,
        posts.id, posts.user_id, posts.title, posts.subject, posts.datetime
      ');
      $this->db->from('posts');
      $this->db->join('users', 'users.id = posts.user_id', 'left');

      $this->db->where('posts.favorites', 1);
      $this->db->order_by('datetime', 'DESC');

      $query = $this->db->get();

      return $query->result_array();
   }

   // Get Data Post by Trash
   public function findByTrash()
   {
      $this->db->select('
        users.name, users.username,
        posts.id, posts.user_id, posts.title, posts.subject, posts.datetime
      ');
      $this->db->from('posts');
      $this->db->join('users', 'users.id = posts.user_id', 'left');

      $this->db->where('posts.trash', 1);
      $this->db->order_by('datetime', 'DESC');

      $query = $this->db->get();

      return $query->result_array();
   }

   public function num_rows()
   {
      // Check Total Data in Database
      return $this->db->get('posts')->num_rows();
   }

   public function get_slug($id)
   {
      $query = $this->db->get_where('posts', array('id' => $id) );
      return $query->row_array()['slug'];
   }

   public function get_posts($slug = FALSE, $number = NULL, $offset = NULL)
   {
      if ( $slug ) {
         $query = $this->db->get_where('posts', array('slug' => $slug) );
         return $query->row_array();
      }

      $this->db->order_by('datetime', 'DESC');
      $query = $this->db->get('posts', $number, $offset);
      return $query->result_array();
   }

   public function get_search($keyword)
   {
      $this->db->like('title', $keyword, 'both');
      $this->db->or_like('subject', $keyword, 'both');
      $query = $this->db->get('posts');

      return $query->result_array();
   }

   public function set_posts()
   {
      // Declarations
      $slug = url_title($this->input->post('title'), 'dash', TRUE);

      // Array Data Input
      $data = array(
         'user_id' => $this->session->id,
         'image' => $this->_uploadFile(),
         'title' => $this->input->post('title'),
         'slug' => $slug,
         'subject' => $this->input->post('subject'),
         'datetime' => date("Y-m-d H:i:s")
      );

      // Insert Data to Database
      return $this->db->insert('posts', $data);
   }

   public function update_post($id)
   {
      // Declarations
      $slug = url_title($this->input->post('title'), 'dash', TRUE);

      if( !empty( $_FILES['userfile']['name'] ) ) {
         $file_name = $this->_uploadFile();

         // Delete File
         $this->_deleteFile($slug);
      } else {
         $file_name = $this->input->post('old_name');
      }

      // Array Data Input
      $data = array(
         'title' => $this->input->post('title'),
         'slug' => $slug,
         'image' => $file_name,
         'subject' => $this->input->post('subject')
      );

      // Update Data in Database
      $this->db->where('id', $id);
      $this->db->update('posts', $data);
   }

   public function delete_post($slug)
   {
      // Delete File
      $this->_deleteFile($slug);

      // Delete Data in Database
      $this->db->where('slug', $slug);
      $this->db->delete('posts');
   }

   private function _uploadFile()
	{
      // Declarations
      $file_name = substr(md5(mt_rand()), 0, 16);

      // Declaration Config Upload
      $config['upload_path']          = './assets/img/';
      $config['allowed_types']        = 'jpeg|jpg|png|bmp';
      $config['file_name']            = $file_name;
      $config['max_size']             = 1024;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;

      // Initialize Config Upload
      $this->load->library('upload');
      $this->upload->initialize($config);

      // Check Condition File
      if ( !$this->upload->do_upload('userfile') ) {
         return null;
      } else {
         return $this->upload->data('file_name');
      }
   }

   private function _deleteFile($slug)
   {
      // Get Data Post
      $post = $this->get_posts($slug);

      // Check If Any File
      if ( $post['image'] != null || $post['image'] != 0 | $post['image'] != "" ) {
         // Get File Name
         $filename = explode(".", $post['image'])[0];

         // Remove File in Directory
         return array_map('unlink', glob( FCPATH . "assets/img/$filename.*") );
      }
   }

}

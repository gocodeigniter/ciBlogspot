<?php
class Users_model extends CI_Model {

   public function __construct()
   {
      parent::__construct();
      $this->load->database();

      // Load Libraries
      $this->load->helper('url');
   }

   public function _deleteFile()
   {
      // Get Data User
      $user = $this->Users_model->get_users( $this->session->username );

      // Check If User Have Photo
      if ( $user['image'] !== 'icon_user.png' ) {

         // Remove File in Directory
         unlink( 'assets/img/user/' . $user['image'] );

      }
   }

   public function get_users($username = FALSE)
   {
      if ($username === FALSE) {
         $query = $this->db->get('users');
         return $query->result_array();
      }

      $query = $this->db->get_where('users', array('username' => $username) );
      return $query->row_array();
   }

   public function set_users()
   {
      // Declarations
      $name = $this->input->post('name');
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      // Array Data Input
      $data = array(
         'name' => $name,
         'username' => $username,
         'password' => password_hash($password, PASSWORD_BCRYPT)
      );

      // Insert Data to Database
      return $this->db->insert('users', $data);
   }

   public function change_password()
   {
      $id = $this->session->id;
      $password = $this->input->post('password');

      // Array Data Input
      $data = array(
         'password' => password_hash($password, PASSWORD_BCRYPT),
      );

      // Update Data in Database
      $this->db->where('id', $id);
      $this->db->update('users', $data);

      return true;
   }

   public function change_photo()
   {
      // Declarations
      $file_name = substr(md5(mt_rand()), 0, 16);

      // Declaration Config Upload
      $config['upload_path']          = './assets/img/user/';
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

         // Initialize Data
         $file_name = 'icon_user.png';

      } else {

         // Initialize Data
         $file_name = $this->upload->data('file_name');

         // Delete File
         $this->_deleteFile();

      }

      // Array Data Input
      $data = array(
         'image' => $file_name
      );

      // Insert Data to Database
      $this->db->where('id', $this->session->id);
      return $this->db->update('users', $data);
   }

   public function delete_photo()
   {
      // Initialize Data
      $file_name = 'icon_user.png';

      // Delete File
      $this->_deleteFile();

      // Array Data Input
      $data = array(
         'image' => $file_name
      );

      // Insert Data to Database
      $this->db->where('id', $this->session->id);
      return $this->db->update('users', $data);
   }

   public function num_rows($id)
   {
      $this->db->where('users.id', $id);
      $this->db->select('users.id');
      $this->db->from('users');
      $this->db->join('posts', 'posts.user_id = users.id');
      $query = $this->db->get();

      // Check Total Data in Database
      return $query->num_rows();
   }

   public function hasPosts($username, $number, $offset, $keyword = null)
   {
      $this->db->where('users.username', $username);
      $this->db->select('users.name, users.username,posts.*');
      $this->db->from('users');
      $this->db->join('posts', 'posts.user_id = users.id');
      $this->db->like('posts.title', $keyword, 'both');
      $this->db->limit($number, $offset);
      $query = $this->db->get();

      return $query->result_array();
   }
}

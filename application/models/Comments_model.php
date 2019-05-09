<?php
class Comments_model extends CI_Model {

   public function __construct()
   {
      parent::__construct();
      $this->load->database();

      // Load Libraries
      $this->load->helper('url');
   }

   public function getPostSlug($id)
   {
      $this->db->select('post_id');
      $query = $this->db->get_where('comments', array('id' => $id) );

      $post_id = $query->row_array()['post_id'];

      $query = $this->db->get_where('posts', array('id' => $post_id) );
      return $query->row_array()['slug'];
   }

   public function get_comments($post_id)
   {
      $this->db->where('comments.post_id', $post_id);
      $this->db->select('users.image, users.name, users.username, comments.id, comments.user_id, comments.post_id, comments.subject, comments.datetime');
      $this->db->from('users');
      $this->db->join('comments', 'comments.user_id = users.id');
      $this->db->order_by('datetime', 'ASC');
      $query = $this->db->get();

      return $query->result_array();
   }

   public function set_comment($id)
   {
      // Declarations
      $comment = $this->input->post('comment');

      // Array Data Input
      $data = array(
         'user_id' => $this->session->id,
         'post_id' => $id,
         'subject' => $comment,
         'datetime' => date("Y-m-d H:i:s")
      );

      // Insert Data to Database
      return $this->db->insert('comments', $data);
   }

   public function update_comment($id)
   {
      // Declarations
      $comment = $this->input->post('comment');

      // Array Data Input
      $data = array(
         'subject' => $comment
      );

      // Update Data in Database
      $this->db->where('id', $id);
      $this->db->update('comments', $data);
   }

   public function delete_comment($id)
   {
      // Delete Comment Post in Database
      $this->db->where('id', $id);
      $this->db->delete('comments');
   }
   
}
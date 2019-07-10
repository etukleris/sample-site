<?php
  class Photos_model extends CI_Model {

          public function __construct()
          {
                  $this->load->database();
          }
          
          public function get_photos($user_added = FALSE)
{
                  if ($user_added === FALSE)
                  {
                          $query = $this->db->get('pictures');
                          return $query->result_array();
                  }
                  

                  $query = $this->db->get_where('pictures', array('useradded' => $user_added));
                  return $query->result_array();
          }
  }
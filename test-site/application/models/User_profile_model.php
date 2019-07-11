<?php
  class User_profile_model extends CI_Model {

          public function __construct()
          {
                  $this->load->database();
          }
          
          public function get_user($username = FALSE)
{
                  if ($username === FALSE)
                  {
                          //$query = $this->db->get('pictures');
                          return [];
                  }
                  

                  $query = $this->db->get_where('users', array('uidUsers' => $username));
                  return $query->row_array();
          }
  }
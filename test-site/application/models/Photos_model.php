<?php
  class Photos_model extends CI_Model {

          public function __construct()
          {
                  $this->load->database();
          }
          
          public function get_photos($photo = FALSE)
{
                  if ($photo === FALSE)
                  {
                          $query = $this->db->get('pictures');
                          return $query->result_array();
                  }

                  $query = $this->db->get_where('pictures', array('imagename' => $photo));
                  return $query->row_array();
          }
  }
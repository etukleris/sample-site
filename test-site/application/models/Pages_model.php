<?php
  class Pages_model extends CI_Model {

          public function __construct()
          {
                  $this->load->database();
                  $this->load->helper('url');
          }          
          
          
          
             //$stmt = $con->prepare("INSERT INTO pictures (id, dateadded, useradded, imagename, cattype, catcharacteristics) VALUES (?, ?, ?, ?, ?, ?)");
     // $stmt->bind_param("isssss", $null, $timestamp, $username, $basefilename, $cattype, $catcharacteristics);
          public function upload_image($uploadData)
          {
              $useradded = $this->input->post('cat-submit-username');
              $imagename = $uploadData['file_name'];
              $cattype = $this->input->post('indoor-outdoor');
  
              if (!$this->input->post('personality')){
                $catcharacteristics = 'NULL';
              }
              else {
                $catcharacteristics = implode(",", $this->input->post('personality'));
              }
                      
              $userData = array(
 
                      'useradded' => $useradded,
                      'imagename' => $imagename,
                      'cattype' => $cattype,
                      'catcharacteristics' => $catcharacteristics

                  );
              return $this->db->insert('pictures', $userData);
          }
          
  }
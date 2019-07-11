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
          
          public function create_new_user()
          {
              $this->load->helper('url');
              $userData = array(
                      //'idUsers' => $this->input->post('null'),
                      'uidUsers' => $this->input->post('uid'),
                      'emailUsers' => $this->input->post('email'),
                      'pwdUsers' => password_hash($this->input->post('pwd'),PASSWORD_DEFAULT)
                      //'timeCreated' => $this->input->post('gender'),
                      //'phone' => $this->input->post('phone')
                  );
              return $this->db->insert('users', $userData);
          }
          public function user_login()
          {
              $this->db->select('idUsers, uidUsers, pwdUsers, timeCreated');
              $this->db->where('uidUsers', $this->input->post('mailuid'));
              $this->db->or_where('emailUsers', $this->input->post('mailuid'));
              
              $query = $this->db->get('users');
              $result = $query->row_array();
              
              if (password_verify($this->input->post('pwd'),$result['pwdUsers']))
              {
                  $_SESSION['userId'] = $result['uidUsers'];
                  $_SESSION['userUid'] = $result['idUsers'];
                  $_SESSION['userCreationDate'] = $result['timeCreated'];
                  return True;
                  
              }else{
            
                return False;
              }
          }
          function userExists($user) {
              $this->db->select('idUsers');
              $this->db->where('uidUsers', $user);
              $query = $this->db->get('users');

              if ($query->num_rows() > 0) {
                  return true;
              } else {
                  return false;
              }
          }

          function emailExists($email) {
              $this->db->select('emailUsers');
              $this->db->where('emailUsers', $email);
              $query = $this->db->get('users');

              if ($query->num_rows() > 0) {
                  return true;
              } else {
                  return false;
              }
          }
          function userLogOut(){
            $_SESSION = array();
            session_unset();
            session_destroy();
            session_write_close();
            setcookie(session_name(),'',0,'/');
            session_regenerate_id(true);
            
          }


  }
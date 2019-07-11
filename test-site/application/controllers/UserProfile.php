<?php
class UserProfile extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('user_profile_model');
                $this->load->library('form_validation');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['userProfile'] = $this->user_profile_model->get_user();  
                
                $data['title'] = 'photos archive';
                $this->load->view('templates/header', $data);
                $this->load->view('user-profile-page/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($username = NULL)
        {
                $data['userProfile'] = $this->user_profile_model->get_user($username);
                
                 if (empty($data['userProfile']))
                {
                        show_404();
                }
                if ($username){
                  $data['title'] = $username.'\'s profile';
                  $data['userName'] =  $username;
                }
                
                $this->load->view('templates/header', $data);
                $this->load->view('user-profile-page/view', $data);
                $this->load->view('templates/footer');
        }
        

        public function signup()
        {
                //$this->load->helper('form');
                //$this->load->library('form_validation');
                
                $this->form_validation->set_rules('uid', 'Username', 'required|callback_userExists');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_emailExists');
                $this->form_validation->set_rules('pwd', 'Password', 'required');
                $this->form_validation->set_rules('pwd-repeat', 'Password confirmation', 'required|matches[pwd]');
     
                if ($this->form_validation->run() === FALSE)
                {
                    $data['title'] = "User's signup page";
                    $this->load->view('templates/header', $data);
                    $this->load->view('user-profile-page/signup');
                    $this->load->view('templates/footer');
                }
                else
                {
                    $data['title'] = "Signup success";
                    $this->user_profile_model->create_new_user();
                    $this->load->view('templates/header', $data);
                    $this->load->view('user-profile-page/success');
                    $this->load->view('templates/footer');   
                }
        }
        public function login()
        {
                //$this->load->helper('form');
                //$this->load->library('form_validation');
                
                $this->form_validation->set_rules('mailuid', 'Username or email', 'required|callback_userOrEmailNotExists');
                $this->form_validation->set_rules('pwd', 'Password', 'required');
               
                if ($this->form_validation->run() === FALSE)
                {
                    $data['title'] = "User's login page";
                    $this->load->view('templates/header', $data);
                    $this->load->view('user-profile-page/login');
                    $this->load->view('templates/footer');

                }
                else
                {
                    if ($this->user_profile_model->user_login()===TRUE){
                      $data['title'] = "login successful";
                      $data['status'] = "login successful";
                      
                      $this->load->view('templates/header', $data);
                      $this->load->view('user-profile-page/status-page');
                      $this->load->view('templates/footer');
                    }else{
                      $data['title'] = "login FAILED";
                      $data['status'] = "login failed";
                      
                      $this->load->view('templates/header', $data);
                      $this->load->view('user-profile-page/status-page');
                      $this->load->view('templates/footer');
                    }   
                }                
        }
        
        public function logout(){
          
          $this->user_profile_model->userLogout();
          header('location:'.base_url().'index');
                  
        }
        public function userExists($username) {
            //$this->load->library('form_validation');
            //$this->load->model('user_profile_model');
            $is_exist = $this->user_profile_model->userExists($username);

            if ($is_exist) {
                $this->form_validation->set_message(
                    'userExists', 'User already exists.'
                );    
                return false;
            } else {
                return true;
            }
        }

        
        public function emailExists($email) {
            //$this->load->library('form_validation');
            //$this->load->model('user_profile_model');
            $is_exist = $this->user_profile_model->emailExists($email);

            if ($is_exist) {
                $this->form_validation->set_message(
                    'emailExists', 'Email already exists.'
                );    
                return false;
            } else {
                return true;
            }
        }
        
        public function userOrEmailNotExists($mailuid){
            
            //$this->load->model('user_profile_model');
            $user_exists = $this->user_profile_model->userExists($mailuid);
            $email_exists = $this->user_profile_model->emailExists($mailuid);
            
            if ($user_exists || $email_exists ) {
                
                return true;
            } else {
              $this->form_validation->set_message(
                    'userOrEmailNotExists', 'No such user or email exist.'
                );    
                return false;
            }
          
        }

        public function uploadProfileImage () {
                $data = $this->input->post(NULL, TRUE);
                $this->load->view('templates/header', $data);
                $this->load->view('user-profile-page/upload-profile-image', $data);
                $this->load->view('templates/footer');
        }
}
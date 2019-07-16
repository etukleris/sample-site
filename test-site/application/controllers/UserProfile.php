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
                
                $this->form_validation->set_rules('uid', 'Username', 'required|callback_user_exists');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_exists');
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
                
                $this->form_validation->set_rules('mailuid', 'Username or email', 'required|callback_user_or_email_not_exists');
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
          
          $this->user_profile_model->user_logout();
          header('location:'.base_url().'index');
                  
        }
        public function user_exists($username) {
            $is_exist = $this->user_profile_model->user_exists($username);

            if ($is_exist) {
                $this->form_validation->set_message(
                    'user_exists', 'User already exists.'
                );    
                return false;
            } else {
                return true;
            }
        }

        
        public function email_exists($email) {
            $is_exist = $this->user_profile_model->email_exists($email);

            if ($is_exist) {
                $this->form_validation->set_message(
                    'email_exists', 'Email already exists.'
                );    
                return false;
            } else {
                return true;
            }
        }
        
        public function user_or_email_not_exists($mailuid){
            
            $user_exists = $this->user_profile_model->user_exists($mailuid);
            $email_exists = $this->user_profile_model->email_exists($mailuid);
            
            if ($user_exists || $email_exists ) {
                
                return true;
            } else {
              $this->form_validation->set_message(
                    'user_or_email_not_exists', 'No such user or email exist.'
                );    
                return false;
            }
          
        }

        public function upload_profile_image () {
                $data = $this->input->post(NULL, TRUE);
                $this->load->view('templates/header', $data);
                $this->load->view('user-profile-page/upload-profile-image', $data);
                $this->load->view('templates/footer');
        }
        
        public function do_upload()
        {
            $config['upload_path']          = FCPATH.'public/pictures/profile-pictures/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1500;
            $config['max_width']            = 3000;
            $config['max_height']           = 3000;

            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('profile-image'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    $data['title']= "Upload error";
                    $this->load->view('templates/header', $data);
                    $this->load->view('user-profile-page/status-page', $error);
                    $this->load->view('templates/footer');
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    $this->user_profile_model->upload_profile_image($data['upload_data']);
                    $data['title']= "Upload success";
                    $data['status'] = "Profile image uploaded";
                    $this->load->view('templates/header', $data);
                    $this->load->view('user-profile-page/status-page', $data);
                    $this->load->view('templates/footer');
            }
        }
}
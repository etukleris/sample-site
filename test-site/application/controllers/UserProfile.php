<?php
class UserProfile extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('user_profile_model');
                //$this->load->helper('url_helper');
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
}
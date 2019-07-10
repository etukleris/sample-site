<?php
class Photos extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('photos_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['photos'] = $this->photos_model->get_photos();  
                
                $data['title'] = 'photos archive';
                $this->load->view('templates/header', $data);
                $this->load->view('photos/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($user_added = NULL)
        {
                $data['photos'] = $this->photos_model->get_photos($user_added);
                
                 if (empty($data['photos']))
                {
                        show_404();
                }
                if ($user_added){
                  $data['title'] = $user_added.'\'s photos';
                  $data['userName'] =  $user_added;
                }
                $this->load->view('templates/header', $data);
                $this->load->view('photos/view', $data);
                $this->load->view('templates/footer');
        }
}
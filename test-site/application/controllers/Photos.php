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

        public function view($photo = NULL)
        {
                $data['photos_item'] = $this->photos_model->get_photos($photo);
                
                 if (empty($data['photos_item']))
                {
                        show_404();
                }

                $data['title'] = $data['photos_item']['useradded'];

                $this->load->view('templates/header', $data);
                $this->load->view('photos/view', $data);
                $this->load->view('templates/footer');
        }
}
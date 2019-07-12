<?php
  class Pages extends CI_Controller {

    public function __construct()
            {
                    parent::__construct();
                    $this->load->helper(array('form', 'url'));
                    $this->load->model('pages_model');
            }
    public function view($page = 'index')
    {
      #$this->load->helper('url');
        
      if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
    {
      //echo "error, ".APPPATH."'views/pages/'".$page."'.php'";
       
      show_404();
    }
    $data['error'] ='';
    $data['title'] = ucfirst($page); // Capitalize the first letter
    $this->load->view('templates/header', $data);
    $this->load->view('pages/'.$page, $data);
    //$this->load->view('pages/upload_form', array('error' => ' ' )); 
    $this->load->view('templates/footer', $data);
    }
    
    public function do_upload()
    {
            $config['upload_path']          = FCPATH.'public/pictures/uploaded-pictures/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    $data['title']= "Upload error";
                    $this->load->view('templates/header', $data);
                    $this->load->view('pages/status-page', $error);
                    $this->load->view('templates/footer');
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    //print_r($data['upload_data']);
                    $this->pages_model->upload_image($data['upload_data']);
                    $data['status'] = "Image uploaded";
                    $this->load->view('templates/header', $data);
                    $this->load->view('pages/status-page', $data);
                    $this->load->view('templates/footer');
            }
    }
  }
  
  
<?php
  class Pages extends CI_Controller {

    public function view($page = 'index')
    {
      #$this->load->helper('url');
        
      if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
    {
      //echo "error, ".APPPATH."'views/pages/'".$page."'.php'";
       
      show_404();
    }

    $data['title'] = ucfirst($page); // Capitalize the first letter

    $this->load->view('templates/header', $data);
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer', $data);
    }
  }
  
  
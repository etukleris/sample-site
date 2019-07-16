<?php
  class CsstestPages extends CI_Controller {
    
    public function index($page ='csstest1')
    {
    

      if ( ! file_exists(APPPATH.'views/pages/csstestpages/'.$page.'.php'))
    {

      show_404();
    }
    
    $data['title'] = ucfirst($page); // Capitalize the first letter

    $this->load->view('templates/header', $data);
    $this->load->view('pages/csstestpages/'.$page, $data);
    $this->load->view('templates/footer', $data);
    }
    
    
    public function view($page = 'csstest1')
    {
      if ($page =='index'){
      $page = 'csstest1';
    }

      if ( ! file_exists(APPPATH.'views/pages/csstestpages/'.$page.'.php'))
    {
      show_404();
    }
    
    $data['title'] = ucfirst($page);

    $this->load->view('templates/header', $data);
    $this->load->view('pages/csstestpages/'.$page, $data);
    $this->load->view('templates/footer', $data);
    }
  }
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

  public function __construct(){

    parent::__construct();
    $this->load->helper('url');

    // Load model
    $this->load->model('Data_m');

  }

  public function index(){

    // load view
    // $this->load->view('data/viewdata');
    $data['title']="Data";   
    $this->templateadmin->load('template/dashboard','data/view_data',$data);

  }

  public function data()
    {
        $this->load->model('Data_m');
        $data['title']="Data";   
        $this->templateadmin->load('template/dashboard','data/viewdata',$data);
    }

  public function kunjunganList(){
    // POST data
    $postData = $this->input->post();

    // Get data
    $data = $this->Data_m->getKunjungan($postData);

    echo json_encode($data);
  }

}
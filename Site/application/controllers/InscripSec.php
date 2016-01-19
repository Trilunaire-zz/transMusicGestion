<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InscripSec extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
  }


  public function index()
  {
    if(isset($_SESSION['login'])){
      $data = array('title' => "Inscription");
      $this->load->view('header',$data);
      $this->load->view('inscription_sec_part',$data);
      $this->load->view('footer');
    }else{
      header('location:http://trans.tristanlaurent.com/index.php/Inscription');
    }

  }


  public function Inscription()
  {
    if($this->form_validation->run() == FALSE){
      


    }
    $this->index();
  }
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->helper('email');
    $this->load->model('User');
  }


  public function index()
  {
    $data = array('title' => "Inscription");
    $this->load->view('header',$data);
    $this->load->view('inscription',$data);
    $this->load->view('footer');
  }


  public function Inscription()
  {
    if($this->form_validation->run() == FALSE){
      if($this->input->post('pass')==$this->input->post('passConfirm')){
        $newUser = array('login' => $this->input->post('userName') , 'motdepasse' => $this->input->post('pass'), 'mail' => $this->input->post('mail'), 'etat' => False);
        $this->User->signUp($newUser);
        $data['message']=true;
      }
      else {
        $data['erreur']=true;
      }
    }
    $this->index();
  }
}
?>

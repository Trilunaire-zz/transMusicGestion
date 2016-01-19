<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    if(!isset($_SESSION['lang'])){
			$this->session->set_userdata('lang','fr');
		}
  }


  public function index()
  {
    if(!isset($_SESSION['login'])){
      $data = array('title' => "Inscription",
                    'lang' => $this->session->userdata('lang'),);
      $this->load->view('header',$data);
      $this->load->view('inscription',$data);
      $this->load->view('footer');
    }else{
      header('location:http://trans.tristanlaurent.com');
    }

  }


  public function Inscription()
  {
    if($this->form_validation->run() == FALSE){
      $newUser = array( 'nom' => $this->input->post('userName'),
                        'pays' => $this->input->post('pays'),
                        'mail' => $this->input->post('mail'),
                        );

      if($this->input->post('dateCreation')!=""){
        $newUser['datedecreation'] = $this->input->post('dateCreation');
      }
      if($this->input->post('Ville')!=""){
        $newUser['ville'] = $this->input->post('Ville');
      }
      if($this->input->post('genre')!=""){
        $newUser['genre'] = $this->input->post('genre');
      }
      if($this->input->post('elemPr')!=""){
        $newUser['elements_principaux'] = $this->input->post('elemPr');
      }
      if($this->input->post('elemPo')!=""){
        $newUser['elements_ponctuels'] = $this->input->post('elemPo');
      }
      if($this->input->post('site')!=""){
        $newUser['siteweb'] = $this->input->post('site');
      }
      if($this->input->post('parentés')!=""){
        $newUser['parentés'] = $this->input->post('parentés');
      }
      $this->session->set_userdata('login',$this->user->signUp($newUser));
      header('location:http://trans.tristanlaurent.com/index/InscripSec');
    }else{
      $this->index();
    }
  }
}
?>

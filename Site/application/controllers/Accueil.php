<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['lang'])){
			$this->session->set_userdata('lang','fr');
		}
	}
	public function index()
	{
		$data = array('title' => "Accueil",
									'lang' => $this->session->userdata('lang'),
					);
		$this->load->view('header',$data);
		if(isset($_SESSION['login'])){
			if($this->user->isAdmin($this->session->userdata())){
				$reserv = $this->reservation->getAll();
				$this->load->view('atm_accueil',$reserv);
			}else{
				$reserv['reserv'] = $this->reservation->getMine($this->session->userdata());
				$this->load->view('accueil',$reserv);
			}
		}else{
	    $this->load->view('connection');
		}
		$this->load->view('footer');

	}

  public function Connection()
  {
    if($this->form_validation->run() == FALSE){
      $login = $this->input->post('login');
      $pass = $this->input->post('pass');
			if($this->user->userExist($login,$pass)){
				$this->session->set_userdata('login',$login);
			}


    }

    header('location:http://trans.tristanlaurent.com/');
  }

	public function Deconnection()
	{
		session_destroy();

		header('location:http://trans.tristanlaurent.com/');
	}

	public function SetLang(){
		$this->session->set_userdata('lang',$this->input->post('language'));
		header('location:http://'.$this->input->post('addr'));
	}
}

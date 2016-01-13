<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fiche extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}
	public function index()
	{
		if(isset($_SESSION['login']) && !($this->user->isAdmin($this->session->userdata()))){
      $data = array('title' => "Fiche personnelle",
            );
      $infos = $this->user->getInfo($this->session->userdata('login'));
			$user['info'] = $infos[0];
      $this->load->view('header',$data);
			$this->load->view('fiche',$user);
      $this->load->view('footer');
		}else{
	    header('location:http://trans.tristanlaurent.com/');
		}

	}

}

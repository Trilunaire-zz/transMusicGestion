<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fiche extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['lang'])){
			$this->session->set_userdata('lang','fr');
		}
	}
	public function index()
	{
		if(isset($_SESSION['login']) && !($this->user->isAdmin($this->session->userdata()))){
      $data = array('title' => "Fiche personnelle",
										'lang' => $this->session->userdata('lang'),
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

	public function modifier(){
		if(isset($_SESSION['login']) && !($this->user->isAdmin($this->session->userdata()))){
      $data = array('title' => "Fiche personnelle",
										'lang' => $this->session->userdata('lang'),
            );
      $infos = $this->user->getInfo($this->session->userdata('login'));
			$user['info'] = $infos[0];
      $this->load->view('header',$data);
			$this->load->view('fiche_modif',$user);
      $this->load->view('footer');
		}else{
	    header('location:http://trans.tristanlaurent.com/');
		}
	}

	public function set(){
		if($this->form_validation->run()==NULL){

			$data = array(
				'datedecreation' => $this->input->post('dateCreation'),
				'ville' => $this->input->post('Ville'),
				'genre' => $this->input->post('genre'),
				'elements_principaux' => $this->input->post('elemPr'),
				'elements_ponctuels' => $this->input->post('elemPo'),
				'siteweb' => $this->input->post('site'),
				'parentés' => $this->input->post('parentés'),
			);
			$this->user->setInfo($data);
			header('location:http://trans.tristanlaurent.com/index.php/Fiche');
		}
	}

}

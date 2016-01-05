<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('email');
	}
	public function index()
	{
    $this->load->view('header');
    $this->load->view('connection');
    $this->load->view('footer');
	}

  public function Connection()
  {
    
  }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserver extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index($place = NULL)
	{
		$data = array('title' => "Reservation",
					);
		$this->load->view('header',$data);
		if(isset($_SESSION['login'])){
      if(is_null($place)){
        header('location:http://trans.tristanlaurent.com/index.php/Lieu');
      }else{
        $info_salle = $this->salle->getInfos($place);

        $reservations = $this->reservation->getSalleReserv($place);
        print_r($info_salle);
        print_r($reservations);
      }
		}else{
	    $this->load->view('connection');
		}
		$this->load->view('footer');

	}


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserver extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['lang'])){
			$this->session->set_userdata('lang','fr');
		}
	}

	public function index($place = NULL)
	{
		$data = array('title' => "Reservation",
									'lang' => $this->session->userdata('lang'),
					);
		$this->load->view('header',$data);
		if(isset($_SESSION['login'])){
      if(is_null($place)){
        header('location:http://trans.tristanlaurent.com/index.php/Lieu');
      }else{
				$info = array('login' => $_SESSION['login'], 'lieu' => $place, 'etat' => 'validée');
				if($this->reservation->alreadyReserv($info) == null){//si on a pas déjà réservé le bar
	        $data['info_salle'] = $this->salle->getInfos($place);
	        $data['reservations'] = $this->reservation->getSalleReserv($place);
	        $this->load->view('reservation',$data);
				}else{
					$this->load->view('alreadyReserv');
				}
      }
		}else{
	    $this->load->view('connection');
		}
		$this->load->view('footer');

	}

	public function reservation($salle){
		$info = array(
			'lieu' => $salle,
			'h_reserv' => $this->input->post('date'),
			'login' => $this->session->userdata('login'),
			'etat' => "attente"
		);

		$this->reservation->nouvelle($info);

		header("location:http://trans.tristanlaurent.com");
	}

	public function accepter($id){
		if(isset($_SESSION['login'])){
			if($this->user->isAdmin($this->session->userdata())){
				$this->reservation->accepter($id);

			}
		}
		header("location:http://trans.tristanlaurent.com");
	}

	public function refuser($id){
		if(isset($_SESSION['login'])){
			if($this->user->isAdmin($this->session->userdata())){
				$this->reservation->refuser($id);
			}
			else{
				$data = array('login' => $_SESSION['login'], 'id' => $id);
				$this->reservation->delete($data);
			}
		}
		header("location:http://trans.tristanlaurent.com");
	}
}

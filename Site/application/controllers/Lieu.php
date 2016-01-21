<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lieu extends CI_Controller{
  private $data;

  public function __construct(){
    parent::__construct();
    if(!isset($_SESSION['lang'])){
			$this->session->set_userdata('lang','fr');
		}
    $this->data = array('title' => "Rechercher des salles");
  }

  public function index(){
    $this->data['lang'] = $this->session->userdata('lang');
    $this->load->view('header',$this->data);
    $this->load->view('rechercheSalle',$this->data);
    $this->load->view('footer');


  }

  public function research(){
    if($this->form_validation->run() == FALSE){
      //on envois au modèle les données de la vue
      $data = array();
      if($this->input->post('ville')!==""){
        $data['ville'] = $this->input->post('ville'); //le _lieu évite les ambiguités lors des requêtes (vu que les tables scenes et bar on aussi des colonnes ville et nom)
      }
      if($this->input->post('nom')!==""){
        $data['nom'] = $this->input->post('nom'); //le _lieu évite les ambiguités lors des requêtes (vu que les tables scenes et bar on aussi des colonnes ville et nom)
      }
      if($this->input->post('capacité')!=0){
        $data['capacite<='] = $this->input->post('capacité');
      }
      if($this->input->post('accesHandi')){
        $data['acces_handi'] = $this->input->post('accesHandi');
      }
      // if($this->input->post('recherchehoraire')=="true"){
      //   $hourData=array();
      //   $hourData['EXTRACT(\'DAY\' FROM h_reserv)'] = $this->input->post('day');
      //   $hourData['EXTRACT(\'HOUR\' FROM h_reserv)'] = $this->input->post('hour');
      // }
      switch ($this->input->post('typeSalle')) {
        case 'bar':
            if(isset($hourData)){//si on a défini une heure spécifique
              $this->data['lieux']=$this->salle->getBarWithoutReservation($data,$hourData);
            }else{
              $this->data['lieux']=$this->salle->getBar($data);
            }
          break;
        case 'scene' :
          if(isset($hourData)){//si on a défini une heure spécifique
            $this->data['lieux']=$this->salle->getSceneWithoutReservation($data,$hourData);
          }else{
            $this->data['lieux']=$this->salle->getScene($data);
          }
          break;
        default:
          if(isset($hourData)){//si on a défini une heure spécifique
            $this->data['lieux']=$this->salle->getPlaceWithoutReservation($data,$hourData);
          }else{
            $this->data['lieux']=$this->salle->getPlace($data);
          }
          break;
      }

    }
    $this->index();//on remet la recherche +les résultats
  }
}

?>

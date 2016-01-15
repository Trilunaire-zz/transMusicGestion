<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lieu extends CI_Controller{
  private $data;

  public function __construct(){
    parent::__construct();
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->model('Salle');
    // $this->load->model('Salle');
    $this->data = array('title' => "Rechercher des salles");
  }

  public function index(){
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
      switch ($this->input->post('typeSalle')) {
        case 'bar':
            $this->data['lieux']=$this->Salle->getBar($data);
          break;
        case 'scene' :
            $this->data['lieux']=$this->Salle->getScene($data);
          break;
        default:
            $this->data['lieux']=$this->Salle->getPlace($data);
          break;
      }

    }
    $this->index();//on remet la recherche +les résultats
  }
}

?>

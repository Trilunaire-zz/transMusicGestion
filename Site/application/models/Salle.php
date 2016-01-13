<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************
* @authors randomTony and Trilunaire
***********************/
class Salle extends CI_Model{
  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function getInfos($place)
  {
    return $this->db->select('*')->from('trans._lieu')->where('nom',$place)->get()->result_array();
  }

  public function getPlace($data){
    print_r($data);
    return $this->db->select()
                      ->from('trans._lieu')
                      ->where($data)
                      ->limit(3)
                      ->get()->result_array();

  }

  public function getBar($data){
    return $this->db->select('_lieu.ville,_lieu.nom,capacite,acces_handi')
                      ->from('trans._lieu')
                      ->join('trans._bar','_bar.nom=_lieu.nom AND _bar.ville=_lieu.ville','inner')//comme codeIgniter ne supporte pas les NATURALS JOIN, on fait un INNER JOIN avec deux colonnes
                      ->where($data)
                      ->limit(3)
                      ->get()->result_array();
  }

  public function getScene($data){
    return $this->db->select('_lieu.ville,_lieu.nom,capacite,acces_handi')
                      ->from('trans._lieu')
                      ->join('trans._scene','_scene.nom=_lieu.nom AND _scene.ville=_lieu.ville','inner')//comme codeIgniter ne supporte pas les NATURALS JOIN, on fait un INNER JOIN avec deux colonnes
                      ->where($data)
                      ->limit(3)
                      ->get()->result_array();
  }
}

?>

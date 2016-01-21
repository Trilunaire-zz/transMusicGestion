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
    return $this->db->select('*')->from('trans._lieu')->where('id',$place)->get()->result_array();
  }

  public function getPlace($data){

    return $this->db->select('*')
                      ->from('trans._lieu')
                      ->where($data)
                      ->limit(3)
                      ->get()->result_array();

  }

  public function getBar($data){

    return $this->db->select('*')
                      ->from('trans._lieu')
                      ->join('trans._bar','_bar.id=_lieu.id','inner')
                      ->where($data)
                      ->limit(3)
                      ->get()->result_array();
  }

  public function getScene($data){

    return $this->db->select('*')
                      ->from('trans._lieu')
                      ->join('trans._scene','_scene.id=_lieu.id','inner')
                      ->where($data)
                      ->limit(3)
                      ->get()->result_array();
  }

  // public function getPlaceWithoutReservation($data,$hourData){
  //   return $this->db->select('_lieu.id','ville','nom','capacite','acces_handi','numresponsable')
  //                   ->from('trans._lieu')
  //                   ->where($data)
  //                   /*FIXME: SIMULE an EXCEPT query like:
  //                   select (_lieu.id,ville,nom,capacite,acces_handi,numresponsable) from _lieu where ville = 'Rennes' EXCEPT (select (_lieu.id,ville,nom,capacite,acces_handi,numresponsable) from _reservation INNER JOIN _lieu on _reservation.lieu=_lieu.id WHERE EXTRACT('DAY' from h_reserv)='16');*/
  //
  // }
}

?>

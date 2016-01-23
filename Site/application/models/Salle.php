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

  public function getPlaceWithoutReservation($data,$hourData){
    //on prends d'abord tout les bars réservés à tel date
    $query=$this->db->select('_reservation.lieu')
                    ->from('trans._reservation')
                    ->where($hourData)
                    ->get()->result_array();

    //on les mets sous forme d'array
    $placeReserv=array();
    foreach ($query as $key => $value) {
      $placeReserv[]=$value['lieu'];
    }

    //et on les enlève des bars
    return $this->db->select('*')
                    ->from('trans._lieu')
                    ->where($data)
                    ->where_not_in('_lieu.id',$placeReserv)
                    ->limit(3)
                    ->get()->result_array();
  }

  public function getSceneWithoutReservation($data,$hourData){
    //on prends d'abord tout les bars réservés à tel date
    $query=$this->db->select('_reservation.lieu')
                    ->from('trans._reservation')
                    ->where($hourData)
                    ->get()->result_array();

    //on les mets sous forme d'array
    $placeReserv=array();
    foreach ($query as $key => $value) {
      $placeReserv[]=$value['lieu'];
    }

    //et on les enlève des bars
    return $this->db->select('*')
                    ->from('trans._lieu')
                    ->join('trans._scene','_lieu.id=_scene.id','inner')
                    ->where($data)
                    ->where_not_in('_lieu.id',$placeReserv)
                    ->limit(3)
                    ->get()->result_array();
  }

  public function getBarWithoutReservation($data,$hourData){
    //on prends d'abord tout les bars réservés à tel date
    $query=$this->db->select('_reservation.lieu')
                    ->from('trans._reservation')
                    ->where($hourData)
                    ->get()->result_array();

    //on les mets sous forme d'array
    $placeReserv=array();
    foreach ($query as $key => $value) {
      $placeReserv[]=$value['lieu'];
    }

    //print_r($placeReserv);

    //et on les enlève des bars
    return $this->db->select('*')
                    ->from('trans._lieu')
                    ->join('trans._bar','_lieu.id=_bar.id','inner')
                    ->where($data)
                    ->where_not_in('_lieu.id',$placeReserv)
                    ->limit(3)
                    ->get()->result_array();
  }
}

?>

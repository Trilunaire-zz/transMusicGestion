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
    print_r($data);
    return $this->db->select('*')
                      ->from('trans._lieu')
                      ->where($data)
                      ->limit(3)
                      ->get()->result_array();

  }

  public function getBar($data){
    echo "BAR";
    return $this->db->select('*')
                      ->from('trans._lieu')
                      ->join('trans._bar','_bar.id=_lieu.id','inner')
                      ->where($data)
                      ->limit(3)
                      ->get()->result_array();
  }

  public function getScene($data){
    echo "SCENE";
    return $this->db->select('*')
                      ->from('trans._lieu')
                      ->join('trans._scene','_scene.id=_lieu.id','inner')
                      ->where($data)
                      ->limit(3)
                      ->get()->result_array();
  }
}

?>

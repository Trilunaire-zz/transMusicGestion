<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************
* @authors randomTony and Trilunaire
***********************/
class Reservation extends CI_Model{
  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function getMine($log){
    return $this->db->select('*')
                    ->from('trans._reservation')
                    ->where('login',$log['login'])
                    ->get()
                    ->result_array();
  }

  public function getSalleReserv($place){
    return $this->db->select('*')
                    ->from('trans._reservation')
                    ->where('nomlieu',$place)
                    ->get()
                    ->result_array();
  }

  public function getAll(){
    $resrv = array();
    $reserv['valide'] = $this->db->select('*')
                    ->from('trans._reservation')->join("trans._groupe","trans._reservation.login = trans._groupe.login")
                    ->where('etat','validée')->or_where('etat','Validée')
                    ->get()
                    ->result_array();

    $reserv['encours'] = $this->db->select('*')
                                  ->from('trans._reservation')->join("trans._groupe","trans._reservation.login = trans._groupe.login")
                                  ->where('etat','attente')
                                  ->get()
                                  ->result_array();

    $reserv['refuse'] = $this->db->select('*')
                                ->from('trans._reservation')->join("trans._groupe","trans._reservation.login = trans._groupe.login")
                                ->where('etat','refusée')
                                ->get()
                                ->result_array();
    return $reserv;
  }
}

?>

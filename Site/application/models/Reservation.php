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

  public function nouvelle($data)
  {
    return $this->db->insert('trans._reservation',$data);

  }

  public function getByID($id)
  {
    return $this->db->select('*')->from('trans._reservation')->where('id',$id)->get()->result_array();
  }

  public function getMine($log){
    return $this->db->select('etat,_reservation.id as id,_lieu.nom as salle,_lieu.ville, h_reserv')
                    ->from('trans._reservation')
                    ->join("trans._lieu","trans._reservation.lieu = trans._lieu.id")
                    ->where('login',$log['login'])
                    ->get()
                    ->result_array();
  }

  public function getSalleReserv($place){
    return $this->db->select('*')
                    ->from('trans._reservation')
                    ->where('lieu',$place)
                    ->get()
                    ->result_array();
  }

  public function getAll(){
    $resrv = array();
    $reserv['valide'] = $this->db->select('_reservation.id as id,_lieu.nom as salle,_groupe.nom as nom,_lieu.ville, h_reserv')
                    ->from('trans._reservation')->join("trans._groupe","trans._reservation.login = trans._groupe.login")
                    ->join("trans._lieu","trans._reservation.lieu = trans._lieu.id")
                    ->where('etat','validée')->or_where('etat','Validée')
                    ->get()
                    ->result_array();

    $reserv['encours'] = $this->db->select('_reservation.id as id,_lieu.nom as salle,_groupe.nom as nom,_lieu.ville, h_reserv')
                                  ->from('trans._reservation')->join("trans._groupe","trans._reservation.login = trans._groupe.login")
                                  ->join("trans._lieu","trans._reservation.lieu = trans._lieu.id")
                                  ->where('etat','attente')
                                  ->get()
                                  ->result_array();

    $reserv['refuse'] = $this->db->select('_reservation.id as id,_lieu.nom as salle,_groupe.nom as nom,_lieu.ville, h_reserv')
                                ->from('trans._reservation')->join("trans._groupe","trans._reservation.login = trans._groupe.login")
                                ->join("trans._lieu","trans._reservation.lieu = trans._lieu.id")
                                ->where('etat','refusée')
                                ->get()
                                ->result_array();
    return $reserv;
  }

  public function accepter($id){
    $this->db->set('etat','validée')->where('id',$id)->update('trans._reservation');
    $info = $this->getByID($id)[0];
    $query = "etat='attente' and lieu='".$info['lieu']."' and (h_reserv='".$info['h_reserv']."' or login='".$info['login']."')";
    $to_delete = $this->db->select('id')
                          ->from('trans._reservation')
                          ->where($query)
                          ->get()
                          ->result_array();
    foreach ($to_delete as $tab) {
      $this->db->delete('trans._reservation',$tab);
    }
    /*
    echo '<pre>';
    print_r($info);
    print_r($to_delete);
    echo '</pre>';
    */
  }

  public function refuser($id){
    $this->db->set('etat','refusée')->where('id',$id)->update('trans._reservation');
  }

}

?>

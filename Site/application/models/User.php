<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**********************
* @authors randomTony and Trilunaire
***********************/

class User extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }


  public function isAdmin($log){
    return !empty($this->db->select('login')
                    ->from('trans._atm')
                    ->where('login',$log['login'])
                    ->get()->result());

    
  }

  public function userExist($userName, $password){
    return $this->db->select('login')
                    ->from('trans._utilisateur')
                    ->where('login',$userName)
                    ->where('motdepasse',$password)
                    ->get()->result();
  }

  public function signUp($data){ //les données sont pré-transformés en array

    echo "Salut";
    echo "<pre>";
    print_r($data);
    echo "</pre>";

    $user = array(
              'login' => str_split($data['nom'],10)[0],
              'motdepasse' => "".rand(100000,999999),
              'mail' => $data['mail'],
              'etat' => TRUE,
            );
    echo "<pre>";
    print_r($user);
    echo "</pre>";

    $artiste = array(
                'login' => $user['login'],
                'nom' => $data['nom'],
                'pays' => $data['pays'],
              );
    $this->db->insert('trans._utilisateur',$user);
    $this->db->insert('trans._groupe',$artiste);
  }

  public function getInfo($data){
    return $this->db->select('*')
                    ->from('trans._groupe')
                    ->where('login',$data)
                    ->get()
                    ->result_array();
  }


}


?>

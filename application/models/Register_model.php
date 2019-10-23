<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model
{   
    
    public function inscription($data){
    $this->load->database();
    $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT); //hachage du mot de passe //
    $this->db->set('date_inscription','now()',false);//insert la date d'inscription avec la fonction now()
    $this->db->set('ROLE','ROLE_USERS');//insert de base un role users a l'inscription
    $this->db->insert("users", $data);//insert données du formulaire ds la bdd

                                       }
public function login($login){
    $this->load->database();
    $users = $this->db->query("select * from users where login=?", $login)->row();
    return $users;
                             }
 public function connexion_utilisateur($login){
     $this->load->database();
     $date = date('Y-m-d');
     $data=array('date_connexion'=>$date);
     $this->db->where('login',$login);
    $this->db->update('users',$data);  
                                               }
    public function detail_users($login){
        $results = $this->db->query("select * from users where login=?",$login);
        $aDetail = $results->row();
        return $aDetail;  
                                        }
    public function verifEmail($email){
        $this->load->database();
        $results = $this->db->query("select * from users where mail=?",$email);
        $aDetail = $results->row();
        return $aDetail;
                                        }
    public function changermotdepasse (){
     $this->load->database();
     $data = $this->input->post();
     $this->db->where('password', $password);
     $changermotdepasse=$this->db->update('users', $data);
     return $changermotdepasse;}

}
?>
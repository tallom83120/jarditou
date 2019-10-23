<?php
// application/controllers/Produits.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
    /*fonction inscription affiche le form inscription et insert ds la bdd les données rentrée par l'utilisateur */
    public function inscription(){           
           $this->load->helper('url');
           $this->load->helper('form');
           // Chargement de la librairie 'Upload'
           $this->load->library('upload');
           $this->form_validation->set_rules('nom','nom','htmlspecialchars|required|min_length[1]|max_length[50]', array( 'required'  => ' Vous devez renseignez le champ Nom'));
           $this->form_validation->set_rules('prenom','prenom','htmlspecialchars|required|min_length[1]|max_length[50]', array( 'required'  => 'Vous devez renseignez le champ Prénom'));
           $this->form_validation->set_rules('mail','mail','required|valid_email|is_unique[users.mail]', array('valid_email'=>'veuillez saisir un email valide exemple: toto@yahoo.fr', 'required'  => 'champ Mail obligatoire','is_unique' =>'cet email est déjà utilisé, veuillez en saisir un autre.'));
           $this->form_validation->set_rules('login', 'login', 'htmlspecialchars|trim|required|min_length[5]|max_length[12]|is_unique[users.login]', array('min_length'=>'votre login doit comporter un minimum de 5 caractères.','required'=>'veuillez renseigner le champ login','is_unique'=>'ce login existe déjà , veuillez en saisir un autre.'));
           $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]',array('required'=> 'veuillez saisir un mot de passe','min_length'=>'votre mot de passe doit comporter minimum 8 caractères.'));
           $this->form_validation->set_rules('check_password', 'check_password', 'trim|required|matches[password]',array('required'=> 'Veuillez confirmer votre mot de passe','matches'=>'le mot de passe saisi ne correspond pas'));
           $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">
               &times</span></button>' ,'</div>');
           if ($this->input->post()) 
           {  
                if ($this->form_validation->run() != FALSE)
                {
                    $data=array('nom'=>$this->input->post('nom'),'prenom'=>$this->input->post('prenom'),'mail'=>$this->input->post('mail'),'login'=>$this->input->post('login'),'password'=>$this->input->post('password'));  
                    $this->load->model('register_model');
            
                    $this -> load -> library ( 'email' );
           
                    $config [ 'charset' ]  =  'utf-8' ;
                    $config['crlf']="\r\n";
                    $config['newline']="\r\n";
                    $config['wrapchars']=70;
                    $this -> email -> initialize ($config);
            
                    $to=$this->input->post('mail');
           
                    $this->email->from('allombert_thib@hotmail.fr', 'Jarditou');
                    $this->email->to($to);
                    $this->email->subject("Confirmation d'inscription");
                    $this->email->message('Bienvenue dans le monde merveilleux de Jarditou, votre compte est à présent crée.');
                    if($this->email->send())
                    {
                        $this->register_model->inscription($data);
                        redirect('produits/liste');
                    }
                    else 
                    {
                        $this->load->view('inscription');
                    }
                }
                else 
                {
                    $this->load->view('inscription');
                }
            }
            else 
            {
            $this->load->view('inscription');
            }
       }
   //connexion
       public function login(){
             $this->load->model('register_model'); //charge le model
            if ($data = $this->input->post()){
             $login = $data["login"];
             $password = $data["password"];
             if ( $users=$this->register_model->login($login)) {
                 if (password_verify($password, $users->password)){//fonction password_verify vérifie que le hachage correspond au bon mot de passe.
                        $this->register_model->connexion_utilisateur($login);
                        $this->session->users = $users;
                        $this->session->login=$login;
                        $this->session->message = "bienvenue ".$login;
                        $this->session->role=$users->ROLE; 
                        $this->session->jeton= bin2hex(openssl_random_pseudo_bytes(6));//crée un jeton aleatoire de 6 caracteres pour chaque connexion de l'utilisateur pour que la page detail users soit sécuriser. 
                        redirect(site_url("boutique/liste_panier"));
                                                                  }
                    else {
                            $this->session->users = null;
                            $this->session->flashdatamdp ="<div class='alert alert-danger alert-dismissible'>  <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>
               &times</span></button> Le mot de passe ne correspond pas !!!</div";
                            redirect(site_url("register/login"));
                         }
                                                                  }
                      else {
                            $this->session->users = null;
                            $this->session->flashdata = "<div class='alert alert-danger alert-dismissible'>  <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>
               &times</span></button> Le login ne correspond pas !!!</div";
                            redirect(site_url("register/login"));
                           }
                                              }
                       else {
                           
                           $this->load->view('login');
                           $this->session->flashdata ="";
                           $this->session->flashdatamdp ="";
                            }
                              }
               
         public function logout(){
                           $this->session->users = null;
                           $this->session->message = null;
                           $this->session->unset_userdata('login');
                           $this->session->sess_destroy();
                           redirect(site_url("register/login"));
                                 }
                   
        public function detail_users($login,$jeton){  
            if($this->session->login==$login && $this->session->jeton==$jeton){
                           $this->load->model('register_model');
                           $aDetail=$this->register_model->detail_users($login);
                           $aView["detail_users"] = $aDetail;
                           $this->load->view('detail_users',$aView);
                                                                               }
                                                    }
           public function forgotpassword(){
                            $this->load->helper('url');
                            $this->load->library('email');
                            $this->form_validation->set_rules('mail','mail','trim|required|max_length[100]');
                            $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">  <button type="button" class="close"  data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">
               &times</span></button>' ,'</div>');
                            if($this->input->post("valider")){
                                if($this->form_validation->run())
                            {
                                $email = $this->input->post('mail');
                                $this->load->model('register_model');
                                var_dump($email);
                              if($this->register_model->verifEmail($email) != NULL){
                                    $this->email->from('allombert_thib@hotmail.fr','admin');
                                    $this->email->to($email);
                                    $this->email->subject('Mot de passe oublié');
                                    $this->email->message('http://localhost/projet/ci/index.php/register/changepassword');
                                    $this->email->send();
                               redirect("produits/liste")  ;   
                               echo "Le mail de confirmation a été envoyé";
                              }
                                else
                                {
                                    echo "mail incorrect";
                                }
                            }
                            else{
                                $this->load->view('forgotpassword');
                            }
                            }else{
                                $this->load->view('forgotpassword');
                            }
           }
                            
        public function changepassword() {
            $this->load->library('upload');
            $this->form_validation->set_rules('password', 'password','required|max_length[60]');
           $this->form_validation->set_rules('passwordConfirmation', 'passwordConfirmation', 'trim|required|matches[password]',array('required'=> 'Veuillez confirmer votre mot de passe','matches'=>'le mot de passe saisi ne correspond pas'));

            if ($this->input->post())
            {if ($this->form_validation->run()) {
                $this->load->model('register_model');
                $this->input->post('password');
                redirect("register/login");
            }
            else{
                $this->load->view('changepassword');
            }
            }
            else{
                $this->load->view("changepassword");
            }
        }
}
           ?>
      
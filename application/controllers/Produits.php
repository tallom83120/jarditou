<?php
// application/controllers/Produits.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produits extends CI_Controller
{
    public function bouton () {
        $this->load->helper('url');
        $this->load->view('bouton');
    }
    //affichage liste page accueil
    public function error404 (){
        $this->load->helper('url');
        $this->load->view('error404');
                               }
        //affichage liste page accueil
   
    public function liste(){
           $this->load->helper('url');
           // On charge le modèle 'produits_model'
           $this->load->model('produits_model');
           // On appelle la méthode liste() du modèle,
           // qui retourne le tableau de résultat ici affecté dans la variable $aListe (un tableau)
           // remarque la syntaxe $this->nom_modele->methode()
           $aListe = $this->produits_model->liste();
         // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView["liste_produits"] = $aListe;
        // Appel de la vue avec transmission du tableau
        $this->load->view('liste', $aView,false);
                           }
       public function tableau(){
           $this->load->helper('url');
           $this->load->view('corps_tableau_jarditou');
                                }
       public function contact(){
           $this->load->helper('url');
           $this->load->view('corps_contact_jarditou');
                                }
       //page detail
       public function detail($id){
           $this->load->helper('url');
           $this->load->model('produits_model');
           $aDetail=$this->produits_model->detail($id);
           $aView["detail_produit"] = $aDetail;
           $this->load->view('detail',$aView);
                                  }
       //formulaire ajout
       public function ajout(){
           $this->load->helper('url');
           $this->load->helper('form');
           // Chargement de la librairie 'Upload'
           $this->load->library('upload');
           $this->load->model('categories_model');
           
           // On appelle la méthode listeCategories() du modèle,
           // qui retourne le tableau de résultat ici affecté dans la variable $aCategorie (un tableau)
           // remarque la syntaxe $this->nom_modele->methode()
           $aCategorie = $this->categories_model->listeCategorie();
           
           // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
           $aViewCategorie['liste_categories'] = $aCategorie;
           
          
           //utilisation des form_validation de codeigniter permet de créer des "regex" php permettant de guider l'utilisateur dans l'utilisation des formualires.
           $this->form_validation->set_rules('pro_libelle','libelle','required|min_length[3]|max_length[50]', array( 'required'  => 'champ obligatoire'));
           $this->form_validation->set_rules('pro_ref','reference','required|min_length[3]|max_length[50]|is_unique[produits.pro_ref]', array( 'required'  => 'champ obligatoire',
                  'is_unique' =>'la référence %s existe déjà.'));
           $this->form_validation->set_rules('pro_prix','prix','required', array( 'required'  => 'champ obligatoire'));
           $this->form_validation->set_rules('pro_stock','stock','required', array( 'required'  => 'champ obligatoire'));
           $this->form_validation->set_rules('pro_couleur','couleur','required|min_length[3]|max_length[50]', array( 'required'  => 'champ obligatoire'));
           $this->form_validation->set_rules('pro_photo','photo','required|min_length[3]|max_length[50]', array( 'required'  => 'champ obligatoire'));
           $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">
               &times</span></button>' ,'</div>');
            if ($this->input->post()) 
              {
                 if ($this->form_validation->run() == FALSE)
                  {
                      if($this->session->role=="ROLE_ADMIN"){
                          $this->load->view('formulaire_ajout',$aViewCategorie);
                          
                      }
                  }
                 else
                {                   
                    $this->load->model('produits_model');
                   $aDetail=$this->produits_model->ajout();//on appelle la fonction ajout qui va permettre d'ajouter notre produit et ses données ds la bdd.
               // On créé un tableau de configuration pour l'upload
               $config['upload_path'] = './assets/jarditou_photos/'; // chemin où sera stocké le fichier
               $name=$_FILES["photo"]["name"]; 
               $file_ext=pathinfo($name, PATHINFO_EXTENSION);
               $config['file_name']= $this->db->insert_id().'.'.$file_ext; // nom du fichier final
               $config['allowed_types'] = 'gif|jpg|png'; // Types autorisés (ici pour des images)
               // On charge la librairie 'upload' de CodeIgniter en lui envoyant la config
               $this->load->library('upload');
               // On initialise la config
               $this->upload->initialize($config);
               // La méthode do_upload() effectue les validations sur l'attribut HTML 'name' ('fichier' dans notre formulaire) et si OK renomme et déplace le fichier tel que configuré
               if ( ! $this->upload->do_upload('photo'))
               {
                   // Echec : on récupère les erreurs dans une variable (une chaîne)
                   $errors = $this->upload->display_errors();
                   // on réaffiche la vue du formulaire en passant les erreurs
                   $aView["errors"] = $errors;
                     $this->load->view('produits/ajout',$aView);
              
               }
             else
               { // Succès, on redirige sur la liste
                   redirect('produits/liste');
               }
               redirect("produits/liste");
           }
           }
           else
           { // 1er appel de la page: affichage du formulaire
               if($this->session->role=="ROLE_ADMIN"){   
                   $this->load->view('formulaire_ajout',$aViewCategorie);
               }
               else{redirect('produits/liste');}}
       }
       
       //formulaire modif    
       public function modif($id)
       {     
           $this->load->helper('url');
           $this->load->helper('form');
           $this->load->library('upload');//on charge la library upload
           $this->form_validation->set_rules('pro_libelle','libelle','required|min_length[3]|max_length[50]', array( 'required'  => 'champ obligatoire'));
           $this->form_validation->set_rules('pro_ref','reference','required|min_length[3]|max_length[50]', array('required'=>'champ obligatoire'));
           $this->form_validation->set_rules('pro_prix','prix','required', array( 'required'  => 'champ obligatoire'));
           $this->form_validation->set_rules('pro_stock','stock','required', array( 'required'  => 'champ obligatoire'));
           $this->form_validation->set_rules('pro_couleur','couleur','required|min_length[3]|max_length[50]', array( 'required'  => 'champ obligatoire'));
           $this->form_validation->set_rules('pro_photo','photo','required|min_length[3]|max_length[50]', array( 'required'  => 'champ obligatoire'));
           
           $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">
               &times</span></button>' ,'</div>');
           if ($this->input->post())
           {
               if ($this->form_validation->run() != false){
                   $this->load->model('produits_model');
                   $modif=$this->produits_model->modif($id);
               redirect('produits/liste');
           }
           else{
               $this->load->model('produits_model');
               $liste=$this->produits_model->affiche_modif($id);
               $tabs=$this->produits_model->categories($id);
               
               // Teste s'il y a un résultat à la requête effectué :
               if (!$liste->row())
               {
                   echo"<p>L'id.$id. n'existe pas dans la base de données.</p>";
               }
               
               $tabs["produits"] = $liste->row(); // première ligne du résultat
               $this->load->view('formulaire_modif', $tabs);
           }
           }
           else
           {
               $this->load->model('produits_model');
               $liste=$this->produits_model->affiche_modif($id);
               $tabs=$this->produits_model->categories($id);
               
               // Teste s'il y a un résultat à la requête effectué :
               if (!$liste->row())
               {
                   echo"<p>L'id.$id. n'existe pas dans la base de données.</p>";
               }
               
               $tabs["produits"] = $liste->row(); // première ligne du résultat
               if($this->session->role=="ROLE_ADMIN"){  
                   $this->load->view('formulaire_modif', $tabs);
               }
               else{redirect('produits/liste');}
           }
           }
           
           public function supprime($id)
           {
               $this->load->helper('url');
               $this->load->helper('form');
              
               if($this->input->post("supprimer"))
               {   
                   $this->load->model('produits_model');
                   $aDetail=$this->produits_model->supprime($id);
                   redirect(site_url('produits/liste'));
               }
               else{
                   $this->load->model('produits_model');
                   $aDetail=$this->produits_model->form_supprime($id);
                   $aView["detail_produit_supprime"] = $aDetail;
                   if($this->session->role=="ROLE_ADMIN"){   
                       $this->load->view('formulaire_supprime',$aView); }
                   else{redirect('produits/liste');}
               }
           }
       
}
?>
   
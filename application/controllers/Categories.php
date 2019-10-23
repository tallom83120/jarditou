<?php
        // Fichier controller
        
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller
{
    public function listeCategorie()
    {       
        // Charge le modèle 'produits_model'
        $this->load->model('categories_model');
        
            // On appelle la méthode listeCategories() du modèle,
            // qui retourne le tableau de résultat ici affecté dans la variable $aCategorie (un tableau)
            // remarque la syntaxe $this->nom_modele->methode()
        $aCategorie = $this->categories_model->listeCategorie();
        
        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aViewCategorie['liste_categories'] = $aCategorie;
        
        // Appel de la vue avec transmission du tableau
        $this->load->view('liste_categories', $aViewCategorie); 
    }
    
    public function listeSousCategorie()
    {
        
        if ($this->input->is_ajax_request())    // Si la requête est une requête ajax
        {        
            // Charge le modèle 'categories_model'
            $this->load->model('categories_model');
            
            // On appelle la méthode listeSousCategories() du modèle,
            // qui retourne le tableau de résultat ici affecté dans la variable $aSousCategories (un tableau)
            $aSousCategories = $this->categories_model->listeSousCategorie();
            
            echo json_encode($aSousCategories);
        }
        
    }
}

?>
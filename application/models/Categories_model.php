<?php

        
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends CI_Model
{
    public function listeCategorie()
    {
        // Charge la librairie 'database' si non paramétré dans config
        $this->load->database();
        // Exécute la requête
        $requete = $this->db->query('SELECT * FROM categories WHERE cat_parent is null');
        // Récupération des résultats
        $aCategories = $requete->result();
        
        return $aCategories;
    }
    
    public function listeSousCategorie()
    {       
            // Charge la librairie 'database' si non paramétré dans config
            $this->load->database();
            // Exécute la requête
            $requete = $this->db->query('SELECT * FROM categories WHERE cat_parent = ?', array($_POST["cat_id"]));
            // Récupération des résultats
            
            if ($requete) // Si la requête contient des informations
            {           
                $aSousCategories = $requete->result();
             
                if ($aSousCategories && is_array($aSousCategories) && count($aSousCategories)>0) 
                {
                    // var_dump($aSousCategories);
                    return $aSousCategories;
                }
            }
    }
    
}
?>
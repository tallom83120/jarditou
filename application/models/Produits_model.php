<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Produits_model extends CI_Model
{
     //page liste
    public function liste() 
     {
         $this->load->database();
         $requete = $this->db->query("SELECT * FROM produits");
         $aProduits = $requete->result();  
         return $aProduits;            
     }  
    //page detail
    public function detail($id)
     {
         $results = $this->db->query("select * from produits join categories where pro_id=?",$id);
         $aDetail = $results->row();
        return $aDetail;
     }
     //model pour page affiche formulaire detail avant de supprimer un produit.
     public function form_supprime($id)
    {
    $this->load->database();
    $results = $this->db->query("select * from produits where pro_id=?",array($id));
    
    $aDetail = $results->row();
    return $aDetail;
    }
    //model pour supprimer produit
    public function supprime($id)
    {
        $this->load->database();
        $this->db->where('pro_id', $id);
        $supprime=$this->db->delete('produits');
        return $supprime;
    }
    //page ajout d'1 produit
    public function ajout()
    {
    $this->load->database();
    $data = $this->input->post();
    unset($data["cat"]);
    unset($data["photo"]);
    $data = $this->security->xss_clean($data);
    $this->db->set('pro_d_ajout','now()',false);
    return $this->db->insert('produits', $data);
    }
    // modif produit
    public function modif ($id)
    {
    $this->load->database();
    $data = $this->input->post();
    $data = $this->security->xss_clean($data);
    $this->db->set('pro_d_modif','now()',false);
    
    $this->db->where('pro_id', $id);
    $this->db->join('categories', 'categories.cat_id=produits.pro_cat_id');
    
     $modif=$this->db->update('produits', $data);
     return $modif;
    }
    public function affiche_modif($id)
    {        
        $this->load->database();
        $liste = $this->db->query("SELECT * FROM produits join categories WHERE pro_id=? and categories.cat_id=produits.pro_cat_id ", array($id));
             return $liste;
    }
   public function categories()
    { 
        $this->load->database();
        $tabs['categories']=$this->db->query("select cat_id,cat_nom FROM categories")->result();
        return $tabs;
       
            }
        }
    

?>
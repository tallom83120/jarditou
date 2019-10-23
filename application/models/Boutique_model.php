<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Boutique_model extends CI_Model
{

public function liste_panier()
{
    $this->load->database();
    $requete = $this->db->query('Select * from produits join categories on produits.pro_cat_id=categories.cat_id where pro_bloque is null order by cat_nom');
    $model = $requete->result();
    
    return $model;
}

public function listeBoutiquePrixCroissants()
{
    $this->load->database();
    $requete = $this->db->query('Select * from produits join categories on produits.pro_cat_id=categories.cat_id where pro_bloque is null order by pro_prix asc');
    $model = $requete->result();
    
    return $model;
}
public function listeBoutiquePrixDecroissants()
{
    


$this->load->database();
$requete = $this->db->query('Select * from produits join categories on produits.pro_cat_id=categories.cat_id where pro_bloque is null order by pro_prix desc');
$model = $requete->result();

return $model;
}
}
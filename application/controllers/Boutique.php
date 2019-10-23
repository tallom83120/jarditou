<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boutique extends CI_Controller {
    /**
      *\brief fonction qui affiche la vue du panier
     *\param panier, panier_liste
     *\param vue panier
     *\author allombert thibaut
     *\juin 2019
     */
    public function affiche()
    {
        $this->load->view('panier_liste');
    }
    /** brief qui permet a l'utilisateur d'ajouter des produits a son panier.
     *\ param $_session, users, $data 
     *\ param
    *\author allombert thibaut
     *\juin 2019
     */
    public function ajoute($aView)
    {
        if (isset($_SESSION['users'])) //si l'utilisateur est connecté
        {
            $data=$this->input->post();
            if ($this->session->panier_liste==null) //création du panier s'il n'existe pas
            {
                $this->session->panier_liste = array();
                $tab=$this->session->panier_liste;
                //On ajoute le produit
                array_push($tab,$data);
                $this->session->panier_liste = $tab;
                $this->load->view('liste_panier',$aView);
            }
            else //si le panier existe
            {
                $tab=$this->session->panier_liste;
                $idProduit=$this->input->post('pro_id');
                $sortie = false;
                foreach ($tab as $produit) //on cherche si le produit existe déjà dans le panier
                {
                    if ($produit['pro_id'] == $idProduit)
                    {
                        $sortie = true;
                    }
                }
                if ($sortie) //si le produit existe déjà, l'utilisateur est averti
                {
                    $aView["erreur"]='<div class="alert alert-danger">Ce produit est déjà présent dans le panier.</div>';
                    $this->load->view('panier_liste',$aView);
                }
                else //sinon le produit est ajouté dans le panier
                {
                    array_push($tab,$data);
                    $this->session->panier_liste = $tab;
                    $this->load->view('liste_panier',$aView);
                }
            }
        }
        else
        {
            $aView["erreur"]='<div class="alert alert-danger">Veuillez vous <a href="http://localhost/projet/ci/index.php/register/login" class="alert-link">connecter</a> pour ajouter un produit dans le panier.</div>';
            $this->load->view('liste_panier',$aView);
        }
    }
    /**
     *\brief fonction qui permet a l'utilisateur de vider son panier donc pour chaque session si l'utilisateur clic sur effacer panier cela va vider son panier.
     *\
    *\author allombert thibaut
     *\juin 2019
     */
    public function efface()
    {
        $this->session->panier_liste=array();
        $this->affiche();
     }
     /**
      *\brief affiche la vue de la boutique 
      *\
      *\
       *\author allombert thibaut
     *\juin 2019
     */
        public function liste_panier()
    {
        $this->load->model('Boutique_model');
        $aView["liste_produits"] = $this->Boutique_model->liste_panier();
        if ($this->input->post()) //deuxième appel de la page quand une tentative d'ajout au panier est effectuée
        {
            $this->ajoute($aView,$this->input->post());
        }
        else
        {
            $this->load->view('liste_panier',$aView);
        }
    }
    /**
     *\brief permet  d'effacer un produit en particulier dans le panier.
     *\ on met en session
     *\on créee un tableau temporaire
     *\ on crée un jeton de session et on cherche ds le panier les produits a ne pas supprimer
     *\on ajoute les produits ds le tableau temporaire a l'aide d'un array_push
     *\le panier prends la valeur du tableau temporaire et ne contient plus le produit a supprimer.
     *\author allombert thibaut array
     *\juin 2019
     */
    public function effaceProduit($id,$jeton)
    {
        $tab=$this->session->panier_liste;
        $temp=array(); //création d'un tableau temporaire vide
        if ($jeton == $this->session->jeton)
        {
            for ($i=0; $i<count($tab); $i++) //on cherche dans le panier les produits à ne pas supprimer
            {
                if ($tab[$i]['pro_id'] !== $id)
                {
                    array_push($temp, $tab[$i]); //ces produits sont ajoutés dans le tableau temporaire
                }
            }
            $tab=$temp;
            unset($temp);
            $this->session->panier_liste=$tab; //le panier prend la valeur du tableau temporaire et ne contient donc plus le produit à supprimer
            $this->affiche();
                    }
        else
        {
            $data['erreur'] = '<div class="alert alert-danger">Jeton invalide</div>';
            $this->load->view('panier_liste',$data);
        }
    }
    /**
     *\brief fonction qui permet de trier la liste de la boutique par prix croissant.
     *\
     *\author allombert thibaut
     *\juin 2019
     */
public function listePrixCroissants()
{  $this->load->model('boutique_model');

$aView["liste_produits"] = $this->boutique_model->listeBoutiquePrixCroissants();
if ($this->input->post()) //deuxième appel de la page quand une tentative d'ajout au panier est effectuée
{
    $this->ajoute($aView,$this->input->post());
}
else
{
    $this->load->view('liste_panier',$aView);
}
}
/**
 *\brief fonction qui permet de trier la liste de la boutique par prix decroissant.
 *\
 *\author allombert thibaut
 *\juin 2019
 */
public function listePrixDecroissants()
{
    $this->load->model('boutique_model');
    $aView["liste_produits"] = $this->boutique_model->listeBoutiquePrixDecroissants();
    if ($this->input->post()) //deuxième appel de la page quand une tentative d'ajout au panier est effectuée
    {
        $this->ajoute($aView,$this->input->post());
    }
    else
    {
        $this->load->view('liste_panier',$aView);
    }
}
/**
 *\brief fonction qui permet au panier de gerer la qté + d'un produit
 *\
 *\voir model
 *\author allombert thibaut
 *\juin 2019
 */
public function qteplus($id)
{
    $tab=$this->session->panier_liste;
    $temp=array();
    for ($i=0; $i<count($tab); $i++) //on parcourt le tableau produit après produit
    {
        if ($tab[$i]['pro_id'] !== $id)
        {
            array_push($temp, $tab[$i]);
        }
        else
        {
            $tab[$i]['pro_qte']++;
            array_push($temp, $tab[$i]);
        }
    }
    $tab=$temp;
    unset($temp);
    $this->session->panier_liste=$tab;
    $this->affiche();
    redirect("boutique/affiche");
    
}

 // Méthode qui diminue la quantité d'un des produits du panier
/**
 *\brief fonction qui permet au panier de gerer la qté - d'un produit
 *\
 *\voir model
 *\author allombert thibaut
 *\juin 2019
 */
public function qtemoins($id)
{
    $tab=$this->session->panier_liste; //tableau panier placé dans un tableau tab
    $temp=array(); //tableau temporaire vide
    for ($i=0; $i<count($tab); $i++) //on parcourt le tableau produit après produit
    {
        if ($tab[$i]['pro_id'] !== $id) //quand le produit rencontré dans le tableau tab ne correspond pas au produit dont la qté doit être diminuée
        {
            array_push($temp, $tab[$i]); //les données de ce produit sont ajoutées dans le tableau temporaire
        }
        else //sinon la quantité du produit est décrémentée sauf si on est à 1
        {
            if ($tab[$i]['pro_qte'] > 1)
            {
                $tab[$i]['pro_qte']--;
            }
            else
            {
                $tab[$i]['pro_qte'] = 1;
            }
            array_push($temp, $tab[$i]); //les nouvelles données sont introduites dans le tableau temporaire
        }
    }
    $tab=$temp;
    unset($temp);
    $this->session->panier_liste=$tab; //les données du tableau temporaire remplacent les anciennes données du tableau
    $this->affiche();
    redirect("boutique/affiche");
    
    
}
}


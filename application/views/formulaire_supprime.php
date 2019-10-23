<?php
$title="Supprimer produit : ".$detail_produit_supprime->pro_id." ".$detail_produit_supprime->pro_ref;
ob_start();

?>
<h1 style="color: #3d9688"> Les informations suivantes seront supprimées:</h1>

<div class="formulaire">
<?php echo form_open_multipart(); 

echo "Catégorie du produit: " .$detail_produit_supprime->pro_cat_id."<br/>";
echo "Libellé du produuit: ".$detail_produit_supprime->pro_libelle."<br/>";
echo "Prix du produit: ".$detail_produit_supprime->pro_prix."<br/>";
echo "Stock actuel : ".$detail_produit_supprime->pro_stock."<br/>";
echo "Couleur : ".$detail_produit_supprime->pro_couleur."<br/>";
echo "Date d'ajout du produit: ".$detail_produit_supprime->pro_d_ajout."<br/>";
echo "Date et heure de la dernière modification: ".$detail_produit_supprime->pro_d_modif."<br/>";
if($detail_produit_supprime->pro_bloque == 1){
    echo "Ce produit est bloqué.";
}
        else
{
    echo "Ce produit est encore disponible à la vente";
}

?>
<br/> <br/> 

<input type="submit" id="supprime" name="supprimer" value="supprimer"class="btn btn-info">
<br/>
<?php echo form_close(); 
$contenu = ob_get_clean();
require 'template.php';
?></div>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


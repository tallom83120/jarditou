<?php
$title="modifier produit : ".$produits->
pro_id." ".$produits->pro_ref; ob_start(); ?>
<div class="formulaire">
	<?php echo form_open_multipart(); ?>
	<fieldset>
		<!-- je déclare mon formulaire à l'aide d'1 form  -->
		<legend>Formulaire de modification produit :</legend>
		<label for=Référence>Référence </label>
		<input type="text" name="pro_ref" id="Référence" value=<?=$produits->pro_ref ?>><?php echo form_error("pro_ref"); ?>
		<br>
		<label for="Catégorie"> Catégorie </label>
		<select name="pro_cat_id" id="Catégorie">
			<?php
foreach($categories as $valeurs){
    if ($valeurs->cat_id==$produits->pro_cat_id){ echo '<option value="'.$produits->pro_cat_id.'" selected>'.$valeurs->cat_id.'-'.$valeurs->cat_nom.'</option>'; } 
    else {echo '<option value="'.$valeurs->cat_id.'" >'.$valeurs->cat_id.'-'.$valeurs->cat_nom.'</option>'; } }?>
		</select>
		<label for="Libellé"> Libellé</label>
		<input type="text" name="pro_libelle" id="Libellé" value=<?=$produits->pro_libelle ?>><?php echo form_error("pro_libelle"); ?>
		<br>
		<label for="Description"> Description</label><br>
		<textarea name="pro_description" id="pro_description" rows="5" cols="600" onclick="if(this.value=='Description produit') this.value='';" onfocus="if(this.value=='Description produit') this.value='';"><?php echo $produits->
		pro_description ?></textarea><br>
		<label for="Prix"> Prix </label>
		<input type="text" name="pro_prix" id="Prix" value=<?php echo $produits->pro_prix.'€' ?>><?php echo form_error("pro_prix"); ?>
		<br>
		<label for="Stock"> Stock </label>
		<input type="text" name="pro_stock" id="Stock" value=<?php echo $produits->pro_stock ?>><?php echo form_error("pro_stock"); ?>
		<br>
		<label for="Couleur"> Couleur </label>
		<input type="text" name="pro_couleur" id="Couleur" value=<?php echo $produits->pro_couleur ?>><?php echo form_error("pro_couleur"); ?>
		<label for="photo"> Photo </label>
		<input type="text" name="pro_photo" id="pro_photo" value=<?php echo $produits->pro_photo?>><?php echo form_error("pro_photo"); ?>
		<br/>
		<!-- <input type="file" name="photo" id="photo" /><br/>-->
		<br>
		<br>
	</fieldset>
	<br>
	<fieldset>
		<legend>voulez vous bloquer ce produit?: </legend>
		<?php 
if($produits->pro_bloque == 1){ echo "<input type=\"radio\" name=\"pro_bloque\" value=1/><br>Oui <br>
		"; echo "<input type=\"radio\" name=\"pro_bloque\" value=0 checked/> Non"; } else{ echo "<input type=\"radio\" name=\"pro_bloque\" value=1 checked/> Oui<br>
		"; echo "<input type=\"radio\" name=\"pro_bloque\" value=0/> Non"; } ?>
	</fieldset>
	<input type="submit" id="modif" value="modifier" class="btn btn-info">
	<?php echo form_close(); ?>
	<?php 
$contenu = ob_get_clean();
require 'template.php';
?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<?php $title="Formulaire d'ajout";?>
<?php ob_start();?>
	<div class="formulaire">	
			<?php echo form_open_multipart();?>
	
	<fieldset>
		<!-- je déclare mon formulaire à l'aide d'1 form  -->
		<legend>Formulaire d'ajout :</legend>
		<label for=Référence>Référence </label>
		<input type="text" name="pro_ref" id="Référence" value="<?php echo set_value('pro_ref'); ?>"><?php echo form_error("pro_ref"); ?>
		<br>
		<label for="Catégorie"> Catégories </label>
		<select name="cat" id="pro_cat_id">
			<!--  ici aussi il faut changer les noms des champs par ceux de ta table -->
    <option selected disabled >Sélectionnez</option>
    <?php    foreach ($liste_categories as $key => $aListCat) 
    {
                    echo"<option value='".$aListCat->cat_id."'>".$aListCat->cat_nom."</option>\n";   
                }                    
                ?>        
			</select>
            <label for="sousCategories" >Sous-catégories</label>
            <select name="pro_cat_id" id="sousCategories" >
            <option selected disabled>Sélectionnez</option>     
            </select>
            
            
		<label for="Libellé"> Libellé</label>
		<input type="text" name="pro_libelle" id="Libellé" value="<?php echo set_value('pro_libelle'); ?>" ><?php echo form_error("pro_libelle"); ?>
		<br>
		<label for="Description"> Description</label>
		<textarea name="pro_description" id="pro_description" rows="5" cols="600"  onclick="if(this.value=='Description produit') this.value='';" onfocus="if(this.value=='Description produit') this.value='';">Description produit</textarea><br>
		<label for="Prix"> Prix </label>
		<input type="text" name="pro_prix" id="Prix" value="<?php echo set_value('pro_prix'); ?>"><?php echo form_error("pro_prix"); ?>
		<br>
		<label for="Stock"> Stock </label>
		<input type="text" name="pro_stock" id="Stock" value="<?php echo set_value('pro_stock'); ?>"><?php echo form_error("pro_stock"); ?>
		<br>
		<label for="Couleur"> Couleur </label>
		<input type="text" name="pro_couleur" id="Couleur" value="<?php echo set_value('pro_couleur'); ?>"><?php echo form_error("pro_couleur"); ?>
		<label for="photo">Ajout image (JPG, PNG ou GIF | max. 15 Ko) :</label>
		<input type="text" name="pro_photo" id="pro_photo" value="<?php echo set_value('pro_photo'); ?>"><?php echo form_error("pro_photo"); ?>
		<br/>
		<input type="file" name="photo" id="photo"/><br/>
		<br>
		<br>
		<fieldset id=bloqué name=bloqué>
			<legend>voulez vous bloquer ce produit?: </legend>
			Oui <input type=radio name=pro_bloque value=0 checked/><br>
			 Non <input type=radio name=pro_bloque value=1/>
		</fieldset>
		<br>
	<input type="submit" id="ajout" value="ajouter" class="btn btn-info">
	       </fieldset>
 
<?php echo form_close(); ?>


	       <script>        
        var CI_BASE_URL = "<?php echo site_url(); ?>" ;
</script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script src="<?= base_url("assets/js/jquery_fonction.js");?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>       
	      
</div>

	<?php 
$contenu = ob_get_clean();
require 'template.php';
?>
 
<?php
$title="Mot De Passe oublié";
ob_start();
?>
<?php echo form_open(); ?>
<fieldset>
	<legend> Mot De Passe Oublié: </legend>
	<label for="mail"> Veuillez saisir votre email :</label>
	<input type="mail" name="mail" id="mail" placeholder=" Votre mail "/>
	<input type="submit" name="valider" value=valider class="btn btn-info"/>
</fieldset>
<?php echo form_close(); ?>
<?php 
$contenu = ob_get_clean();
require 'template.php';
?>
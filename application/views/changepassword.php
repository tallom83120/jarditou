<?php
$title="Modif mot de passe";
ob_start();
?>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
Saisissez votre nouveau mot de passe : </br>
<label for="password">Nouveau mot de passe : </label>
<input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" id="password"/></br>
<label for="passwordConfirmation">Confirmez votre nouveau mot de passe : </label>
<input type="password" name="passwordConfirmation" value="<?php echo $this->input->post('passwordConfirmation'); ?>" id="passwordConfirmation"/></br>
<button type="submit"> valider</button>
<?php echo form_close(); ?>
<?php 
$contenu = ob_get_clean();
require 'template.php';
?>
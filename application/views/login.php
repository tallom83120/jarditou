<?php
$title="Connexion";
ob_start();
?>
	<?= form_open_multipart(); ?>
	<fieldset>
		<legend>Identifiez-vous</legend>
		<?php
        $errorMessage='';
          // Rencontre-t-on une erreur ?
          if(!empty($errorMessage)) 
          {
            echo '<p>
		', htmlspecialchars($errorMessage) ,'
	</p>
	'; } ?>
	<p>
		<label for="login">Login :</label>
		<input type="text" name="login" id="login" value=""/>
	</p>
	<?php echo $this->session->flashdata;?> 
	<span class="text-danger"><?php echo form_error('login');?>
	</span>
	<p>
		<label for="password">Password :</label>
		<input type="password" name="password" id="password" value=""/>
	</p>
	<?php echo $this->session->flashdatamdp;?>
	<span class="text-danger"><?php echo form_error('password');?>
	</span>
	<br>
	<p>		<input type="submit" name="submit" value="connexion" class="btn btn-info"/>
	</p>
	<p>
		Mot de passe oublié? Cliquez <a href="<?php echo site_url('register/forgotpassword') ?>" id="forget-password" class="forget-password">ici</a>
	</p>
	<p>
		 Vous n'avez pas de compte ? Alors <a href='<?=site_url("register/inscription/");?>'> inscrivez-vous</a>
	</p>
</fieldset>
<?= form_close(); 
$contenu = ob_get_clean();
require 'template.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
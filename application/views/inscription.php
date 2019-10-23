<?php 
$title="Inscription";
ob_start();
?>
<div class="formulaire">
	<?php echo validation_errors(); ?>
	<?= form_open(); ?>
	<fieldset>
		<legend>Inscription</legend>
		<p>
			<label for="nom">Nom :</label>
			<input type="text" name="nom" id="nom" value="<?php echo set_value('nom'); ?>" placeholder="Nom" />
		</p>
		<p>
			<label for="prenom">Prénom :</label>
			<input type="text" name="prenom" id="prenom" value="<?php echo set_value('prenom'); ?>" placeholder="Prénom" />
		</p>
		<p>
			<p>
				<label for="mail">Adresse Mail :</label>
				<input type="text" name="mail" id="mail" value="<?php echo set_value('mail'); ?>" placeholder="Votre adresse mail"/>
			</p>
			<p>
				<label for="login">Login :</label>
				<input type="text" name="login" id="login" value="<?php echo set_value('login'); ?>" placeholder="Login : 'toto80'" />
			</p>
			<p>
				<label for="password">Mot de passe :</label>
				<input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="Mot de passe"/> <label for="password">Confirmation du Mot de passe :</label>
				<input type="password" name="check_password" id="check_password" value="<?php echo set_value('check_password'); ?>" placeholder="Confirmation Mot de passe"/>
			</p>
		</fieldset>
		<p>
			<input type="submit" value="S'inscrire" class="btn btn-info"/>
		</p>
		<?php echo form_close();?>
		<div align="center">
			<p>
				 Vous avez déja un compte ? Alors <a href='<?=site_url("register/login/");?>'> connectez-vous</a>
			</p>
		</div>
		<?php 
$contenu = ob_get_clean();
require 'template.php';
?>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
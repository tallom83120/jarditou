<?php
$title="Contact";
ob_start();
?>

<h1 style="color: #3d9688">Contact</h1>
<h1 style="text-align:center;"> Nous lançons une grande enquête sur les anciens stagiaires</h1>
<h3 style="text-align:center;">merci de nous répondre</h3>
<br>
<form action="http://bienvu.net/script.php" method="post">
	<fieldset>
		<!-- je déclare mon formulaire à l'aide d'1 form  -->
		<legend>Vos coordonnées :</legend>
		<label for="votre nom">votre nom : </label><input type="text" name="nom" id="nom" required><br>
		<label for="votre prénom">votre prénom : </label><input type="text" name="prénom" id="prénom" required><br>
		<label for="votre date de naissance"> votre date de naissance : </label><input type="date" name="date naissance" id="date naissance" required><br>
		<label for="votre adresse"> votre adresse : </label><input type="text" name="adresse" id="adresse" required><br>
		<label for="votre ville"> votre ville : </label><input type="text" name="ville" id="ville" required><br>
		<label for="votre code postal"> votre code postal : </label><input type="number" name="code postal" id="code postal" required><br>
		<label for="votre e-mail"> votre e-mail : </label><input type="email" name="code postal" id="mail" required>
	</fieldset>
	<br>
	<fieldset>
		<legend> Sexe :</legend>
		<label for="homme">homme</label>
		<input type="radio" id="homme" name="contact" value="homme" checked required><br>
		<label for="femme">femme</label>
		<input type="radio" id="femme" name="contact" value="femme" required>
	</fieldset>
	<br>
	<fieldset>
		<legend> Métier :</legend>
		<label>Sélectionnez votre métier</label>
		<input type="text" name="metiers1" id="metiers2" list="metiers3"><br>
		<datalist id="metiers3">
		<option value="webmaster">
		<option value="développeur">
		<option value="administrateur B.D.D.">
		<option value="autre">
		</datalist><br>
		<label for="si vous avez répondu autre, précisez:">si vous avez répondu autre, précisez: </label><input type="text" name="autre" id="autre"><br>
		<br>
		<input type="text" name="salaire1" id="salaire2" list="salaire3" required><br>
		<datalist id="salaire3">
		<option value="<1000€">
		<option value="entre 1000€ et 2000€">
		<option value="entre 2000€ et 3000€">
		<option value="+ de 3000€">
		</datalist><br>
		<br>
		<textarea name="commentaire" rows="4" cols="42">vos commentaires</textarea>
	</fieldset>
	<br>
	<p>
		<b>merci d'avoir répondu au questionnaire</b>
	</p>
	<br>
	<input type="submit" value="validez" class="btn btn-info">
	<input type="reset" value="annulez" class="btn btn-info">
</form>
<?php 
$contenu = ob_get_clean();
require 'template.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
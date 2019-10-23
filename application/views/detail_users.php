<?php
$title="detail_users: ".$detail_users->
login; ob_start(); ?> 
<h1 style="color: #3d9688">Mon Compte</h1>
<div class="row">
	<div class="col" id="texte" name="texte">
		<?php 
       echo '<b>
		<u> Nom </u></b> '. $detail_users->nom." "; echo '<b><u> Prénom </u></b>'.$detail_users->prenom."<br>
		" ; echo '<b><u> Mail </u></b>'.$detail_users->mail."<br>
		" ; echo '<b><u> login </u></b>'.$detail_users->login."<br>
		" ; echo '<b><u> Date d\'inscription </u></b>'.$detail_users->date_inscription."<br>
		" ; echo '<b><u> Role </u></b>'.$detail_users->ROLE."<br>
		" ; ?>
	</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php 
   $contenu = ob_get_clean();
  require 'template.php';
  ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<?php
$title="bouton jquery";
ob_start();
form_open();?>
 <style>
#block {
    background-color: #bca;
    width: 100px;
    border: 1px solid green;
    text-align: center;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  
 <input type=submit id="ajout" value="ajouter">
	
<ul>
   <li id="listeA">Amiens</li>
   <li id="Bliste">Paris</li>    
   <li id="Cliste">Lille</li>
</ul>

<a id="monLien" href="https://www.youtube.com/?gl=FR&hl=fr" title="Page d'accueil">Accueil</a>     

<div id="p1">Le développeur logiciel est un scribe informatique. Sa mission : concevoir et tester des sites de contenu, d'e-commerce ou applications.</div>

<div id="p2"> </div>
<br>
<form action="#" method="post">
    <input type="text" name="prenom" id="prenom">
    <input type="button" name="btn_envoyer" id="btn_envoyer" value="Envoyer">
</form>
<button id="go">&raquo; Run</button>
<div id="block">HELLO!</div>
 
<script>
// Using multiple unit types within one animation.
 
$( "#go" ).click(function() {
	 $('#block').html("ALLEZ TOUS VOUS FAIRE FOUTRE, CORDIALEMENT");
	$( "#block" ).animate({
    width: "80%",
    opacity: 0.4,
    marginLeft: "0.9in",
    fontSize: "6em",
    borderWidth: "20px"
  }, 2000 );
});
</script>

	<?= form_close(); 
$contenu = ob_get_clean();
require 'template.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src=<?=base_url("assets/js/ex.js")?>></script> 
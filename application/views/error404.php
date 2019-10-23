<?php 
$title="Page d'erreur 404";
ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Page d'erreur 404</title>
</head>
<body>
<h1>Oups! Page introuvable</h1>
<p>Vous avez tener d'accéder à une page qui ne se trouve pas sur ce site. Veuillez revenir sur la page d'accueil afin de continuer votre navigation sur notre site.</p>
<p><a href=<?=site_url("produits/liste")?>>Revenir à l'accueil</a></p>
</body>
</html>
<?php 
$contenu = ob_get_clean();
require 'template.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
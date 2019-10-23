<!DOCTYPE html>
<html lang="fr">
<!-- langue du site -->
<head>
<meta charset="utf-8">
<title><?php echo $title; ?></title>
<!-- mon titre -->
<meta name="Description" content="Jarditou, la qualité depuis 70 ans">
<!-- description du site jarditou en1 phrase -->
<meta name="category" content="Jardinage">
<meta name="author" lang="fr" content="Allombert Thibaut">
<meta name="keywords" content="jardinage, jardin,paysagisme, Amiens, Somme,matériel jardin,fleurs, mobilier de jardin">
<!-- très utile pour le référencement du site -->
<meta name="robots" content="index, follow">
<!-- pour que ce soit mon site qui soit selectionné et non les liens qui améne vers mon site -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href=<?=base_url("assets/css/exemplescss.css");?> rel="stylesheet" >
<link href=<?=base_url("assets/css/jarditou.css");?> rel="stylesheet" >
<link href=<?=base_url("assets/css/css/all.css");?> rel="stylesheet" >
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
</head>
<body>
<div class="container">
	<header>
	<!-- entête souvent le logo principal de la marque -->
	<a href="<?=site_url("produits/liste/");?>"><img src="<?=base_url("assets/img/jarditou_logo"); ?>" alt="logo_jarditou"class="logo_jarditou" title= logo_jarditou width="auto" height="90"> </a><br>
	<p class="slogan">
		La qualité depuis 70 ans
	</p>
	
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav">
			<li><a class="nav-link" href=<?=site_url("produits/liste/");?> tabindex="-1" aria-disabled="true"> Accueil </a></li>
			<!--a href=permet de créer un lien hypertexte ici accueil me raménera à l'accueil du site-->
			<li><a class="nav-link" href=<?=site_url("boutique/liste_panier/");?>>Boutique</a></li>
			<li><a class="nav-link" href=<?=site_url("produits/tableau/");?> tabindex="-1" aria-disabled="true">Tableau</a></li>
			<!--ainsi de suite le lien hypertexte tableau devra ramener a la page "tableau.html"-->
			<li><a class="nav-link" href=<?=site_url("produits/contact/");?> tabindex="-1" aria-disabled="true">Contact</a></li>
			<li><a class="nav-link" href="<?=site_url('register/detail_users/'.$this->session->login.'/'.$this->session->jeton)?>" ><?php echo $this->session->message;?></a></li>
			<li><?php if ($this->session->users): ?> <a class="nav-link" href="<?=site_url("register/logout") ?>" tabindex="-1" aria-disabled="true">Deconnexion</a>
			<?php else: ?>
			<a class="nav-link" href="<?=site_url("register/login") ?>" tabindex="-1" aria-disabled="true">Connexion</a>
			<?php endif; ?>
			</li>
			<!--opérateur ternaire si session deco affiche pnier a 0 sinon si session panier_liste permet utilisation du compteur si l'utilisateur ajoute un produit le compteur s'incrémente-->
			<li><a class="nav-link" href=<?=site_url("boutique/affiche/");?>><i class="fas fa-shopping-basket"></i> Panier (<?= $this->session->panier_liste==null?0: count($this->session->panier_liste)?>)</a></li>
		</ul>
	</div>
	</nav>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img id="taille" class="img-fluid" alt="Responsive image" width="100%" height="auto" src=<?=base_url("assets/img/promotion"); ?> alt="First slide">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="ml2">1 lame achetée 5 offertes !!</h5>
				</div>
			</div>
			<div class="carousel-item">
				<img id="taille" class="img-fluid" alt="Responsive image" width="100%" height="auto" src=<?=base_url("assets/img/bandeau_jardinage.jpg"); ?> alt="Second slide">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="ml2">Des outils pour le jardin</h5>
				</div>
			</div>
			<div class="carousel-item">
				<img id="taille" class="img-fluid" alt="Responsive image" width="100%" height="auto" src=<?=base_url("assets/img/jardin_bandeau_2.jpeg");?> alt="Third slide">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="ml2">De nombreuses sélection de plantes pour embellir votre balcon ou jardin </h5>
				</div>
			</div>
		
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
		</a>
		
	</div>
	</div>
		</header>
	
	<?php echo $contenu; ?>
	<!--  grace a la variable contenu on peut appeller le contenu de chaque pageet le relier au template établi ici-->

</div>
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script>
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#3d9688"
    },
    "button": {
      "background": "#62ffaa"
    }
  },
  "theme": "edgeless",
  "content": {
    "message": "Jarditou utilise des cookies avec pépites de chocolats veux-tu les manger?",
    "dismiss": "J'accepte",
    "link": "Plus de détail"
  }
});
</script>
<br>
<footer id="primary_nav">
<div class="container">
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav">
			<li class=texte-centrer> @ Jarditou Allombert Thibaut</li>
			<li><a class="nav-link" href="<?=site_url("produits/error404/");?> " tabindex="-1" aria-disabled="true"> Mentions légales </a></li>
			<!--lien hypertexte mm principe que plus haut-->
			<li><a class="nav-link" href="<?=site_url("produits/error404/");?> " tabindex="-1" aria-disabled="true">Horaires </a></li>
			<li><a class="nav-link" href="<?=site_url("produits/error404/");?> " tabindex="-1" aria-disabled="true">Plan du site </a></li>
		</ul>
	</div>
	</nav>
</div>
</footer>
</body>
</html>
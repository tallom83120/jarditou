<?php
$title="Détail: ".$detail_produit->
pro_libelle." id: ".$detail_produit->pro_id; ob_start(); ?>
</head>
<body>
<h1 style="color: #3d9688">Détail Produit</h1>
<div class="row">
	<div class="col" id="texte" name="texte">
		<?php 
       echo '<b>
		<u> Libellé </u></b> '.$detail_produit->pro_libelle ." "; echo '<b><u> Référence </u></b>'.$detail_produit->pro_ref."<br>
		" ; echo $detail_produit->pro_description." <br>
		"; echo $detail_produit->pro_prix." <sup> €</sup><br>
		"; ?>
	</div>
	<aside class=image_detail style="background:none; border-radius:none; box-shadow:none ">
	<div class="col" id="image" name="image">
		<p class='alignerimage'>
			<img src="<?=base_url('assets/jarditou_photos/').$detail_produit->pro_id.".".$detail_produit->pro_photo?> " width="100px" height="auto" alt='...'/>
		</p>
		<br>
	</div>
	</aside>
</div>
<br>
<?php if($this->session->role=="ROLE_ADMIN"){?> <a href="<?=site_url('produits/modif/'.$detail_produit->pro_id)?> " style="font-size: 48px; color: #81c784; text-decoration:none;" class="far fa-arrow-alt-circle-right"data-toggle="tooltip" data-placement="bottom" title="Modifier produit"> </a>
<a href="<?=site_url('produits/supprime/'.$detail_produit->pro_id)?> " style="font-size: 48px; color: #e57373; text-decoration:none;" class="far fa-times-circle"data-toggle="tooltip" data-placement="bottom" title="Supprimer produit"></a>
<?php }
 ELSE{ }
 ?>
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
</body>
</html>
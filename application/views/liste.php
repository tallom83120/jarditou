<?php 
$title="Jarditou, tout pour le jardin, outils, plantes et mobilier.";
ob_start(); ?>
<h1 style="color: #3d9688">Accueil</h1>
<div class="row">
	<div class="col-xs-6 col-md-12">
		<h4><audio src=<?=base_url("assets/audio/A_Peaceful_Sanctuary"); ?> controls autoplay loop style='width:300px' >updatez votre navigateur ! </audio></h4>
		<aside id=cotéaccueil>
		<iframe width="200" height="150" src="https://www.youtube.com/embed/B5eDm3-iiVU" frameborder="0" allow="autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
		</iframe>
		</aside>
		<div class="accordion" id="accordionExample" style=width:675px>
			<div class="card">
				<div class="card-header" id="headingOne">
					<h5 class="mb-0">
					<button class=" btn btn-link " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="font-size: 17px; color: #3d9688; text-decoration:none">
					L'entreprise </button>
					</h5>
				</div>
				<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="card-body">
						<p>
							Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin et du paysagisme.
						</p>
						<p>
							 Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés.
						</p>
						<p>
							Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens, Péronne, Abbeville, Corbie
						</p>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header" id="headingTwo">
					<h5 class="mb-0">
					<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="font-size: 17px; color: #3d9688; text-decoration:none">
					Qualité </button>
					</h5>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					<div class="card-body">
						<p>
							Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre projet.
						</p>
						<p>
							Vous serez séduit par notre expertise, nos compétences et notre sérieux.
						</p>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header" id="headingThree">
					<h5 class="mb-0">
					<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="font-size: 17px; color: #3d9688; text-decoration:none">
					Devis Gratuit </button>
					</h5>
				</div>
				<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
					<div class="card-body">
						<p>
							Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande d’intervention. Vous souhaitez un devis ? Nous vous le réalisons gratuitement.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
	<p>
		<?php  
if( $this->session->role=="ROLE_ADMIN"){?> &nbsp;&nbsp;&nbsp; <a href="<?=site_url('produits/ajout/')?> "id="bouton_ajout" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ajouter produits" role=button style='width:120px'>Ajout de produits</a>
		<?php }
  ELSE{ }
          ?>
	</p>
	<div class="table-responsive">
		<table class="table table-striped" id="table1">
		<thead>
		<tr class="beautableau">
			<td>
				Photo
			</td>
			<td>
				ID
			</td>
			<td>
				Référence
			</td>
			<td>
				Libellé
			</td>
			<td>
				Prix
			</td>
			<td>
				Stock
			</td>
			<td>
				Couleur
			</td>
<?php if($this->session->role=="ROLE_ADMIN"){?>
			<td>
				Date d'Ajout
			</td>
			<td>
				date de Modif
			</td>
			<td>
				Bloqué
			</td>
			<td>
				Modifier
			</td>
			<td>
				Supprimer
			</td>
<?php }ELSE{ }
            foreach ($liste_produits as $row)
          {
          ?>
		</tr>
		</thead>
		<tbody class="tresbeautableau">
		<tr class="beautableau">
			<td>
				<img src=<?=base_url('assets/jarditou_photos/'.$row->pro_id.".".$row->pro_photo) ;?> width="100px" height="auto" alt='...'/>
		</td>
		<td>
<?=$row->pro_id?>
		</td>
		<td>
<?=$row->pro_ref?>
		</td>
		<td>
			<a href="<?=site_url('produits/detail/'.$row->pro_id)?>" title="<?= $row->pro_libelle;?>" style="font-size: 16px; color: #3d9688; text-decoration:none" >  <?=$row->pro_libelle?> </a>
		</td>
		<td>
<?= $row->pro_prix ?> <sup>€</sup>
		</td>
		<td>
<?= $row->pro_stock?>
		</td>
		<td>
<?= $row->pro_couleur?>
		</td>
		<?php if($this->session->role=="ROLE_ADMIN"){?>
		<td>
<?= $row->pro_d_ajout?>
		</td>
		<td>
<?= $row->pro_d_modif?>
		</td>
		<?php  if($row->pro_bloque == 1){ echo"
		<td>
			Oui
		</td>
		"; } else{ echo"
		<td>
		</td>
		"; } } ?>
		 <?php    if($this->session->role=="ROLE_ADMIN"){?>
		<td>
			<a href="<?=site_url('produits/modif/'.$row->pro_id)?> " style="font-size: 24px; color: #81c784; text-decoration:none;" class="far fa-arrow-alt-circle-right"data-toggle="tooltip" data-placement="bottom" title="Modifier produit"></a>
		</td>
		<td>
			<a href="<?=site_url('produits/supprime/'.$row->pro_id)?> " style="font-size: 24px; color: #e57373; text-decoration:none;"class="far fa-times-circle"data-toggle="tooltip" data-placement="bottom" title="Supprimer produit"> </a>
		</td>
	</tr>
	</tbody>
	<?php }ELSE{ } }  ?>
	</table>
</div>
<p>
	<?php if($this->session->role=="ROLE_ADMIN"){?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=site_url('produits/ajout/')?>" id="bouton_ajout" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ajouter produits" role=button style='width:120px'>Ajout de produits</a><?php }
ELSE{ }?>
</p>
</div>
<br>
<div class="reseaux-sociaux">
<ul >
<li class="texte-centrer">Merci, vous êtes déjà nombreux à nous suivre et à profiter de nos bons plans ! </li>
<li><a class="nav" href="https://www.facebook.com"><img src=<?=base_url("assets/img/facebook")?> target="_blank" rel="nofollow" ></a></li>
<li><a class="nav" href="https://twitter.com"><img src=<?=base_url("assets/img/twitter")?> target="_blank" rel="nofollow"></a></li>
<li><a class="nav" href="https://www.instagram.com"><img src=<?=base_url("assets/img/instagram")?> target="_blank" rel="nofollow"></a></li>
</ul></div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<?php 
$contenu = ob_get_clean();
require 'template.php';
?>

<?php
$title='Panier - Jarditou'; ?>
<?php ob_start(); ?>
<h1 style="color: #3d9688">Mon panier</h1>
<hr>
<?php 
    if (isset($erreur)) 
    {
        echo $erreur;
    }
    if ($this->session->panier_liste!=null){ ?>
<div class="row">
	<div class="col">
		<table class="table table-striped" style="width:600px">
		<caption style="color: #3d9688"> Détail de votre panier (<?= $this->session->panier_liste==null?0: count($this->session->panier_liste); if (count($this->session->panier_liste)>1){echo " articles";} else{echo " article";}?>)</caption>
		<thead class="success-color-dark white-text">
		<tr> 
			<th>
				Produit
			</th>
			<th>
				Prix
			</th>
			<th>
				Quantité
			</th>
			<th>
				Prix total
			</th>
			<th>
			</th>
		</tr>
		</thead>
		<tbody>
		<?php 
    		$total = 0;
    		foreach ($this->session->panier_liste as $produit) { ?>
		<tr>
			<td>
<?= $produit['pro_libelle'] ?>
			</td>
			<td>
<?= str_replace('.',',',$produit['pro_prix']) ?>
				<sup>€</sup>
			</td>
			<td>
				<div class="panier_qte">
					<button class="fa fa-minus-square" style="color:#3d9688"" type="button" role="button">
					<a href="<?=site_url('boutique/qtemoins/'.$produit['pro_id']) ?>"></a>
					</button>
					<div class="panier_qte_valeur">
<?= $produit['pro_qte'] ?>
					</div>
					<!-- affichage de la quantité de chaque produit, blocage à 1 si l'utilisateur essaye d'aller en-dessous de 1 -->
					<button class="panier_qte_bouton" type="button" role="button">
					<a href="<?=site_url('boutique/qteplus/'.$produit['pro_id']) ?>" ><i class="fa fa-plus-square" style="color:#3d9688"></i></a>
					</button>
				</div>
			</td>
			<td>
<?= str_replace('.',',',($produit['pro_qte']*$produit['pro_prix'])) ?>
				<sup>€</sup>
			</td>
			<td>
				<a class="corbeille" href="<?=site_url("boutique/effaceproduit/".$produit['pro_id']."/".$this->session->jeton) ?>"><i class="fa fa-trash" style="color:#3d9688"></i></a>
			</td>
		</tr>
		<?php 
            $total += $produit['pro_qte']*$produit['pro_prix'];
            }                    
            ?>
		</tbody>
		</table>
	</div>
	<div class="col">
	<div class="card">
		<h3 class="card-header light-blue white-text text-center">Récapitulatif</h3>
		<div class="card-body">
			<h5 class="deep-orange-text font-weight-bold">TOTAL : <?= str_replace('.',',',$total) ?>
			<sup>€</sup></h5>
			<a href="#" class="btn btn-primary" style="background-color:#3d9688; border:#3d9688" role="button">Commander</a>
			<a href="<?=site_url("boutique/efface/") ?>" class="blue-grey-text"  style="color:#3d9688">Supprimer le panier</a>
		</div>
</div>

	</div>
	
</div>
<a href="<?=site_url("boutique/liste_panier/") ?>" class="blue-grey-text" style="color:#3d9688"> continuer mes achats</a>

<?php } else { ?>
<div class="alert alert-danger">
	Votre panier est vide. Pour le remplir, vous pouvez visiter notre <a href="<?=site_url("boutique/liste_panier/") ?>">boutique</a>.
</div>
<?php } ?>
<?php $contenu=ob_get_clean(); ?>
<?php require 'template.php'; ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<?php
$title='Boutique - Jarditou'; ?>
	
	<?php ob_start(); ?>
	
	<?php 
	if (isset($erreur))
	{
	   echo $erreur;
	}
	?>
	
    <h1 style="color: #3d9688">Boutique</h1>
    	<p id="haut_page"></p>
	<p><a href="#bas_page">Bas de page</a></p>
	
	
	<hr>
	<div class="dropdown">
      <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
        Trier par 
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= site_url('boutique/liste_panier/') ?>">Catégorie</a>
        <a class="dropdown-item" href="<?= site_url('boutique/listePrixCroissants/') ?>">Prix croissants</a>
        <a class="dropdown-item" href="<?= site_url('boutique/listePrixDecroissants/') ?>">Prix décroissants</a>
      </div>
    </div> 
      <div class="table-responsive" >        
    	<table class="table table-striped" id="boutique">
		<thead>
    		<tr class="beautableau">
    			<th>Articles</th>
    			<th>Prix</th>
    			<th>Référence</th>
    			<th>Ajout panier</th>
    		</tr>
    	</thead>
	<?php 
	foreach ($liste_produits as $valeur)
	{ ?>
<tbody class="tresbeautableau">
		    <tr class="beautableau" >
	    	<td><img  src="<?= base_url('assets/jarditou_photos/')?><?= $valeur->pro_id ?>.<?= $valeur->pro_photo ?>"  alt="photo du produit <?= $valeur->pro_libelle ?>" title="photo du produit <?= $valeur->pro_libelle ?>" height="75"></td>
	    	<td><?= str_replace('.',',',$valeur->pro_prix) ?> <sup>€</sup></td>
            <td> <a href="<?= site_url('produits/detail/'.$valeur->pro_id)?>" title="<?= $valeur->pro_libelle;?>" style="font-size: 16px; color: #3d9688; text-decoration:none" > <?= $valeur->pro_libelle?> </a> </td>
	    	<td  style='width:10%' >
    	    	<?php echo form_open(); ?>
        	    	<label for="pro_qte">Quantité: </label>
                    	<select class="form-control" name="pro_qte" id="pro_qte" style="width:100px; text-align:center; ">
                    	
                            <?php 	
                            
                            for ($i=1;$i<=$valeur->pro_stock;$i++) 
                            { ?>
                                <option value=<?= $i?>><?= $i ?></option> 
                            <?php    
                            }
                			?>
                		</select><br>	  
                	<input type="hidden" name="pro_prix" value="<?= $valeur->pro_prix ?>">
                	<input type="hidden" name="pro_id" value="<?= $valeur->pro_id ?>">
                	<input type="hidden" name="pro_libelle" value="<?= $valeur->pro_libelle ?>">
               		<input class="btn btn-default btn-sm" id="boutonpanier" type="submit" value="Ajouter au panier" style="width:128px">   
    <?php echo form_close(); ?>	</td>
    
	    </tr>
</tbody>
	    
	<?php   
	}
	?>
	</table>
	</div>
	<p id="bas_page"></p>
	<p><a href="#haut_page">Haut de page</a></p>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <?php $contenu=ob_get_clean(); ?>
<?php require 'template.php'; ?>
 
    <?php $title='liste des produits'; ?>
      <?php ob_start(); ?>
      <h1>Catégories et sous-catégories</h1>
         <hr>
    <form>
       <div class="form-group row">
            <label for="categories" class="col-2 form-label text-right">Catégories</label>
            <div class="col-6">
            <select name="categories" id="categories" class="form-control">
                <option selected disabled>Sélectionnez</option>     
                <?php
                foreach ($liste_categories as $key => $aListCat) 
                {
                    echo"<option value='".$aListCat->cat_id."'>".$aListCat->cat_nom." </option>\n";   
                }
                ?>           
            </select>
            </div>
       </div>
       <div class="form-group row">
            <label for="sousCategories" class="col-2 form-label text-right">Sous-catégories</label>
            <div class="col-6">
            <select name="sousCategories" id="sousCategories" class="form-control">
               <option selected disabled>Sélectionnez</option>     
            </select>
            </div>
       </div>       
    </form>

        <script>        
        var CI_BASE_URL = "<?php echo site_url(); ?>" ;</script> 
      	            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
      	      <script src="<?= base_url("assets/js/jquery_fonction.js");?>"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>       
      	<?php $contenu=ob_get_clean(); ?>
	  <?php require 'template.php'; ?>

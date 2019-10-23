<?php 
$title="Tableau";
ob_start(); ?>
<h1 style="color: #3d9688">Tableau</h1>
<br>
<div class="row">
	<div class="col-2">
		<table class="table table-striped " id="tableau">
		<thead>
		<tr>
			<th scope="col">
				-
			</th>
			<th scope="col">
				Janvier
			</th>
			<th scope="col">
				Février
			</th>
			<th scope="col">
				Mars
			</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<th scope="row">
				Pierre
			</th>
			<td>
				65800
			</td>
			<td>
				53200
			</td>
			<td>
				46400
			</td>
		</tr>
		<tr>
			<th scope="row">
				Paul
			</th>
			<td>
				88000
			</td>
			<td>
				51500
			</td>
			<td>
				62300
			</td>
		</tr>
		<tr>
			<th scope="row">
				Jacques
			</th>
			<td>
				74400
			</td>
			<td>
				64200
			</td>
			<td>
				78900
			</td>
		</tr>
		<tr>
			<th scope="row">
				Total
			</th>
			<td>
				228200
			</td>
			<td>
				168900
			</td>
			<td>
				187600
			</td>
		</tr>
		</tbody>
		</table>
	</div>
</div>
<br>
<?php 
$contenu = ob_get_clean();
require 'template.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
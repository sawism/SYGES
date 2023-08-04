<?php
$conn = new PDO('mysql:msql_dbname = syges; host=localhost','root','');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha-384">
	<title>Modification d'une recette</title>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-8 mt-4">

			<div class="card">
				<div class="card-header"></div>
				<h3> MODIFIER UNE  RECETTE
					<a href="Affichage_recette.php" class="btn btn-danger float-end"> RETOUR</a>
				</h3>
			</div>
<div class="card-body">
	<?php
		if(isset($_GET['id_recette'])){

		$id_recette = $_GET['id_recette'];

		$query = "SELECT * FROM syges.recette WHERE id_recette = :id_recette LIMIT 1";

		$statement = $conn->prepare($query);
		$data=['id_recette' => $id_recette];
		$statement ->execute($data);
		
		$result = $statement->fetch(PDO::FETCH_OBJ); // PDO::FETCH_ASSOC 
	}

	?>
	
	 <form id="login-form" action="cr.php" method="POST">
        <div class="mb-3">
            <label>  Libelle </label><br>
            <input type="text" name="libelle" class="form-control"/ autocomplete="off">
        </div>


 <div class="form-group">
            <label for="categorie">Categorie</label> <br/>
                <select name="categorie" class="form-control">
                   
                    <option value="Collecte" name="Collecte">Collecte</option>
                    <option value="Don" name="Don">Don</option>
                    <option value="Location" name="Location">Location</option>
                    <option value="Vente" name="Vente">Vente</option>
                    <option value="Autres" name="Autres">Autres</option>
                    
                </select>
                    </div>


        <div class="mb-3">
            <label>  Date </label><br>
            <input type="date" name="date" class="form-control" autocomplete="off"/>
        </div>
        <div class="mb-3">
            <label>  Montant </label><br>
            <input type="text" name="montant" class="form-control" autocomplete="off"/>
        </div>

        <div class="mb-3">
            
        <button type="submit" name="Enregistrer" class="btn btn-primary">ENREGISTRER RECETTE</button> 
        <button type="reset" name="ANNULER " class="btn btn-primary"> ANNULER   </button> 
        </div>
    </form>


</div>
 			
		</div>
	</div>
</div>

<script type="https://cdn.jsdelivr.net/net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

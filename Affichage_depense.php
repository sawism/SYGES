<?php 
session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Système de gestion de la trésorerie</title>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light">
  
             <img src="syges.png" alt="">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto py-4 py-md-0">
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                  <a class="btn btn-primary "  href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Accueil</a>
                </li>
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                  <a class="btn btn-primary" href="Affichage_recette.php" role="button" aria-haspopup="true" aria-expanded="false">Recettes</a>
                </li>
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                  <a class=" btn-primary" href="Affichage_depense.php" role="button" aria-haspopup="true" aria-expanded="false">Dépenses</a>
                </li>
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                  <a class="btn btn-danger"  href="connexion.php" role="button" >Déconnexion</a>
              </ul>
            </div>
            
          </nav>    
	
<div class="container">
	<div class="row">
		<div class="col-md-12 mt-4">

			<?php if(isset($_SESSION['message'])):?>


				<h5 class="alert alet-success"><?=$_SESSION['message']; ?></h5>
				<?php 
				unset($_SESSION['message']);

				endif; ?>

			<div class="card">
				<div class="card-header"></div>
				<h3> SYSTEME DE GESTION DE LA TRESORERIE 
					<a href="ajout_dep.php" class="btn btn-primary float-end"> Enregistrer Dépense</a>
					
				</h3>
			</div>
				<div class="card-body">
					<table class="table table-bordered table-striped">
						<thead>    
							<tr >
								<th>Id_depense</th>
								<th>Libelle</th>
								<th>Categorie</th>
								<th>Date</th>
								<th>Montant</th>
								<th>Modifier</th>
								<th>Supprimer</th>
							<tr>
						</thead>
						<tbody>
							<?php 
							 $conn = new PDO('mysql:msql_dbname = syges; host=localhost','root','');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$query = "SELECT * FROM syges.depense";
							$statement = $conn->prepare($query);
							 $statement->execute();
							 $statement->setFetchMode(PDO::FETCH_OBJ);//::FETCH_ASSOC
							

							$result = $statement->fetchAll();//::FETCH_ASSOC
							if ($result) 
							{
								foreach ($result as $row) {
									?>
									<tr>
										<td><?= $row->id_depense ;   ?></td>
										<td><?= $row->libelle ;   ?></td>
										<td><?= $row->categorie ;   ?></td>
										<td><?= $row->date ;   ?></td>
										<td><?= $row->montant ;   ?></td>
										<td> <form action="" method="POST"><button type="submit" class="btn btn-primary"><a class="btn btn-primary" href="Modifier_depense.php?id_depense=<?=$row->id_depense ;?>">  Modifier </a> </button>    </form></td>
										<td> <form action="code_depense.php" method="POST">
											<button type="submit" class="btn btn-danger" name="Supprimer" value="<?=$row->id_depense;?>">Supprimer</button>
											</form>
											<script src="bootstrap/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>                      
										 </td>
									</tr>
									<?php 
								}
							}

								else {

									?> 

									<tr><td colspan="5">Aucun enregistrement trouvé</td></tr>

									<?php
								}



							?>

						</tbody>
						
					</table>
					
				</div>
			
		</div>
	</div>
</div>

    <img align="center" src="syges.png" alt="">
  </a>
<footer class="secondary_header footer" >
    <div class="copyright">&copy;2022 - <strong>SAWADOGO ISMAEL</strong></div>
  </footer>
</body>
</html>
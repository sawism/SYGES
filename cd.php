<?php
session_start();
include('db_con.php');


if (isset($_POST['Supprimer']))
 {
	$id_depense = $_POST['Supprimer'];
	
	try {

		$query ="DELETE  FROM syges.depense WHERE id_recette=:id_recette";
		$statement = $conn->prepare($query);

		$data = [':id_recette'=> $id_recette];

		$query_execute=$statement->execute($data);

		if($query_execute){

		$_SESSION['message'] = 'Supression effectué avec succès ';
	  header('Location: Affichage_depense.php');
	  exit(0);
}

	else{
$_SESSION['message'] = 'Supression non effectué  '; 
	  header('Location: Affichage_depense.php');
	  exit(0);
}

		
	} catch (PDOException $e) {
		echo $e->getMessage();
		
	}

}












 
if(isset($_POST['Enregistrer']))

include('db_con.php');
{
	$libelle =$_POST['libelle'];
	$categorie =$_POST['categorie'];
	$date =$_POST['date'];
	$montant =$_POST['montant'];

    $conn = new PDO('mysql:msql_dbname = syges; host=localhost','root','');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = "INSERT INTO syges.depense(libelle,categorie,date,montant) VALUES(:libelle,:categorie,:date,:montant)";
	$query_run = $conn->prepare($query);


	$data = [
			':libelle' => $libelle ,
			':categorie' => $categorie ,
			':date' => $date ,
			':montant' => $montant ,
];

$query_execute=$query_run->execute($data);


if($query_execute){
	$_SESSION['message'] = 'Enregistrement effectué avec succès ';
	  header('Location: Affichage_depense.php');
	  exit(0);
}

	else{
$_SESSION['message'] = 'Enregistrement non effectué  ';
	  header('Location: Affichage_depense.php');
	  exit(0);
}
	}


?>
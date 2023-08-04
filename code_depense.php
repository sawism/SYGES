<?php
session_start();
include('db_con.php');

$conn = new PDO('mysql:msql_dbname = syges; host=localhost','root','');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['Supprimer']))
 {
	$id_depense = $_POST['Supprimer'];
	
	try {

		$query ="DELETE  FROM syges.depense WHERE id_depense=:id_depense";
		$statement = $conn->prepare($query);

		$data = [':id_depense'=> $id_depense];

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












if (isset($_POST['MODIFIER DEPENSE']))
include('db_con.php');
 {
	
	$id_depense=$_POST['id_depense'];
	$libelle =$_POST['libelle'];
	$categorie =$_POST['categorie'];
	$date =$_POST['date'];
	$montant =$_POST['montant'];


try {

	$query = "UPDATE syges.depense SET libelle =:libelle,categorie=:categorie,date=:date,montant=:montant WHERE id_depense=:id_depense LIMIT 1";
	$statement = $conn->prepare($query);
	$data = [
			':libelle' => $libelle ,
			':categorie' => $categorie ,
			':date' => $date ,
			':montant' => $montant ,
			'id_depense'=>$id_depense,
];
$query_execute=$statement->execute($data);

if($query_execute){
	$_SESSION['message'] = 'Mise à jour effectuée avec succès ';
	  header('Location: Affichage_depense.php');
	  exit(0);
}

	else{
$_SESSION['message'] = 'Mise à jour non effectuée  ';
	  header('Location: Affichage_depense.php');
	  exit(0);
}


} catch (PDOException $e){
	echo $e->getMessage();
}


}



if(isset($_POST['ENREGISTRER DEPENSE']))
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
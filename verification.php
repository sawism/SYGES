<?php 
require_once 'db_con.php';

if($_GET){

	if(isset($_GET['email'])){

		$email = $_GET['email'];
	}

	if(isset($_GET['token'])){
		$token = $_GET['token'];
	}

	if(!empty($email)  &&  !empty($token)){

		$requete = $conn->prepare('SELECT * FROM syges.utilisateur WHERE email=:email AND token=:token');
		$requete->bindvalue('email',$email);
		$requete->bindvalue('token',$token);

		$requete->execute();

		$nombre=$requete->rowCount();

		if($nombre==1){
			$update = $conn->prepare('UPDATE syges.utilisateur SET validation = :validation, token = :token WHERE email=:email');


			$update->bindvalue(':validation',1);

			$update->bindvalue(':token','valide');

			$update->bindvalue(':email',$email);

			$resultUpdate = $update->execute();

			if($resultUpdate){

				$message = "Votre adresse email est bien confirmée!":
			}
		}
		

	}
}


if(isset($message)) echo  $message;
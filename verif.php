<?php        //Vérification du Pseudo/Derbyname
            if (isset($_POST['username']) AND isset($_POST['password']))
            {
                if (!empty($_POST['username']) AND !empty($_POST['password']))
                {
                    $pseudo = $_POST['username'];
                    $req = $bdd->prepare('SELECT id, password FROM syges.utilisateur WHERE username = :username');
                    $req-> execute(array(
                        'username' => $username));
 
                    $resultat = $req->fetch();
 
                     
                    if (!$resultat OR !password_verify($_POST['password'], $resultat['password']))
                    {
                        echo 'Identifiant ou Mot De Passe incorrect.<br/>';
                    }
                    else
                    {
                        echo 'Vous êtes connecté ! :-)<br/>';
                    }
                    $req->closeCursor();
                }
                else
                {
                    echo 'Renseignez un Pseudo/Derbyname et un Mot De Passe.<br/>';
                }
            }
        ?>


        /*
/*
Page: connexion.php
*/
//à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION
session_start();
//si le bouton "Connexion" est cliqué
if(isset($_POST['connexion'])){
    // on vérifie que le champ "Pseudo" n'est pas vide
    // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
    if(empty($_POST['username'])){
        echo "Le champ Nom d'utilisateur est vide.";
    } else {
        // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
        if(empty($_POST['password'])){
            echo "Le champ Mot de passe est vide.";
        } else {
            // les champs pseudo & mdp sont bien postés et pas vides, on sécurise les données entrées par l'utilisateur
            //le htmlentities() passera les guillemets en entités HTML, ce qui empêchera en partie, les injections SQL
            $username = htmlentities($_POST['username'], ENT_QUOTES, "UTF-8"); 
            $password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");
            //on se connecte à la base de données:
            $mysqli = mysqli_connect("localhost", "root", "", "syges");
            try
{
// On se connecte � MySQL
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=localhost;dbname=syges', 'root', '', $pdo_options);
 echo"connexion réussie";
}
catch(Exception $e)
{
//En cas d'erreur pr�c�demment, on affiche un message et on arr�te tout
die('Erreur : '.$e->getMessage());
}
            //on vérifie que la connexion s'effectue correctement:
            if(!$mysqli){
                echo "Erreur de connexion à la base de données.";
            } else {
                //on fait maintenant la requête dans la base de données pour rechercher si ces données existent et correspondent:
                //si vous avez enregistré le mot de passe en md5() il vous faudra faire la vérification en mettant mdp = '".md5($MotDePasse)."' au lieu de mdp = '".$MotDePasse."'
                $Requete = mysqli_query($mysqli,"SELECT * FROM utilisateur WHERE username = '".$username."' AND  password= '".$password."'");
                //si il y a un résultat, mysqli_num_rows() nous donnera alors 1
                //si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
                if(mysqli_num_rows($Requete) == 0) {
                    echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
                } else {
                    //on ouvre la session avec $_SESSION:
                    //la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
                    header("location:index.php");
                    $_SESSION['username'] = $username;
                    echo "Vous êtes à présent connecté !";
                }
            }
        }
    }
}

/*
  Ce code te permet de te connecter � une base de donn�es
          ( c'est programm� en PDO ) 

 INSTRUCTIONS
 1- Cr�e une base de donn�es de ton choix
 2- Donnez un nom � la base, exemple : magmaket
 3- Copier ce fichier dans le dossier de www de wampserver
 4-Faire le teste

     Remarque 
     Si �a marche pas, contacter moi sur 
      E-mai : astanax5@gmail.com

*/

*/
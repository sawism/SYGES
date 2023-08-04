 

<?php
if (isset($_POST['inscription']))
{
    
   
    if(empty($_POST['username']) || !preg_match('/[a-zAZ0-9]+/', $_POST['username']))
    {
        $message = 'Votre username doit etre une chaine de caractères (alphanumérique) !';
    }
    
    elseif (empty($_POST['email'])|| !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $message = ' Entrez une adresse email valide';
    }


    elseif (empty($_POST['password']) || $_POST['password'] != $_POST['password2']) 
    {
        $message = 'Rentrer un mot de passe valide !';
    }
    else
    {
    require_once 'db_con.php';

    $req = $conn->prepare('SELECT * FROM syges.utilisateur WHERE username = :username');
    $req->bindvalue(':username' , $_POST['username']);
    $req->execute();
    $result = $req->fetch();

    $req1 = $conn->prepare('SELECT * FROM SYGES.utilisateur WHERE email = :email');
    $req1->bindvalue(':email' , $_POST['email']);
    $req1->execute();
    $result1 = $req1->fetch();

    if($result)
    {
        $message  = 'le username que vous avez choisi existe déja';
    }

    elseif($result1)
    {
        $message = 'Un compte existe déja avec l\'adresse email que vous avez choisie';
    }

    else
    {


function token_random_string($leng=20){
    $str = '0123456789abcdefghijklmnopqrstuvxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token ='';
    for($i=0;$i<$leng;$i++){
        $token.=$str[rand(0,strlen($str)-1)];
    }
    return $token;
}
$token= token_random_string(20);



 $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $requete = $conn->prepare('INSERT INTO syges.utilisateur(username, email, password, token) VALUES(:username, :email, :password , :token)');

    $requete->bindvalue(':username', $_POST['username']);
    $requete->bindvalue(':email', $_POST['email']);
    $requete->bindvalue(':password', $password);
    $requete->bindvalue(':token', $token);
    $requete->execute();

    require('PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username='sawadogoismaelrich@gmail.com';
$mail->Password='Dollar20202021';
$mail->SMTPSecure ='tls';
$mail->Port=587;

$mail->setFrom('sawadogoismaelrich@gmail.com', 'Ismael Sawadogo');
$mail->addAddress($_POST['email']);
$mail->isHTML(true);

$mail->Subject='Confirmation d\'email';
$mail->Body ='Afin de valider votre adresse email, merci de cliquer sur le lien suivant:

<a href="https://localhost/Application/verification.php?
email='.$_POST['email'].'&token='.$token.' "> Confirmation </a>';

if(!$mail->send()) {

    header('location: connexion.php');
    $message= "Votre compte a été crée correctement ";
    
} else{

   $message = "Un email vous a ete envoyé,merci de consulter votre boite email";
}

    }

    }

    }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>SYSTEME DE GESTION </title>
<body>
    <h2><img src="syges.png"></h2>
<div id="login">
<h3 class="text-center text-primary pt-5"><marquee>SYSTEME DE GESTION DE LA TRESORERIE </marquee></h3>
<div class="container">
<div id="login-row" class="row justify-content-center align-items-center">
<div id="login-column" class="col-md-6">
 <div id="login-box" class="col-md-12">


<?php if (isset($message)) echo $message; 
?>

<form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-primary">Creer un compte</h3>
                            <div class="form-group">
                                <label for="username" class="text-primary" >Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Entrez votre nom ici svp" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-primary">E-mail:</label><br>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Entrez votre mail ici svp" pattern="**@.**" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-primary">Mot de passe:</label><br>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Entrez un mot de passe "autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-primary">Confirmation Mot de passe:</label><br>
                                <input type="password" name="password2" id="password2" class="form-control" placeholder="confirmer votre mot de passe"autocomplete="off">
                            </div>
                            <div style="text-align: right;">
                             <a  href="connexion.php" class="btn text-primary">J'ai déja un compte ?</a><br>
                         </div>
                            <div class="form-group">
                                 <input type="submit" name="inscription" class="btn btn-primary btn-md" value="S'inscrire">
                    
                                <input type="reset" name="connexion" class="btn btn-primary btn-md" value="Annuler"  a href=""> 
                            </div>

</form>
<script src="bootstrap/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>      
</div>
</div>
</div>
</div>
</div>
</body>


<?php

include("db_con.php");
$conn = new PDO('mysql:host=localhost;dbname=syges;','root','');

if(isset($_POST['connexion'])){
    
    if(!empty($_POST['username']) AND !empty($_POST['password'])){
        $username= htmlspecialchars($_POST['username']);
        $password= sha1($_POST['password']);

$query = $conn->prepare("SELECT * FROM syges.utilisateur WHERE username = ?");
$query->execute([$_POST['username']]);
$username = $query->fetch();

if ($username && password_verify($_POST['password'], $username['password']))
{
    echo "Identifiant valid!";
    header('location:index.php');
} 
else {
    echo "Identifiant invalid!";
}
}
}
//background-image:url('syges.png');
?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>SYSTEME DE GESTION DE LA TRESORERIE </title>
<body>
<div id="login">
    <?php if(isset($_SESSION['message'])):?>


                <h1 class="alert alet-success"><?=$_SESSION['message']; ?></h1>
                <?php 
                unset($_SESSION['message']);

                endif; ?>
    <h2><img src="syges.png"></h2>
<h3 class="text-center text-primary pt-5"><marquee>BIENVENUE SUR LA PAGE DE CONNEXION </marquee></h3>
<div class="container">
<div id="login-row" class="row justify-content-center align-items-center">
<div id="login-column" class="col-md-6">
 <div id="login-box" class="col-md-12">

<form id="login-form" class="form" action="" method="post">
     <h3 class="text-center text-primary">Se connecter à son compte</h3>
                            <div class="form-group" style="">
                                <label for="username" class="text-primary" >Username:</label><br>
                                <input type="username" name="username" id="username" class="form-control" placeholder="Entrez votre Nom ici svp" autocomplete="off">
                            </div>
                            
                            <div class="form-group">
                                <label for="password" class="text-primary">Mot de passe:</label><br>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Entrez votre mot de passe ici " autocomplete="off">
                            </div>
                            <div style="text-align: right;">
                             <a  href="inscription.php" class="btn text-primary"> Creer un compte ici ?</a><br>
                         </div>
                            <div class="form-group">
                                 <input type="submit" name="connexion" class="btn btn-primary btn-md " value="Se connecter">
                    
                                <input type="reset"  class="btn btn-primary btn-md" value="Annuler" name="Annuler">
                            </div>

</form>
  <script src="bootstrap/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
</div>
</div>
</div>
</div>
</body>
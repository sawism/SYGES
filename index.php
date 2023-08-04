
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="hero-anime"> 

  <div class="navigation-wrap bg-light start-header start-style">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="navbar navbar-expand-md navbar-light">
  
             <img src="syges.png" alt="Image" style="width:150px;height:150px" background-color ="#D3D3D3">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto py-3 py-md-0">
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                  <a class=" btn-primary"  href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Accueil</a>
                </li>
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                  <a class="btn btn-primary" href="Affichage_recette.php" role="button" aria-haspopup="true" aria-expanded="false"">Recettes</a>
                </li>
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                  <a class="btn btn-primary" href="Affichage_depense.php" role="button" aria-haspopup="true" aria-expanded="false">Dépenses</a>
                </li>
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                  <a class="btn btn-danger"  href="connexion.php" role="button" >Déconnexion</a>
              </ul>
            </div>
            
          </nav>    
        </div>
      </div>
    </div>
  </div>
  <div class="section full-height">
    <div class="absolute-center">
      <div class="section">
        <div class="container">
          <div class="row">
            <div class="col-12">
        <h1><span> PAGE D'ACCUEIL</span><br></marquee></h1>
        <p>Système de Gestion de la trésorerie</p> 
        <div align="center">
        <?php
  $date = date('d-m-y   h:i:s');
  echo "Votre username est: Ali"; 
  echo "<br>";
  echo "Date et Heure de connexion :".$date;
?>
</div>
            </div>  
          </div>    
        </div>    
      </div>
      <div class="section mt-5">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div id="switch">
                <div id="circle"></div>
              </div>
            </div>  
          </div>    
        </div>      
      </div>
    </div>
  </div>
  <div class="my-5 py-5">
  </div>
  
<!-- Link to page
================================================== -->
<div align="center">
    <img class="centrer" style="width:100px;height:100px"  style="background-color:#1c87c9;" align="center" src="syges.png" alt="">
  </div>
  </a>
  <div align="center">
<footer class="secondary_header footer" >
    <div class="copyright">&copy;2022 - <strong>SAWADOGO ISMAEL</strong></div>
  </footer>
  <script src="bootstrap/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
</body>
</html>


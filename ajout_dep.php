 <!DOCTYPE html>
<html>
<head>
    <title>SYSTEME DE GESTION DE LA TRESORERIE</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>



<body>


<div class="container">
    <div class="row">
        <div class="col-md-8 mt-4">

            <div class="card">
                <div class="card-header"></div>
                <h3> AJOUTER UNE NOUVELLE DEPENSE
                    <a href="Affichage_depense.php" class="btn btn-danger float-end"> RETOUR</a>
                </h3>
            </div>
            <?php 
        if(isset($_SESSION['message'])){

            echo "<h4>".$_SESSION['message']."</h4>";
            unset($_SESSION['message']);
        }
    
    ?>
<div class="card-body">

    <form id="login-form" action="cd.php" method="POST">
        <div class="mb-3">
            <label>  Libelle </label><br>
            <input type="text" name="libelle" class="form-control" autocomplete="off"/>
        </div>


 <div class="form-group">
            <label for="categorie">Categorie</label> <br/>
                <select name="categorie" class="form-control">
                   
                    <option value="Bureau Régional" name="Bureau Régional">Bureau Régional</option>
                    <option value="Assmt & entretien mosquee
                     " name="Assmt & entretien mosquee
                    ">Assmt & entretien mosquee
                    </option>
                    <option value="Entretien et reparation V.G.F
                    " name="Entretien et reparation V.G.F
                    ">Entretien et reparation V.G.F
                    </option>
                    <option value="Motivation
                    " name="Motivation
                    ">Motivation
                    </option>
                    <option value="Prime
                    " name="Prime
                    ">Prime
                    </option>
                    <option value="ONEA
                    " name="ONEA
                    ">ONEA
                    </option>
                    <option value="Banque
                    " name="Banque
                    ">Banque
                    </option>
                    <option value="Aide sociale
                    " name="Aide sociale
                    ">Aide sociale
                    </option>
                    <option value="Divers" name="Divers">Divers</option>
                   

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
            
        <button type="submit" name="Enregistrer" class="btn btn-primary">ENREGISTRER DEPENSE</button> 
        <button type="reset" name="ANNULER " class="btn btn-primary"> ANNULER   </button> 
        </div>
    </form>

</div>
            
        </div>
    </div>
</div>

<script type="https://cdn.jsdelivr.net/net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
    include_once("../../fonctions.inc.php");
    $id = $_GET['id'];
    $con = connexion();
    $sql = "SELECT id_decnaiss, nom, prenoms 
            FROM citoyen
            WHERE id_citoyen = $id";
    $rows = $con->query($sql);
    $row = $rows->fetch();
    $num_dec = $row['id_decnaiss'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/MaterialDesign-Webfont-master/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    -->
    <title>Acte de naissance</title>
    <style>
    
        #div2
        {
            float:left;
            width: 50%;
        }
        #div1
        {
            float:right;
            width: 50%;
        }
        .container-fluid::after
        {
            display: table;
            content: "";
            clear: both;
        }
        h3
        {
            font-weight: bold;
            color:#424558;
        }
        #p
        {
            text-transform: uppercase;
            font-weight: bold;
            text-decoration: underline;
        }
        #btn
        {
            display: table;
            margin: 0 auto;
        }
    
        .conte{
            margin-left: 10em;
        }
    </style>
</head>
<body>
     <div class="container-fluid ">
        <h3 class="text-center mt-3">INFORMATIONS SUR L'ACTE DE NAISSANCE</h3>
        <div class="container mt-3 divflex hcenter vcenter conte">
            <section class="col-md-12 col-lg-10 col-sm-12 divflex hcenter vcenter">
                <form action="mairie.php" method="post">
                   <div class="container" id="div2">
                        <p class="">Nom: <?=$row['nom']?></p>
                        <p class="">Prénom: <?=$row['prenoms']?></p>
                   </div>

                    <div class="container" id="div1">
                        <div class="form-group">
                            <label for="id_citoyen">Identifiant du citoyen</label>
                            <input type="text" name="ID_CITOYEN" id="id_citoyen" class="form-control" value="<?=$id?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="reference">Réference du papier</label>
                            <input type="text" class="form-control" id="reference" name="reference" placeholder="Réference">
                        </div>
    
                        <div class="form-group">
                            <input type="number" class="form-control" name="RANG_NAISS" placeholder="Rang de naissance" required="required">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="NATIONALITE_NAISS" value="Guinéenne">
                        </div>
    
                        <div class="form-group">
                            <label for="date_de_declaration">Date de déclaration *</label>
                            <input type="date" class="form-control" name="DATEDECL_AN" required="required">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-outline-success" value="Valider le Formulaire">
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
   <script src="../../js/jquery-3.3.1.js"></script>
   <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

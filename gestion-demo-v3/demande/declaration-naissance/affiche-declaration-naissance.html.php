<?php
    include_once("../../fonctions.inc.php");
    $id = $_GET['id'];

    $con = connexion();
    $requete = "SELECT * 
                FROM declarationnaissance 
                WHERE ID_DECNAISS = $id";
    
    $row = $con->query($requete);
    $row = $row->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Infos de l'acte de naissance</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    
</head>
<body>
    <main class="container mt-5">
        <section id="sectionAimprimer" class="mb-2 p-5 border border-primary">
            <h1 class="h3">Informations de la déclaration N<sup>0</sup>  <?=$row['ID_DECNAISS']?></h1>
            <div class="row">
                <div class="col-3">
                    <p><strong>Nom de la mère:</strong> <?=$row['NOM_MERE_DN']?></p>
                    <p><strong>Prénom de la mère:</strong> <?=$row['PRENOM_MERE_DN']?></p>
                    <p><strong>Age de la mère:</strong> <?=$row['AGE_MERE_DN']?></p>
                    <p><strong>Profession de la mère:</strong> <?=$row['PROFESSION_MERE_DN']?></p>
                    <p><strong>Domicile de la mère:</strong> <?=$row['DOMICILE_MERE_DN']?></p>
                    <p class="mt-4">Signature du médecin</p>
                </div>
                <div class="col-4">
                    <p><strong>Date d'accouchement:</strong> <?=$row['DATE_ACC']?></p>
                    <p><strong>Heure d'accouchement:</strong> <?=$row['HEURE_ACC']?></p>
                    <p><strong>Adresse de l'hopital:</strong> <?=$row['ADRESSE_HOPITAL']?></p>
                    <p><strong>Sexe de l'enfant:</strong> <?=$row['SEXE_DN']?></p>
                    <p><strong>Etat de vie: </strong> <?=$row['ETAT_VIE']?></p>
                    <p class="mt-5">Signature du déclarant</p>
                </div>
                <div class="col-3">
                    <img  style="width:150px;height:150px" src="../../images/devise.png">
                </div>
            </div>
        </section>
        <div class="d-flex flex-row justify-content-between">
            <button type="button" onClick="imprimer('sectionAimprimer')" class="btn btn-warning">Imprimer</button>
            <a  href="tableau_declaration_naissance.html.php" class="btn btn-danger">Retour</a>
        </div>
        
    </main>

    <script>
        function imprimer(divName){
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

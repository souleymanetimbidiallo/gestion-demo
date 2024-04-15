<?php
    include_once("../../fonctions.inc.php");
    $id = $_GET['id'];

    $con = connexion();
    $requete = "SELECT * 
                FROM declarationdeces 
                WHERE ID_DECLARATION_DECES = $id";
    
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
    <main class="container m-5 p-4 border border-primary">
        
        <h1 class="h3">Informations de la déclaration N<sup>0</sup>  <?=$row['ID_DECLARATION_DECES']?></h1>
        <div class="row d-flex">
            <div class="col-3">
                <p><strong>Nom du defunt</strong> <?=$row['NOM_MORT']?></p>
                <p><strong>Prénom du defunt</strong> <?=$row['PRENOM_MORT']?></p>
                <p><strong>Nom du déclarant</strong> <?=$row['NOM_DEC']?></p>
                <p><strong>Prénom du déclarant</strong> <?=$row['PRENOM_DEC']?></p>
                <p><strong>Téléphone du déclarant</strong> <?=$row['TEL_DEC']?></p>
                <p class="mt-5">Signature du médecin</p>
            </div>
            <div class="col-4">
                <p><strong>Type de mort</strong> <?=$row['TYPE_DE_MORT']?></p>
                <p><strong>Date du décès</strong> <?=$row['DATE_DE_MORT']?></p>
                <p><strong>Lieu du décès</strong> <?=$row['LIEU_DE_MORT']?></p>
                <p><strong>Lien de parenté</strong> <?=$row['LIEN_PARENTE']?></p>
                <br>
                <p class="mt-5">Signature du déclarant</p>
            </div>
            <div class="col-3">
                <img  style="width:150px;height:150px" src="../../images/devise.png">
            </div>
            <div class="col-2 d-flex flex-column justify-content-around">
                <button type="button" class="btn btn-warning">Imprimer</button>
                <a href="tableau_declaration_deces.php" class="btn btn-danger">Retour</a>
            </div>
        </div>
    </main>
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

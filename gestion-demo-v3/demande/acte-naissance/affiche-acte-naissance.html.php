<?php
    include_once("../../fonctions.inc.php");
    $id = $_GET['id'];

    $con = connexion();
    $requete = "SELECT cit.id_citoyen, cit.nom, cit.prenoms, cit.genre, 
                date_format(cit.date_naiss,'%d/%m/%Y') as date_naiss, cit.prenom_pere, cit.nom_pere,
                cit.prenom_mere, cit.nom_mere,
                act.id_actnaiss, cit.ville_naiss, cit.lieu_naiss, act.referenceAnaiss, act.rang_naiss, 
                date_format(act.datedecl_an,'%d/%m/%Y') as datedecl_an
                FROM actenaissance act, citoyen cit
                WHERE act.id_citoyen = cit.id_citoyen
                AND act.id_actnaiss = $id";
    
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
        <h1 class="h3">Informations du citoyen N<sup>0</sup>  <?=$row['id_citoyen']?></h1>
        <div class="row">
            <div class="col-3">
                <p> <strong>N<sup>0</sup> de l'acte de naissance: </strong> <?=$row['id_actnaiss']?></p>
                <p><strong>Nom:</strong> <?=$row['nom']?></p>
                <p><strong>Prénom:</strong> <?=$row['prenoms']?></p>
                <p><strong>Sexe:</strong> <?=$row['genre']?></p>
                <p><strong>Né(e) le :</strong> <?=$row['date_naiss']?></p>
                <p><strong>à :</strong> <?=$row['ville_naiss']?>/<?=$row['lieu_naiss']?></p>
                <p><strong>Fils de :</strong> <?=$row['prenom_pere']?> <?=$row['nom_pere']?></p>
                <p><strong>Et de :</strong> <?=$row['prenom_mere']?> <?=$row['nom_mere']?></p>
            </div>
            <div class="col-3">
                <p> <strong>N<sup>0</sup> de reference : </strong> <?=$row['referenceAnaiss']?></p>
                <p><strong>Rang de naissance : </strong> <?=$row['rang_naiss']?></p>
                <p><strong>Fait le : </strong> <?=$row['datedecl_an']?></p>
            </div>
            <div class="col-3">
                <img  style="width:150px;height:150px" src="../../images/devise.png">
            </div>
            <div class="col-3 d-flex flex-column justify-content-between">
                <button type="button" class="btn btn-primary">Modifier</button>
                <button type="button" class="btn btn-warning">Imprimer</button>
                <a  href="tableau-acte-naissance.php" class="btn btn-danger">Retour</a>
            </div>
        </div>
    </main>
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

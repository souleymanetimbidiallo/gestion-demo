<?php
    include_once("../../fonctions.inc.php");
    $id = $_GET['id'];

    $con = connexion();

    $requete = "SELECT cit.id_citoyen, cit.nom, cit.prenoms, cit.genre, 
                date_format(cit.date_naiss, '%d/%m/%Y') as date_naiss, cit.prenom_pere as pere,
                cit.prenom_mere, cit.nom_mere, cit.profession, cit.taille, cit.teint, cit.cheveux, cit.signe_particulier,
                cit.domicile ,
                cas.id_casierjud, cas.referenceCasJud, 
                date_format(cas.date_conf_casier, '%d/%m/%Y') as date_conf_casier, 
                date_format(cas.date_exp_casier, '%d/%m/%Y') as date_exp_casier,  
                cit.photo_citoyen
                FROM citoyen cit, casierjudiciaire cas
                WHERE cit.id_citoyen = cas.id_citoyen
                AND cas.id_casierjud = $id";
    
    $row = $con->query($requete);
    $row = $row->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Infos de la carte d'identité</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    
</head>
<body>
    <main class="container m-5 p-4 border border-primary">
        <h1 class="h3">Informations du citoyen N<sup>0</sup>  <?=$row['id_citoyen']?></h1>
        <div class="row">
            <div class="col-3">
                <p> <strong>N<sup>0</sup> du casier: </strong> <?=$row['id_casierjud']?></p>
                <p><strong>Nom:</strong> <?=$row['nom']?></p>
                <p><strong>Prénom:</strong> <?=$row['prenoms']?></p>
                <p><strong>Sexe:</strong> <?=$row['genre']?></p>
                <p><strong>Né(e) le :</strong> <?=$row['date_naiss']?></p>
                <p><strong>à :</strong> <?=$row['domicile']?></p>
                <p><strong>Fils de :</strong> <?=$row['pere']?></p>
                <p><strong>Et de :</strong> <?=$row['prenom_mere']?> <?=$row['nom_mere']?></p>
                <p><strong>Profession :</strong> <?=$row['profession']?></p>
            </div>
            <div class="col-3">
                <p> <strong>N<sup>0</sup> de reference : </strong> <?=$row['referenceCasJud']?></p>
                <p><strong>Résidence : </strong></p>
                <p><strong>Taille : </strong> <?=$row['taille']?></p>
                <p><strong>Teint : </strong> <?=$row['teint']?></p>
                <p><strong>Cheveux : </strong> <?=$row['cheveux']?></p>
                <p><strong>Signes particuliers : </strong> <?=$row['signe_particulier']?></p>
                <p><strong>Fait le : </strong> <?=$row['date_conf_casier']?></p>
                <p><strong>Validité :</strong> <?=$row['date_exp_casier']?></p>
            </div>
            <div class="col-3">
                <a href="../../images/photos/<?=$row['photo_citoyen']?>">
                    <img  style="width:150px;height:150px" src="../../images/photos/<?=$row['photo_citoyen']?>">
                </a>
            </div>
            <div class="col-3 d-flex flex-column justify-content-between">
                <button type="button" class="btn btn-primary">Modifier</button>
                <button type="button" class="btn btn-warning">Imprimer</button>
                <a  href="tableau-casier-judiciaire.php" class="btn btn-danger">Retour</a>
            </div>
        </div>
    </main>
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

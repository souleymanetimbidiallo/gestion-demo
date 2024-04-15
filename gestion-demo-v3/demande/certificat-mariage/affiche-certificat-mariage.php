<?php
    include_once("../../fonctions.inc.php");
    $id = $_GET['id'];

    $con = connexion();
    $requete = "SELECT cit.nom as nom_epoux, cit.prenoms as prenom_epoux, cit.nin_citoyen as nin_epoux,
                date_format(cit.date_naiss, '%d/%m/%Y') as date_naiss_epoux, cit.ville_naiss as ville_naiss_epoux, cit.lieu_naiss as lieu_naiss_epoux,
                cit.prenom_pere as prenom_pere_epoux, cit.prenom_mere as prenom_mere_epoux, cit.nom_mere as nom_mere_epoux, 
                cit.profession as profession_epoux, cit.photo_citoyen as photo_epoux,
                eps.nin_citoyen as nin_epouse, eps.nom as nom_epouse, eps.prenoms as prenom_epouse,
                date_format(eps.date_naiss, '%d/%m/%Y') as date_naiss_epouse, eps.ville_naiss as ville_naiss_epouse, eps.lieu_naiss as lieu_naiss_epouse,
                eps.prenom_pere as prenom_pere_epouse, eps.prenom_mere as prenom_mere_epouse, eps.nom_mere as nom_mere_epouse, 
                eps.profession as profession_epouse, eps.photo_citoyen as photo_epouse,
                mar.id_certmariage, mar.ville_mar, mar.commune_mar, date_format(mar.date_mar, '%d/%m/%Y') as date_mar, date_format(mar.datedec_mar, '%d/%m/%Y') as datedec_mar,
                resp.nom_resp, resp.prenom_resp, resp.profession_resp
                FROM certificatmariage mar, citoyen cit, citoyen eps, responsable resp
                WHERE mar.id_citoyen = cit.id_citoyen
                AND mar.id_epouse = eps.id_citoyen
                AND mar.id_responsable = resp.id_responsable
                AND mar.id_certmariage = $id";
    
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
        <h1 class="h3 text-center">CERTIFICAT DE MARIAGE</h1>
        <div class="row text-center">
            <div class="col-12">
                <p><strong>Ville (ou Préfecture):</strong> <?=$row['ville_mar']?></p>
                <p><strong>Commune (CRD de):</strong> <?=$row['commune_mar']?></p>
                <p><strong>Date du mariage:</strong> <?=$row['date_mar']?></p>
                <p><strong>Consentement requis:</strong> Oui</p>
                <p><strong>Je soussigné:</strong> <?=$row['prenom_resp'].' '.$row['nom_resp']?></p>
                <p><strong><?=$row['profession_resp']?></strong></p>
                <p>Certifie avoir uni par les liens du mariage conformément à la loi en vigueur</p>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <p><strong>NIN:</strong> <?=$row['nin_epoux']?></p>
                <p><strong>Nom:</strong> <?=$row['nom_epoux']?></p>
                <p><strong>Prénom:</strong> <?=$row['prenom_epoux']?></p>
                <p><strong>Né(e) le :</strong> <?=$row['date_naiss_epoux']?></p>
                <p><strong>à :</strong> <?=$row['ville_naiss_epoux']?> / <?=$row['lieu_naiss_epoux']?></p>
                <p><strong>Fils de :</strong> <?=$row['prenom_pere_epoux']?></p>
                <p><strong>Et de :</strong> <?=$row['prenom_mere_epoux']?> <?=$row['nom_mere_epoux']?></p>
                <p><strong>Profession :</strong> <?=$row['profession_epoux']?></p>
            </div>
            <div class="col-3">
                <img  style="width:150px;height:150px" src="../../images/photos/<?=$row['photo_epoux']?>">
            </div>
            <div class="col-3">
                <p><strong>NIN:</strong> <?=$row['nin_epouse']?></p>
                <p><strong>Nom:</strong> <?=$row['nom_epouse']?></p>
                <p><strong>Prénom:</strong> <?=$row['prenom_epouse']?></p>
                <p><strong>Né(e) le :</strong> <?=$row['date_naiss_epouse']?></p>
                <p><strong>à :</strong> <?=$row['ville_naiss_epouse']?> / <?=$row['lieu_naiss_epouse']?></p>
                <p><strong>Fils de :</strong> <?=$row['prenom_pere_epouse']?></p>
                <p><strong>Et de :</strong> <?=$row['prenom_mere_epouse']?> <?=$row['nom_mere_epouse']?></p>
                <p><strong>Profession :</strong> <?=$row['profession_epouse']?></p>
            </div>
            <div class="col-3">
                <img  style="width:150px;height:150px" src="../../images/photos/<?=$row['photo_epouse']?>">
            </div>
        </div>
    </main>
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

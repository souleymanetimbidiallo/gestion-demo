<?php
    session_start();
    $id = $_SESSION['id'];
    
    include_once("fonctions.inc.php");
    $con = connexion();
    $requete = "SELECT * FROM citoyen WHERE id_citoyen = $id";
    $reqligne = $con->query($requete);
    $affi=$reqligne->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil-Citoyen</title>
    <!-- insertin des Fichier externe -->
    <link rel="stylesheet" href="css/MaterialDesign-Webfont-master/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ov.css">
    <link rel="stylesheet" href="css/citoyen.css">
    <style>
        #corps{
            background-image: url("images/fond-laei2.jpg");
            background-size: 100% 100%;
        }
    </style>
</head>
<body>
    <!-- Div d'entete -->
    <?php include_once("header.php") ?>
    <!-- Fin div d'entete -->
    
    <main class="container-fluid mt-4" id="corps">
        <div class="row mx-5">
            <div class="col-3">
                <a href="images/photos/<?=$affi['PHOTO_CITOYEN']?>">
                    <img src="images/photos/<?=$affi['PHOTO_CITOYEN']?>" alt="" class="img-fluid img-thumbnail rounded-circle">
                </a>
            </div>
            <div class="col-9 pt-5">
                <h2><?= strtoupper($affi['NOM'])." ".$affi['PRENOMS']?></h2>
                <p><strong>NIN:</strong>  <?= $affi['NIN_CITOYEN']?></p>
                <p><strong>Mail:</strong>  <?= $affi['EMAIL']?></p>
            </div>
        </div>
        <hr color="red">
        <div class="mt-3 mx-5">
            <h3 class="table-danger">Informations à l'état civil</h3>
           <div class="row">
               <div class="col-6 pl-5">
                   <p><strong>Nom:</strong> <?= $affi['NOM']?></p>
                   <p><strong>Prénom:</strong> <?= $affi['PRENOMS']?></p>
                   <p><strong>Né(e) le:</strong> <?= $affi['DATE_NAISS']?></p>
                   <p><strong>Lieu de naissance:</strong> <?= $affi['LIEU_NAISS']." (".$affi['VILLE_NAISS'].")"?></p>
               </div>
               <div class="col-6 pr-5">
                    <p><strong>Fils de:</strong> <?= $affi['PRENOM_PERE']?></p>
                    <p><strong>et de:</strong> <?= $affi['PRENOM_MERE']." ".$affi['NOM_MERE']?></p>
                    <p><strong>Sexe:</strong> <?= $affi['GENRE']?></p>
               </div>
           </div>
        </div>
        <hr color="yellow">
        <div class="mt-3 mx-5">
            <h3 class="table-warning">Informations complementaires</h3>
           <div class="row">
               <div class="col-6 pl-5">
                   <p><strong>Teint:</strong> <?= $affi['TEINT']?></p>
                   <p><strong>Taille:</strong> <?= $affi['TAILLE']?></p>
                   <p><strong>Yeux:</strong> <?= $affi['YEUX']?></p>
                   <p><strong>Cheveux: </strong> <?= $affi['CHEVEUX']?></p>
               </div>
               <div class="col-6 pr-5">
                    <p><strong>Domicile:</strong> <?= $affi['DOMICILE']?></p>
                    <p><strong>Profession:</strong> <?= $affi['PROFESSION']?></p>
                    <p><strong>Situation matrimoniale:</strong> <?= $affi['SITUATION_MATRIMONIALE']?></p>
                    <p><strong>Signe particuliers: </strong> <?= $affi['SIGNE_PARTICULIER']?></p>
               </div>
           </div>
        </div>
        <hr color="green">
        <div class="mt-3 mx-5 pb-5">
            <h3 class="table-success">Informations personnelles</h3>
           <div class="row">
               <div class="col-6 pl-5">
                   <p><strong>Numéro d'identification:</strong> <?= $affi['NIN_CITOYEN']?></p>
                   <p><strong>Numéro d'emprunt digital:</strong> <?= $affi['NUM_EMPRUNT']?></p>
               </div>
               <div class="col-6 pr-5">
                    <p><strong>Téléphone:</strong> <?= $affi['TEL']?></p>
                    <p><strong>Email:</strong> <?= $affi['EMAIL']?></p>
               </div>
           </div>
        </div>
    </main>
    
    <!-- Début de pied-page -->
    <?php include_once("footer.php") ?>
    <!-- Fin de pied-page -->
</body>
</html>
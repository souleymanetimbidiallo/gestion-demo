<?php
    //Verification de la connexion
    include_once("../fonctions.inc.php");
    
    //Recuperation des informations par rapport à un papier
    $rows = recupInformations('CERTIFICAT_SEJOUR');
    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reponse de certificat de residence</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .demande{
            height:25em;
        }
    </style>
</head>
<body>
    <main class="container-fluid mt-3">
        <h1 class="h3 text-center">Liste des demandes de certificat de séjour</h1>
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>N<sup>o</sup></th>
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Prénoms</th>
                    <th>Motif</th>
                    <th>Date de demande</th>
                    <th>Date 1</th>
                    <th>Date 2</th>
                    <th>Date 3</th>
                    <th>Date validée</th>
                    <th>Etat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row=$rows->fetch()){
                ?>
                <tr>
                    <td><?= $row['id_demande'] ?></td>
                    <td><?= $row['id_citoyen'] ?></td>
                    <td><?= $row['nom'] ?></td>
                    <td><?= $row['prenoms'] ?></td>
                    <td><?= $row['motif'] ?></td>
                    <td><?= $row['date_demande'] ?></td>
                    <td><?= $row['date_rdv1'] ?></td>
                    <td><?= $row['date_rdv2'] ?></td>
                    <td><?= $row['date_rdv3'] ?></td>
                    <td><?= $row['date_valider'] ?></td>
                    <td><?= $row['etat_traitement'] ?></td>
                    <td><a href="rendezVous.php?id=<?=$row['id_citoyen']?>">Editer</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
    </main>
</body>
</html>

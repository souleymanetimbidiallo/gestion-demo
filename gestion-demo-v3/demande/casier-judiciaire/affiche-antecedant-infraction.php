<?php
    include_once("../../fonctions.inc.php");
    $con = connexion();

    $requete = "SELECT * FROM antecedant_infraction";
    $rows = $con->query($requete);
    $row = $rows->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Liste des casiers judiciaires</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <main class="container mt-3">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <th>Identifiant</th>
                        <th>ID Citoyen</th>
                        <th>ID Responsable</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Motif</th>
                        <th>Dégré</th>
                        <th>Date</th>
                        <th>Lieu</th>
                    </thead>
                    <tbody>
                    <?php
                        while($row = $rows->fetch()){
                    ?>
                        <tr>
                            <td><?= $row['ID_INFRACTION'] ?></td>
                            <td><?= $row['ID_CITOYEN'] ?></td>
                            <td><?= $row['ID_RESPONSABLE'] ?></td>
                            <td><?= $row['TITRE_INF'] ?></td>
                            <td><?= $row['DESCRIPTION_INF'] ?></td>
                            <td><?= $row['MOTIF_INF'] ?></td>
                            <td><?= $row['DEGRE_INF'] ?></td>
                            <td><?= $row['DATE_INF'] ?></td>
                            <td><?= $row['LIEU_INF']?></td>
                        </tr>
                    <?php
                    }
                    $rows->closeCursor();
                    ?>
                    </tbody>
                    <p></p>
                </table>
            </div>
        </main>
    </body>
</html>
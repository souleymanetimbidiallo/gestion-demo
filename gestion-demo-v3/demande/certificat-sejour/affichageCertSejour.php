<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Affichage</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
<?php
                /*Connexion a la base de donnees */
                    include_once('connecterPDO.inc.php');
                    $idcom=connexion('gestiondemographique','parametre');
                    $sql='SELECT * FROM certificatsejour';
                    $rows=$idcom->query($sql);
            
                    if(!$rows){
                        $mes_erreurs=$idcom->errorInfo();
                        echo 'Connexion impossible, code: '.$idcom->errorCode(),$mes_erreurs[2];
                    }else{
                        $nbart=$rows->rowCount();
            
                        echo "<h2 class='text-primary ml-3'>$nbart certificats de sejour livrés </h2>";
                    ?>
                    <!-- Liste de tous les articles dans un tableau avec a droite les options de modification, de suppression et d'affichage complet de l'article -->
                    <div class="table-responsive">
                    <table class="table table-striped  table-hover table-bordered text-between ml-3 mr-3">
                        <!-- Entete -->    
                    <tr>
                            <th>Identifiant</th>
                            <th>Id_responsable</th>
                            <th>Nationalite</th>
                            <th>Num Passeport</th>
                            <th>Duree Visa</th>
                            <th>Provenance</th>
                            <th>Destination</th>
                            <th>Date Confection</th>
                            <th>Type</th>
                        </tr>
                    <?php 
                        while($row=$rows->fetch()){
                    ?><!-- Ligne du tableau -->
                        <tr>
                            <td><?= $row['ID_CERTSEJOUR']?></td>
                            <td><?= $row['ID_RESPONSABLE']?></td>
                            <td><?= $row['NATIONALITE_SEJOUR']?></td>
                            <td><?= $row['NUM_PS_SEJOUR']?></td>
                            <td><?= $row['DUREE_VISA']?></td>
                            <td><?= $row['PROVENANCE']?></td>
                            <td><?= $row['DESTINATION']?></td>
                            <td><?= $row['DATE_CONFECTION_SEJOUR']?></td>
                            <td><?= $row['TYPE_CERTSEJOUR']?></td>
                        </tr>
                    <?php    
                        }
                        $rows->closeCursor();
                    }
                    $idcom=null;
                ?>  
        </table> 
        <!-- fin de l'affichage -->
        </div>   
<!-- inclusion dus fichiers bootstrap -->
    <script src="js/fontawesome-all.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
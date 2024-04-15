<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <title>Tableau des déclarations de décès</title>
</head>
<body>
    <?php
        include_once('../../fonctions.inc.php');
        $con = connexion();

        $requet='SELECT * FROM declarationdeces';
        $resultat=$con->query($requet);
     
    ?>
    <table class="table table-striped table-hover table-bordered mt-3 col-lg-6 col-md-12 col-lg-12 text-center">
        <thead class="thead-dark">
            <tr>
                <th>N <sup>0</sup></th>
                <th>Nom du defunt</th>
                <th>Prénom du defunt</th>
                <th>Type de mort</th>
                <th>Date du décès</th>
                <th>Lieu du décès</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           <?php 
                while($ligne=$resultat->fetch()){
            ?>
           <tr>
               <td><a href="acte_decces.php?id=<?= $ligne['ID_DECLARATION_DECES'];?>"><?=$ligne['ID_DECLARATION_DECES'];?></a></td>
               <td><?php echo $ligne['NOM_MORT']; ?></td>
               <td><?php echo $ligne['PRENOM_MORT'] ;?></td>
               <td><?php echo $ligne['TYPE_DE_MORT'] ;?></td>
               <td><?php echo $ligne['DATE_DE_MORT'] ;?></td>
               <td><?php echo $ligne['LIEU_DE_MORT'] ;?></td>
               <td><a class="btn btn-primary" href="affiche-declaration-deces.html.php?id=<?=$ligne['ID_DECLARATION_DECES']?>">Voir plus</a></td>
           </tr>
           <?php 
            }
            ?>
        </tbody>
   </table>
</body>
</html>
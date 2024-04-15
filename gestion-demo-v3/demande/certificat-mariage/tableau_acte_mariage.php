<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau des certificats de mariage</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>

    <div class="container-fluid">
        <legend class="text-uppercase text-center">Liste des certificats de mariage</legend>
        <div class="d-flex">
            <form action="" class="ml-auto" method="POST">
                <div class="input-group">
                    <input type="search" name="recherche" id="cherche" placeholder="Rechercher" class="form-control">
                    <div class="input-group-append">
                        <button type="submit" name="rechercher" class="btn btn-primary">
                            <span class="fas fa-search"></span>
                        </button>
                    </div>
                </div>
            </form>            
        </div>
        <?php
            include_once("../../fonctions.inc.php");
            $con = connexion();
            if(isset($_POST['rechercher'])){
                $id_search = $_POST['recherche'];
                $requete = "SELECT cit.id_citoyen as id_epoux, cit.nom as nom_epoux, cit.prenoms as prenom_epoux, 
                            eps.nom as nom_epouse, eps.prenoms as prenom_epouse, 
                            mar.id_certmariage, mar.ville_mar, mar.commune_mar, date_format(mar.date_mar, '%d/%m/%Y') as date_mar, date_format(mar.datedec_mar, '%d/%m/%Y') as datedec_mar
                            FROM certificatmariage mar, citoyen cit, citoyen eps
                            WHERE mar.id_citoyen = cit.id_citoyen
                            AND mar.id_epouse = eps.id_citoyen
                            AND cit.id_citoyen = $id_search";
                $result=$con->query($requete);
            }else{
                $requete = "SELECT cit.id_citoyen as id_epoux, cit.nom as nom_epoux, cit.prenoms as prenom_epoux, 
                            eps.nom as nom_epouse, eps.prenoms as prenom_epouse, 
                            mar.id_certmariage, mar.ville_mar, mar.commune_mar, date_format(mar.date_mar, '%d/%m/%Y') as date_mar, date_format(mar.datedec_mar, '%d/%m/%Y') as datedec_mar
                            FROM certificatmariage mar, citoyen cit, citoyen eps
                            WHERE mar.id_citoyen = cit.id_citoyen
                            AND mar.id_epouse = eps.id_citoyen";
                $result=$con->query($requete);
                $nbart=$result->rowCount();
            }
            

            if(!$result) 
            {
                $mes_erreur=$con->errorInfo();
                echo "Lecture impossible, code", $con->errorCode(),$mes_erreur[2]; 
            }
            else 
            {
            ?> 
            <div class="container-fluid">
                <?php
                    if(isset($nbart)){
                        echo "<h4>Il y a $nbart certificats de mariage enregistrés</h4>";
                    }
                ?>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <table class="table table-striped table-bordered table-hover  text-center table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>N <sup>o</sup></th>
                                <th>Infos de l'époux</th>
                                <th>Infos de l'épouse</th>
                                <th>Lieu du mariage</th>
                                <th>Date de mariage</th>
                                <th>Date de déclaration</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($ligne=$result->fetch()) 
                            {
                            ?>      
                                <tr class="table-primary">
                                    
                                    <td><?= $ligne['id_certmariage'] ?></td>
                                    <td><?= $ligne['prenom_epoux'].' '.$ligne['nom_epoux'] ?></td>
                                    <td><?= $ligne['nom_epouse'].' '.$ligne['prenom_epouse'] ?></td>
                                    <td><?= $ligne['ville_mar'].' / '.$ligne['commune_mar'] ?></td>
                                    <td><?= $ligne['date_mar'] ?></td>
                                    <td><?= $ligne['datedec_mar'] ?></td>
                                    <td><a href="affiche-certificat-mariage.php?id=<?=$ligne['id_certmariage']?>" class="btn btn-outline-primary">Voir plus</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        <tbody>
                    </table>
                    </div>
                </div>
            </div>
            <?php
                }
                $result->closeCursor(); 
                $con=null; 
            ?>
    </div>
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/fontawesome-all.min.js"></script>
</body>
</html>
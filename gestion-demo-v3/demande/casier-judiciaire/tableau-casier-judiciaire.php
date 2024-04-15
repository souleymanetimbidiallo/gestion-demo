<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau des casiers judiciaires</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>

    <div class="container-fluid">
        <legend class="text-uppercase text-center">Liste des casiers judiciaires</legend>
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
                $requete = "SELECT cit.id_citoyen, cit.nom, cit.prenoms, cas.id_casierjud, cas.referenceCasJud, 
                            date_format(cas.date_conf_casier, '%d/%m/%Y') as date_conf_casier, 
                            date_format(cas.date_exp_casier, '%d/%m/%Y') as date_exp_casier, 
                            cit.photo_citoyen
                            FROM casierjudiciaire cas, citoyen cit
                            WHERE cas.id_citoyen = cit.id_citoyen
                            AND cit.id_citoyen = $id_search";
                $result=$con->query($requete);
            }else{
                $requete = "SELECT cit.id_citoyen, cit.nom, cit.prenoms, cas.id_casierjud, cas.referenceCasJud, 
                            date_format(cas.date_conf_casier, '%d/%m/%Y') as date_conf_casier, 
                            date_format(cas.date_exp_casier, '%d/%m/%Y') as date_exp_casier, 
                            cit.photo_citoyen
                            FROM casierjudiciaire cas, citoyen cit
                            WHERE cas.id_citoyen = cit.id_citoyen";
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
                        echo "<h4>Il y a $nbart casiers judiciaires enregistrés</h4>";
                    }
                ?>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <table class="table table-striped table-bordered table-hover  text-center table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>N <sup>o</sup></th>
                                <th>Nom</th>
                                <th>Prénoms</th>
                                <th>Identifiant du citoyen</th>
                                <th>Réference</th>
                                <th>Date de confection</th>
                                <th>Date d'expiration</th>
                                <th>Photo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($ligne=$result->fetch()) 
                            {
                            ?>      
                                <tr class="table-warning">
                                    
                                    <td><?= $ligne['id_casierjud'] ?></td>
                                    <td><?= $ligne['nom'] ?></td>
                                    <td><?= $ligne['prenoms'] ?></td>
                                    <td><?= $ligne['id_citoyen'] ?></td>
                                    <td><?= $ligne['referenceCasJud'] ?></td>
                                    <td><?= $ligne['date_conf_casier'] ?></td>
                                    <td><?= $ligne['date_exp_casier'] ?></td>
                                    <td>
                                        <a href="../../images/photos/<?=$ligne['photo_citoyen']?>">
                                            <img  style="width:80px;height:80px" src="../../images/photos/<?=$ligne['photo_citoyen']?>">
                                        </a>
                                    </td>
                                    <td><a href="affiche-casier-judiciaire.php?id=<?=$ligne['id_casierjud']?>" class="btn btn-outline-primary">Voir plus</a></td>
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
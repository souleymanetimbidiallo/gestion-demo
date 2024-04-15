<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/MaterialDesign-Webfont-master/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Déclarations</title>
    <style media="screen">
      body{
        background-color: rgba(0,0,0,0);
      }
    </style>
  </head>
  <body>
  <div class="d-flex">
            <form action="" class="mt-3 ml-auto" method="POST">
                <div class="input-group">
                    <input type="search" name="recherche" placeholder="Numéro de déclaration" class="form-control">
                    <div class="input-group-append">
                        <button type="submit" name="rechercher" class="btn btn-primary">
                            <span class="fas fa-search"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
  <table class="table table-striped table-hover table-bordered mt-3 col-lg-6 col-md-12 col-lg-12 text-center">
      <thead class="thead-dark">
          <th>ID</th>
          <th>Nom de la mère</th>
          <th>Prénom de la mère</th>
          <th>Heure d'accouchement</th>
          <th>Date d'accouchement</th>
          <th>Sexe de l'enfant</th>
          <th>Etat de vie</th>
          <th>Actions</th>
      </thead>

      <tbody>
          <?php
            //connexion à la base de donnéés
            include_once("../../fonctions.inc.php");
            $con = connexion();
            
            //recupération des données dépuis la table déclaration
            if(isset($_POST['rechercher'])){
              $id_dec = $_POST['recherche'];
              $declarations = $con->query("SELECT * FROM declarationnaissance where ID_DECNAISS = $id_dec");
              
            }else{
              $declarations = $con->query("SELECT * FROM declarationnaissance");
            }

            $tab_declaration = array();
            while($result = $declarations->fetch()){
                $tab_declaration[] = $result;
            }
            
            //Insertion des données dans le taleau des déclarations de naissance
            foreach($tab_declaration as $tab_result){
                ?>
                    <tr>
                        <td><a href="../../citoyen/table-insert-bebe.php?id=<?=$tab_result['ID_DECNAISS']?>"><?=$tab_result['ID_DECNAISS']?></a> </td>
                        <td><?=$tab_result['NOM_MERE_DN']?></td>
                        <td><?=$tab_result['PRENOM_MERE_DN']?></td>
                        <td><?=$tab_result['HEURE_ACC'] ?></td>
                        <td><?=$tab_result['DATE_ACC']?></td>
                        <td><?=$tab_result['SEXE_DN']?></td>
                        <td><?=$tab_result['ETAT_VIE']?></td>
                        <td><a href="affiche-declaration-naissance.html.php?id=<?=$tab_result['ID_DECNAISS']?>">Voir plus</a></td>
                    </tr>
                <?php
            }//fin foreach()
          ?>
      </tbody>
  </table>
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/fontawesome-all.min.js"></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Liste des responsables</title>
    <link rel="stylesheet" href="../css/MaterialDesign-Webfont-master/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <?php
        include_once("../fonctions.inc.php");
        $db = connexion();
     ?>
  </head>
  <body>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12 col-md-12">
              <div class="d-flex">
                <h1 class="h3 text-center">Liste des responsables</h1>
                <form action="" class="my-3 ml-auto" method="POST">
                    <div class="input-group">
                        <input type="search" name="recherche" placeholder="Numéro du responsable" class="form-control">
                        <div class="input-group-append">
                            <button type="submit" name="rechercher" class="btn btn-primary">
                                <span class="fas fa-search"></span>
                            </button>
                        </div>
                    </div>
                </form>
              </div>

              <table class="table table-striped table-bordered table-hover table-light">
                  <thead class="thead-dark">
                    <?php
                      if(isset($_POST['rechercher'])){
                        $login = $_POST['recherche'];
                        $sql = "SELECT id_responsable, nom_resp, prenom_resp, profession_resp, service_resp, lieu_travail,
                                type_compte, nom_utilisateur
                                FROM responsable 
                                WHERE nom_utilisateur = '$login'";
                      }else{
                        $sql = "SELECT id_responsable, nom_resp, prenom_resp, profession_resp, service_resp, lieu_travail,
                                type_compte, nom_utilisateur 
                                FROM responsable";
                      }
                      $reqligne=$db->query($sql);
                     ?>
                      <tr>
                          <th scope="col">N<sup>0</sup></th>
                          <th scope="col">Nom</th>
                          <th scope="col">Prénoms</th>
                          <th scope="col">Profession</th>
                          <th scope="col">Service</th>
                          <th scope="col">Lieu</th>
                          <th scope="col">Login</th>
                          <th scope="col">Type</th>
                          <th scope="col">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                        while ($affi=$reqligne->fetch()) {
                     ?>
                    <tr>
                        <th scope="row"><?=$affi['id_responsable']?></th>
                        <td><?=$affi['nom_resp'] ?></td>
                        <td><?=$affi['prenom_resp'] ?></td>
                        <td><?=$affi['profession_resp'] ?></td>
                        <td><?=$affi['service_resp'] ?></td>
                        <td><?=$affi['lieu_travail'] ?></td>
                        <td><?=$affi['nom_utilisateur'] ?></td>
                        <td><?=$affi['type_compte'] ?></td>
                        <td class="d-flex justify-content-around">
                            <a class="btn btn-primary" href="voir-responsable.php?id=<?=$affi['id_responsable']?>">Voir <i class="mdi mdi-plus"></i></a>
                            <a class="btn btn-success" href="voir-responsable.php?id=<?=$affi['id_responsable']?>"><i class="mdi mdi-pencil"></i></a>
                            <a class="btn btn-danger" href="voir-responsable.php?id=<?=$affi['id_responsable']?>"><i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                      <?php
                          }
                       ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/fontawesome-all.min.js"></script>
  </body>
</html>

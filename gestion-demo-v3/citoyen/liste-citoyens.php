<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Liste des citoyens</title>
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
                <h1 class="h3 text-center">Liste des citoyens</h1>
                <form action="" class="my-3 ml-auto" method="POST">
                    <div class="input-group">
                        <input type="search" name="recherche" placeholder="Numéro du citoyen" class="form-control">
                        <div class="input-group-append">
                            <button type="submit" name="rechercher" class="btn btn-primary">
                                <span class="fas fa-search"></span>
                            </button>
                        </div>
                    </div>
                </form>
              </div>

              <table class="table table-striped table-bordered">
                  <thead class="thead-dark m-3">
                    <?php
                      if(isset($_POST['rechercher'])){
                        $id_cit = $_POST['recherche'];
                        $sql = "SELECT id_citoyen, nom, prenoms, date_format(date_naiss, '%d/%m/%Y') as date_naiss, ville_naiss, lieu_naiss,
                                genre, nin_citoyen
                                FROM citoyen 
                                WHERE id_citoyen = $id_cit";
                      }else{
                        $sql = "SELECT id_citoyen, nom, prenoms, date_format(date_naiss, '%d/%m/%Y') as date_naiss, ville_naiss, lieu_naiss,
                                genre, nin_citoyen
                                FROM citoyen";
                      }
                      $reqligne=$db->query($sql);
                     ?>
                      <tr>
                          <th scope="col">N<sup>0</sup></th>
                          <th scope="col">Nom</th>
                          <th scope="col">Prénoms</th>
                          <th scope="col">Date de naissance</th>
                          <th scope="col">Lieu</th>
                          <th scope="col">Sexe</th>
                          <th scope="col">N . I . N</th>
                          <th scope="col">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                        while ($affi=$reqligne->fetch()) {
                     ?>
                      <tr>
                          <th scope="row"><?=$affi['id_citoyen']?></th>
                          <td><?=$affi['nom'] ?></td>
                          <td><?=$affi['prenoms'] ?></td>
                          <td><?=$affi['date_naiss'] ?></td>
                          <td><?=$affi['ville_naiss'] ?> / <?=$affi['lieu_naiss'] ?></td>
                          <td><?=$affi['genre'] ?></td>
                          <td><?=$affi['nin_citoyen'] ?></td>
                          <td><a class="btn btn-primary btn-block" href="voir-citoyen.php?id=<?=$affi['id_citoyen']?>">Voir plus</a> </td>
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

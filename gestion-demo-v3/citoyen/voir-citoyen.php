<?php
    $id = $_GET['id'];
    include_once("../fonctions.inc.php");
    $con = connexion();
    $requete = "SELECT * FROM citoyen WHERE id_citoyen = $id";
    $reqligne = $con->query($requete);
    $affi=$reqligne->fetch();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Informations du citoyen</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
  </head>
  <body>
    <div class="">
      <!--DEUBUT DU CONTAINER-->
      <div class="container-fluid mt-3">
          <div class="row">
            <div class="col-12 col-md-6 offset-3">
              <table class="table table-striped table-bordered table-hover table-primary">
                      <div class="table-primary text-center">
                          <h3>INFORMATIONS DU CITOYEN</h3>
                      </div>
                      <tr>
                          <th scope="col" class="">Nom</th>
                          <td><?php echo $affi['NOM']?></td>
                      </tr>

                      <tr>
                          <th scope="col">Prénom</th>
                          <td><?php echo $affi['PRENOMS']?></td>
                      </tr>
                      <tr>
                          <th scope="col">Date de naissance</th>
                          <td><?php echo $affi['DATE_NAISS'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Ville de naissance:</th>
                          <td><?php echo $affi['VILLE_NAISS'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Lieu de naissance</th>
                          <td><?php echo $affi['LIEU_NAISS'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Domicile</th>
                          <td><?php echo $affi['DOMICILE'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Profession</th>
                          <td><?php echo $affi['PROFESSION'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Nom de la mère</th>
                          <td><?php echo $affi['NOM_MERE'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Prénom de la mère</th>
                          <td><?php echo $affi['PRENOM_MERE'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Profession de la mère</th>
                          <td><?php echo $affi['PROFESSION_MERE'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Adresse de la mère</th>
                          <td><?php echo $affi['ADRESSE_MERE'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Nom du père</th>
                          <td><?php echo $affi['NOM_PERE'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Prénom du père</th>
                          <td><?php echo $affi['PRENOM_PERE'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Profession du père</th>
                          <td><?php echo $affi['PROFESSION_PERE'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Adresse du père</th>
                          <td><?php echo $affi['ADRESSE_PERE'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Téléphone</th>
                          <td><?php echo $affi['TEL'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Email</th>
                          <td><?php echo $affi['EMAIL'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Sexe</th>
                          <td><?php echo $affi['GENRE'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Situation Matrimoniale</th>
                          <td></td>
                      </tr>
                      <tr>
                          <th scope="col">Taille</th>
                          <td><?php echo $affi['TAILLE'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Teint</th>
                          <td><?php echo $affi['TEINT'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Cheveux</th>
                          <td><?php echo $affi['CHEVEUX'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Yeux</th>
                          <td><?php echo $affi['YEUX'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Signes Particuliers</th>
                          <td><?php echo $affi['SIGNE_PARTICULIER'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">Numéro d'emprunt digitale</th>
                          <td><?php echo $affi['NUM_EMPRUNT'] ?></td>
                      </tr>
                      <tr>
                          <th scope="col">NIN du citoyen</th>
                          <td><?php echo $affi['NIN_CITOYEN'] ?></td>
                      </tr>
                </table>
            </div>
          </div>
      </div>
      <!--END CONTAINER-->
    </div>
  </body>

</html>

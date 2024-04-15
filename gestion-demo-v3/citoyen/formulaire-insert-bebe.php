<?php
    $id = $_GET['id'];
    include_once("../fonctions.inc.php");
    $con = connexion();
    $requete = "SELECT * FROM declarationnaissance WHERE ID_DECNAISS = $id";
    $rows = $con->query($requete);
    $row = $rows->fetch();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
  </head>
  <body>
      <!--DEBUT DU CORPS-->
      <div class="container bg-secondary text-warning mt-3">
        <div class="row">
            <div class="col-md-8 mx-auto text-center bg-primary my-3" >
                <h1 class="h4">ENREGISTREMENT D'UN CITOYEN</h1>
            </div>
        </div>
          <form method="POST" action="citoyen-insert-bebe.php">
            <div class="row">
                  <div class="col-12 col-md-4">
                      <div class="form-group">
                        <label for="exampleInputtext">Numéro de déclaration:</label>
                        <input  type="text" name="num_dec"  class="form-control is-invalid"  placeholder="nom" required value="<?=$id?>" readonly>
                        
                        <label for="exampleInputtext">Entrer le nom:</label>
                        <input  type="text" name="nom"  class="form-control is-invalid"  placeholder="nom" required>
                        
                        <label for="exampleInputtext">Prenom: </label>
                        <input type="text" name="prenom" class="form-control is-invalid"  placeholder="Prenom" required>
                        
                        <label for="exampleInputtext">Date de naissance:</label>
                        <input type="date" name="datenais"  class="form-control"  value="<?=$row['DATE_ACC']?>" readonly>
                        
                        <label for="exampleInputtext">Ville de naissance:</label>
                        <select name="ville_naiss" class="custom-select">
                          <option value="">Entrez la ville de naissance</option>
                          <option value="Conakry">Conakry</option>
                          <option value="Kindia">Kindia</option>
                          <option value="Boké">Boké</option>
                          <option value="Kindia">Kindia</option>
                          <option value="Mamou">Mamou</option>
                          <option value="Labé">Labé</option>
                          <option value="Faranah">Faranah</option>
                          <option value="Kankan">Kankan</option>
                          <option value="N'Zérékoré">N'Zérékoré</option>
                        </select>
                        
                        <label for="exampleInputtext">Lieu de naissance:</label>
                        <input type="text" class="form-control" name="lieu_naiss" placeholder="Lieu de naissance">
                        
                        <label for="exampleInputtext">Nom de la mere:</label>
                        <input type="text" name="nmere" class="form-control " value="<?=$row['NOM_MERE_DN']?>" readonly>

                      </div>
                  </div>
                  <div class="col-12 col-md-4" >
                      <div class="form-group">
                        
                        <label for="exampleInputtext">Prénom de la mere:</label>
                        <input type="text" name="pmere" class="form-control "   value="<?=$row['PRENOM_MERE_DN']?>" readonly>
                        
                        <label for="exampleInputtext">Profession de la mere: </label>
                        <input type="text" name="promere" class="form-control "   value="<?=$row['PROFESSION_MERE_DN']?>" readonly>
                        
                        <label for="exampleInputEmail1">Adresse de la mere:</label>
                        <input type="text"  name="amere"  class="form-control "   value="<?=$row['DOMICILE_MERE_DN']?>" readonly>
                        
                        <label for="exampleInputEmail1">Nom du pere: </label>
                        <input type="text"  name="npere" class="form-control "  placeholder="Nom du pére">
                        
                        <label for="exampleInputEmail1">Prénom du pére: </label>
                        <input type="text"  name="ppere" class="form-control "  placeholder="Prenom du pére">
                        
                        <label for="exampleInputEmail1">Profesion du pére:</label>
                        <input type="text"  name="propere" class="form-control "  placeholder="Profession du père">
                        
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Adresse du pére:</label>
                            <input type="text"  name="apere" class="form-control "  placeholder="Adresse du père">
                            
                            <label for="exampleInputEmail1">Genre:</label>
                            <input type="text"  name="genre" class="form-control "  value="<?=$row['SEXE_DN']?>" readonly>
                            
                            <label for="exampleInputPassword1">Mot de passe:</label>
                            <input type="password" name="mdp" class="form-control" placeholder="Mot de passe">
                            
                            <label for="exampleInputEmail1">Confirmer le mot de passe:</label>
                            <input type="password" name="mdp2" class="form-control "  placeholder="Mot de passe">
                        
                            <label for="exampleInputEmail1">NIN du citoyen: </label>
                            <input type="text" name="nin" class="form-control is-invalid "  placeholder="NIN citoyen" required>

                            <button type="submit" class="btn btn-outline-warning mt-4 btn-block">Valider</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
      <!--Fin body-->
  </body>
</html>

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
            <div class="col-md-12 text-center bg-primary m-3" >
                <h1 class="h2">ENREGISTREMENT D'UN CITOYEN</h1>
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
                        
                        <label for="exampleInputtext">Domicile:</label>
                        <input type="text" name="domi" class="form-control "  placeholder="Domicile">
                        
                        <label for="exampleInputtext">Proffesion:</label>
                        <input type="text" name="pro" class="form-control "  placeholder="Proffesion">
                        
                        <label for="exampleInputtext">Nom de la mere:</label>
                        <input type="text" name="nmere" class="form-control " value="<?=$row['NOM_MERE_DN']?>" readonly>
                        
                        <label for="exampleInputtext">Prénom de la mere:</label>
                        <input type="text" name="pmere" class="form-control "   value="<?=$row['PRENOM_MERE_DN']?>" readonly>
                        
                        <label for="exampleInputtext">Profession de la mere: </label>
                        <input type="text" name="promere" class="form-control "   value="<?=$row['PROFESSION_MERE_DN']?>" readonly>

                      </div>
                  </div>
                  <div class="col-12 col-md-4" >
                      <div class="form-group">
                        <label for="exampleInputEmail1">Adresse de la mere:</label>
                        <input type="text"  name="amere"  class="form-control "   value="<?=$row['DOMICILE_MERE_DN']?>" readonly>
                        
                        <label for="exampleInputEmail1">Nom du pere: </label>
                        <input type="text"  name="npere" class="form-control "  placeholder="Nom du pére">
                        
                        <label for="exampleInputEmail1">Prénom du pére: </label>
                        <input type="text"  name="ppere" class="form-control "  placeholder="Prenom du pére">
                        
                        <label for="exampleInputEmail1">Proffesion du pére:</label>
                        <input type="text"  name="propere" class="form-control "  placeholder="Profession du père">
                        
                        <label for="exampleInputEmail1">Adresse du pére:</label>
                        <input type="text"  name="apere" class="form-control "  placeholder="Adresse du père">
                        
                        <label for="exampleInputEmail1">Telephone: </label>
                        <input type="text"  name="tel" class="form-control "  placeholder="Tel">
                        
                        <label for="exampleFormControlInput1">Email:</label>
                        <input type="email" name="email"  class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        
                        <label for="exampleInputEmail1">Genre:</label>
                        <input type="text"  name="genre" class="form-control "  value="<?=$row['SEXE_DN']?>" readonly>
                      </div>
                  </div>
                  <div class="col-12 col-md-4">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Situation matrimoniale:</label>
                          <input type="text" name="smatri" class="form-control "  placeholder="Situation matri">
                          
                          <label for="exampleInputEmail1">Taille:</label>
                          <input type="text" name="taille" class="form-control"  placeholder="Taille">
                          
                          <label for="exampleInputEmail1">Teint:</label>
                          <input type="text" name="teint" class="form-control "  placeholder="Teint">
                          
                          <label for="exampleInputEmail1">Cheveux:</label>
                          <input type="text" name="chev" class="form-control "  placeholder="Cheveux">
                          
                          <label for="exampleInputEmail1">Yeux:</label>
                          <input type="text" name="yeux" class="form-control "  placeholder="Yeux">
                          
                          <label for="exampleInputEmail1">Signe particulier:</label>
                          <input type="text" name="sparti" class="form-control "  placeholder="Signe particulier">
                          
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" name="mdp" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" autocomplete="none">
                          
                          <label for="exampleInputEmail1">Numéro d'emprunt:</label>
                          <input type="text" name="nemp" class="form-control "  placeholder="Num emprunt">
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">NIN du citoyen: </label>
                  <input type="text" name="nin" class="form-control is-invalid "  placeholder="NIN citoyen" required>
              </div>
              <div class="row">
                  <div class="col-md-6 offset-5">
                      <button type="submit" class="btn btn-primary mb-2">Valider</button>
                  </div>
              </div>
          </form>
      </div>
      <!--Fin body-->
  </body>
</html>

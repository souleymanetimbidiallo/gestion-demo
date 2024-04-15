<?php
      session_start();
      include_once('../../fonctions.inc.php');

      $connexion = connexion();

      $id_responsable = $_SESSION['id_resp'];

      $nom_mort = securisation($_POST['nom_defunt']);
      $prenom_mort = securisation($_POST['prenom_defunt']);
      $nom_declarant = securisation($_POST['nom_declarant']);
      $prenom_declarant = securisation($_POST['prenom_declarant']);
      $tel = securisation($_POST['tel_declarant']);
      $type_mort = securisation($_POST['type_mort']);
      $date_mort = securisation($_POST['date_mort']);
      $lieu_mort = securisation($_POST['lieu_mort']);
      $lien_parente = securisation($_POST['lien_parente']);
  
      $requete = "INSERT INTO declarationdeces (id_responsable, nom_mort, prenom_mort, nom_dec, prenom_dec,
                  tel_dec, type_de_mort, date_de_mort, lieu_de_mort, lien_parente) 
                  VALUES (:responsable, :nom, :prenom, :nomd, :prenomd, :teld, :typem, :datem, :lieu, :lien)";
  
      $insertion = $connexion->prepare($requete);
      
      $insertion->bindParam(":responsable", $id_responsable);
      $insertion->bindParam(":nom", $nom_mort);
      $insertion->bindParam(":prenom", $prenom_mort);
      $insertion->bindParam(":nomd", $nom_declarant);
      $insertion->bindParam(":prenomd", $prenom_declarant);
      $insertion->bindParam(":teld", $tel);
      $insertion->bindParam(":typem", $type_mort);
      $insertion->bindParam(":datem", $date_mort);
      $insertion->bindParam(":lieu", $lieu_mort);
      $insertion->bindParam(":lien", $lien_parente);
      
      $insertion->execute();
      
      header('location: tableau_declaration_deces.php');
?>
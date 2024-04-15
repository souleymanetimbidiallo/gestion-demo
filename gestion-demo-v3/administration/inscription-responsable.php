<?php
    include_once('../fonctions.inc.php');
    
    $nom_resp = securisation($_POST['nom_resp']);
    $prenom_resp = securisation($_POST['prenom_resp']);
    $profession_resp = securisation($_POST['profession_resp']);
    $lieu_travail = securisation($_POST['lieu_travail']);
    $service_resp = securisation($_POST['service_resp']);
    $adresse_resp = securisation($_POST['adresse_resp']);
    $user_resp = securisation($_POST['user_resp']);
    $password_resp = securisation($_POST['password_resp']); //Sécuriser le mot de passe avec md5() ou sha1()
    $type_compte = securisation($_POST['type_compte']);
        
    $con = connexion();
    
    $requete = "INSERT INTO responsable (nom_resp, prenom_resp, profession_resp, lieu_travail, service_resp, adresse_resp, nom_utilisateur, mot_de_passe, type_compte)
                VALUES(:nom_resp, :prenom_resp, :profession_resp, :lieu_travail, :service_resp, :adresse_resp, :user_resp, :password_resp, :type_compte)";
    $insert = $con->prepare($requete);
    
    $insert->bindParam(":nom_resp", $nom_resp);
    $insert->bindParam(":prenom_resp", $prenom_resp);
    $insert->bindParam(":profession_resp", $profession_resp);
    $insert->bindParam(":lieu_travail", $lieu_travail);
    $insert->bindParam(":service_resp", $service_resp);
    $insert->bindParam(":adresse_resp", $adresse_resp);
    $insert->bindParam(":user_resp", $user_resp);
    $insert->bindParam(":password_resp", $nom_resp);
    $insert->bindParam(":type_compte", $type_compte);
    
    $insert->execute();

    header("Location: liste-responsable.php");
?>
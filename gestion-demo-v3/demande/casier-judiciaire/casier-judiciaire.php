<?php
    session_start();
    include_once("../../fonctions.inc.php");
    $con = connexion();
    
    $id_responsable = $_SESSION['id_resp']; //ne pas saisir

    $id_citoyen = $_POST['id_citoyen'];

    $adresse_tribunal = securisation($_POST['adresse_tribunal']);
    
    $type_casier = securisation($_POST['type_casier']);

    $date_confection_papier = securisation($_POST["date_confection_papier"]);

    $date_exp = securisation($_POST["date_exp"]);

    $reference = securisation($_POST["reference"]);

    $requete = "INSERT INTO casierjudiciaire (id_responsable, id_citoyen, referenceCasJud, adresse_tribunal, type_casierjud, date_conf_casier, date_exp_casier) 
                VALUES (:id_resp, :id_citoyen, :reference, :adresse, :type_casier, :date_confection_papier, :date_exp)";

    $requete = $con->prepare($requete);

    $requete->bindParam(':id_resp',$id_responsable);
    $requete->bindParam(':id_citoyen',$id_citoyen);
    $requete->bindParam(':reference', $reference);
    $requete->bindParam(":adresse", $adresse_tribunal);
    $requete->bindParam(":type_casier", $type_casier);
    $requete->bindParam(':date_confection_papier', $date_confection_papier);
    $requete->bindParam(':date_exp', $date_exp);
    
    $requete->execute();

    //echo "<script>alert('Insertion reussie avec succès');</script>";
    header('Location: tableau-casier-judiciaire.php');
?>
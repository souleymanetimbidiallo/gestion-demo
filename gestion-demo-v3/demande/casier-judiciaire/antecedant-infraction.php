<?php
    include_once("../../fonctions.inc.php");
    $con = connexion();
    
    $id_citoyen = $_POST['id_citoyen'];
    $id_responsable = $_POST['id_responsable'];
    $titre_inf = $_POST['titre_inf'];
    $description_inf = $_POST['description_inf'];
    $motif_inf = $_POST['motif_inf'];
    $degre_inf = $_POST['degre_inf'];
    $date_inf = $_POST['date_inf'];
    $lieu_inf = $_POST['lieu_inf'];

    $requete = "INSERT INTO antecedant_infraction (id_citoyen, id_responsable, titre_inf, description_inf, 
                motif_inf, degre_inf, date_inf, lieu_inf) 
                VALUES(:id_citoyen, :id_resp, :titre, :description_inf, :motif, :degre, :date_inf, :lieu)";
    
    $insertion = $con->prepare($requete);

    $insertion->bindParam(":id_citoyen", $id_citoyen);
    $insertion->bindParam(":id_resp", $id_responsable);
    $insertion->bindParam(":titre", $titre_inf);
    $insertion->bindParam(":description_inf", $description_inf);
    $insertion->bindParam(":motif", $motif_inf);
    $insertion->bindParam(":degre", $degre_inf);
    $insertion->bindParam(":date_inf", $date_inf);
    $insertion->bindParam(":lieu", $lieu_inf);

    $insertion->execute();
    header("location: affiche-antecedant-infraction.php");
    echo "<script>alert('Insertion reussie avec succès');</script>"

?>
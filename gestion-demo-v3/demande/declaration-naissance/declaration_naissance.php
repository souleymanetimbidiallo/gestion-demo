<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        include_once('../../fonctions.inc.php');

        $id_responsable = $_SESSION['id_resp'];
        
        $nom_mere=securisation($_POST["nom_mere"]);
        $prenom_mere=securisation($_POST["prenom_mere"]);
        $age_mere=securisation($_POST["age_mere"]);
        $profession=securisation($_POST["profession_mere"]);
        $domicile=securisation($_POST["domicile_mere"]);
        $heure_acc=securisation($_POST["heure_acc"]);
        $date_acc=securisation($_POST["date_acc"]);
        $adresse_hopital=securisation($_POST["adresse_hopital"]);
        $sexe_enfant=securisation($_POST["sexe_enfant"]);
        $etat_vie=securisation($_POST["etat_vie"]);

        $connexion = connexion();
        $requete = "INSERT INTO declarationnaissance(
                    NOM_MERE_DN,PRENOM_MERE_DN,AGE_MERE_DN,PROFESSION_MERE_DN, DOMICILE_MERE_DN,HEURE_ACC,DATE_ACC,ADRESSE_HOPITAL,SEXE_DN,
                    ETAT_VIE,id_responsable)
                    VALUES(:nom_mere,:prenom_mere,:age,:profession,:domicile,:heure,:date_acc,:adresse_hopital,:sexe,:etat_vie,:id_responsable)";
        $insertion = $connexion->prepare( $requete);

        $insertion->bindParam(':nom_mere',$nom_mere);
        $insertion->bindParam(':prenom_mere',$prenom_mere);
        $insertion->bindParam(':age',$age_mere);
        $insertion->bindParam(':profession',$profession);
        $insertion->bindParam(':domicile',$domicile);
        $insertion->bindParam(':heure',$heure_acc);
        $insertion->bindParam(':date_acc',$date_acc);
        $insertion->bindParam(':adresse_hopital',$adresse_hopital);
        $insertion->bindParam(':sexe',$sexe_enfant);
        $insertion->bindParam(':etat_vie',$etat_vie);
        $insertion->bindParam(':id_responsable',$id_responsable);

        $insertion->execute();
        echo "Insertion  effectuée avec succès";
    ?>
</body>
</html>
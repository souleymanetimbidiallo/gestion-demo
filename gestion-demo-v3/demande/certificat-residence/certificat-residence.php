<?php
    $server = "localhost"; $database = "gestiondemographique";
    $user = "root"; $password = "";
    try{
        $connexion = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $user, $password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Message d'erreur: ".$e->getMessage();
    }
    
    $id_responsable = $_POST['id_responsable'];
    $ville_res = $_POST['ville_res'];
    $quartier_res = $_POST['quartier_res'];
    $secteur_res = $_POST['secteur_res'];
    $num_rue = $_POST['num_rue'];
    $num_batiment = $_POST['num_batiment'];
    $date_arrivee = $_POST['date_arrivee'];
    $date_confection = $_POST['date_confection'];
    $date_expiration = $_POST['date_expiration'];
    $num_famille = $_POST['num_famille'];
    

    $requete = "INSERT INTO certificatresidence (id_responsable, ville_resi, quartier_resi, secteur_resi, num_rue_res, num_bat_res, date_arrivee, date_confection_certresi, date_expiration_certresi, num_famille_resi) 
                VALUES (:responsable, :ville_res, :quartier_res, :secteur_res, :num_rue, :num_batiment, :date_arrivee, :date_confection, :date_expiration, :num_famille)";
    

    $insertion = $connexion->prepare($requete);
    
    $insertion->bindParam(":responsable", $id_responsable);
    $insertion->bindParam(":ville_res", $ville_res);
    $insertion->bindParam(":quartier_res", $quartier_res);
    $insertion->bindParam(":secteur_res", $secteur_res);
    $insertion->bindParam(":num_rue", $num_rue);
    $insertion->bindParam(":num_batiment", $num_batiment);
    $insertion->bindParam(":date_arrivee", $date_arrivee);
    $insertion->bindParam(":date_confection", $date_confection);
    $insertion->bindParam(":date_expiration", $date_expiration);
    $insertion->bindParam(":num_famille", $num_famille);
    
    $insertion->execute();

    echo "<script>alert('Insertion reussie avec succès');</script>";
?>
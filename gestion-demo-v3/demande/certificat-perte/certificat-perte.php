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
    
    $nom_objet = $_POST['nom_objet'];

    $reference = $_POST['reference'];
    
    $date_perte = $_POST['date_perte'];

    $requete = "INSERT INTO certificat_perte (id_responsable, nom_objet, reference, date_perte) 
                VALUES (:responsable, :nom_objet, :reference, :date_perte)";

    $insertion = $connexion->prepare($requete);
    
    $insertion->bindParam(":responsable", $id_responsable);
    $insertion->bindParam(":nom_objet", $nom_objet);
    $insertion->bindParam(":reference", $reference);
    $insertion->bindParam(":date_perte", $date_perte);
    
    $insertion->execute();

    echo "<script>alert('Insertion reussie avec succès');</script>";
?>
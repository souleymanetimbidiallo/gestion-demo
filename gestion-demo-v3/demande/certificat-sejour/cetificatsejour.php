<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
    <h1>Certificat de sejour </h1>
    <form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="application/x-www-form-urlencoded">
        <section class="control">
        <div class="form-group">
                <label> ID_RESPONSABLE :</label>
                <input type="number" name="id_resp" value="1">
            </div>
            <div class="form-group">
                <label> Nationalité :</label>
                <input type="texte" name="nationalite">
            </div>
            <div class="form-group">
                <label> Numero du Passeport :</label>
                <input type="number" name="numpp">
            </div>
            <div class="form-group">
                <label>Durée du visa : </label>
                <input type="number" name="duree">
            </div>
            <div class="form-group inline">
                <label>Provenance : </label>
                <input type="texte" name="provenance">
            </div>
            <div class="form-group">
                <label>Destination : </label>
                <input type="texte" name="destination">
            </div>
            <div class="form-group">
                <label>Date de confection : </label>
                <input type="date" name="dateconfection">
            </div>
            <div class="form-group">
                <label>Type de séjour : </label>
                <input type="texte" name="typesejour">
            </div>
        </section>
        <div style="padding-bottom:5px;"> <button type="reset" name="btn1" value="Effacer" class="btn btn-danger">Effacer</button>
        <button type="submit" name="btn1" value="Envoyer" class="btn btn-success">Envoyer</button></div>
    </form>
    
    <script src="js/fontawesome-all.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <?php   
//Enregistrements des informations dans la base de donnees 
        include_once('connecterPDO.inc.php');
        $idcom=connexion('gestiondemographique','parametre');
            //Verifier si tous les champs sont saisis 
        if(!empty($_POST['nationalite']) &&!empty($_POST['numpp']) && !empty($_POST['duree']) && !empty($_POST['provenance']) && !empty($_POST['destination']) && !empty($_POST['dateconfection']) && !empty($_POST['typesejour'])){
            $id="\N";
            $id_res=$idcom->quote($_POST['id_resp']);
            $nationalite=$idcom->quote($_POST['nationalite']);
            $numpp=$idcom->quote($_POST['numpp']);
            $duree=$idcom->quote($_POST['duree']);
            $provenance=$idcom->quote($_POST['provenance']);
            $destination=$idcom->quote($_POST['destination']);
            $dateconfection=$idcom->quote($_POST['dateconfection']);
            $typesejour=$idcom->quote($_POST['typesejour']);

                //Requete d'insertions des informations saisies dans le formulaire
            $sql="INSERT INTO certificatsejour(ID_RESPONSABLE, NATIONALITE_SEJOUR, NUM_PS_SEJOUR, DUREE_VISA, PROVENANCE, DESTINATION, DATE_CONFECTION_SEJOUR, TYPE_CERTSEJOUR)
                VALUES($id_res,$nationalite,$numpp,$duree,$provenance,$destination,$dateconfection,$typesejour)";
            $nblignes=$idcom->exec($sql);
            if($nblignes!=1){
                $mes_erreurs=$idcom->errorInfo();
                echo 'Insertion impossible, code:'.$idcom->errorCode().$mes_erreurs[2];
                echo "<script language=\"javascript\"> alert('Erreur: ".$idcom->errorCode()."')</script>";
            }else{
                echo "<script language=\"javascript\"> alert('Un certificat de sejour a été bien enregistré, identifiant:".$idcom->lastInsertID()."');</script>";
                $idcom=null;
            }
            
        }else{
            echo "<h3 class='text-danger block text-center'>Formulaire à compléter!</h3>";
        }
?>  
</body>
</html>
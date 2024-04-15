<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Certificat de décès</title>
</head>
<body>
       <?php 
              include_once('../../fonctions.inc.php');
              $con = connexion();
              $id = $_GET['id'];

              $requet='SELECT * FROM declarationdeces WHERE ID_DECLARATION_DECES = :ID_DECLARATION_DECES';    
              $result=$con->prepare($requet);
              $result->bindParam(':ID_DECLARATION_DECES',$id);
              $result->execute();

              $ligne=$result->fetch();
       ?>
       <div class="container-fluid col-lg-6">
       <h3 class="text-center mt-3">Certificat de décès</h3>
              <form action="certificatdeces.php" method="POST" >      
                     <div class="form-group">
                            <label for="ID_DECLARATION_DECES">ID déclaration décès</label>  
                            <input type="text" name="ID_DECLARATION_DECES" value="<?php echo $ligne['ID_DECLARATION_DECES']; ?>" class="form-control">             
                     </div>
                     <div class="form-group">
                            <label for="ID_RESPONSSABLE">ID du responsable</label> 
                            <input type="text" name="ID_RESPONSSABLE" value="<?php echo $ligne['ID_RESPONSABLE']; ?>" class="form-control" readol>       
                     </div>
                     <div class="form-group">
                            <label for="TYPE_MORT">Type de mort</label> 
                            <input type="text" name="TYPE_MORT" value="<?php echo $ligne['TYPE_DE_MORT']; ?>" class="form-control">   
                     </div>
                     <div class="form-group">
                            <label for="DATE_ENTRE_HOPI">Date d'entrée à l'hopital</label> 
                            <input type="date" name="DATE_ENTRE_HOPI" value="" class="form-control">
                     </div>
                     <div class="form-group">
                            <label for="LIEU_NAISS">Date de livraison du corps</label> 
                            <input type="date" name="DATE_LIVRAISON_CORPS" valuer="" class="form-control">
                     </div>
                     <div class="form-group">
                            <label for="ADRESSE_HOPI_CD">Adresse de l'hopital</label> 
                            <input type="text" name="ADRESSE_HOPI_CD" value="" class="form-control">
                     </div>
                     <div class="form-group">
                            <button type="submit" class="btn btn-primary">Envoyer</button>                    
                      </div>
 </form>

</div>
    
</body>
</html>
<?php
    //CONNEXION DANS LA BASE DE DONNEE
    include_once("../fonctions.inc.php");
    $db = connexion();

    $num_dec = securisation($_POST['num_dec']);
    $nom = securisation($_POST['nom']);            
    $prenom = securisation($_POST['prenom']);
    $datenais = securisation($_POST['datenais']);
    $ville_naiss = securisation($_POST['ville_naiss']);
    $lieu_naiss = securisation($_POST['lieu_naiss']);      
    $nmere = securisation($_POST['nmere']);
    $pmere = securisation($_POST['pmere']);        
    $promere = securisation($_POST['promere']);
    $amere = securisation($_POST['amere']);        
    $npere = securisation($_POST['npere']);
    $ppere = securisation($_POST['ppere']);        
    $propere = securisation($_POST['propere']);
    $apere = securisation($_POST['apere']);
    $genre = securisation($_POST['genre']);      
    $mdp = securisation($_POST['mdp']);          
    $nin = securisation($_POST['nin']);
    
    //REQUETE PREPARER
    if(isset($_POST['nom']) AND !empty($_POST['nom'])){
      $rec=$db->prepare('INSERT INTO citoyen (ID_DECNAISS,NOM,PRENOMS,DATE_NAISS,VILLE_NAISS, LIEU_NAISS, NOM_MERE,PRENOM_MERE,
                          PROFESSION_MERE,ADRESSE_MERE,NOM_PERE,PRENOM_PERE,PROFESSION_PERE,ADRESSE_PERE,
                          GENRE,MOT_PASSE,NIN_CITOYEN)
                          VALUES(:num_dec,:nom,:prenom,:datenais,:ville_naiss,:lieu_naiss,:nmere,:pmere,:promere,:amere,:npere,:ppere,
                          :propere,:apere,:genre,:mdp,:nin)');
      $rec->execute(array(
            ':num_dec'=>$num_dec,
            ':nom'=>$nom,           
            ':prenom'=>$prenom,
            ':datenais'=>$datenais,
            ':ville_naiss'=>$ville_naiss,
            ':lieu_naiss'=>$lieu_naiss,        
            ':nmere'=>$nmere,
            ':pmere'=>$pmere,        
            ':promere'=>$promere,
            ':amere'=>$amere,        
            ':npere'=>$npere,
            ':ppere'=>$ppere,        
            ':propere'=>$propere,
            ':apere'=>$apere,
            ':genre'=>$genre,      
            ':mdp'=>$mdp,        
            ':nin'=>$nin
            ));
  }
  header('Location: liste-citoyens.php');
 ?>

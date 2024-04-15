<?php
    //CONNEXION DANS LA BASE DE DONNEE
    include_once("../fonctions.inc.php");
    $db = connexion();

    $num_dec = securisation($_POST['num_dec']);
    $nom = securisation($_POST['nom']);            
    $prenom = securisation($_POST['prenom']);
    $datenais = securisation($_POST['datenais']);  
    $domi = securisation($_POST['domi']);
    $pro = securisation($_POST['pro']);            
    $nmere = securisation($_POST['nmere']);
    $pmere = securisation($_POST['pmere']);        
    $promere = securisation($_POST['promere']);
    $amere = securisation($_POST['amere']);        
    $npere = securisation($_POST['npere']);
    $ppere = securisation($_POST['ppere']);        
    $propere = securisation($_POST['propere']);
    $apere = securisation($_POST['apere']);
    $tel = securisation($_POST['tel']);            
    $email = securisation($_POST['email']);
    $genre = securisation($_POST['genre']);        
    $smatri = securisation($_POST['smatri']);
    $taille = securisation($_POST['taille']);      
    $teint = securisation($_POST['teint']);
    $chev = securisation($_POST['chev']);          
    $yeux = securisation($_POST['yeux']);
    $sparti = securisation($_POST['sparti']);      
    $mdp = securisation($_POST['mdp']);
    $nemp = securisation($_POST['nemp']);          
    $nin = securisation($_POST['nin']);
    
    //REQUETE PREPARER
    if(isset($_POST['nom']) AND !empty($_POST['nom'])){
      $rec=$db->prepare('INSERT INTO citoyen (ID_DECNAISS,NOM,PRENOMS,DATE_NAISS,DOMICILE,PROFESSION,NOM_MERE,PRENOM_MERE,
                          PROFESSION_MERE,ADRESSE_MERE,NOM_PERE,PRENOM_PERE,PROFESSION_PERE,ADRESSE_PERE,
                          TEL,EMAIL,GENRE,SITUATION_MATRIMONIALE,TAILLE,TEINT,CHEVEUX,YEUX,
                          SIGNE_PARTICULIER,MOT_PASSE,NUM_EMPRUNT,NIN_CITOYEN)

                          VALUES(:num_dec,:nom,:prenom,:datenais,:domi,:pro,:nmere,:pmere,:promere,:amere,:npere,:ppere,
                          :propere,:apere,:tel,:email,:genre,:smatri,:taille,:teint,:chev,:yeux,:sparti,:mdp,:nemp,:nin)');
      $rec->execute(array(
            ':num_dec'=>$num_dec,
            ':nom'=> =$nom,           
            ':prenom'=>$prenom,
            ':datenais'=>$datenais,  
            ':domi'=>$domi,
            ':pro'=>$pro,            
            ':nmere'=>$nmere,
            ':pmere'=>$pmere,        
            ':promere'=>$promere,
            ':amere'=>$amere,        
            ':npere'=>$npere,
            ':ppere'=>$ppere,        
            ':propere'=>$propere,
            ':apere'=>$apere,
            ':tel'=>$tel,            
            ':email'=>$email,
            ':genre'=>$genre,        
            ':smatri'=>$smatri,
            ':taille'=>$taille,      
            ':teint'=>$teint,
            ':chev'=>$chev,          
            ':yeux'=>$yeux,
            ':sparti'=>$sparti,      
            ':mdp'=>$mdp,
            ':nemp'=>$nemp,          
            ':nin'=>$nin
            ));
  }
  header('Location: liste-citoyens.php');
 ?>

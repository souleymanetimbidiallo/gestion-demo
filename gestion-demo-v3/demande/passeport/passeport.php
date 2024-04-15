<?php
    require('connect.php');
    
    function securiser($donnees){
     $donnees=stripslashes($donnees);
     $donnees=strip_tags($donnees);
     $donnees=trim($donnees);
     return $donnees;
    }

    $id_responsable=$_POST['ID_RESPONSABLE'];
    $type_confection=$_POST['TYPE_CONFECTION'];
    $type_passeport=$_POST['TYPE_PASSEPORT'];
    $numero_recepisse=$_POST['NUMERO_RECEPISSE'];
    $date_payement=$_POST['DATE_PAYEMENT'];
    $photo_passeport=$_POST['PHOTO_PASSEPORT'];
    $date_confection_ps=$_POST['DATE_CONFECTION_PS'];
    $date_expiration_ps=$_POST['DATE_EXPIRATION_PS'];
    $libelle=$_POST['libelle'];


    securiser($id_responsable);
    securiser($type_confection);
    securiser($type_passeport);
    securiser($numero_recepisse);
    securiser($date_payement);
    securiser($photo_passeport);
    securiser($date_confection_ps);
    securiser($date_expiration_ps);
    securiser($libelle);
    if(isset($id_responsable) and isset($type_confection) and isset($type_passeport) and isset($numero_recepisse) and isset($date_payement) and isset($photo_passeport) and isset($date_confection_ps) and isset($date_expiration_ps) and isset($libelle))
    {
        if(!(empty($id_responsable)) and !(empty($type_confection)) and !(empty($type_passeport)) and !(empty($numero_recepisse)) and !(empty($date_payement)) and !(empty($photo_passeport)) and !(empty($date_confection_ps)) and !(empty($date_expiration_ps)) and !(empty($libelle)))
        {
            $req='INSERT INTO Gestion_demo.passeport(ID_RESPONSABLE,TYPE_CONFECTION,TYPE_PASSEPORT,NUMERO_RECEPISSE,DATE_PAYEMENT,PHOTO_PASSEPORT,DATE_CONFECTION_PS,DATE_EXPIRATION_PS,libelle) 
            VALUES (:id_responsable,:type_confection,:type_passeport,:numero_recepisse,:date_payement,:photo_passeport,:date_confection_ps,:date_expiration_ps,:libelle)';
            $envoie=$connexion->prepare($req);
            $envoie->execute(array(
                'id_responsable'=>$id_responsable,
                'type_confection'=>$type_confection,
                'type_passeport'=>$type_passeport,
                'numero_recepisse'=>$numero_recepisse,
                'date_payement'=>$date_payement,
                'photo_passeport'=>$photo_passeport,
                'date_confection_ps'=>$date_confection_ps,
                'date_expiration_ps'=>$date_expiration_ps,
                'libelle'=>$libelle
            ));
        }
    }

   



?>
<?php

    function connexion(){
        $server = "localhost";
        $login = "root";
        $pass="";
        
        try{
            $con = new PDO("mysql:host=$server;dbname=gestiondemographique;charset=utf8", $login, $pass);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        }catch(PDOException $e){
            echo "Erreur liée à : ".$e->getMessage();
            return false;
            exit();
        }
    }
    
    function securisation($donnees)
    {
        $donnees = htmlspecialchars($donnees);
        $donnees = strip_tags($donnees);
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        return $donnees;
    }

    //Recuperer l'identifiant du responsable d'un papier
    function recupIdResponsable($papier){
        $con = connexion();
        $sql = "SELECT id_responsable 
                FROM responsable 
                WHERE service_resp = '$papier' AND type_compte = 1";

        $rows = $con->query($sql);
        $row = $rows->fetch();
        $id_resp = $row['id_responsable'];
        return $id_resp;
    }

    //Recuperer l'identifiant de la demande d'un papier
    function recupIdDemande($id_resp, $id_citoyen){
        $con = connexion();
        $sql = "SELECT id_demande 
                FROM demande 
                WHERE (date_rdv1 is not null) and (date_rdv2 is not null) and (date_rdv3 is not null)
                AND id_citoyen = $id_citoyen AND id_responsable = $id_resp
                ORDER BY id_demande DESC LIMIT 1";

        $rows = $con->query($sql);
        $row = $rows->fetch();
        $id_dem = $row['id_demande'];
        return $id_dem;
    }    

    //Enregistrer une demande
    function envoiDemande($id_resp, $id_citoyen, $motif){
        $con = connexion();
        
        $requete = "INSERT INTO demande (id_responsable, id_citoyen, motif, date_demande) 
                    VALUES (:id_resp, :id_citoyen, :motif, NOW())";
        
        $rows = $con->prepare($requete);
        $rows->execute(array(
            ':motif' => $motif,
            ':id_resp' => $id_resp,
            ':id_citoyen' => $id_citoyen    
        ));
    }

    //Verifier que les dates ont été saisies par le responsable
    function verifierDate($id_resp, $id_citoyen){
        $con = connexion();
        $requete = "SELECT * 
                    FROM demande 
                    WHERE (date_rdv1 is not null) and (date_rdv2 is not null) and (date_rdv3 is not null)
                    and date_valider is null 
                    AND id_citoyen = $id_citoyen AND id_responsable = $id_resp";
  
        $resultat = $con->query($requete);
        return $resultat;
    }
    
    //Valider la date de rendez-vous:
    function validerDate($date_valide, $id_resp, $id_citoyen){
        $con = connexion();
        $requete = "UPDATE demande 
                    SET date_valider = STR_TO_DATE('$date_valide', '%Y-%m-%d'), etat_traitement='Traitée' 
                    WHERE id_citoyen = $id_citoyen AND id_responsable = $id_resp";
        $rowUpdate = $con->exec($requete);
    }

    //Recuperation des informations par rapport à un papier
    function recupInformations($papier){
        $con = connexion();
        $requete = "SELECT cit.id_citoyen, cit.nom, cit.prenoms, dem.id_demande, dem.motif, 
                    date_format(dem.date_demande, '%d/%m/%Y') as date_demande, 
                    date_format(dem.date_rdv1, '%d/%m/%Y') as date_rdv1, 
                    date_format(dem.date_rdv2, '%d/%m/%Y') as date_rdv2, 
                    date_format(dem.date_rdv3, '%d/%m/%Y') as date_rdv3, 
                    date_format(dem.date_valider, '%d/%m/%Y') as date_valider, 
                    dem.etat_traitement, resp.service_resp
                    FROM demande dem, citoyen cit, responsable resp 
                    WHERE cit.id_citoyen = dem.id_citoyen  AND resp.id_responsable = dem.id_responsable 
                    AND service_resp = '$papier'";
        $rows=$con->query($requete);
        return $rows;
    }

    //Verifier si un papier existe

    function ExistePapier($titrePapier, $id_citoyen){
        $con = connexion();
        $sql = " SELECT id_citoyen FROM $titrePapier WHERE id_citoyen = $id_citoyen";
        $row = $con->query($sql);
        $rows = $row->fetch();
        $nb = $row->rowCount();
        return $nb;
    }

    //Verifier la validite d'un papier

    function ValidePapier($titrePapier,$nomColonne, $id_citoyen){
        $con = connexion();
        $sql = "SELECT $nomColonne FROM $titrePapier WHERE id_citoyen = '$id_citoyen'";
        $row = $con->query($sql);
        $rows = $row->fetch();
        $dateEX = $rows[$nomColonne];
        $dateJR = date('Y-m-d');
        if($dateEX>=$dateJR){
            return true;
        }else{
            return false;
        }
    }
    
    //Verifier l'etat de declaration de perte d'un papier

    function PertePapier($id_citoyen,$numRef){
        $con = connexion();
        $sql = "SELECT * FROM certificat_perte WHERE REFERENCE ='$numRef' and id_citoyen='$id_citoyen'";
        $row = $con->query($sql);
        $rows = $row->fetch();
        if($rows['REFERENCE']){
            return true;
        }else{
            return false;
        }
    }

    //Verifie les conditions de la demande et la valide si elles sont toutes remplies

    function EtatDemande($id_resp, $id_citoyen, $titrePapier, $motif, $etat, $numRef = "", $nomColonne = ""){
        $con = connexion();
        
        // Existance du papier
        $existe = ExistePapier($titrePapier, $id_citoyen);
        
        // Validité du papier
        $valide = true; // Default to true if no column name is provided
        if(!empty($nomColonne)){
            $valide = ValidePapier($titrePapier, $nomColonne, $id_citoyen);
        }
        
        // Etat de perte du papier
        $perdu = PertePapier($id_citoyen, $numRef);
    
        if(!$existe && $etat == 1){
            envoiDemande($id_resp, $id_citoyen, $motif);
            $message = "Premiere demande prise en compte";
        } elseif($existe && $etat != 1){
            if($etat == 3 && !$valide){
                envoiDemande($id_resp, $id_citoyen, $motif);
                $message = "Demande de renouvellement prise en compte";
            } elseif($etat == 3 && $valide){
                $message = "Demande de renouvellement non prise en compte";
            } elseif($etat == 2 && $perdu && $valide){
                envoiDemande($id_resp, $id_citoyen, $motif);
                $message = "Demande de duplicata prise en compte";
            } else {
                $message = "Contactez la police pour une declaration de perte!";
                //exit();
            }
        } else {
            switch($titrePapier){
                case 'actenaissance':
                    $message = "Vous avez déjà une copie de ce papier!<br>Veuillez le dupliquer";
                    break;
                case 'carteidentite':
                case 'casierjudiciaire':
                    $message = "Vous avez déjà une copie de ce papier!<br>Veuillez le dupliquer ou renouveller";
                    break;
                default:
                    $message = "Document non reconnu!";
                    break;
            }
        }
        return $message;
    }
    

    //Recuperer l'identifiant d'un citoyen à travers son nin
    function RecupererIdParNin($nin_citoyen){
        $con = connexion();
        $requete = "SELECT * FROM citoyen WHERE nin_citoyen = '$nin_citoyen'";
        $rows = $con->query($requete);
        $row = $rows->fetch();
        return $row['ID_CITOYEN'];
    }
    
?>
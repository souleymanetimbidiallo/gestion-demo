<?php
    session_start();
    include_once("../../fonctions.inc.php");
    $con = connexion();
    
    $ID_DECLARATION_DECES = $_POST['ID_DECLARATION_DECES'];

    $ID_RESPONSABLE = $_SESSION['id_resp'];

    $TYPE_MORT = securisation($_POST['TYPE_MORT']);

    $DATE_ENTRE_HOPI = securisation($_POST['DATE_ENTRE_HOPI']);

    $DATE_LIVRAISON_CORPS = securisation($_POST['DATE_LIVRAISON_CORPS']);

    $ADRESSE_HOPI_CD = securisation($_POST['ADRESSE_HOPI_CD']);
 
    $requete = 'INSERT INTO certificatdeces (ID_RESPONSABLE, TYPE_MORT, DATE_ENTREE_HOPI, DATE_LIVRAISON_CORPS, ADRESSE_HOPI_CD, ID_DECLARATION_DECE)
                VALUES(:ID_RESPONSABLE, :TYPE_MORT, :DATE_ENTREE_HOPI, :DATE_LIVRAISON_CORPS, :ADRESSE_HOPI_CD, :ID_DECLARATION_DECE)';
    
    $result=$con->prepare($requete);
    
    $result->bindparam(':ID_RESPONSABLE',$ID_RESPONSABLE);
    $result->bindparam(':TYPE_MORT',$TYPE_MORT);
    $result->bindparam(':DATE_ENTREE_HOPI',$DATE_ENTRE_HOPI);
    $result->bindparam(':DATE_LIVRAISON_CORPS',$DATE_LIVRAISON_CORPS);
    $result->bindparam(':ADRESSE_HOPI_CD',$ADRESSE_HOPI_CD);
    $result->bindparam(':ID_DECLARATION_DECE',$ID_DECLARATION_DECES);
    
    $result->execute();

?>
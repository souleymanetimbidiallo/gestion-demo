
<?php
    session_start();
    include_once('../../fonctions.inc.php');
    
    $ID_RESPONSABLE = $_SESSION['id_resp'];
    $ID_CITOYEN = securisation($_POST['ID_CITOYEN']);
    $REFERENCE = securisation($_POST['reference']);
    $RANG_NAISS = securisation($_POST['RANG_NAISS']);
    $NATIONALITE_NAISS = securisation($_POST['NATIONALITE_NAISS']);
    $DATEDECL_AN = securisation($_POST['DATEDECL_AN']);
        
    $con = connexion();
    
    $requete = "INSERT INTO actenaissance (ID_RESPONSABLE, ID_CITOYEN, referenceAnaiss, RANG_NAISS, NATIONALITE_NAISS, DATEDECL_AN)
                VALUES(:ID_RESPONSABLE, :ID_CITOYEN, :reference, :RANG_NAISS, :NATIONALITE_NAISS, :DATEDECL_AN)";
    $insert = $con->prepare($requete);
    
    $insert->bindparam("ID_CITOYEN",$ID_CITOYEN);
    $insert->bindparam("ID_RESPONSABLE",$ID_RESPONSABLE);
    $insert->bindparam("reference", $REFERENCE);
    $insert->bindparam(":RANG_NAISS",$RANG_NAISS);
    $insert->bindparam(":NATIONALITE_NAISS", $NATIONALITE_NAISS);
    $insert->bindparam(":DATEDECL_AN",$DATEDECL_AN);
    $insert->execute();

    header("Location: tableau-acte-naissance.php");
?>

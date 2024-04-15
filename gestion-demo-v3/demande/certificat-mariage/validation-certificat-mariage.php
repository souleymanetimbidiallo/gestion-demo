<?php
    session_start();
    include_once("../../fonctions.inc.php");
    $con = connexion();

    $ville_mar = securisation($_POST['ville']);
    $commune_mar = securisation($_POST['commune']);
    $date_dec_mar = securisation($_POST['jourDeclaration']);
    $date_mariage = securisation($_POST['dateMariage']);
    //$reference = securisation($_POST['reference']);
    $dot = securisation($_POST['dot']);
    $etat_bien = securisation($_POST['etat_bien']);
    

    $id_resp = $_SESSION['id_resp'];

    //Recuperer les informations de l'epoux
    $nin_epoux = securisation($_POST['ninEpoux']);
    $id_epoux = RecupererIdParNin($nin_epoux);
    $degre_epoux = securisation($_POST['DegreInstructionEpoux']);
    $domicile_epoux = securisation($_POST['DomicileParentsEpoux']);

    //Recuperer les informations de l'epouse
    $nin_epouse = securisation($_POST['ninEpouse']);
    $id_epouse = RecupererIdParNin($nin_epouse);
    $degre_epouse = securisation($_POST['DegreInstructionEpouse']);
    $domicile_epouse = securisation($_POST['DomicileParentsEpouse']);

    //Recuperer les informations du temoin 1
    $nin_tem1 = securisation($_POST['ninTem1']);
    $id_tem1 = RecupererIdParNin($nin_tem1);

    //Recuperer les informations du temoin 2
    $nin_tem2 = securisation($_POST['ninTem2']);
    $id_tem2 = RecupererIdParNin($nin_tem2);


    
    //Insertion d'un certificat de mariage
    $sql = "INSERT INTO certificatmariage(ID_RESPONSABLE, ID_CITOYEN, DEGRE_INSTRUCTION_EPOUX, DOMICILE_PARENT_EPOUX, 
            ID_EPOUSE, DEGRE_INSTRUCTION_EPOUSE, DOMICILE_PARENT_EPOUSE, ID_TEMOIN1, ID_TEMOIN2, 
            VILLE_MAR, COMMUNE_MAR, DATE_MAR, DATEDEC_MAR, DOT, ETAT_BIEN_MAR)
            VALUES(:id_resp, :id_epoux, :degre_epoux, :domicile_epoux, :id_epouse, :degre_epouse, :domicile_epouse,
            :id_tem1, :id_tem2, :ville_mar, :commune_mar, :date_mariage, :date_dec_mar, :dot, :etat_bien)";
    
    $requete = $con->prepare($sql);

    $requete->bindParam(':id_resp', $id_resp);
    $requete->bindParam(':id_epoux', $id_epoux);
    $requete->bindParam(':degre_epoux', $degre_epoux);
    $requete->bindParam(':domicile_epoux', $domicile_epoux);
    $requete->bindParam(':id_epouse', $id_epouse);
    $requete->bindParam(':degre_epouse', $degre_epouse);
    $requete->bindParam(':domicile_epouse', $domicile_epouse);
    $requete->bindParam(':id_tem1', $id_tem1);
    $requete->bindParam(':id_tem2', $id_tem2);
    $requete->bindParam(':ville_mar', $ville_mar);
    $requete->bindParam(':commune_mar', $commune_mar);
    $requete->bindParam(':date_mariage', $date_mariage);
    $requete->bindParam(':date_dec_mar', $date_dec_mar);
    $requete->bindParam(':dot', $dot);
    $requete->bindParam(':etat_bien', $etat_bien);

    $requete->execute();
    
    
    header("Location: tableau_acte_mariage.php");
?>
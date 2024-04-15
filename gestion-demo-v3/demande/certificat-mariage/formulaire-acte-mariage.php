<?php
    session_start();
    include_once("../../fonctions.inc.php");
    $con = connexion();

    //Recuperer les informations du responsable
    $id_resp = $_SESSION['id_resp'];
    $requete1 = "SELECT * FROM responsable WHERE id_responsable = '$id_resp'";
    $rows = $con->query($requete1);
    $row_resp = $rows->fetch();

    //Recuperer les informations de l'époux
    $id_epoux = $_GET['id'];
    $requete2 = "SELECT * FROM citoyen WHERE id_citoyen = '$id_epoux'";
    $rows = $con->query($requete2);
    $row_cit = $rows->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificat de mariage</title>
    <link rel="stylesheet" href="../../css/MaterialDesign-Webfont-master/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="extrait.css">
    <style>
        #div
        {
            display: table;
            margin: 0 auto;
        }
        #div a{
            margin-right: 0.4em;
        }
        .home{
          position: fixed;
          top: 28em;
          right: 2em;
        }
    </style>
</head>
<body>
    <a href="#" class="btn btn-primary home">Début</a>
    <div class="" id="div">
        <h3 class="h3 text-center"><b>EXTRAIT D'ACTE DE MARIAGE</b></h3>
        <a href="#mar"><button class="btn btn-primary">Information mariage</button></a>
        <a href="#epo"><button class="btn btn-primary">Information sur l'époux</button></a>
        <a href="#eps"><button class="btn btn-primary">Information sur l'épouse</button></a>
        <a href="#tem"><button class="btn btn-primary">Information sur les témoins</button></a>
    </div>
    <div class="container-fluid col-lg-6 col-sm-12 col-md-12 mt-3">
        <section class="mt-3" >
            <form action="validation-certificat-mariage.php" method="POST">
                <div class="form-group" id="mar">
                    <input type="text" class="form-control" placeholder="Ville ou Prefecture" required="required" name="ville">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Commune/CRD de" required="required" name="commune">
                </div>
                <div class="form-group">
                    <label for="jourDeclaration">Date de déclaration du mariage</label>
                    <input type="date" class="form-control" required="required" name="jourDeclaration" id="jourDeclaration">
                </div>
                <div class="form-group">
                   <label for="dateMariage">Date du Mariage</label>
                    <input type="date" class="form-control" required="required" name="dateMariage">
                </div>
                <div class="form-group">
                    <p>Consentement requis</p>
                    <label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" value="Oui" name="consentement" checked="checked">OUI
                        </div>
                    </label>
                    <label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" value="NON" name="consentement">NON
                        </div>
                    </label>
                </div>
                <p class="text-primary mt-5">Informations sur l'officier de l'état civil</p>
                <div class="form-group">
                    <input type="text" class="form-control"  name="soussigne"  value="<?=$row_resp ['PRENOM_RESP'].' '.$row_resp ['NOM_RESP']?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="fonction"  value="<?=$row_resp ['PROFESSION_RESP']?>">
                </div>
                <div class="form-group">
                    <p class="text-warning">Certifie avoir uni par les liens du mariage conformément à la loi en vigueur</p>
                </div>

                <!--Informations de l'époux-->
                <p class="text-primary mt-5" id="epo">Informations de l'époux</p>
                <div class="form-group">
                    <input type="text" class="form-control" name="ninEpoux" value="<?=$row_cit['NIN_CITOYEN']?>" readonly>
                </div>
                 <div class="form-group">
                    <input type="text" class="form-control" name="prenomEpoux" readonly value="<?=$row_cit['PRENOMS']?>">
                 </div>
                 <div class="form-group">
                    <input type="text" class="form-control" name="nomEpoux" readonly value="<?=$row_cit['NOM']?>">
                 </div>
                 <div class="form-group">
                    <label for="dateNaissanceEpoux">Né le :</label>
                    <input type="date" class="form-control" name="dateNaissanceEpoux" readonly value="<?=$row_cit['DATE_NAISS']?>">
                 </div>
                 <div class="form-group">
                     <input type="text" class="form-control" name="professionEpoux" readonly value="<?=$row_cit['PROFESSION']?>">
                 </div>
                 <div class="form-group">
                     <input type="text" class="form-control" placeholder="Dégré d'instruction de l'epoux" name="DegreInstructionEpoux" required="required">
                 </div>
                 <div class="form-group">
                     <input type="text" class="form-control" placeholder="Domicile des Parents epoux" name="DomicileParentsEpoux" required="required">
                 </div>

                 <!--Informations de l'époux-->
                 <p class="text-primary mt-5" id="eps">Informations de l'épouse</p>
                 <div class="form-group" >
                    <input type="text" class="form-control" placeholder="Identifiant de l'épouse" required="required" name="ninEpouse" id="ninEpouse">
                </div>
                <?php
                    //Utilisation d'ajax pour recharger les informations de l'epouse à travers son NIN
                ?>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Prénom(s) de l'epouse" name="prenomEpouse" id="prenomEpouse" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nom de l'epouse" name="nomEpouse" readonly>
                </div>
                <div class="form-group">
                    <label for="dateNaissanceEpouse">Né le :</label>
                    <input type="date" class="form-control" name="dateNaissanceEpouse" readonly>
                </div>
                 <div class="form-group">
                     <input type="text" class="form-control" placeholder="Profession Epouse" name="professionEpouse" readonly>
                 </div>
                 <div class="form-group">
                     <input type="text" class="form-control" placeholder="Dégré d'instruction de l'epouse" name="DegreInstructionEpouse" required="required">
                 </div>
                 <div class="form-group">
                     <input type="text" class="form-control" placeholder="Domicile des Parents de l'epouse" name="DomicileParentsEpouse" required="required">
                 </div>

                 <!-- Premier temoin-->
                 <p class="text-primary mt-5" id="tem">Premier Temoin</p>
                 <div class="form-group">
                     <input type="text" class="form-control" placeholder="Identifiant du témoin" required="required" name="ninTem1">
                 </div>
                 <div class="form-group">
                     <input type="text" class='form-control' placeholder="Nom du temoin" readonly name="nom_temoin">
                 </div>
                 <div class="form-group">
                     <input type="text" class='form-control' placeholder="Prenom du temoin"  name="prenom_temoin" readonly>
                 </div>


                <!-- second temoin-->
                 <p class="text-primary">Second Temoin</p>
                <div class="form-group">
                    <input type="text" class='form-control' placeholder="Identifiant du temoin" required name="ninTem2">
                </div>
                <div class="form-group">
                    <input type="text" class='form-control' placeholder="Nom du temoin"  name="nom_temoin2" readonly>
                </div>
                  <div class="form-group">
                     <input type="text" class='form-control' placeholder="Prenom du temoin" name="prenom_temoin2" readonly>
                 </div>

                 <p class="text-primary mt-3">Autres</p>
                <div class="form-group">
                    <input type="text" class='form-control' placeholder="Entrer la dot" name="dot">
                </div>
                <div class="form-group">
                    <p>Etat de biens</p>
                    <label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" value="commun" name="etat_bien" checked="checked">Biens communs
                        </div>
                    </label>
                    <label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" value="Separé" name="etat_bien">Biens separés
                        </div>
                    </label>
                </div>



                 <div class="form-group ">
                      <button class="btn btn-outline-success btn-block" type="submit" name="valider">Valider</button>
                </div>

            </form>
        </section>
    </div>
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            var ninEpouse = $('#ninEpouse');
            var prenom = $('#prenomEpouse');
            ninEpouse.on('blur', function(){
                prenom.val('Prénom');
            });
        });
    </script>
</body>
</html>

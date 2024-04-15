<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/MaterialDesign-Webfont-master/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
    <!--  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
    <link rel="stylesheet" href="css/ov.css">
    <link rel="stylesheet" href="css/demarcheadminist.css">
    <link rel="stylesheet" href="css/citoyen.css">

    <title>Démarche administrative</title>
  </head>
  
  <body>
    <!-- Div d'entete -->
    <?php include_once("header.php") ?>
    <!-- Fin div d'entete -->

    <div class="present divflex valign vcenter" style="background-image: url('images/best/gestion.jpg');">
      <h1 id="titre">DÉMARCHES ADMINISTRATIVES EN LIGNE</h1>
    </div>

    <iframe src="" width="" height="" id="ifram" name="framdemand">

    </iframe>

    <div class="card-columns" style="padding: 3em" id="conteneur">
      <div class="card bg-light">
        <div class="card-body text-center">
          <h4 class="card-title"> ACTE DE NAISSANCE</h4>
          <a href="demande/acte-naissance/envoi-demande.php" class="btn btn-primary" target="framdemand" onclick="hide()">Faire la demande</a>
        </div>
      </div>

      <div class="card bg-light">
        <div class="card-body text-center">
          <h4 class="card-title">PASSEPORT</h4>
          <a href="demande/passeport/demendepasseport.php" class="btn btn-primary" target="framdemand" onclick="passp()">Faire la demande</a>
        </div>
      </div>

      <div class="card bg-light">
        <div class="card-body text-center">
          <h4 class="card-title">CARTE D'IDENTITÉ</h4>
          <a href="demande/carte-identite/envoi-demande.php" class="btn btn-primary" target="framdemand" onclick="hide()">Faire la demande</a>
        </div>
      </div>

      <div class="card bg-light">
        <div class="card-body text-center">
          <h4 class="card-title">ACTE DE MARIAGE</h4>
          <a href="demande/certificat-mariage/demande-certificat-mariage.php" class="btn btn-primary" target="framdemand" onclick="hide()">Faire la demande</a>
        </div>
      </div>
      <div class="card bg-light">
        <div class="card-body text-center">
          <h4 class="card-title">ACTE DE DÉCÈS</h4>
          <a href="demande/certificat-deces/envoi-demande-CertDeces.php" class="btn btn-primary" target="framdemand" onclick="hide()">Faire la demande</a>
        </div>
      </div>

      <div class="card bg-light">
        <div class="card-body text-center">
          <h4 class="card-title">CASIER JUDICIAIRE</h4>
          <a href="demande/casier-judiciaire/demande-casier.php" class="btn btn-primary" target="framdemand" onclick="hide()">Faire la demande</a>
        </div>
      </div>

      <div class="card bg-light">
        <div class="card-body text-center">
          <h4 class="card-title">CERTIFICAT DE RESIDENCE</h4>
          <a href="demande/certificat-residence/demande-certificat-residence.php" class="btn btn-primary" target="framdemand" onclick="hide()">Faire la demande</a>
        </div>
      </div>

      <div class="card bg-light">
        <div class="card-body text-center">
          <h4 class="card-title">CERTIFICAT DE NATIONALITE</h4>
          <a href="demande/certificat-nationalite/demande-certificat-nationalite.php" class="btn btn-primary" target="framdemand" onclick="hide()">Faire la demande</a>
        </div>
      </div>

      <div class="card bg-light">
        <div class="card-body text-center">
          <h4 class="card-title">CERTIFICAT DE SEJOUR</h4>
          <a href="demande/certificat-sejour/demande-certificat-sejour.php" class="btn btn-primary" target="framdemand" onclick="hide()">Faire la demande</a>
        </div>
      </div>

      <div class="card bg-light">
        <div class="card-body text-center">
          <h4 class="card-title">CERTIFICAT DE PERTE</h4>
          <a href="demande/certificat-perte/demande-certificat-perte" class="btn btn-primary" target="framdemand" onclick="hide()">Faire la demande</a>
        </div>
      </div>
    </div>
    
    <!-- Début de pied-page -->
    <?php include_once("footer.php") ?>
    <!-- Fin de pied-page -->


    <script type="text/javascript">
        function hide(){
          document.getElementById("conteneur").style.display="none";
          document.getElementById("ifram").style.display="block";
        }

        function passp(){
          document.getElementById("titre").innerHTML = "DEMANDE DE PASSEPORT";
          hide();
        }
    </script>
  </body>
</html>

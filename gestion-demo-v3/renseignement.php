<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/MaterialDesign-Webfont-master/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ov.css">
    <link rel="stylesheet" href="css/citoyen.css">
    <link rel="stylesheet" href="css/renseignement.css">
    <title>Se renseigner</title>
  </head>
  <body>
    <!-- Div d'entete -->
    <?php include_once("header.php") ?>
    <!-- Fin div d'entete -->

    <div class="entete divflex hend hcenter vcenter">
        <input type="search" name="" value="" placeholder="Rechercher un document" class="form-control rech">
        <button class="btn  btn-primary"type="button" name="button"><i class="mdi mdi-search-web serchimg"></i></button>
    </div> <br>
    <div class="present divflex valign vcenter" style="background-image: url('images/best/gestion.jpg');height: 500px">
      <h1>LE PORTAIL DES COMMUNES</h1>
      <h1>SITE PRIVÉ INDÉPENDANT DE L'ADMINISTRATION GUINEENNE</h1>
      <p>Carte de Guinée interactive des sites Internet de l'administration en Guinée.</p>
      <p>Trouvez votre Conseil Régional, votre Conseil communal, ou votre Mairie.</p>
      <p>Une recherche simple et intuitive, en cliquant sur la carte de Guinée.</p>
      <button type="button" name="button" class="btn btn-warning">Chercher un lieu administratif <i class="mdi mdi-chevron-right-circle-outline"></i></button>
    </div>
    <div class="divflex halign hend" id="cdetail">
      <iframe src="" width="70em" height="" id="ifram" name="framrenseig"></iframe>
      <div class="bg-dark menuright" id="rightmenu">
        <ul>
          <li><a href="demande/acte-naissance/info-acte-naissance.html" target="framrenseig" onclick="hide()">ACTE DE NAISSANCE</a></li>
          <li><a href="#">CARTE D'IDENTITÉ</a></li>
          <li><a href="#">ACTE DE DÉCÈS</a></li>
          <li><a href="demande/passeport/infopassport.html" target="framrenseig" onclick="hide()">DEMANDE DE PASSEPORT</a></li>
          <li><a href="#">ACTE DE MARIAGE</a></li>
          <li><a href="#">CASIER JUDICIAIRE</a></li>
        </ul>
      </div>
    </div>

    <div class="card-columns" id="conteneur">
      <div class="card bg-light">
        <div class="card-body">
          <h4 class="card-title text-center"> ACTE DE NAISSANCE</h4>
          <p class="card-text">Un acte de naissance est un acte juridique authentique.
          Il est signé par un officier d'état civil, en mairie.
          Il atteste la naissance d'une personne. <br>

          Les informations principales
          inscrites sur l'acte de naissance sont : le nom, prénom, date et lieu
          de naissance. L'acte de naissance fait aussi l'objet de mentions marginales
          : mariage, divorce, décès…<br>

          Faîtes votre demande d'acte de naissance directement en ligne,
          sur <a href="#">service-guinee.gn</a>. Rapide et efficace, la demande d'acte de naissance
          en ligne vous évite de vous déplacer dans la mairie de votre ville de
          naissance. Vous pouvez demander une copie intégrale, un extrait avec
          filiation ou un extrait sans filiation.</p>
          <a href="demande/acte-naissance/info-acte-naissance.html" target="framrenseig" onclick="hide()" class="btn btn-primary">Plus de détails</a>
        </div>
      </div>
      <div class="card bg-light">
        <div class="card-body">
          <h4 class="card-title text-center"> DEMANDE DE PASSEPORT</h4>
          <p class="card-text">Vous avez besoin d'un passeport pour partir à l'étranger
          (vacances, voyage d'affaires, ...), en dehors de l'Afrique de l'Ouest ? Le passeport
          est en effet un document essentiel car il atteste de votre identité et votre
          nationalité. <br>
          Vous voulez commander un passeport ? Faire un renouvellement ?
          Faîtes votre pré-demande de passeport biométrique et de votre timbre fiscal
          électronique en ligne grâce au formulaire.</p>
          <a href="demande/passeport/infopassport.html" target="framrenseig" onclick="hide()" class="btn btn-primary">Plus de détails</a>
        </div>
      </div>
      
      <div class="card bg-light">
        <div class="card-body">
          <h4 class="card-title text-center">CARTE D'IDENTITÉ</h4>
          <p class="card-text">La carte nationale d'identité (CNI) est un document officiel
          d'identification des guinéens. Appelée aussi pièce d'identité ou papier
          d'identité, elle est délivrée à toute personne de faisant la demande.
          Il est fortement conseillé d'avoir toujours sa carte d'identité sur soi.
          <a href="#">service-guinee.gn</a> vous accompagne pour toutes vos démarches administratives
          concernant votre carte d'identité : 1<sup>ère</sup> demande, renouvellement, perte.
          Tous les documents à joindre à votre dossier de demande de carte d'identité
          ou renouvellement vous seront communiqués. Vous pouvez même acheter directement
          votre timbre fiscal en ligne pour votre dossier de carte d'identité.</p>
          <a href="#" class="btn btn-primary">Plus de détails</a>
        </div>
      </div>

      <div class="card bg-light">
        <div class="card-body">
          <h4 class="card-title">ACTE DE MARIAGE</h4>
          <p class="card-text text-center">L'acte de mariage prouve l'union entre 2 personnes, devenu époux.
          C'est un document authentique, signé par un officier d'état civil.
          Vous pouvez demander, pour votre acte de mariage, 3 documents différents :
          la copie intégrale, l'extrait avec filiation et l'extrait sans filiation.
          Pour obtenir facilement votre acte de mariage, sans vous déplacer,
          faîtes votre demande directement sur mairie.net, à l'aide de notre
          formulaire en ligne.</p>
          <a href="#" class="btn btn-primary">Plus de détails</a>
        </div>
      </div>

      <div class="card bg-light">
        <div class="card-body">
          <h4 class="card-title text-center">ACTE DE DÉCÈS</h4>
          <p class="card-text">L'acte de décès, comme l'acte de mariage et l'acte de naissance, est un acte juridique
          authentique. Il est établi par la mairie, à la mort de la personne. L'acte de décès, en plus des
          informations principales (nom, prénom, âge, profession, adresse du domicile), peut porter plusieurs
          mentions marginales comme par exemple la mention «Mort pour la Guinée ».
          La copie intégrale d'acte de décès peut être délivrée à toute personne qui en fait la demande.
          Pour obtenir votre acte de décès en ligne, il vous suffit de remplir le formulaire en ligne,
          directement sur le site service-guinee.gn. Pratique, cela vous évite de vous déplacer dans votre mairie
          pour demander l'acte de décès.</p>
          <a href="#" class="btn btn-primary">Plus de détails</a>
        </div>
      </div>

      <div class="card bg-light">
        <div class="card-body">
          <h4 class="card-title text-center">CASIER JUDICIAIRE</h4>
          <p class="card-text">Le casier judiciaire contient les condamnations pénales d'une personne.
          Il existe 3 bulletins, appelés Bulletin n°1, Bulletin n°2 et Bulletin n°3.
          On vous a demandé un extrait de casier judiciaire, pour un nouvel emploi par exemple ?
          Faîtes votre demande rapide et sécurisée en ligne sur service-guinee.gn. Vous recevrez par courrier,
          sous un délai de 15 jours en moyenne, un extrait de votre casier judiciaire.</p>
          <a href="#" class="btn btn-primary">Plus de détails</a>
        </div>
      </div>
    </div>

    <!-- Début de pied-page -->
    <?php include_once("footer.php") ?>
    <!-- Fin de pied-page -->

    <script type="text/javascript">
        function hide(){
          document.getElementById("conteneur").style.display="none";
          document.getElementById("rightmenu").style.display="block";
          document.getElementById("ifram").style.display="block";
          scroll(0,0);
        }
    </script>

  </body>
</html>

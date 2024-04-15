<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Accueil - Citoyen</title>
    <!-- insertin des Fichier externe -->
    <link rel="stylesheet" href="css/MaterialDesign-Webfont-master/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ov.css">
    <link rel="stylesheet" href="css/citoyen.css">
  </head>

  <body>
    <!-- Div d'entete -->
    <?php include_once("header.php") ?>
    <!-- Fin div d'entete -->

    <!-- Debut de la barre de recherche -->
    <div class="serc divflex valign vcenter hcenter">
      <h2>Connaître vos droits, effectuer vos démarches</h2>
      <div class="divflex halign vcenter hcenter">
        <input type="text" name="" value="" class="form-control inp" placeholder="Rechercher un élément" id="inpid">
        <button type="button" name="button" class="btn bout"><i class="mdi mdi-search-web serchimg"></i></button>
      </div>
    </div>
    <!-- Fin de la barre de recherche -->
    
    <!-- Début du div pour les slides -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="item1 actif divflex hend hcenter vcenter" style="background-image: url('images/best/slidpass.jpg')">
            <div class="detaiSlid">
              <h1 class="animated fadeInRight" style="color: yellow">Service - Passeport</h1>
              <p class="animated fadeInRight" style="color: white">Avec service-guinee.gn, faites vos demandes en ligne</p>
              <p class="animated fadeInRight"><a href="#" class="btn btn-warning">Apprendre plus</a></p>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="item1 actif divflex hend hcenter vcenter" style="background-image: url('images/best/hot.jpg')">
            <div class="detaiSlid">
              <h1 class="animated fadeInRight" style="color: yellow">Service - Logement</h1>
              <p class="animated fadeInRight" style="color: white">Avec service-guinee.gn, faites vos demandes de logement en ligne</p>
              <p class="animated fadeInRight"><a href="#" class="btn btn-warning">Apprendre plus</a></p>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="item1 actif divflex hend hcenter vcenter" style="background-image: url('images/best/slididen.jpg')">
            <div class="detaiSlid">
              <h1 class="animated fadeInRight" style="color: yellow">Service Identité</h1>
              <p class="animated fadeInRight" style="color: white">Avec service-guinee.gn, faites vos demandes de carte d'identité en ligne</p>
              <p class="animated fadeInRight"><a href="#" class="btn btn-warning">Apprendre plus</a></p>
            </div>
          </div>
        </div>

      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- Fin du div pour les slides -->


    <!-- div pour les actualités -->
    <div class="enteteactu" style="padding: 2em">
        <h2>Actualités</h2>
        <a href="#">VOIR TOUS LES ARTICLES <i class="mdi mdi-chevron-right-circle-outline"></i></a>
    </div>
    <div class="row" style="padding: 0em 2em">
      <?php
        include("fonctions.inc.php");
        
        $con = connexion();
        $requete = "SELECT * FROM actualites ORDER BY id_actu ASC LIMIT 3";
        $rows = $con->query($requete);
        while($row = $rows->fetch()){
      ?>
        <div class="col-12 col-md-4">
          <div class="card bg-light h-100">
            <div class="card-body actualite">
              <img src="images/actualite/<?=$row['image_actu']?>" alt="">
              <h6>Evènement</h6>
              <h3 class="h4"><?=$row['titre_actu']?></h3>
              <p>Publiée le: <?=$row['date_actu']?></p>
              <p>
                <?php
                  $contenu = $row['contenu_actu'];
                  $lg_max = 130;
                  if(strlen($contenu)>$lg_max){
                      $contenu = substr($contenu, 0, $lg_max);
                      $espace = strrpos($contenu, " ");
                      $contenu = substr($contenu, 0, $espace);
                  }
                  echo $contenu.' ...';
                ?> 
              </p>
              <p class="animated fadeInUp mx-auto">
                <a href="articles/contenu-article.php?id=<?=$row['id_actu']?>" class="btn btn-primary">Lire la suite <i class="mdi mdi-chevron-right-circle-outline"></i></a>
              </p>
            </div>
          </div>
        </div>
      <?php
        }
        $rows->closeCursor();
      ?>
    </div>
    <!-- Fin du div pour les actualités -->

    <!-- div pour les fiches pratiques -->
    <div class="enteteactu" style="padding-left: 2em;margin-top: 1.5em;">
      <h2>Fiches pratiques les plus consultées</h2>
    </div>
    <div class="row" style="padding: 0em 2em">
      <div class="col-12 col-md-4">
        <div class="card bg-light">
          <div class="card-body text-left actualite">
            <div class="item divflex valign">
              <h4>COMMENT FAIRE SI…</h4>
              <ul>
                <li><a href="#">Je déménage</a></li>
                <li><a href="#">Je prépare ma retraite</a></li>
                <li><a href="#">J'achète un logement</a></li>
                <li><a href="#">Je souhaite travailler dans l'administration</a></li>
              </ul>
              <a href="#" class="btn">Tous les Comment faire si… <i class="mdi mdi-chevron-right-circle-outline"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-4">
        <div class="card bg-light">
          <div class="card-body text-left actualite">
            <div class="item divflex valign">
              <h4>SERVICES EN LIGNE</h4>
              <ul>
                <li><a href="#">Demander un acte de naissance</a></li>
                <li><a href="#">Signaler son changement d'adresse en ligne</a></li>
                <li><a href="#">Signaler une fraude à la carte bancaire (Perceval)</a></li>
              </ul>
              <a href="#" class="btn">Tous les services en ligne <i class="mdi mdi-chevron-right-circle-outline"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-4">
        <div class="card bg-light">
          <div class="card-body text-left actualite">
            <div class="item divflex valign">
              <h4>COMMENT FAIRE SI…</h4>
              <ul>
                <li><a href="#">Je déménage</a></li>
                <li><a href="#">Je prépare ma retraite</a></li>
                <li><a href="#">J'achète un logement</a></li>
                <li><a href="#">Je souhaite travailler dans l'administration</a></li>
              </ul>
              <a href="#" class="btn">Tous les Comment faire si… <i class="mdi mdi-chevron-right-circle-outline"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin du div pour les fiches pratiques -->

    <!-- div pour demande et se renseigner -->
    <div class="card-columns rens" style="padding: 0em 2em">
      <div class="">
        <div class="">
          <h5 class="second"><a href="demarcheadministrative.html.php"><i class="mdi mdi-fountain-pen-tip ilab" id="ilabel"></i>Faire une demande de document <i class="mdi mdi-chevron-right-circle-outline"></i></a></h5>
        </div>
      </div>
      <div class="">
        <div class="">
          <h5 class="animated fadeInUp"><a href="renseignement.php"><i class="mdi mdi-book-open-page-variant ilab"></i>Se renseigner sur un document <i class="mdi mdi-chevron-right-circle-outline"></i></a></h5>
        </div>
      </div>
    </div>
    <br>
    <!-- Fin div pour demande et se renseigner -->
    
    <!-- Début de pied-page -->
    <?php include_once("footer.php") ?>
    <!-- Fin de pied-page -->

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/fontawesome-all.min.js"></script>
  </body>
</html>

<?php
  
  include_once('fonctions.inc.php');
  $con = connexion();

 if(isset($_GET['id']) AND !empty($_GET['id'])){
      $id = htmlspecialchars($_GET['id']);
      $articles= $con->prepare('SELECT * FROM tbl_articles WHERE id_art=?');
      $requete = "SELECT libelle FROM tbl_categories WHERE id_cat = $id";
      $articles->execute(array($id));
      if($articles->rowcount()==1){
          $art=$articles->fetch();
      }
  }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Titre de l'article</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
    </head>
    <body>
        <main class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <p class="text-secondary" style="font-size:14px;">
                        <a href="#" class="text-muted">Accueil</a> &rsaquo; 
                        <a href="categorie.php?id=<?php $art['categorie'] ?>" class="text-muted">categorie</a>&rsaquo;
                        <?= $art['titre']; ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8 list-group">
                    <div class="art_body1">
                    <p>

                    </p>
            <h1><?php echo $art['titre'];?></h1>
          <h6><?=$art['date_publication'];?></h6>
          <div class="icone">
            <button type="button" class="btn btn-primary" ><span class="fab fa-facebook-f"></span> Partager sur facebook</button>
            <button type="button" class="btn btn-info"><span class="fab fa-twitter"></span> Tweeter sur twitter</button>
            <button type="button" class="btn btn-danger"><span class="fab fa-google-plus-g"></span> </button>
            <button type="button" class="btn btn-danger"><span class="fab fa-pinterest-p"></span> </button>
          </div><br>
          <p > <img src="image/<?=$art['images'];?>" style="width: 200px; height: 180px; float: left; margin-right: 10px;"></p>
          <p style="margin-top:30%;">
            <?php
                  $contenu=$art['contenu'];
                  echo nl2br($contenu);
            ?>
          </p>
          <div class="icone">Partager :
            <button type="button" class="btn btn-primary" ><span class="fab fa-facebook-f"></span> Facebook</button>
            <button type="button" class="btn btn-info"><span class="fab fa-twitter"></span> Twitter</button>
            <button type="button" class="btn btn-danger"><span class="fab fa-google-plus-g"></span> </button>
            <button type="button" class="btn btn-danger"><span class="fab fa-pinterest-p"></span> </button>
          </div>
        </div>
        <!--fin body1-->
        </div>
            <div class="col-12 col-md-4">                    
                <figure class="mt-4">
                        <img src="../images/actualite/img1.jpg" alt="Pub 1" class="img-fluid">
                </figure>
                
                <figure class="mt-4">
                        <img src="../images/actualite/img2.jpg" alt="Pub 2" class="img-fluid">
                </figure>
                
                <figure class="mt-4">
                        <img src="../images/actualite/img3.png" alt="Pub 3" class="img-fluid">
                </figure>
            </div>
        </div>
        </main>
        <script src="../js/fontawesome-all.min.js"></script>
    </body>
</html>
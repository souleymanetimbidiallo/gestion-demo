<?php
    session_start();
    include_once('fonctions.inc.php');
    $con = connexion();

    //Vérification des données envoyées par le formulaire
    if(isset($_POST['connexion'])){
        //Recupération des valeurs saisies
        $nin = securisation($_POST['NIN_CITOYEN']);
        $password = securisation($_POST['MOT_PASSE']);

        //Rechercher les valeurs entrées dans la liste des citoyens
        $result = $con->prepare("SELECT  * FROM citoyen WHERE NIN_CITOYEN=:nin and MOT_PASSE=:mot_passe");
        $result->bindparam(':nin',$nin);
        $result->bindparam(':mot_passe',$password);
        $result->execute();
        
        $ligne = $result->rowCount();
        $resultat = $result->fetch();
        
        if($ligne==1){
            $_SESSION['id'] = $resultat['ID_CITOYEN'];
            $_SESSION['login'] = $resultat['MOT_PASSE'];
            $_SESSION['nom'] = $resultat['NOM'];
            header("location: citoyen.html.php");
        } 
        else{
            $erreur = "Identifiant ou mot de passe incorrect";
        }   
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Authentification - Citoyen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <style>
        .fond{
            background: url("images/blue-gradient.jpeg") no-repeat;
            background-size: 100% 100%;
            width: 100%;
            height: 100vh;
        }
        .form-container{
            padding: 30px 60px;
            margin-top: 10vh;
            box-shadow: -10px 4px 26px 11px rgba(0, 0, 0, 0.75);
        }
        button{
            box-shadow: -1px 4px 26px 11px rgba(0, 0, 0, 0.75);
        }
    </style>
  
</head>

<body>
    <main class="container-fluid fond">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12"></div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <form action=""  method="POST" class="form-container text-warning font-weight-bold">
                        <span class="fas fa-user-lock fa-3x d-block mx-auto"></span>
                        <h1 class="text-white text-center h3 mt-2">Authentification</h1>
                        <div class="form-group">
                            <label for="login" class="h5">Identifiant National</label>
                            <input type="text" class="form-control" name="NIN_CITOYEN" id="login" placeholder="Entrer votre identifiant" required="required" autocomplete="none">
                        </div>
                        
                        <div class="form-group">
                            <label for="password" class="h5">Mot de passe</label>
                            <input type="password" name="MOT_PASSE" class="form-control" id="password" placeholder="Entrer votre mot de passe" required="required" autocomplete="none">
                        </div>

                        <button type="submit" name="connexion" class="btn btn-success btn-block">Valider</button><br>
                        <div class="form-check form-check-inline">
                            <label for="souvenir" class="form-check-label">
                                <input type="checkbox" class="form-check-input">Se souvenir
                            </label>
                            <a href="#" class="ml-3">Mot de passe oublié</a>
                        </div>
                        <?php
                            if(isset($erreur)){
                                echo "<p class='text-danger mt-2'>$erreur</p>";
                            }
                        ?>
                    </form>
                </div>
            <div class="col-md-4 col-sm-12 col-xs-12"></div>
        </div>
    </main>
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/fontawesome-all.min.js"></script>     
</body>
</html>
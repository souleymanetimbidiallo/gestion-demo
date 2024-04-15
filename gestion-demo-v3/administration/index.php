<?php
    session_start();
    include_once('../fonctions.inc.php');
    $con = connexion();
    
    if(isset($_POST['login'])){
        $user = $_POST['nom_user'];
        $password = $_POST['mot_passe'];

        if(!empty($user) && !empty($password)){
          $user = securisation($user);
          $password = securisation($password);
          
          $result = $con->prepare("SELECT * FROM responsable WHERE NOM_UTILISATEUR = :nom_user AND MOT_DE_PASSE = :mot_passe");
          $result->bindparam(':nom_user',$user);
          $result->bindparam(':mot_passe',$password);
          $result->execute();
          
          $ligne = $result->rowCount();
          $resultat = $result->fetch();
          
          if($ligne==1){
              $_SESSION['id_resp'] = $resultat['ID_RESPONSABLE'];
              $_SESSION['nom_resp'] = $resultat['NOM_RESP'];
              $_SESSION['prenom_resp'] = $resultat['PRENOM_RESP'];
              $_SESSION['type_compte'] = $resultat['TYPE_COMPTE'];
              $service = $resultat['SERVICE_RESP'];
              
              switch ($service) {
                case 'ACTE_NAISSANCE':
                  header("Location: etatciviladmin.html?id=".$_SESSION['id_resp']);
                  break;
                case 'CERTIFICAT_MARIAGE':
                  header("Location: etatciviladmin.html?id=".$_SESSION['id_resp']);
                  break;
                case 'CERTIFICAT_DECES':
                  header("Location: etatciviladmin.html?id=".$_SESSION['id_resp']);
                  break;
                case 'PASSEPORT':
                  header("Location: direction-nationale-admin.html?id=".$_SESSION['id_resp']);
                  break;
                case 'CERTIFICAT_SEJOUR':
                  header("Location: direction-nationale-admin.html?id=".$_SESSION['id_resp']);
                  break;
                case 'CARTE_IDENTITE':
                  header("Location: police-admin.html?id=".$_SESSION['id_resp']);
                  break;
                case 'CERTIFICAT_PERTE':
                  header("Location: police-admin.html?id=".$_SESSION['id_resp']);
                  break;
                case 'CASIER_JUDICIAIRE':
                  header("Location: tribunal-admin.html?id=".$_SESSION['id_resp']);
                  break;
                case 'CERTIFICAT_NATIONALITE':
                  header("Location: tribunal-admin.html?id=".$_SESSION['id_resp']);
                  break;
                case 'CERTIFICAT_RESIDENCE':
                  header("Location: quartier-admin.html?id=".$_SESSION['id_resp']);
                  break;
                case 'DECLARATION_NAISSANCE':
                  header("Location: hopital-admin.html?id=".$_SESSION['id_resp']);
                  break;
                case 'CITOYENNETE':
                  header("Location: citoyen-admin.html?id=".$_SESSION['id_resp']);
                  break;
                default:
                  $erreur = "Vous n'etes pas affecté à un service";
                  break;
              }
          }else{
              $erreur = "Nom d'utilisateur ou mot de passe incorrect";
          }
        }else{
          $erreur = "Tous les champs doivent etre remplis";
        }
    }
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/MaterialDesign-Webfont-master/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
    <!--  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
    <link rel="stylesheet" href="../css/ov.css">
    <link rel="stylesheet" href="../css/citoyen.css">
    <link rel="stylesheet" href="../css/adminservice.css">

    <title>Administration-Service-Public</title>

  </head>
  <body>
    <div class="contenu divflex valign vcenter">
      <a href="#">
        <div class="divflex vcenter hcenter">
            <img src="../images/logo.gif" alt="" id="logo-admin" class="img-fluid">
        </div>
      </a>
      <h1 style="margin: 0px; padding: 0px">Portail - Administration</h1>
      <h4>service-guinee.gn</h4>
      <div class="divflex halign vcenter hcenter">

        <div class="left divflex valign vcenter hcenter">
            <i class="mdi mdi-lock"></i>
            <p>Identification</p>
        </div>
        <form action="" method="POST" class="auth divflex valign hcenter vcenter">
          <input type="text" name="nom_user" value="<?php if(isset($user)){echo $user;} ?>" class="form-control" placeholder="Nom d'utilisateur">
          <input type="password" name="mot_passe" value="" class="form-control" placeholder="Mot de passe"><br>
          <button type="submit" name="login" class="btn btn-warning">Se connecter
            <i class="mdi mdi-chevron-right-circle-outline"></i>
          </button>
          <?php
              if(isset($erreur)){
                  echo "<p class='mt-3 text-danger'>$erreur</p>";
              }
          ?>
        </form>
      </div>
    </div>
    
    <!-- Début de pied-page -->
    <?php include_once("../footer.php") ?>
    <!-- Fin de pied-page -->
  </body>
</html>

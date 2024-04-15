<?php
    include_once("../../fonctions.inc.php");

    //Recuperer l'identifiant du responsable de la carte d'identité
    $id_resp = recupIdResponsable('PASSEPORT');

    //identifiant du citoyen est récupéré à partir d'une session
    $id_citoyen = 3;

    //Verifier que les dates ont été saisies par le responsable
    $resultat = verifierDate($id_resp, $id_citoyen);
    $tableau = $resultat->fetch();
    $nb_ligne = $resultat->rowCount();
  
  //Enregistrer une demande
  if(isset($_POST['valider'])){
    if($nb_ligne == 0){
      $id_cit = $_POST['id_citoyen'];
      $reference = $_POST['reference'];

      if(empty($reference)){
        $reference = "";
        $motif = "Type de demande:  Premiere";
        $motif .= "; Type de passeport: ".$_POST['type_p'];
        $motif .= "; Statut de nationalité: ".$_POST['statut'];
      }else{
          $motif = 'Réference: '.$reference;
      }
      
      if($id_citoyen == $id_cit){
        // Verification de l'etat de la demande et envoi
        $titrePapier = "passeport";
        $etat = $_POST['type_demande'];
        $nomColonne = "DATE_EXPIRATION_PS";
        EtatDemande($id_resp, $id_citoyen, $titrePapier, $reference, $motif, $etat, $nomColonne);
      }else{
        echo "<p class='text-warning'>Ce compte citoyen n'est pas le votre</p>";
      }
    }else{
      echo "Vous avez déja fait une demande!";
    }
  }


  //Valider la date de rendez-vous:
  if(isset($_POST['envoyer'])){
    $date_valide = $_POST['date_r'];
    validerDate($date_valide, $id_resp, $id_citoyen);
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/MaterialDesign-Webfont-master/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/ov.css">
    <link rel="stylesheet" href="../../css/demarcheadminist.css">
    <title></title>
    <style media="screen">
      body{
        background-image: url('../../images/best/passcom.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
      }
      .champ{
        flex-grow: 1;
        border-right: 4px solid orange;
      }
      .champ2{
        margin-top: 2em;
        padding: 0.2em 4em;
      }
      label,h2{
        color: white;
      }
      .inpine, .btn{
        width: 50%;
      }
      strong{
        font-size: 1.3em;
      }
    </style>
  </head>
  <body>
      <form action="" method="POST">

          <div class="card-columns divflex hcenter vcenter" style="padding: 1em" id="conteneur">
            <div class="divflex valign hcenter vcenter champ">
                <h2>Identifant*</h2>
                <input type="text" class="form-control inpine" placeholder="Numero d'identification" name="id_citoyen" required="required">
            </div>

            <div class="champ2">          
              <label><strong>Type de demande</strong><br>
                <input type="radio" class="" id="pre_demande" name="type_demande" checked="checked" value=1><label for="pre_demande">Première Demande</label>   
                <input type="radio" class="" id="copie" name="type_demande" value=2><label for="copie">Duplicata</label>
                <input type="radio" class="" id="renouvellement" name="type_demande" value=3><label for="renouvellement">Renouvellement</label>
              </label>
          
              <br>
              <div id="champs1" class="my-2">
                <label for="num_recep"><strong>Numéro du récepissé</strong></label><br>
                <input type="text" class="form-control" placeholder="Numéro du récepissé" id="num_recep" name="num_recep">
              
                <label><strong>Type de passeport</strong><br>
                  <input type="radio" class="" name="type_p" id="ordinaire" value="Ordinaire" checked="checked"><label>Ordinaire</label>
                  <input type="radio" class="" name="type_p" id="diplomatique" value="Diplomatique"><label>Diplomatique</label>
                  <input type="radio" class="" name="type_p" id ="service" value="Service"><label>Service </label>
                </label>
                <br>

                  <label><strong>Statut de nationalité</strong><br>
                    <input type="radio" class="" name="statut" value="Naissance" checked="checked"><label>Naissance</label>
                    <input type="radio" class="" name="statut" value="Naturalisation"><label>Naturalisation</label>
                    <input type="radio" class="" name="statut" value="Mariage"><label>Mariage</label>
                  </label>
              </div>

              <div id="champs2" class="my-2">
                <label for="reference"><strong>Réference</strong></label>
                <input type="text" id="reference" name="reference" placeholder="Réference du papier" class="form-control">
              </div>

              <div id="champs3">

              </div>

              <div class="d-flex justify-content-around">
                <input type="submit" class="btn btn-outline-warning mt-3" name="valider" value="Effectuer la Demande">
                <button type="button" class="btn btn-primary ml-3 mt-3" id="notification">
                  Notifications <span id ="etat" class="badge badge-pill badge-warning"><?= $nb_ligne ?></span>
                </button>
              </div>

              </div>
            </div>
        </form>
        <div id="formulaire_date">
          <form action=""  method="POST">
            <p class="text-warning">Choisissez une date parmi ces jours disponibles:</p>
            <div class="form-check">
                <input type="radio" name="date_r" id="date_r1" value="<?=$tableau['DATE_RDV1']?>" class="form-check-input">
                <label for="date_r1" class="form-check-label text-white"><?=$tableau['DATE_RDV1']?></label>
            </div>
            <div class="form-check">
                <input type="radio" name="date_r" id="date_r2" value="<?=$tableau['DATE_RDV2']?>"class="form-check-input">
                <label for="date_r2" class="form-check-label text-white"><?=$tableau['DATE_RDV2']?></label>
            </div>
            <div class="form-check">
                <input type="radio" name="date_r" id="date_r3" value="<?=$tableau['DATE_RDV3']?>"class="form-check-input">
                <label for="date_r3" class="form-check-label text-white"><?=$tableau['DATE_RDV3']?></label>
            </div>
            <div class="form-group">
                <button type="submit" name="envoyer" class="btn btn-warning mt-2">Envoyer</button>
            </div>
          </form>
        </div>
        <script>
          
          var champs1 = document.getElementById('champs1');
              champs1.style.display = 'none';

          var champs2 = document.getElementById('champs2');
              champs2.style.display = 'none';

          var radio1 = document.getElementById('pre_demande')
          radio1.addEventListener('click',function(){
              champs1.style.display = 'block';
              champs2.style.display = 'none';
          })

          var radio2 = document.getElementById('copie')
          radio2.addEventListener('click',function(){
              champs2.style.display = 'block';
              champs1.style.display = 'none';
          })

          var notification = document.getElementById('notification');
          var formulaire_date = document.getElementById('formulaire_date');
          formulaire_date.style.display = 'none';
          var etat = document.getElementById('etat').textContent;
          etat = parseInt(etat);
          notification.addEventListener('click',function(e){
            if(etat==0){
                e.preventDefault();
                formulaire_date.style.display = 'none';
                
            }else{
                formulaire_date.style.display = 'block';
                //etat.setAttribute('class', 'badge badge-pill badge-warning');
            }
          });
        </script>
  </body>
</html>
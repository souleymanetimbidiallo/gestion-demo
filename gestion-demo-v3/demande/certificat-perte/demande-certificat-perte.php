<?php  
    include_once("../fonctions.inc.php");

    //Recuperer l'identifiant du responsable de la carte d'identité
    $id_resp = recupIdResponsable('CERTIFICAT_PERTE');

    //identifiant du citoyen est récupéré à partir d'une session
    $id_citoyen = 1;
  

    //Verifier que les dates ont été saisies par le responsable
    $resultat = verifierDate($id_resp, $id_citoyen);
    $tableau = $resultat->fetch();
    $nb_ligne = $resultat->rowCount();

    //Enregistrer une demande
    if(isset($_POST['valider'])){

        //Verifier si le papier de la declaration existe et l'appartient
        if($nb_ligne == 0){
            $id_cit = $_POST['id_citoyen'];
            $motif = "Nom_objet: ".$_POST['nom_objet'];
            $motif .= "; Reference: ".$_POST['reference'];
            $motif .= "; Date de perte: ".$_POST['date_perte'];

            if($id_citoyen == $id_cit){
                envoiDemande($id_resp, $id_citoyen, $motif);
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
    <html>
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <title>Envoi d'une demande</title>
            <link rel="stylesheet" href="../css/bootstrap.min.css" />
        </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class=" offset-4 col-4 demande border border-primary mt-4 bg-dark d-flex justify-content-center align-items-center flex-column">
                        <h1 class="h3 text-center text-white">Demande de certificat de perte</h1> 
                        
                        <form action="" method="POST">
                            
                                <div class="form-group">
                                    <label for="id_ciotyen" class="text-warning">Identifiant du citoyen*</label>
                                    <input type="text" id="id_citoyen" name="id_citoyen" class="form-control" placeholder="Votre identifiant">
                                </div>
                                <div class="form-group">
                                    <label for="nom_objet" class="text-warning">Nom du papier</label>
                                    <input type="text" name="nom_objet" id="nom_objet" placeholder="Le nom de papier perdu" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="reference" class="text-warning">Réference</label>
                                    <input type="text" name="reference" id="reference" placeholder="La réference du papier" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="date_perte" class="text-warning">Date de la perte</label>
                                    <input type="date" name="date_perte" id="date_perte" placeholder="La date de perte" class="form-control">
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="valider" class="btn btn-success">Envoyer</button>
                                    <button type="button" class="btn btn-primary" id="notification">
                                        Notifications <span id ="etat" class="badge badge-pill badge-warning"><?= $nb_ligne ?></span>
                                    </button>
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
                    </div>
                </div>
            </div>

            <script>
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
            <script src="js/jquery-3.3.1.slim.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
        </body>
    </html>
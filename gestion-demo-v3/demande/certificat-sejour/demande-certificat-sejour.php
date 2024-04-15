<?php  
    include_once("../fonctions.inc.php");

    //Recuperer l'identifiant du responsable de la carte d'identité
    $id_resp = recupIdResponsable('CERTIFICAT_SEJOUR');

    //identifiant du citoyen est récupéré à partir d'une session
    $id_citoyen =2;
  

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
                    $reference="";
                    $motif = "Nationalité: ".$_POST['nationalite'];
                    $motif .= "; Numero de passeport: ".$_POST['num_passeport'];
                    $motif .= "; Durée du visa: ".$_POST['duree_visa'];
                    $motif .= "; Provenance: ".$_POST['provenance'];
                    $motif .= "; Destination: ".$_POST['destination'];
                }else{
                    $motif = 'Réference: '.$reference;
                }
                if($id_citoyen == $id_cit){
                // Verification de l'etat de la demande et envoie
                $titrePapier="certificatsejour";
                $etat=$_POST['type_demande'];
                $nomColonne="DATE_EX_VISA";
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
                    <div class=" mx-auto offset-1 col-10 p-4 offset-sm-2 col-sm-8 p-sm-4 offset-md-4 col-md-6 offset-lg-4 col-lg-5 mt-4
                                border border-primary  bg-dark">
                        <h1 class="h3 text-center text-white">Demande de certificat de séjour</h1> 
                        
                        <form action="" method="POST" class="mt-3 text-white">
                            
                                <div class="form-group">
                                    <label for="id_ciotyen" class="text-warning">Identifiant du citoyen*</label>
                                    <input type="text" id="id_citoyen" name="id_citoyen" class="form-control" placeholder="Votre identifiant">
                                </div>
                                <div class="form-group form-check-inline">
                                    <div class="form-check" id="demande">
                                        <input type="radio" id="pre_demande" name="type_demande" class="form-check-input" value=1>
                                        <label for="pre_demande" class="form-check-label">Première demande</label>
                                    </div>
                                    <div class="form-check" id="copie_autre">
                                        <input type="radio" id="copie" name="type_demande" class="form-check-input" value=2>
                                        <label for="copie" class="form-check-label">Duplicata</label>
                                    </div>
                                    <div class="form-check" id="copie_autre">
                                        <input type="radio" id="copie" name="type_demande" class="form-check-input" value=3>
                                        <label for="copie" class="form-check-label">Renouvellement</label>
                                    </div>
                                    <br>
                                </div>
                                <div id="champs1">
                                    <div class="form-group">
                                        <label for="nationalite" class="text-warning">Nationalité du séjour</label>
                                        <input type="text" name="nationalite" id="nationalite" placeholder="Votre nationalité" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="num_passeport" class="text-warning">Numéro du passeport</label>
                                        <input type="number" name="num_passeport" id="num_passeport" placeholder="Votre numéro de passeport" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="duree_visa" class="text-warning">Date d'expiration du visa</label>
                                        <input type="date" name="duree_visa" id="duree_visa" placeholder="La date d'expiration du visa" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="provenance" class="text-warning">Provenance</label>
                                        <input type="text" name="provenance" id="provenance" placeholder="Lieu de provenance" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="destination" class="text-warning">Destination</label>
                                        <input type="text" name="destination" id="destination" placeholder="Lieu de destination" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group" id="champs2">
                                    <label for="reference">Réference</label>
                                    <input type="text" id="reference" name="reference" placeholder="Réference du papier" class="form-control">
                                </div>

                                <div class="d-flex justify-content-around">
                                    <button  type="submit" name="valider" class="btn btn-danger mt-3">Valider</button>
                                    <button type="button" class="btn btn-primary mt-3" id="notification">
                                        Notifications
                                        <span class="badge badge-pill badge-warning" id="etat"><?=$nb_ligne?></span>
                                    </button>
                                </div>
                        </form>
                        <form action="" id="formulaire_date" method="POST" class="justify-content-center align-items-center flex-column">
                            <p class="text-warning mt-2">Choisissez une date parmi ces jours disponibles:</p>
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
                                <button type="submit" name="envoyer" class="btn btn-warning btn-block mt-3">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
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
            <script src="js/jquery-3.3.1.slim.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
        </body>
    </html>
<?php
    session_start();
    
    include_once("../fonctions.inc.php");
    
    $id_citoyen = $_SESSION['id'];
    
    $con = connexion();
    $sql="SELECT referencePapierPerdu FROM decpertepapier WHERE id_citoyen='$id_citoyen'";
    $row=$con->query($sql);
    $nb_ligne=$row->rowCount();
    

    //Enregistrer une demande
    if(isset($_POST['valider'])){
        $id_cit=  RecupererIdParNin($_POST['id_citoyen']);
        if($id_cit==$id_citoyen){
           $titre=$_POST['titrePapier'];
           $dateP=$_POST['date_perte'];
           $sql="INSERT INTO decpertepapier (titrePapierPerdu, datePerte, id_citoyen) VALUES('$titre','$dateP','$id_citoyen')";
           $row=$con->exec($sql);
        }else{
            echo 'Identifiant saisi incorrect!';
        }
        
            
    }

?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <title>Envoi d'une declaration de perte</title>
            <link rel="stylesheet" href="../css/bootstrap.min.css" />
        </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class=" offset-4 col-4 demande border border-primary mt-4 bg-dark d-flex justify-content-center align-items-center flex-column">
                        <h1 class="h3 text-center text-white">Déclarer une perte de papier</h1> 
                        
                        <form action="" method="POST">
                            
                                <div class="form-group">
                                    <label for="id_ciotyen" class="text-warning">Identifiant du citoyen*</label>
                                    <input type="text" id="id_citoyen" name="id_citoyen" class="form-control" placeholder="Votre identifiant" required>
                                </div>
                                <div class="form-group">
                                    <label for="nom_objet" class="text-warning">Vous avez perdu quel papier?</label>
                                    <select name="titrePapier" id="titrepapier" class="custom-select" required>
                                        <option value="">-----------Selectionnez-le ici------------</option>
                                        <option value="Acte de Naissance">Acte de Naissance</option>
                                        <option value="Carte d'identité">Carte d'identité</option>
                                        <option value="Passe Port">Passe Port</option>
                                        <option value="Casier judiciaire">Casier judiciaire</option>
                                        <option value="Certificat de résidence">Certificat de résidence</option>
                                        <option value="Certificat de nationalité">Certificat de nationalité</option>
                                        <option value="Certificat de Séjour">Certificat de Séjour</option>
                                        <option value="Certificat de décès">Certificat de décès</option>
                                        <option value="Certificat de mariage">Certificat de mariage</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date_perte" class="text-warning">Date de la perte</label>
                                    <input type="date" name="date_perte" id="date_perte" placeholder="La date de perte" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="valider" class="btn btn-success">Envoyer</button>
                                    <button type="button" class="btn btn-primary" id="notification">
                                    Notifications<span id ="etat" class="badge badge-pill badge-warning"><?=$nb_ligne?></span>
                                    </button>
                                </div>
                                <div class="form-group" id="referencePapier">
                                    <label for="refPerdu" class="text-warning">Référence du papier perdu</label>
                                    <p class="text-white">Votre numero de reference</p>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                var notification = document.getElementById('notification');
                var formulaire_date = document.getElementById('referencePapier');
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
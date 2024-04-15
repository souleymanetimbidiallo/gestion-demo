<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8"/>
            <title>Carte d'identité</title>
        </head>
        <body>
            <?php
                include_once("../../fonctions.inc.php");
                $con = connexion();
                $id_resp = 3;
                $id_citoyen = $_POST['id_citoyen'];
                $date_confection_papier = securisation($_POST["date_confection_papier"]);
                $date_exp = securisation($_POST["date_exp"]);
                $reference = securisation($_POST["reference"]);

                if(isset($_FILES['photo_carteIden']) AND !empty($_FILES['photo_carteIden']['name'])){
                    $tailleMax = 2097152;
                    $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
                    if($_FILES['photo_carteIden']['size'] <= $tailleMax){
                        $extensionsUpload = strtolower(substr(strrchr($_FILES['photo_carteIden']['name'], '.'), 1));
                        if(in_array($extensionsUpload, $extensionsValides)){
                            $chemin = '../../images/photos/'.$id_citoyen.'.'.$extensionsUpload;
                            $resultat = move_uploaded_file($_FILES['photo_carteIden']['tmp_name'], $chemin);
                            if($resultat){
                                $photo_carteIden = $id_citoyen.'.'.$extensionsUpload;
                            }else{
                                $erreur = 'Erreur lors de l\'importation de la photo!';
                            }
                        }else{
                            $erreur = 'La photo de doit être au format (jpg, jpeg, gif ou png)';
                        }
                    
                    }else{
                        $erreur = 'La photo ne doit pas dépasser 2MO';
                    }
                }
                
                //Insertion d'une carte d'identité
                $sql = "INSERT INTO carteidentite(ID_RESPONSABLE, ID_CITOYEN, referenceCarteIden, DATE_CONFECTION_PAPIER, DATE_EXP, PHOTO_CARTEIDEN)
                        VALUES(:id_resp,:id_citoyen,:reference, :date_confection_papier,:date_exp, :photo_iden)";
                $requete=$con->prepare($sql);
                $requete->bindParam(':id_resp',$id_resp);
                $requete->bindParam(':id_citoyen',$id_citoyen);
                $requete->bindParam(':reference', $reference);
                $requete->bindParam(':date_confection_papier', $date_confection_papier);
                $requete->bindParam(':date_exp', $date_exp);
                $requete->bindParam(':photo_iden',$photo_carteIden);
                $requete->execute();

                //Mettre la photo pour la table citoyen
                $sql = "UPDATE citoyen SET photo_citoyen = :photo WHERE id_citoyen = :id_cit";
                $requete2 = $con->prepare($sql);
                $requete2->bindParam(':id_cit', $id_citoyen);
                $requete2->bindParam(':photo', $photo_carteIden);
                $requete2->execute();
                
                //Afficher des messages de validation ou d'erreurs
                if(isset($erreur)){
                    echo $erreur;
                }else{
                    echo'<script>alert("Insertion effectuée avec succès");</script>';
                    header("Location: tableau_carte_d_identite.php");
                }
            ?>
        </body>
    </html>
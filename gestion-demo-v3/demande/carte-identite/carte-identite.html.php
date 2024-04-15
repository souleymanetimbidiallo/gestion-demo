<?php
    $id = $_GET['id'];
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <title>Document</title>
            <link rel="stylesheet" href="../../css/bootstrap.min.css" />
        </head>
        <body>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 offset-sm-2 col-sm-8 offset-md-4 col-md-4 mt-4"> 
                        <form action="carte_identite.php" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <legend>Informations sur la carte d'identité</legend>
                                <div class="form-group">
                                    <label for="id_citoyen">Identifiant du citoyen</label>
                                    <input type="text" name="id_citoyen" id="id_citoyen" class="form-control" value="<?=$id?>">
                                </div>
                                <div class="form-group">
                                    <label for="reference">Réference:</label>
                                    <input type="text" name="reference" id="reference" class="form-control" placeholder="Réference">
                                </div>
                                <div class="form-group">
                                    <label for="date-conf">Date de confection du papier:</label>
                                    <input type="date" name="date_confection_papier" id="date-conf" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="date-exp">Date d'expiration du papier</label>
                                    <input type="date" name="date_exp" id="date-exp" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="photo">Photo d'identité</label>
                                    <input type="file" name="photo_carteIden" id="photo" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="valider" class="btn btn-success">Envoyer</button>
                                </div>
                            </fieldset>
                        </form>
                        </div>
                </div>
            </div>

            <script src="../../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../../js/bootstrap.bundle.min.js"></script>
        </body>
    </html>
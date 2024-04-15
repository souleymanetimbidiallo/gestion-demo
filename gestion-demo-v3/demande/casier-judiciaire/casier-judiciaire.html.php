<?php
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Casier Judiciaire</title>
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
    </head>
    <body>

        <main class="container-fluid">
            <div class="offset-4 col-4 mt-5">
                <form action="casier-judiciaire.php" method="POST">
                    <fieldset>
                        <legend>Informations sur le casier judiciaire</legend>
                        <div class="form-group">
                            <label for="id_citoyen">Identifiant du citoyen</label>
                            <input type="text" name="id_citoyen" id="id_citoyen" class="form-control" value="<?=$id?>">
                        </div>
                        <div class="form-group">
                            <label for="reference">Réference:</label>
                            <input type="text" name="reference" id="reference" class="form-control" placeholder="Réference">
                        </div>
                        <div class="form-group">
                            <label for="adresse_tribunal">Adresse du Tribunal</label>
                            <input type="text" name="adresse_tribunal" id="adresse_tribunal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="type_casier">Type de Casier Judiciaire</label>
                            <input type="text" name="type_casier" id="type_casier" class="form-control">
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
                            <button type="submit" class="btn btn-success">Valider</button>
                            <button type="reset" class="btn btn-danger">Annuler</button>
                        </div>     
                    </fieldset>
                </form>
            </div>
        </main>
        <script src="../../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../../js/bootstrap.bundle.min.js"></script>
        <script src="../../js/fontawesome-all.min.js"></script>
    </body>
</html>
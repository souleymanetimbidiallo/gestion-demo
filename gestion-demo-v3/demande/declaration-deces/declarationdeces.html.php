<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="offset-3 col-6">
                <form  method ="post" action="send.php"  class="formulaire">
                    <legend class="text-uppercase text-center font-weight-bold">Déclaration de décès</legend>
                    <div class="form-group">
                        <input type="text" name="nom_defunt" id="nom_defunt" class="form-control" placeholder="Nom du défunt"> 
                    </div>
                    <div class="form-group">
                        <input type="text" name="prenom_defunt" id="prenom_defunt" class="form-control" placeholder="Prénom du défunt">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nom_declarant" id="nom_declarant" class="form-control" placeholder="Nom du déclarant">
                    </div>
                    <div class="form-group">
                        <input type="text" name="prenom_declarant" id="prenom_declarant" class="form-control" placeholder="Prénom du déclarant">
                    </div>
                    <div class="form-group">
                        <input type="tem" id="tel_declarant" name="tel_declarant" class="form-control" placeholder="Téléphone du déclarant">
                    </div>
                    <div class="form-group">
                        <label for="type_mort">Type de mort</label>
                        <select name="type_mort" id="type_mort" class="custom-select">
                            <option value="Naturelle">Naturelle</option>
                            <option value="Accident">Accident</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_mort">Date de mort</label>
                        <input type="date" name="date_mort" id="date_mort" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="lieu_mort" id="lieu_deces" class="form-control" placeholder="Lieu du déces">
                    </div>
                    <div class="form-group">
                        <input type="text" name="lien_parente" id="lien_parente" class="form-control" placeholder="Lien de parenté">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Envoyez" id="valider" class="btn btn-outline-success btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../declarationdeces.js"></script>
</body>
</html>
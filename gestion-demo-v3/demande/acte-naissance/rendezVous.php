
<?php
include_once("../../fonctions.inc.php");
$con = connexion();

$id_resp = recupIdResponsable('ACTE_NAISSANCE');
$idcit=$_GET['id'];

if(isset($_POST['envoyer'])){
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $date3 = $_POST['date3'];
    $sql = "UPDATE demande 
            SET date_rdv1='$date1', date_rdv2='$date2',date_rdv3='$date3' 
            WHERE id_citoyen = $idcit AND id_responsable = $id_resp";
    $stm=$con->exec($sql);
    header('location: reponseActeNaissance.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rendez-vous</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>

<h1 class="h4 text-center">Entrez les dates pour les rendez-vous</h1>
<div class="offset-4 col-4">
    <form action="#" method="POST">
        <div class="form-group">
            <label for="date1">Date 1</label>
            <input type="date" id="date1" name="date1" class="form-control">
        </div>
        <div class="form-group">
            <label for="date2">Date 2</label>
            <input type="date" id="date2" name="date2" class="form-control">
        </div>
        <div class="form-group">
            <label for="date3">Date 3</label>
            <input type="date" id="date3" name="date3" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
            <a href="reponseActeNaissance.php" class="btn btn-danger">Fermer</a>
        </div>
    </form>
</div>
</body>
</html>
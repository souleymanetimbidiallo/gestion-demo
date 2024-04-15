
<?php

    $server = "localhost";
    $login = "root";
    $pass="";
    $con = new PDO("mysql:host=$server;dbname=gestiondemographique",$login,$pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $idcit=$_GET['id'];
    
    if(isset($_POST['envoyer'])){
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
        $date3 = $_POST['date3'];
        $sql="UPDATE demande SET date_rdv1='$date1', date_rdv2='$date2',date_rdv3='$date3' WHERE id_citoyen='$idcit'";
        $stm=$con->exec($sql);
        header('location: reponse-certificat-sejour.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rendez vous</title>
    <link rel="stylesheet" href="../style/css/bootstrap.min.css">
</head>
<body>
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
                <button type="button" class="btn btn-danger">Fermer</button>
            </div>
        </form>
    </div>
</body>
</html>
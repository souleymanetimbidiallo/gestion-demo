<?php
    //La déconnexion d'un citoyen
    session_start();

    $_SESSION = array();
    
    session_destroy();
    
    header("Location: ../index.php");
?>
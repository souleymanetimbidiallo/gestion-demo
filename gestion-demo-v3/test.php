<?php
    include_once('fonctions.inc.php');
    $con = connexion();

    function aleatoire($min, $max){
        $num_registre = rand($min, $max);

        if($num_registre<10){
            $num_re = '00'.$num_registre;
        }else if($num_registre<100){
            $num_re = '0'.$num_registre;
        }else{
            settype($num_registre, 'string');
            $num_re = $num_registre;
        }

        return $num_re;
    }

//sexe
    $sexe = 'M';
    $sexeValue = $sexe == 'M' ? 1 : 0;
    echo '<br>';
//Date
    $date = date('d/m/Y');
    $tab = explode('/', $date);
    $aa = $tab[2];
    $aa = substr($aa, 2, 2);
    $mm = $tab[1];
    $jj = $tab[0];

//Commune
    $code_commune = 125;

//Compteur journalier
//    $cj = 003;

    echo '<br>';

//Liste de registres
    $sql = 'SELECT * FROM registre';
    $requete = $con->query($sql);
    $resultat =  $requete->rowCount();
    //echo $resultat;
    echo '<br>';
    $num_reg = aleatoire(1, 10);
    if($resultat==0){
        $num_registre = $num_reg;
        //On enregistre l'insertion:
    }else{
        $sql2 = 'SELECT * FROM registre ORDER BY id_reg DESC LIMIT 1';
        $requete = $con->query($sql2);
        $tab = $requete->fetch();
        $lastMonth = $tab['mois_reg'];
        
        if($mm!=$lastMonth){
            $sql3 = "DELETE FROM registre";
            $requete = $con->exec($sql3);
            $sql5 = "INSERT INTO registre (num_reg, mois_reg) VALUES ('$num_reg', '$mm')";
            $con->exe($sql5);
        }else{
            
            do{
                $num_reg = aleatoire(1, 10);
                $sql4 = "SELECT * FROM registre WHERE num_reg='$num_reg'";
                $requete = $con->query($sql4);
                $nbrow = $requete->rowCount();
                if($nbrow == 0){
                    
                    $sql2 = "INSERT INTO registre (num_reg, mois_reg) VALUES ('$num_reg', '$mm')";
                    $con->exec($sql2);
                    $nbrow = 1;
                }else{
                    $nbrow = 0;
                }
            }while($nbrow==0);

        }
        
        /*
        on compare les deux dates: 
            -s'ils sont différents on réinitialise la table 
            -sinon on vérifie que num_reg n'existe pas dans la table
        */

        //echo $num_reg;

    }

    

?>
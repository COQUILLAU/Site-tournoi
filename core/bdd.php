<?php
    try{ 
        $bdd = new PDO('mysql:host=127.0.0.1;
        dbname=tournoi;charset=utf8',
        'root',
        'root');

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } // echec
    catch(PDOException $e){ 
        echo 'Impossible de se connecter à la BDD.';
    }

?>
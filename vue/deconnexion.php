<?php
    session_start(); // ouverture de la session 
    session_destroy(); // on la detruit
    header("location:../index.php"); // redirection
?>
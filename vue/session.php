<?php
   session_start();
   if($_SESSION["autoriser"] != "oui"){ // si une session n'est pas existante,vous comprenez mieux la variable autoriser ?
      header("location:vue/vueConnexion.php"); // alors on redirige vers login si on le veut C'est pas vueConnexion.php ?
      exit(); // puis on stop le code
   }
    
  // plus besoin de condition, sachant qu'on stop le code au dessus si on est pas connecté.
  $pseudo   = $_SESSION["pseudo"];
  $email    = $_SESSION["email"];
  $role     = $_SESSION["role"];

?>
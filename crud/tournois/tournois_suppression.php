<?php
include("../../core/bdd.php"); // importation de la base de données
// Préparation de la requête SQL pour supprimer un tournoi avec l'id 149
$id = $_GET['id'];

$requeteSQL = $bdd->prepare('DELETE FROM `tournois` WHERE (`id` = :id)');
$requeteSQL->execute(array(':id' => $id));

// Lier le paramètre à la requête

// Exécution de la requête SQL
if ($requeteSQL->execute()) {
    header("location:../../vue/jeux/vueJeux.php");
} else {
    header("location:../../vue/vueTournoi.php");
    echo "Erreur de suppression du tournoi.";
}
?>
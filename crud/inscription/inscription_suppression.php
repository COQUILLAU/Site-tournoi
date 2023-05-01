<?php
include("../../core/bdd.php"); // importation de la base de données
// Préparation de la requête SQL pour supprimer un tournoi avec l'id 149
$id = $_GET['id'];
$pseudo = $_GET['pseudo'];

$requeteSQL = $bdd->prepare('DELETE FROM inscriptions WHERE id_tournoi = :id AND id_joueur = :pseudo');
$requeteSQL->execute(array(':id' => $id, ':pseudo' => $pseudo));

$requeteSQL2 = $bdd->prepare('UPDATE tournois SET participants = participants - 1 WHERE id = :id');
$requeteSQL2->execute(array(':id' => $id));
// Lier le paramètre à la requête

// Exécution de la requête SQL
if ($requeteSQL->execute()) {
    header("Location: " . $_SERVER['HTTP_REFERER']); // redirection vers la page précédente
} else {
    header("location:../../vue/vueTournoi.php");
}
?>
<?php
include('../../core/bdd.php');

$id = $_GET['id'];
$pseudo = $_GET['pseudo'];

// Vérification si les données existent déjà dans la base de données
$requeteSQL = $bdd->prepare('SELECT COUNT(*) FROM inscriptions WHERE id_tournoi = :id AND id_joueur = :pseudo');
$requeteSQL->execute(array(
         ':id' => $id,
         ':pseudo' => $pseudo));
$resultat = $requeteSQL->fetch();

if ($resultat[0] == 0) {
    // Insertion des données dans la base de données
    $requeteSQL = $bdd->prepare('INSERT INTO inscriptions (id_tournoi, id_joueur) VALUES (:id, :pseudo)');
    $requeteSQL->execute(array(':id' => $id, ':pseudo' => $pseudo));

    $requeteSQL2 = $bdd->prepare('SELECT participants FROM tournois');
    $requeteSQL2->execute();
    $resultat2 = $requeteSQL2->fetch();

    $requeteSQL3 = $bdd->prepare('UPDATE tournois SET participants = participants + 1 WHERE id = :id');
    $requeteSQL3->execute(array(':id' => $id));

    header("Location: " . $_SERVER['HTTP_REFERER']); // redirection vers la page précédente
} else {
    header("location:../../vue/jeux/vueJeuxIndividuel.php"); // redirection
}
?>
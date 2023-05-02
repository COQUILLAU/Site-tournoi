<?php
include('../../core/bdd.php');

//Get l'id du tournoi, la phase, l'id des joueurs
$id = isset($_GET['id']) ? $_GET['id'] : null;
$phase = isset($_GET['phase']) ? $_GET['phase'] : null;
$joueurs = isset($_GET['joueurs']) ? explode(',', $_GET['joueurs']) : null;

// Vérification des données reçues
var_dump($joueurs);

if (!$id || !$joueurs) {
    // Si l'id du tournoi ou la liste des joueurs n'est pas fournie, on arrête le traitement
    die('Erreur : données manquantes');
}

// On extrait les joueurs impairs et pairs dans des tableaux distincts
$joueurs_impairs = array();
$joueurs_pairs = array();
foreach ($joueurs as $index => $joueur) {
    if ($index % 2 == 0) {
        $joueurs_pairs[] = $joueur;
    } else {
        $joueurs_impairs[] = $joueur;
    }
}

// Insertion des phases dans la base de données
$time = new DateTime();
$time_str = $time->format('Y-m-d H:i:s');
$requeteSQL = $bdd->prepare('INSERT INTO phase (id_tournoi, phase, time) VALUES (:id_tournoi, :phase, :time)');
$requeteSQL->execute(array(':id_tournoi' => $id, ':phase' => $phase+1, ':time' => $time_str));

//Select de phase
$requeteSQL2 = $bdd->prepare("SELECT * FROM phase WHERE id_tournoi = :id_tournoi;");
$requeteSQL2->execute(array(':id_tournoi' => $id));
$resultat2 = $requeteSQL2->fetchAll(PDO::FETCH_ASSOC);


$phase = $resultat2[0]['phase'];

for ($i = 0; $i < count($joueurs_impairs); $i += 1) {
    $joueur_impair = $joueurs_impairs[$i];
    $joueur_pair = $joueurs_pairs[$i];

    //Insertion des matchs dans la base de données
    $score_joueur1 = 0;
    $score_joueur2 = 0;
    $requeteSQL3 = $bdd->prepare('INSERT INTO matchs (id_tournoi, id_joueur1, score_joueur1, id_joueur2, score_joueur2, phase) VALUES (:id_tournoi, :id_joueur1, :score_joueur1, :id_joueur2, :score_joueur2, :phase)');
    $requeteSQL3->execute(array(':id_tournoi' => $id, ':id_joueur1' => $joueur_pair, ':score_joueur1' => $score_joueur1, ':id_joueur2' => $joueur_impair, ':score_joueur2' => $score_joueur2, ':phase' => $phase));
}

header("Location: " . $_SERVER['HTTP_REFERER']); // redirection vers la page précédente

?>
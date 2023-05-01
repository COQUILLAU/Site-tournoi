<?php
    include('../../core/bdd.php');
    
    //Get l'id du tournoi, la phase, l'id des joueurs
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $phase = isset($_GET['phase']) ? $_GET['phase'] : null;
    $joueur1 = isset($_GET['joueur1']) ? $_GET['joueur1'] : null;
    $joueur2 = isset($_GET['joueur2']) ? $_GET['joueur2'] : null;
    // Vérification des données reçues
    if (!$id || $joueur1 || $joueur2) {
        header("location:../../../../index.php");

        exit();
    }

    // Insertion des phases dans la base de données
    $time = new DateTime();
    $time_str = $time->format('Y-m-d H:i:s');
    $requeteSQL = $bdd->prepare('INSERT INTO phase (id_tournoi, phase, time) VALUES (:id_tournoi, :phase, :time)');
    $requeteSQL->execute(array(':id_tournoi' => $id, ':phase' => $phase+1, ':time' => $time_str));

    
    //Select de phase
    $requeteSQL2 = $bdd->prepare("SELECT * FROM phase WHERE id_tournoi = '".$id."';");
    $requeteSQL2->execute();
    $resultat2 = $requeteSQL2->fetchAll(PDO::FETCH_ASSOC);

    // Insertion des matchs dans la base de données
    $score_joueur1 = 0;
    $score_joueur2 = 0;
    $phase = $resultat2[0]['phase'];

    $requeteSQL3 = $bdd->prepare('INSERT INTO matchs (id_tournoi, id_joueur1, score_joueur1, id_joueur2, score_joueur2, phase) VALUES (:id, :id_joueur1, :score_joueur1, :id_joueur2, :score_joueur2, :phase)');
    $requeteSQL3->execute(array(':id_tournoi' => $id, ':id_joueur1' => $joueur1, ':score_joueur1' => $score_joueur1, ':id_joueur2' => $joueur2, ':score_joueur2' => $score_joueur2, ':phase' => $phase));

?>
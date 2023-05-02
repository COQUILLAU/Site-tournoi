<?php

include('../../core/bdd.php');

if (isset($_POST['score']) && $_POST['score'] !== '') {
    // on vérifie que le champ n'est pas vide

    // initialisation des variables
    $score = $_POST['score'];
    $idMatch = $_GET['id'];
    $idJoueur = $_GET['id_joueur'];

    // Vérification si les données existent déjà dans la base de données
    $requeteSQL1 = $bdd->prepare("SELECT * FROM matchs WHERE id = :idMatch AND id_joueur1 = :idJoueur");
    $requeteSQL1->execute(array(':idMatch' => $idMatch, ':idJoueur' => $idJoueur));
    $resultat1 = $requeteSQL1->fetch();

    if ($resultat1['id_joueur1'] = true) {
        // Insertion des données dans la base de données
        $requeteSQL2 = $bdd->prepare("UPDATE matchs SET score_joueur1 = :score WHERE id = :idMatch AND id_joueur1 = :idJoueur");
        $requeteSQL2->execute(array(':score' => $score, ':idMatch' => $idMatch, ':idJoueur' => $idJoueur));
        
        // message
        echo 'SCORE inséré avec succès !';
    } else {     
        $requeteSQL3 = $bdd->prepare("UPDATE matchs SET score_joueur2 = :score WHERE id = :idMatch AND id_joueur2 = :idJoueur");
        $requeteSQL3->execute(array(':score' => $score, ':idMatch' => $idMatch, ':idJoueur' => $idJoueur));   
        echo 'score dans le 2 ';
    }
} else {
    // message d'erreur si le champ est vide
    echo 'Erreur : le champ score est obligatoire';
}

?>
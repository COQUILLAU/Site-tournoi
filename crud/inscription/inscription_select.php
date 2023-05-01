<?php
$requeteSQL4 = $bdd->prepare("SELECT * FROM inscriptions WHERE id_tournoi = '".$id."';");
    $requeteSQL4->execute();
    $resultat4 = $requeteSQL4->fetchAll(PDO::FETCH_ASSOC);

    
?>

<?php 
    include('../session.php'); 
    include('../../core/bdd.php');

    if (isset($_GET['id'])) {
        $idJeu = $_GET['id'];
        $nomJeu = $_GET['nom'];
    }
    else{ 
        header("location:../../index.php");
    }
?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../styles/menu.css"> 
        <link rel="stylesheet" href="../../styles/banniere.css">
        <link rel="stylesheet" href="../../styles/affichageJeu.css">
        <title><?php echo $nomJeu ?></title>
    </head>

    <body>
        <?php include_once('../vueMenu.php') ?> 
        <?php

            //Select la banniere d'apex
            $requeteSQL = $bdd->prepare("SELECT * FROM jeux WHERE id = '".$idJeu."'");
            $requeteSQL->execute();
            $resultat = $requeteSQL->fetch(PDO::FETCH_ASSOC);

        ?>

        
        <figure class="vueJeu_banniere">
            <img class="vueJeu_background" src="../../images/banniere/<?php echo $resultat['banniere']; ?>">
            <img class="vueJeu_logo" src="../../images/carre/<?php echo $resultat['logo']; ?>">
        </figure>

        <div class="background">
            <div class="background_all_card_tableau">
                <div class="background_all_card">
                    <?php
                    $requeteSQL2 = $bdd->prepare("SELECT * FROM tournois WHERE id_jeu = '".$idJeu."';");
                    $requeteSQL2->execute();
                    $resultat2 = $requeteSQL2->fetchAll(PDO::FETCH_ASSOC);

                    if ($requeteSQL2->rowCount() == 0) {
                        echo "Aucun tournoi trouvé pour ce jeu ntm.";
                    } else {
                        // Traitement des résultats
                        foreach ($resultat2 as $tournoi) { 
                            echo '<div class="background_card">';
                            echo '<div class="card_top">';
                            echo '<div class="card_left">';
                            echo '<img src="../../images/carre/'.$resultat['logo'].'" class="image_card">';
                            echo '</div>';
                            echo '<div class="card_right">';
                            if(strlen($tournoi['nom']) > 24){
                                echo '<div class="titre">' . substr($tournoi['nom'], 0, 24) . '...' . '</div>';
                            } else {
                                echo '<div class="titre">' . $tournoi['nom'] . '</div>';
                            }                            
                            echo '<div class="contenu">';
                            echo '<div class="contenu_left">';
                            echo '<div class="heure_debut">' . $tournoi['datedebut'] . '</div>';
                            echo '<div class="participant"><span>Participant :</span> <span style="color:white;padding-left: 4px;">' . $tournoi['participants'] . '/64</span></div>';
                            echo '</div>';
                            echo '<div class="contenu_right" style="position: relative;">';
                            echo '<img src="../../images/trophee/'.$resultat['trophee'].'" class="image_trophee">';
                            echo '<span class="cashprize">' . $tournoi['prix'] . '€</span>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="card_bottom">';
                            echo '<a href="vueJeuxIndividuel.php?id=' . $tournoi['id'] . '&nom=' . $tournoi['id_jeu'] . '" class="lien_tournoi">Voir Tournoi</a>';
                            if($role ==1){ echo '<a href="../../crud/tournois/tournois_suppression.php?id=' . $tournoi['id'] . '" class="lien_suppression">Supprimez le tournoi</a>'; }
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>


            
    </body>
</html>

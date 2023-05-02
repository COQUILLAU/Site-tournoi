<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/menu.css">
    <link rel="stylesheet" href="../../styles/affichageJeuIndividuel.css">
    <link rel="stylesheet" href="../../styles/menuJeux.css">
    <link rel="stylesheet" href="../../styles/match.css">
    <title>Document</title>
</head>
    <body>

        <?php 
        include('../../core/bdd.php');
        include_once('../vueMenu.php');
        ?>

        <?php
            if (isset($_GET['id'])) {
                $idJeu = $_GET['id_tournoi'];
                $nomJeu = $_GET['nom'];
            }
            else{ 
                header("location:../../index.php");
            }


            //Select le match
            $requeteSQL = $bdd->prepare("SELECT * FROM matchs WHERE id_tournoi = '".$idJeu."';");
            $requeteSQL->execute();
            $resultat = $requeteSQL->fetch(PDO::FETCH_ASSOC);

            //Select le match auquel le joueur est attribué
            $requeteSQL2 = $bdd->prepare("SELECT * FROM matchs WHERE id_tournoi = :idJeu AND id_joueur1 = :pseudo");
            $requeteSQL2->execute(array(':idJeu' => $idJeu, ':pseudo' => $pseudo));
            $resultat2 = $requeteSQL2->fetch(PDO::FETCH_ASSOC);
            
            $resultat3 = null;

            if (isset($resultat2['id_joueur1'])) {
                echo $resultat2['id_joueur1'];
            } else {
                $requeteSQL3 = $bdd->prepare("SELECT * FROM matchs WHERE id_tournoi = :idJeu AND id_joueur2 = :pseudo");
                $requeteSQL3->execute(array(':idJeu' => $idJeu, ':pseudo' => $pseudo));
                $resultat3 = $requeteSQL3->fetch(PDO::FETCH_ASSOC);
                echo $resultat3['id_joueur2'];
            }
        ?>
        <div class="background_match">
            <div class="match">
                <div class="match_titre">Id du match : <?php echo $resultat['id'];?></div>
                <div class="match_left">
                    <div class ="box_joueur">
                    <span>Nom du joueur : <?php echo isset($resultat2['id_joueur1']) ? $resultat2['id_joueur1'] : $resultat3['id_joueur2']; ?></span>
                    <p>SCORE : <?php echo isset($resultat2['score_joueur1']) ? $resultat2['score_joueur1'] : $resultat3['score_joueur2']; ?></p>

                        <form class="" action="../../crud/match/score_insertion.php?id=<?php echo $resultat['id'];?>&id_joueur=<?php echo $resultat2['id_joueur1'];?>" method="POST">
                            <div class="case">
                                <input class="case_input" type="number" name="score" placeholder="">
                            </div>
                            <button type="submit">Validez votre score</button>
                        </form>

                    </div>
                </div>
                <div class="match_vs">
                    <img src="../../images/VS.png" style="width: 100%;">
                </div>
                <div class="match_right">
                    <div class ="box_joueur">
                    <span>Nom du joueur : <?php echo $resultat3 == null ? $resultat2['id_joueur1'] : $resultat3['id_joueur2']; ?></span>
                        <p>SCORE : <?php echo $resultat2['score_joueur2'];?></p>
                    </div>0.
                </div>
            </div>
        </div>


    </body>
</html>
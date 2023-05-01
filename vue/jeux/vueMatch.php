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

        ?>
        <div class="background_match">
            <div class="match">
                <div class="match_titre">Id du match : <?php echo $resultat['id'];?></div>
                <div class="match_left">
                    <div class ="box_joueur">
                        <span>Nom du joueur : <?php echo $resultat['id_joueur1'];?></span>
                        <p>SCORE : <?php echo $resultat['score_joueur1'];?></p>
                    </div>
                </div>
                <div class="match_vs">
                    <img src="../../images/VS.png" style="width: 100%;">
                </div>
                <div class="match_right">
                    <div class ="box_joueur">
                        <span>Nom du joueur : <?php echo $resultat['id_joueur2'];?></span>
                        <p>SCORE : <?php echo $resultat['score_joueur2'];?></p>
                    </div>
                </div>
            </div>
        </div>

        <?php // LE MENU DU JEUX ?>

        <div class="menu_tournoi">
            <div class="bouton_menu_tournoi">
                <a href="#" class="lien_menu_tournoi" style="border-bottom: 4px solid rgb(16, 181, 223);">BRACKET</a>       
            </div>
            <?php 
                if ($role == 0) { 
                    ?>
                    <div class="bouton_menu_tournoi" style="border-left: solid 2px black; color:blue;">
                        <a href="vueMatch.php?nom=<?php echo $resultat['id']?>&id=<?php echo $joueur['id'];?>&id_tournoi=<?php echo $joueur['id_tournoi'];?>" class="lien_menu_tournoi">MATCH EN COURS</a>       
                    </div>
                    <?php 
                } 
            ?>

            <?php if ($role == 1) { ?>
                <div class="bouton_menu_tournoi" style="border-left: solid 2px black;">
                    <?php if ($nb_joueurs == 2 || $nb_joueurs == 4 || $nb_joueurs == 8 || $nb_joueurs == 16 || $nb_joueurs == 32 || $nb_joueurs == 64 ) { ?>
                        <a href="../../crud/match/match_insertion.php?id=<?php echo $id; ?>" class="lien_menu_tournoi">DEMARRER LE TOURNOI</a>
                    <?php } else { ?>
                        <span class="lien_menu_tournoi" style="opacity:0.5;">DEMARRER LE TOURNOI</span>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

    </body>
</html>
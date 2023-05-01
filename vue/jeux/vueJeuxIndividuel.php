<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/menu.css">
    <link rel="stylesheet" href="../../styles/affichageJeuIndividuel.css">
    <link rel="stylesheet" href="../../styles/bracket.css">
    <link rel="stylesheet" href="../../styles/menuJeux.css">
    <title>Document</title>
</head>
    <body>

        <?php include('../vueMenu.php') ?>
        <?php include('../../core/bdd.php') ?>
        <?php $maintenant = date('Y-m-d\TH:i'); ?>

        <?php
            if (isset($_GET['id'])) {
                $idJeu = $_GET['id'];
                $nomJeu = $_GET['nom'];
            }
            else{ 
                header("location:../../index.php");
            }
            //Select la banniere
            $requeteSQL = $bdd->prepare("SELECT * FROM jeux WHERE id = '".$nomJeu."';");
            $requeteSQL->execute();
            $resultat = $requeteSQL->fetch(PDO::FETCH_ASSOC);

         ?>

        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            // use the $id variable as needed
            $requeteSQL = $bdd->prepare("SELECT * FROM tournois WHERE id = '".$id."';");
            $requeteSQL->execute();
            $resultat2 = $requeteSQL->fetch(PDO::FETCH_ASSOC);
    
            if (empty($resultat2)) {
                echo "Aucun tournoi trouvé pour cet ID.";
            } else {
                // Afficher les données du tournoi
                echo '<div class="background_card">';
                            echo '<div class="card_top">';
                            echo '<div class="card_left">';
                            echo '<img src="../../images/carre/'.$resultat['logo'].'" class="image_card">';
                            echo '</div>';
                            echo '<div class="card_right">';
                            echo '<div class="titre">' . $resultat2['nom'] . '</div>';
                            echo '<div class="contenu">';
                            echo '<div class="contenu_left">';
                            echo '<div class="texte_left">';
                            echo '<div class="heure_debut">' . $resultat2['datedebut'] . '</div>';
                            echo '</div>';
                            echo '<div class="texte_right">';
                            echo '<div class="participant"><span>Participant :</span> <span style="color:white;padding-left: 4px;">' . $resultat2['participants'] . '/64</span></div>';
                            echo '</div>';
                            $requeteSQL3 = $bdd->prepare("SELECT * FROM inscriptions WHERE id_tournoi = '".$id."';");
                            $requeteSQL3->execute();
                            $resultat3 = $requeteSQL3->fetch(PDO::FETCH_ASSOC);

                            $requeteSQL5 = $bdd->prepare("SELECT * FROM phase WHERE id_tournoi = '".$id."';");
                            $requeteSQL5->execute();
                            $resultat5 = $requeteSQL5->fetch(PDO::FETCH_ASSOC);

                            if ( empty($resultat5)) {
                                if(empty($resultat3)){
                                    echo '<a class="texte_inscrire" href="../../crud/inscription/inscription_insertion.php?id=' . $resultat2['id'] . '&pseudo=' . $pseudo . '">S\'INSCRIRE</a>';
                                }    
                                else if ($pseudo != $resultat3['id_joueur']) {
                                    echo '<a class="texte_inscrire" href="../../crud/inscription/inscription_insertion.php?id=' . $resultat2['id'] . '&pseudo=' . $pseudo . '">S\'INSCRIRE</a>';
                                }
                                else{                      
                                    echo '<a class="texte_desinscrire" href="../../crud/inscription/inscription_suppression.php?id=' . $resultat2['id'] . '&pseudo=' . $pseudo . '">SE DÉSINSCRIRE</a>';    
                                }  
                            } else {                      
                                echo '<span class="texte_desinscrire" >INSCRIPTION NON DISPONIBLE</span>';    
                            }     
                  
                            echo '</div>';
                            echo '<div class="contenu_right" style="position: relative;">';
                            echo '<img src="../../images/trophee/'.$resultat['trophee'].'" class="image_trophee">';
                            echo '<span class="cashprize">' . $resultat2['prix'] . '€</span>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="card_bottom">';
                            echo '</div>';
                            echo '</div>';
            }
        }?>

        
        <div class="menu_tournoi">
            <div class="bouton_menu_tournoi">
                <a href="vueBracket.php?nom=<?php echo $nomJeu;?>&id_tournoi=<?php echo $idJeu;?>" class="lien_menu_tournoi">AFFICHER PLUS D'INFORMATIONS</a>       
            </div>
            <?php
                if (isset($joueur) && $role == 0 && $joueur > 0) { 
                    ?>
                    <div class="bouton_menu_tournoi" style="border-left: solid 2px black; color:blue;">
                        <a href="vueMatch.php?id=<?php echo $joueur['id'];?>&id_tournoi=<?php echo $joueur['id_tournoi'];?>" class="lien_menu_tournoi">MATCH EN COURS</a>       
                    </div>
                    <?php 
                } 
            ?>

         </div>

    </body>
</html>
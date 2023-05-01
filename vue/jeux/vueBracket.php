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

<?php
$id = $_GET['id_tournoi'];
$nomJeu = $_GET['nom'];
include_once("../../core/bdd.php");
include_once('../vueMenu.php');

    $requeteSQL = $bdd->prepare("SELECT * FROM jeux WHERE id = '".$nomJeu."';");
    $requeteSQL->execute();
    $resultat = $requeteSQL->fetch(PDO::FETCH_ASSOC);

    // use the $id variable as needed
    $requeteSQL = $bdd->prepare("SELECT * FROM tournois WHERE id = '".$id."';");
    $requeteSQL->execute();
    $resultat2 = $requeteSQL->fetch(PDO::FETCH_ASSOC);

    $requeteSQL5 = $bdd->prepare("SELECT * FROM phase WHERE id_tournoi = '".$id."';");
    $requeteSQL5->execute();
    $resultat5 = $requeteSQL5->fetch(PDO::FETCH_ASSOC);

    include_once("../../crud/inscription/inscription_select.php");

    $joueurs = [];
    $nb_joueurs = count($joueurs);

    foreach ($resultat4 as $joueur) {
        $joueurs[] = $joueur['id_joueur'];
    }
    
    $joueur1 = '';
    $joueur2 = '';
    for ($i = 0; $i < $nb_joueurs; $i++) {
        if ($i % 2 == 0) {
            return $joueur1 = $joueurs[$i];
        } else {
            return $joueur2 = $joueurs[$i];
        }
    }
      
    $nb_matchs = 32;

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

                    $requeteSQL3 = $bdd->prepare("SELECT * FROM inscriptions WHERE id_tournoi = '".$id."' AND id_joueur = '".$pseudo."';");
                    $requeteSQL3->execute();
                    $resultat3 = $requeteSQL3->fetch(PDO::FETCH_ASSOC);
                    
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
    ?>
    <?php // LE MENU DU JEUX ?>

    <div class="menu_tournoi">
        <div class="bouton_menu_tournoi">
            <a href="#" class="lien_menu_tournoi" style="border-bottom: 4px solid rgb(16, 181, 223);">BRACKET</a>       
        </div>
        <?php 
                    //Select le match
                    $requeteSQL7 = $bdd->prepare("SELECT * FROM matchs WHERE id_tournoi = '".$id."';");
                    $requeteSQL7->execute();
                    $resultat7 = $requeteSQL7->fetch(PDO::FETCH_ASSOC);

            if (isset($joueur) && $role == 0 && $joueur > 0) { 
                ?>
                <div class="bouton_menu_tournoi" style="border-left: solid 2px black; color:blue;">
                    <a href="vueMatch.php?nom=<?php echo $resultat['id']?>&id=<?php echo $joueur['id'];?>&id_tournoi=<?php echo $joueur['id_tournoi'];?>" class="lien_menu_tournoi">MATCH EN COURS</a>       
                </div>
                <?php 
            } 
        ?>

        <?php     
        $nb_joueurs = count($joueurs);
        if ($role == 1 && empty($resultat5)) { ?>
            <div class="bouton_menu_tournoi" style="border-left: solid 2px black;">
                <?php if ($nb_joueurs == 2 || $nb_joueurs == 4 || $nb_joueurs == 8 || $nb_joueurs == 16 || $nb_joueurs == 32 || $nb_joueurs == 64 ) { ?>
                    <a href="../../crud/match/match_insertion.php?id=<?php echo $id ?>&id_joueur1=<?php echo $joueur1; ?>&id_joueur2=<?php echo $joueur2; ?>" class="lien_menu_tournoi">DEMARRER LE TOURNOI</a>
                <?php } else { ?>
                    <span class="lien_menu_tournoi" style="opacity:0.5;">DEMARRER LE TOURNOI</span>
                <?php } ?>
            </div>
        <?php } else if($role ==1){ ?>
            <div class="bouton_menu_tournoi" style="border-left: solid 2px black;">
                <span class="lien_menu_tournoi" style="opacity:0.5;">TOURNOI EN COURS</span>
            </div>
        <?php } ?>
    </div>

<?php if(($resultat5['phase'] = true || $resultat5['phase'] == 1)){ ?>
        <div class="bracket"> 
            <!-- ROUND 1 -->
            <div class="round1">
                <div class="match">
                    <div class="player1">
                        <?php echo isset($joueurs[0]) ? $joueurs[0] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[1]) ? $joueurs[1] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match2">
                    <div class="player1">
                        <?php echo isset($joueurs[2]) ? $joueurs[2] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[3]) ? $joueurs[3] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match">
                    <div class="player1">
                        <?php echo isset($joueurs[4]) ? $joueurs[4] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[5]) ? $joueurs[5] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match2">
                    <div class="player1">
                        <?php echo isset($joueurs[6]) ? $joueurs[6] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[7]) ? $joueurs[7] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match">
                    <div class="player1">
                        <?php echo isset($joueurs[8]) ? $joueurs[8] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[9]) ? $joueurs[9] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match2">
                    <div class="player1">
                        <?php echo isset($joueurs[10]) ? $joueurs[10] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[11]) ? $joueurs[11] : "FREEWIN"; ?>
                    </div>
                </div>
                <div class="match">
                    <div class="player1">
                        <?php echo isset($joueurs[12]) ? $joueurs[12] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[13]) ? $joueurs[13] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match2">
                    <div class="player1">
                        <?php echo isset($joueurs[14]) ? $joueurs[14] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[15]) ? $joueurs[15] : "FREEWIN"; ?>
                    </div>
                </div>
                <div class="match">
                    <div class="player1">
                        <?php echo isset($joueurs[16]) ? $joueurs[16] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[17]) ? $joueurs[17] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match2">
                    <div class="player1">
                        <?php echo isset($joueurs[18]) ? $joueurs[18] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[19]) ? $joueurs[19] : "FREEWIN"; ?>
                    </div>
                </div>
                <div class="match">
                    <div class="player1">
                        <?php echo isset($joueurs[20]) ? $joueurs[20] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[21]) ? $joueurs[21] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match2">
                    <div class="player1">
                        <?php echo isset($joueurs[22]) ? $joueurs[22] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[23]) ? $joueurs[23] : "FREEWIN"; ?>
                    </div>
                </div>
                <div class="match">
                    <div class="player1">
                        <?php echo isset($joueurs[24]) ? $joueurs[24] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[25]) ? $joueurs[25] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match2">
                    <div class="player1">
                        <?php echo isset($joueurs[26]) ? $joueurs[26] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[27]) ? $joueurs[27] : "FREEWIN"; ?>
                    </div>
                </div>
                <div class="match">
                    <div class="player1">
                        <?php echo isset($joueurs[28]) ? $joueurs[28] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[29]) ? $joueurs[29] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match2">
                    <div class="player1">
                        <?php echo isset($joueurs[30]) ? $joueurs[30] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[31]) ? $joueurs[31] : "FREEWIN"; ?>
                    </div>
                </div>
                <div class="match">
                    <div class="player1">
                        <?php echo isset($joueurs[32]) ? $joueurs[32] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[33]) ? $joueurs[33] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match2">
                    <div class="player1">
                        <?php echo isset($joueurs[34]) ? $joueurs[34] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[35]) ? $joueurs[35] : "FREEWIN"; ?>
                    </div>
                </div>
                <div class="match">
                    <div class="player1">
                        <?php echo isset($joueurs[36]) ? $joueurs[36] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[37]) ? $joueurs[37] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match2">
                    <div class="player1">
                        <?php echo isset($joueurs[38]) ? $joueurs[38] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[39]) ? $joueurs[39] : "FREEWIN"; ?>
                    </div>
                </div>
                <div class="match">
                    <div class="player1">
                        <?php echo isset($joueurs[40]) ? $joueurs[40] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[41]) ? $joueurs[41] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match2">
                    <div class="player1">
                        <?php echo isset($joueurs[42]) ? $joueurs[42] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[43]) ? $joueurs[43] : "FREEWIN"; ?>
                    </div>
                </div>
                <div class="match">
                    <div class="player1">
                        <?php echo isset($joueurs[44]) ? $joueurs[44] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[45]) ? $joueurs[45] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match2">
                    <div class="player1">
                        <?php echo isset($joueurs[46]) ? $joueurs[46] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[47]) ? $joueurs[47] : "FREEWIN"; ?>
                    </div>
                </div>
                <div class="match">
                    <div class="player1">
                        <?php echo isset($joueurs[48]) ? $joueurs[48] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[49]) ? $joueurs[49] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match2">
                    <div class="player1">
                        <?php echo isset($joueurs[50]) ? $joueurs[50] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[51]) ? $joueurs[51] : "FREEWIN"; ?>
                    </div>
                </div>
                <div class="match">
                    <div class="player1">
                        <?php echo isset($joueurs[52]) ? $joueurs[52] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[53]) ? $joueurs[53] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match2">
                    <div class="player1">
                        <?php echo isset($joueurs[54]) ? $joueurs[54] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[55]) ? $joueurs[55] : "FREEWIN"; ?>
                    </div>
                </div>
                <div class="match">
                    <div class="player1">
                        <?php echo isset($joueurs[56]) ? $joueurs[56] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[57]) ? $joueurs[57] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match2">
                    <div class="player1">
                        <?php echo isset($joueurs[58]) ? $joueurs[58] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[59]) ? $joueurs[59] : "FREEWIN"; ?>
                    </div>
                </div>
                <div class="match">
                    <div class="player1">
                        <?php echo isset($joueurs[60]) ? $joueurs[60] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[61]) ? $joueurs[61] : "FREEWIN"; ?>
                    </div>
                </div>

                <div class="match2">
                    <div class="player1">
                        <?php echo isset($joueurs[62]) ? $joueurs[62] : "FREEWIN"; ?>
                    </div>
                    <div class="player2">
                        <?php echo isset($joueurs[63]) ? $joueurs[63] : "FREEWIN"; ?>
                    </div>
                </div>

            </div>
                    <!-- ROUND 2 -->

            <div class="round">
                <div class="match">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match2">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match2">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match2">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match2">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match2">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match2">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match2">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match2">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>

            </div>

                <!-- ROUND 3 -->

            <div class="round">

                <div class="match">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match2">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match2">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match2">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match2">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>

            </div>

            <!-- ROUND 4 -->

            <div class="round">

                <div class="match">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match2">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match2">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>

            </div> 

            <!-- ROUND 5 -->

            <div class="round">

                <div class="match">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>
                <div class="match2">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>

            </div> 

            <!-- ROUND 6 -->

            <div class="round6">

                <div class="final">
                <div class="player1"></div>
                <div class="player2"></div>
                </div>

            </div>  
        </div>
<?php    } else {echo "LE TOURNOI N'A PAS COMMENCER";} ?>


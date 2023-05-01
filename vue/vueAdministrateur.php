<?php include_once("session.php");
    if($role !=1 ){
        header("location:../index.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/menu.css">
    <link rel="stylesheet" href="../styles/formulaire.css">
    <title>Tournois</title>
</head>
    <body>
        <?php include_once('vueMenu.php') ?>
        <?php include_once("../core/bdd.php"); ?>
        <?php $maintenant = date('Y-m-d\TH:i'); ?>

        <div class="background_formulaire_all">
            <form class="background_formulaire" action="#" method="POST">
                <div class="formulaire_jeu">
                    <span class="formulaire_jeu_titre">CRÉATION D'UN TOURNOI</span>
                    <div class="case">
                        <label for="nom">Nom</label>
                        <input class="case_input" type="text" id="nom" name="nom" placeholder="Nom du tournoi">
                    </div>
                    <div class="case">
                        <label for="datedebut">Date de début</label>
                        <input class="case_input" type="datetime-local" id="datedebut" name="datedebut" min="<?php echo $maintenant ?>">
                    </div>
                    <div class="case">
                        <label for="prix">Cashprize</label>
                        <input class="case_input" type="number" id="prix" name="prix" min="1" class="prix-input">
                    </div>
                    <div class="case">
                        <label for="id_jeu">Jeu</label>
                        <select class="case_input" id="id_jeu" name="id_jeu">
                            <?php
                                // Requête pour récupérer tous les jeux
                                $requeteSQL = $bdd->prepare("SELECT * FROM jeux");
                                $requeteSQL->execute();
                                $resultats = $requeteSQL->fetchAll(PDO::FETCH_ASSOC);

                                // Parcours des résultats et affichage des covers
                                foreach ($resultats as $jeu) { 
                            ?>
                            <option value="<?php echo $jeu["id"]?>"><?php echo $jeu["nom"]?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <input class="case_submit" type="submit" name="ajout" value="AJOUTER" />
                    <?php include "../crud/tournois/tournois_insertion.php";?>
                </div>
            </form>
            
            <form class="background_formulaire" action="#" method="POST" enctype="multipart/form-data">

                <div class="formulaire_jeu">
                    <span class="formulaire_jeu_titre">CREATION D'UN JEU</span>
                    <div class="case">
                        <label>ID</label>
                        <input class="case_input" type="text" name="id" placeholder="id du jeu">
                    </div>
                    <div class="case">
                        <label>NOM</label>
                        <input class="case_input" type="text" name="nom" placeholder="Nom du jeu">
                    </div>
                    <div class="case">
                        <label>LOGO</label>
                        <input  class="case_input" type="file" name="logo" accept="image/png, image/jpeg">
                    </div>
                    <div class="case">
                        <label>BANNIERE</label>
                        <input  class="case_input" type="file" name="banniere" accept="image/png, image/jpeg">
                    </div>
                    <div class="case">
                        <label>TROPHEE</label>
                        <input class="case_input" type="file" name="trophee" accept="image/png, image/jpeg">
                    </div>
                    <input class="case_submit" type="submit" name="valider" value="AJOUTER" />
                    <?php include('../crud/jeux/jeux_insertion.php') ?>
                </div>    
            </form>

        </div>


    </body>
</html>



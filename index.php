<?php 
  include('core/bdd.php');
  include_once("vue/session.php"); 
?> 

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css"> 
    <title>Accueil</title>
</head>

<body>
<?php include_once('vue/vueMenu.php') ?> 

  <div class="contenu">
    <div class="conteneur">
      <div class="jeu">

        <div class="titre">
          <h2 class="titre_haut">TOURNOI</h2>
          <span class="titre_bas">TOUS LES JEUX DISPONIBLES</span>
        </div>

        <div class="bg_tableau">
          <div class="tableau">

            <?php

              // Requête pour récupérer tous les jeux
              $requeteSQL = $bdd->prepare("SELECT * FROM tournoi.jeux");
              $requeteSQL->execute();
              $resultats = $requeteSQL->fetchAll(PDO::FETCH_ASSOC);

              // Parcours des résultats et affichage des covers
              foreach ($resultats as $jeu) { ?>

                  <div class="jeu_cover">
                    <a href="<?php echo "vue/jeux/vueJeux.php?nom=".$jeu['nom']."&id=".$jeu['id'];?>">
                    <img class="image_carree" src="images/carre/<?php echo $jeu['logo'];?>">
                  </div>
       
            <?php } ?>

            
          </div>
        </div>

      </div>
    </div>

  </div>
  
</body>
</html>

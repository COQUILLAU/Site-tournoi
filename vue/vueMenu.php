<?php 
  include_once("session.php"); 
?> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/menu.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title></title>
</head>

<header>
    <div class="menu">


            <div class="menu_logo">
                <h2><a href="http://localhost/Projet%20Tournoi/index.php" class="logo">WIIZ</a></h2>
            </div>

            <div class="menu_nav">
                <nav class="navigation" >
                    <a href="http://localhost/Projet%20Tournoi/vue/vueTournoi.php" button class="links">Tournois</button> </a>
    
                    <?php 
                        if($role ==1 ){
                            echo '<a href="http://localhost/Projet%20Tournoi/vue/vueAdministrateur.php" button class="links">Administrateur</button> </a>';
                        }?>
                </nav>
            </div>

            <div class="menu_profil">
                
                <div class="menu_profil_1" >
                <span class="material-symbols-outlined" style="font-size: 36px;">person</span>
                    <span class="texte_profil"><?php echo $pseudo; ?></span>
                    <?php if($role ==1){
                        echo '<span class="texte_role">ADMINISTRATEUR</span>';
                    }else{
                        echo '<span class="texte_role">JOUEUR</span>';

                    }?>
                </div>

                <div class="menu_profil_2">
                    <a class="menu_profil_2_texte" href="http://localhost/Projet%20Tournoi/vue/deconnexion.php">
                        Déconnexion 
                        <span class="material-symbols-rounded" style="font-size: 30px; padding-left: 3%;">logout</span>
                    </a>
                </div>

            </div>

    </div>
</header>

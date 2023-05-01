<?php
    if (isset($_POST['nom']) && 
            isset($_POST['datedebut']) && 
            isset($_POST['prix']) && 
            isset($_POST['id_jeu'])) { // on vérifie qu'aucun champs ne soient vides.

                // initialisation des variables, ou pas, question de préférence. 
                $nom = $_POST['nom'];
                $datedebut = $_POST['datedebut'];
                $prix = $_POST['prix'];
                $id_jeu = $_POST['id_jeu'];
            
                 // Vérification si les données existent déjà dans la base de données
                $requeteSQL = $bdd->prepare('SELECT COUNT(*) FROM tournois WHERE nom = :nom AND datedebut = :datedebut AND prix = :prix AND id_jeu = :id_jeu');
                $requeteSQL->execute(array(
                        ':nom' => $nom,
                        ':datedebut' => $datedebut,
                        ':prix' => $prix,
                        ':id_jeu' => $id_jeu));
                $resultat = $requeteSQL->fetch();

                if ($resultat[0] == 0) {
                        // Insertion des données dans la base de données
                        $requeteSQL = $bdd->prepare('INSERT INTO tournois (nom, datedebut, prix, id_jeu) VALUES (:nom, :datedebut, :prix, :id_jeu)');
                        $requeteSQL->execute(array(':nom' => $nom, ':datedebut' => $datedebut, ':prix' => $prix, ':id_jeu' => $id_jeu));
                }
                
                // message
                echo 'Tournoi inséré avec succès !';
        }
    
?>

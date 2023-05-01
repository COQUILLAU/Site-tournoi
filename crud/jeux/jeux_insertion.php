<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs ont été remplis

    if (isset($_POST["id"]) && isset($_POST["nom"]) && !empty($_FILES["logo"]["name"]) && !empty($_FILES["banniere"]["name"]) && !empty($_FILES["trophee"]["name"])) {
        
        // Initialisation des variables
        $id = $_POST["id"];
        $nom = $_POST["nom"];
        $logo = $_FILES["logo"]["name"];
        $banniere = $_FILES["banniere"]["name"];
        $trophee = $_FILES["trophee"]["name"];

        // Vérification si les données existent déjà dans la base de données
        $requeteSQL = $bdd->prepare('SELECT COUNT(*) FROM jeux WHERE id = :id AND nom = :nom AND logo = :logo AND banniere = :banniere AND trophee = :trophee');
        $requeteSQL->execute(array(
            ':id' => $id,
            ':nom' => $nom,
            ':logo' => $logo,
            ':banniere' => $banniere,
            ':trophee' => $trophee
        ));
        $resultat = $requeteSQL->fetch();

        if ($resultat[0] == 0) {
            
            $dossierLogo = 'C:/xampp/htdocs/Projet Tournoi/images/carre/';
            $dossierBanniere = 'C:/xampp/htdocs/Projet Tournoi/images/banniere/';
            $dossierTrophee = 'C:/xampp/htdocs/Projet Tournoi/images/trophee/';

            // Déplacer les fichiers téléchargés vers un dossier sur le serveur
            move_uploaded_file($_FILES["logo"]["tmp_name"], $dossierLogo . $logo);
            move_uploaded_file($_FILES["banniere"]["tmp_name"], $dossierBanniere . $banniere);
            move_uploaded_file($_FILES["trophee"]["tmp_name"], $dossierTrophee . $trophee);

            // Insertion des données dans la base de données
            $requeteSQL = $bdd->prepare('INSERT INTO jeux (id, nom, logo, banniere, trophee) VALUES (:id, :nom, :logo, :banniere, :trophee)');
            $requeteSQL->execute(array(
                ':id' => $id,
                ':nom' => $nom,
                ':logo' => $logo,
                ':banniere' =>  $banniere,
                ':trophee' => $trophee
            ));
            // Message de confirmation
            echo "Le jeu a été ajouté avec succès !";
        } else {
            // Message d'erreur
            echo "Le jeu existe déjà dans la base de données !";
        }
    }else{
        echo "le formulaire n'est pas bien remplit";
        /*echo $_POST["id"];
        echo $_POST["nom"];
        echo $_FILES['logo']['name'];
        echo $_FILES['logo']['type'];
        echo $_FILES['logo']['size']; */
    }
} 
?>
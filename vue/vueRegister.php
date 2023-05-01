<?php
// Connexion à la base de données
include("../core/bdd.php"); // importation de la base de données

// Vérifier si le formulaire a été soumis
if(isset($_POST['inscription'])) {
    // Récupérer les données saisies dans le formulaire
    $identifiant = $_POST['identifiant'];
    $motdepasse = $_POST['pass'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $dateNaissance = $_POST['dateNaissance'];
    $email = $_POST['email'];
    
    // Préparer la requête SQL avec des paramètres
    $requeteSQL = $bdd->prepare('INSERT INTO utilisateurs (dateCreation, pseudo, pass, email, dateNaissance) VALUES (NOW(), :pseudo, :pass, :email, :dateNaissance);');

    // Exécuter la requête SQL avec les valeurs saisies dans le formulaire
    $requeteSQL->execute(array(
        'pseudo' => $identifiant,
        'pass' => md5($motdepasse),
        'email' => $email,
        'dateNaissance' => $dateNaissance
    ));
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/register.css">
    <title>Connexion</title>
</head>
<body>
    <div class="bg_all">
        <div class="head">
            <h2>BIENVENUE</h2>
            <span>REJOIGNEZ NOUS</span>
        </div>
            <div class="background_form">

                <div class="background_form_image">
                    <img src='../images/celeste.png' height=100%; width=100%;>
                </div>

                <div class="background_form_formulaire_fond">
                    <div class="login-box">
            
                        <form method="post" action="">
                            <span class="membre">Déjà membre ? <a class="lien1" href ="vueConnexion.php">Se connecter</a></span> 
                            <div class="user-box">
                                <input type="text" name="identifiant" required="required">
                                <label>Identifiant</label>
                            </div>

                            <div class="user-box">
                                <input type="password" name="pass" required="required">
                                <label>Mot de passe</label>
                            </div>
                    
                            <div class="user-box">
                                <input type="text" name="prenom" required="required">
                                <label>Prénom</label>
                            </div>

                            <div class="user-box">
                                <input type="text" name="nom" required="required">
                                <label>Nom</label>
                            </div>

                            <div class="user-box">
                                <input type="date" name="dateNaissance" required="required">
                            </div>

                            <div class="user-box">
                                <input type="email" name="email" required="required">
                                <label>Adresse e-mail</label>
                            </div>
                        
                            <a class="lien2" href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <input type="submit" name="inscription" value="S'INSCRIRE" style="width:250px;height:50px;border:none;background:none;color:white;letter-spacing:2px;font-size:20px;cursor:pointer;color:#03e9f4;"/>
                        </form>

                    </div>
                </div>

        </div>
        <br>
    </div>

</body>
</html>
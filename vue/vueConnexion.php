<?php 
// CONNEXION
    session_start();
    @$pseudo=$_POST["pseudo"]; // variable du formulaire
    @$pass=md5($_POST["pass"]); // on prends le mdp de l'utilisateur, et on le hash en md5, afin de comparer le hash de la bdd.
    @$valider=$_POST["valider"]; // variable submit du formulaire
    $msgErreur=""; // on prépare un message d'erreur en cas d'echec de connexion
    
    if(isset($valider)){ // si le formulaire a été remplit et est existant alors :

        include("../core/bdd.php"); // importation de la base de données

        $reqSQL = $bdd->prepare("select * from utilisateurs where pseudo=? and pass=? limit 1"); // requete SQL permettant de récupérer l'utilisateur dans la bdd s'il existe
        // on peut voir qu'on limite le résultat à 1, ca permet d'éviter les doublons si on a deux pseudos identiques dans la bdd
        $reqSQL->execute(array($pseudo,$pass)); // on execute la requete
        $resultats=$reqSQL->fetchAll(); // on liste les résultats de la requete et on boucle dedans
            if(count($resultats)>0){ // si on a un résultat, donc > 0, c'est qu'on a trouvé un user avec le meme pseudo et mdp
                
                // $_SESSION[] est un stockage au niveau du site.
                // on vient récupérer le résultat de la requete, donc l'utilisateur avec toutes ses informations,
                // puis on stock le tout dans la session, il pourra ainsi naviguer sur le site avec ses informations
                // et nous on pourra jouer avec pour faire des conditions ou autres
                $_SESSION["pseudo"]=$resultats[0]["pseudo"];
                $_SESSION["email"]=$resultats[0]["email"];
                $_SESSION["role"]=$resultats[0]["role"];

                $_SESSION["autoriser"] = "oui"; // ici une autorisation de naviguer, mais pas obligatoire

                header("location:../index.php"); // redirection vers la page que vous souhaitez si la connexion est bonne

            }
            else{ 
                $msgErreur="Mauvais login ou mot de passe!"; // Si on trouve aucun utilisateur dans la bdd
            } 
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login.css">
    <title>Connexion</title>
</head>
<body>
    <div class="background_form">
        <div class="background_form_image">
            <img src='../images/celeste2.png' height=100%; width=100%;>
        </div>

        <div class="background_form_formulaire_fond">

            <div class="login-box">
                <h2>Connexion</h2>

                <form method="post" action="">
                    
                    <div class="user-box">
                        <input type="text" name="pseudo" >
                        <label>Utilisateur</label>
                    </div>

                    <div class="user-box">
                        <input type="password" name="pass">
                        <label>Mot de passe</label>
                    </div>
                    <div class="erreur" style="color:red;"><?php echo $msgErreur ?></div>

        
                    <a class="lien1" href="#">

                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <input style="width:250px;height:50px;border:none;background:none;color:white;letter-spacing:2px;font-size:20px;cursor:pointer;color:#03e9f4;" type="submit" name="valider" value="SE CONNECTER" />
                    </a>

                    
                    <div class="create-box">
                        <span>
                        Vous n'êtes toujours pas membre ?
                        <a class="lien2" href = "../vue/vueRegister.php">Créer un compte</a>
                        </span>
                    </div>
                </form>

            </div>
        </div>
        
    </div>
    <br><br><br><br>
</body>
</html>
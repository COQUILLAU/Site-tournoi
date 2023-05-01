<?php

$requeteSQL = $bdd->prepare("SELECT * FROM tournois WHERE id_jeu = '".$idJeu."';");
$requeteSQL->execute();
$resultat = $requeteSQL->fetchAll(PDO::FETCH_ASSOC);

if ($requeteSQL->rowCount() == 0) {
    echo "Aucun tournoi trouvé pour ce jeu.";
} else {
    // Traitement des résultats
    foreach ($resultat as $tournoi) {
      echo'<br>';
    
      echo "<table border=1 width=100%>
        <tr>
          <th>ID</th>
          <th>nom</th>
          <th>datedebut</th>
          <th>prix</th>
          <th>jeu</th>
          <th>Supprimez</th>
        </tr>
      
        <tr>
          <td align=center width=5%>" . $tournoi['id'] . "</td>
          <td align=center width=15%>" . $tournoi['nom'] . "</td>
          <td align=center width=20%>" . $tournoi['datedebut'] . "</td>
          <td align=center width=10%>" . $tournoi['prix'] . "</td>
          <td align=center width=25%>" . $tournoi['id_jeu'] . "</td>
          <td align=center width=5%> 
  
          <a href='../crud/tournois/tournois_delete.php?id=".$tournoi['id']."'>
          <img src='../../images/Croixx.webp' height=100%; width=100%;>
          </a>
          </td>
        </tr>
      </table>";
      echo'<br>'; 
    }
}

?>

</body>
</html>

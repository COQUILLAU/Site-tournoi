<?php


$requeteSQL = $bdd->prepare('SELECT * FROM tournois;');
$requeteSQL->execute(); 
while ($row = $requeteSQL->fetch()) { 
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
        <td align=center width=5%>" . $row['id'] . "</td>
        <td align=center width=15%>" . $row['nom'] . "</td>
        <td align=center width=20%>" . $row['datedebut'] . "</td>
        <td align=center width=10%>" . $row['prix'] . "</td>
        <td align=center width=25%>" . $row['id_jeu'] . "</td>
        <td align=center width=5%> 

        <a href='../crud/tournois/tournois_delete.php?id=".$row['id']."'>
        <img src='../../images/Croixx.webp' height=100%; width=100%;>
        </a>
        </td>
      </tr>
    </table>";
    echo'<br>';
} 
?>

</body>
</html>

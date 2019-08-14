<p style="text-align: center">Il y a actuellement <?= $nombreChapters ?> chapters. En voici la liste :</p>

<table>
  <tr><th>Auteur</th><th>Titre</th><th>Date d'ajout</th><th>Dernière modification</th><th>Action</th></tr>
<?php
foreach ($listeChapters as $chapters)
{
  echo '<tr><td>', $chapters['auteur'], '</td><td>', $chapters['title'], '</td><td>le ', $chapters['DateAdd']->format('d/m/Y à H\hi'), '</td><td>', ($chapters['DateAdd'] == $chapters['dateUpdate'] ? '-' : 'le '.$chapters['dateUpdate']->format('d/m/Y à H\hi')), '</td><td><a href="chapters-update-', $chapters['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a> <a href="chapters-delete-', $chapters['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td></tr>', "\n";
}
?>
</table>
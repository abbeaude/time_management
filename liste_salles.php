<?php include 'db.php'; include 'header.php'; ?>
<div class="card">
  <h2>Liste des salles</h2>
  <a href="ajouter_salle.php"><button class="secondary">Nouvelle salle</button></a>
  <table class="table">
    <thead><tr><th>Nom</th><th>Capacité</th></tr></thead>
    <tbody>
      <?php
        $r = $cnx->query('SELECT nom, capacite FROM salle ORDER BY nom');
        foreach ($r as $row) echo "<tr><td>".htmlspecialchars($row['nom'])."</td><td>".htmlspecialchars($row['capacite'])."</td></tr>";
      ?>
    </tbody>
  </table>
</div>
<?php include 'footer.php'; ?>

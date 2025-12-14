<?php include 'db.php'; include 'header.php'; ?>
<div class="card">
  <h2>Liste des professeurs</h2>
  <a href="ajouter_professeur.php"><button class="secondary">Nouvel enseignant</button></a>
  <table class="table">
    <thead><tr><th>Nom</th><th>Prénom</th></tr></thead>
    <tbody>
      <?php
        $r = $cnx->query('SELECT nom, prenom FROM professeur ORDER BY nom');
        foreach ($r as $row) echo "<tr><td>".htmlspecialchars($row['nom'])."</td><td>".htmlspecialchars($row['prenom'])."</td></tr>";
      ?>
    </tbody>
  </table>
</div>
<?php include 'footer.php'; ?>

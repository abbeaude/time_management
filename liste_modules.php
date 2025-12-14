<?php include 'db.php'; include 'header.php'; ?>
<div class="card">
  <h2>Liste des modules</h2>
  <a href="ajouter_module.php"><button class="secondary">Nouveau module</button></a>
  <table class="table">
    <thead><tr><th>Module</th><th>Filière</th></tr></thead>
    <tbody>
      <?php
        $r = $cnx->query('SELECT m.nom AS module, f.nom AS filiere FROM module m LEFT JOIN filiere f ON m.id_filiere = f.id ORDER BY m.nom');
        foreach ($r as $row) echo "<tr><td>".htmlspecialchars($row['module'])."</td><td>".htmlspecialchars($row['filiere'])."</td></tr>";
      ?>
    </tbody>
  </table>
</div>
<?php include 'footer.php'; ?>

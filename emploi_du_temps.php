<?php include 'db.php'; include 'header.php'; ?>
<div class="card">
  <h2>Emploi du temps (par jour)</h2>

  <?php
    $jours = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'];

    foreach ($jours as $jour) {

      echo "<h3>$jour</h3>";

      $stmt = $cnx->prepare('
        SELECT s.debut, s.fin, 
               m.nom AS module, 
               CONCAT(p.nom, " ", p.prenom) AS enseignant,
               sa.nom AS salle
        FROM seance s 
        JOIN module m ON s.id_module = m.id 
        JOIN professeur p ON s.id_professeur = p.id 
        JOIN salle sa ON s.id_salle = sa.id 
        WHERE s.jour = ? 
        ORDER BY s.debut
      ');

      $stmt->execute([$jour]);
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if (!$rows) {
        echo "<div class='small'>Aucune séance pour ce jour.</div>";
      } else {

        echo '<table class="table"><thead><tr>';

        
        echo '<th>Heure</th>';
        foreach (array_keys($rows[0]) as $col) {
          if (!in_array($col, ['debut', 'fin'])) { 
            echo '<th>' . htmlspecialchars(ucfirst($col)) . '</th>';
          }
        }

        echo '</tr></thead><tbody>';

        //  Génère automatiquement les lignes
        foreach ($rows as $r) {
          echo '<tr>';

          // Heure → format spécial
          $heure = htmlspecialchars(substr($r['debut'],0,5)) . ' - ' . htmlspecialchars(substr($r['fin'],0,5));
          echo "<td>$heure</td>";

          // autres colonnes générées automatiquement
          foreach ($r as $col => $value) {
            if (!in_array($col, ['debut','fin'])) { 
              echo '<td>' . htmlspecialchars($value) . '</td>';
            }
          }

          echo '</tr>';
        }

        echo '</tbody></table>';
      }
    }
  ?>
</div>
<?php include 'footer.php'; ?>

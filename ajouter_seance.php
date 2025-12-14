<?php include 'db.php'; ?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Ajouter Séance</title><link rel="stylesheet" href="style.css"></head>
<body>
<?php include 'header.php'; ?>
<div class="card">
  <h2>Ajouter une séance</h2>
  <form method="POST">
    <label class="small">Module :</label>
    <select name="id_module" required>
      <option value="">-- Choisir --</option>
      <?php $r = $cnx->query('SELECT id, nom FROM module ORDER BY nom'); foreach ($r as $row) echo "<option value=\"{$row['id']}\">".htmlspecialchars($row['nom'])."</option>"; ?>
    </select>

    <label class="small">Professeur :</label>
    <select name="id_professeur" required>
      <option value="">-- Choisir --</option>
      <?php $r = $cnx->query('SELECT id, nom, prenom FROM professeur ORDER BY nom'); foreach ($r as $row) echo "<option value=\"{$row['id']}\">".htmlspecialchars($row['nom'].' '.$row['prenom'])."</option>"; ?>
    </select>

    <label class="small">Salle :</label>
    <select name="id_salle" required>
      <option value="">-- Choisir --</option>
      <?php $r = $cnx->query('SELECT id, nom FROM salle ORDER BY nom'); foreach ($r as $row) echo "<option value=\"{$row['id']}\">".htmlspecialchars($row['nom'])."</option>"; ?>
    </select>

    <label class="small">Jour :</label>
    <select name="jour" required>
      <option value="Lundi">Lundi</option>
      <option value="Mardi">Mardi</option>
      <option value="Mercredi">Mercredi</option>
      <option value="Jeudi">Jeudi</option>
      <option value="Vendredi">Vendredi</option>
      <option value="Samedi">Samedi</option>
    </select>

    <label class="small">Heure de début :</label>
    <input type="time" name="debut" required>
    <label class="small">Heure de fin :</label>
    <input type="time" name="fin" required>

    <button class="primary" type="submit">Ajouter séance</button>
  </form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_module = (int)$_POST['id_module'];
    $id_prof = (int)$_POST['id_professeur'];
    $id_salle = (int)$_POST['id_salle'];
    $jour = $_POST['jour'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];

    if ($fin <= $debut) {
        echo "<script>alert('Heure de fin doit être après l\'heure de début');</script>";
    } else {
        $stmt = $cnx->prepare('INSERT INTO seance (id_module, id_professeur, id_salle, jour, debut, fin) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([$id_module, $id_prof, $id_salle, $jour, $debut, $fin]);
        echo "<script>alert('Séance ajoutée'); window.location='emploi_du_temps.php';</script>";
    }
}
?>
<?php include 'footer.php'; ?>
</body>
</html>

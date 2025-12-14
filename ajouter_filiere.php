<?php include 'db.php'; ?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Ajouter Filière</title><link rel="stylesheet" href="style.css"></head>
<body>
<?php include 'header.php'; ?>
<div class="card">
  <h2>Ajouter une filière</h2>
  <form method="POST">
    <input type="text" name="nom" placeholder="Nom de la filière" required>
    <label class="small">Département :</label>
    <select name="id_departement" required>
      <option value="">-- Choisir --</option>
      <?php
        $r = $cnx->query('SELECT id, nom FROM departement ORDER BY nom');
        foreach ($r as $row) {
            echo "<option value=\"{$row['id']}\">".htmlspecialchars($row['nom'])."</option>";
        }
      ?>
    </select>
    <button class="primary" type="submit">Ajouter</button>
  </form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $id_dep = (int)$_POST['id_departement'];
    $stmt = $cnx->prepare('INSERT INTO filiere (nom, id_departement) VALUES (?, ?)');
    $stmt->execute([$nom, $id_dep]);
    echo "<script>alert('Filière ajoutée'); window.location='liste_filieres.php';</script>";
}
?>
<?php include 'footer.php'; ?>
</body>
</html>

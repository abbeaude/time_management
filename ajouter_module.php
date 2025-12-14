<?php include 'db.php'; ?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Ajouter Module</title><link rel="stylesheet" href="style.css"></head>
<body>
<?php include 'header.php'; ?>
<div class="card">
  <h2>Ajouter un module</h2>
  <form method="POST">
    <input type="text" name="nom" placeholder="Nom du module" required>
    <label class="small">Filière :</label>
    <select name="id_filiere" required>
      <option value="">-- Choisir --</option>
      <?php
        $r = $cnx->query('SELECT id, nom FROM filiere ORDER BY nom');
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
    $id_fil = (int)$_POST['id_filiere'];
    $stmt = $cnx->prepare('INSERT INTO module (nom, id_filiere) VALUES (?, ?)');
    $stmt->execute([$nom, $id_fil]);
    echo "<script>alert('Module ajouté'); window.location='liste_modules.php';</script>";
}
?>
<?php include 'footer.php'; ?>
</body>
</html>

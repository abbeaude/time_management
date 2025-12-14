<?php include 'db.php'; ?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Ajouter Département</title><link rel="stylesheet" href="style.css"></head>
<body>
<?php include 'header.php'; ?>
<div class="card">
  <h2>Ajouter un département</h2>
  <form method="POST">
    <input type="text" name="nom" placeholder="Nom du département" required>
    <button class="primary" type="submit">Ajouter</button>
  </form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $stmt = $cnx->prepare('INSERT INTO departement (nom) VALUES (?)');
    $stmt->execute([$nom]);
    echo "<script>alert('Département ajouté'); window.location='liste_departements.php';</script>";
}
?>
<?php include 'footer.php'; ?>
</body>
</html>

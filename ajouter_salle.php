<?php include 'db.php'; ?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Ajouter Salle</title><link rel="stylesheet" href="style.css"></head>
<body>
<?php include 'header.php'; ?>
<div class="card">
  <h2>Ajouter une salle</h2>
  <form method="POST">
    <input type="text" name="nom" placeholder="Nom de la salle" required>
    <input type="number" name="capacite" placeholder="Capacité" min="1" required>
    <button class="primary" type="submit">Ajouter</button>
  </form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $capacite = (int) $_POST['capacite'];
    $stmt = $cnx->prepare('INSERT INTO salle (nom, capacite) VALUES (?, ?)');
    $stmt->execute([$nom, $capacite]);
    echo "<script>alert('Salle ajoutée'); window.location='liste_salles.php';</script>";
}
?>
<?php include 'footer.php'; ?>
</body>
</html>

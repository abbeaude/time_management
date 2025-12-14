<?php include 'db.php'; ?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Ajouter Professeur</title><link rel="stylesheet" href="style.css"></head>
<body>
<?php include 'header.php'; ?>
<div class="card">
  <h2>Ajouter un professeur</h2>
  <form method="POST">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="prenom" placeholder="Prénom" required>
    <button class="primary" type="submit">Ajouter</button>
  </form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $stmt = $cnx->prepare('INSERT INTO professeur (nom, prenom) VALUES (?, ?)');
    $stmt->execute([$nom, $prenom]);
    echo "<script>alert('Professeur ajouté avec succès'); window.location='liste_professeurs.php';</script>";
}
?>
<?php include 'footer.php'; ?>
</body>
</html>

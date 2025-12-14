<?php include 'db.php'; ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Accueil - Gestion Emploi du Temps</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="card">
  <h2 style=" text-align:center; ">Actions rapides</h2>
  <div class="flex">
  <a href="ajouter_departement.php"><button class="primary">Ajouter departement</button></a>
    <a href="ajouter_professeur.php"><button class="primary">Ajouter Professeur</button></a>
    <a href="ajouter_salle.php"><button class="primary">Ajouter Salle</button></a>
    <a href="ajouter_module.php"><button class="primary">Ajouter Module</button></a>
    <a href="ajouter_seance.php"><button class="primary">Ajouter Séance</button></a>
    <a href="ajouter_filiere.php"><button class="primary">Ajouter filiere</button></a>

  </div>
</div>
<div class="card">
  <h3>Listes rapides</h3>
  <div class="flex">
    <a href="liste_professeurs.php"><button class="secondary">Voir Professeurs</button></a>
    <a href="liste_salles.php"><button class="secondary">Voir Salles</button></a>
    <a href="liste_modules.php"><button class="secondary">Voir Modules</button></a>
  </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>

<?php
session_start();
if($_SESSION['role']!='admin') header("Location: login.php");
?>
<link rel="stylesheet" href="style.css">
<div class="card">
<h2>Bienvenue Admin</h2>
<p><?php echo $_SESSION['nom']; ?></p>
<a href="logout.php">Déconnexion</a>
</div>
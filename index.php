<?php
session_start();
include 'db1.php';
if(isset($_POST['login'])){
 $email=$_POST['email'];
 $password=hash('sha256',$_POST['password']);
 $stmt=$cnx->prepare("SELECT * FROM users WHERE email=? AND mot_de_passe=?");
 $stmt->execute([$email,$password]);
 $u=$stmt->fetch();
 if($u){
  $_SESSION['nom']=$u['nom'];
  $_SESSION['role']=$u['role'];
 
  if ($u['role'] == 'admin') {
    header("Location: acceil.php");
} elseif ($u['role'] == 'professeur') {
    header("Location: emploi_du_temps.php");
}
exit();


 }
 $erreur="Email ou mot de passe incorrect";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Connexion</title>
<link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="card">
<h2>Connexion</h2>
<?php if(isset($erreur)) echo "<p class='error'>$erreur</p>"; ?>
<form method="post">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Mot de passe" required>
<button name="login">Se connecter</button>
</form>
</div>
</body>
</html>
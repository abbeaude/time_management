<?php
?> 
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Gestion École</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <header class="site-header">
    <div class="container header-inner">
      <div class="brand">
        <span class="site-title">Gestion D'Emploi de Temps</span>
      </div>
      <nav class="nav">
        <button class="btn ghost" aria-label="Se connecter">Se connecter</button>
      </nav>
    </div>
  </header>

  <main>
    <!-- HERO -->
    <section class="hero">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1>Bienvenue sur notre Site de Gestion D'emploi de Temps</h1>
        <p class="lead">Une solution complète pour gérer professeurs, étudiants et horaires de .</p>
        <div class="hero-cta">
          <button class="btn-primary" type="button" id="accessBtn">Accéder à votre espace</button>
          <button class="btn-ghost" type="button" id="learn-more">En savoir plus</button>
        </div>
      </div>
    </section>

    <!-- WHY -->
    <section class="why container">
      <h2>Pourquoi utiliser notre Site  ?</h2>
      <div class="cards">
        <article class="card">
          <h3>Gestion des modules</h3>
          <p>Ajoutez, modifiez et organisez facilement les modules de formation.</p>
        </article>

       <article class="card">
          <h3>Gestion des professeurs</h3>
          <p>Assignez les sections et suivez les performances des enseignants.</p>
        </article> 

        <article class="card">
          <h3>Suivi des etudiants</h3>
          <p>Suivez l'évolution de chaque etudiant en temps réel.</p>
        </article>
      </div>
    </section>

    <section class="footer-cta">
      <div class="container">
        <p>Prêt(e) à commencer ?</p>
        <button class="btn primary" type="button">Créer un compte </button>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container">
      <small>© <?=date('Y')?> Gestion D'emploi de Temps</small>
    </div>
  </footer>

  <script src="main.js"></script>
  
   <script>
document.getElementById("accessBtn").addEventListener("click", function() {
    window.location.href = "login.php"; 
});
</script>
</body>
</html>

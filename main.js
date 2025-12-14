// main.js - Comportements simples : animations d'apparition et gestion des boutons
document.addEventListener('DOMContentLoaded', function(){
  
  const fadeEls = document.querySelectorAll('.hero-content, .card');
  fadeEls.forEach((el, i) => {
    el.style.opacity = 0;
    el.style.transform = 'translateY(10px)';
    setTimeout(() => {
      el.style.transition = 'opacity 550ms ease, transform 550ms ease';
      el.style.opacity = 1;
      el.style.transform = 'translateY(0)';
    }, 80 + i * 120);
  });

 


  //  "Accéder à votre espace" -> affichage d'un modal simple
  const openBtn = document.getElementById('open-space');
  openBtn && openBtn.addEventListener('click', () => {
    alert("Accès simulé : ici vous déclencheriez l'ouverture de l'espace utilisateur (login).");
  });

  // "En savoir plus" : scroll vers la section why
  const learnBtn = document.getElementById('learn-more');
  learnBtn && learnBtn.addEventListener('click', () => {
    const why = document.querySelector('.why');
    why && why.scrollIntoView({behavior:'smooth', block:'start'});
  });

   
});

// Smooth scroll sederhana untuk anchor links
(function() {
  const links = document.querySelectorAll('a[href^="#"]');
  links.forEach(a => a.addEventListener('click', function(e){
    const targetId = this.getAttribute('href').slice(1);
    if (!targetId) return;
    const target = document.getElementById(targetId);
    if (!target) return;
    e.preventDefault();
    window.scrollTo({ top: target.offsetTop - 70, behavior: 'smooth' });
  }));
})();

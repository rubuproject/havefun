document.addEventListener('DOMContentLoaded', () => {
  const fadeEls = document.querySelectorAll('.animate-fade');
  const io = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) entry.target.classList.add('in');
    });
  }, { threshold: 0.15 });
  fadeEls.forEach(el => io.observe(el));

  const nav = document.querySelector('.nav');
  const onScroll = () => {
    if (!nav) return;
    if (window.scrollY > 10) nav.classList.add('scrolled'); else nav.classList.remove('scrolled');
  };
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });
});

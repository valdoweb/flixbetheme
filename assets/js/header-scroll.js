(() => {
  const header = document.querySelector('header.site-header');
  if (!header) return;
  const threshold = 10;
  let ticking = false;
  function update() {
    const y = window.scrollY || window.pageYOffset;
    header.classList.toggle('is-scrolled', y > threshold);
    document.body.classList.toggle('has-scrolled-header', y > threshold);
    ticking = false;
  }
  window.addEventListener('scroll', () => {
    if (!ticking) {
      requestAnimationFrame(update);
      ticking = true;
    }
  }, { passive: true });
  update();
})();
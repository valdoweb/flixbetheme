(() => {
  const header = document.getElementById('site-header');
  if (!header) return;

  const threshold = 10;
  let ticking = false;

  function update() {
    const y = window.scrollY || window.pageYOffset;
    if (y > threshold) {
      if (!header.classList.contains('is-scrolled')) {
        header.classList.add('is-scrolled');
        document.body.classList.add('has-scrolled-header');
      }
    } else {
      if (header.classList.contains('is-scrolled')) {
        header.classList.remove('is-scrolled');
        document.body.classList.remove('has-scrolled-header');
      }
    }
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
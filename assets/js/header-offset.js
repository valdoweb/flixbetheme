(function () {
  function applyHeaderOffset() {
    var header = document.querySelector('.site-header');
    if (!header) return;

    // Header bottom relative to viewport (includes any CSS top on header)
    var bottom = header.getBoundingClientRect().bottom;

    // Subtract WP admin bar height (if present) to avoid double offset
    var adminBar = document.getElementById('wpadminbar');
    var adminH = adminBar ? adminBar.offsetHeight : 0;

    var pad = Math.max(0, bottom - adminH);
    document.body.style.paddingTop = pad + 'px';
  }

  var scheduled;
  function schedule() {
    if (scheduled) return;
    scheduled = requestAnimationFrame(function () {
      scheduled = null;
      applyHeaderOffset();
    });
  }

  // Initial
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', applyHeaderOffset);
  } else {
    applyHeaderOffset();
  }
  window.addEventListener('load', applyHeaderOffset);
  window.addEventListener('resize', schedule);
  window.addEventListener('orientationchange', schedule);

  // Recalculate when nav overlay toggles
  document.addEventListener('click', function (e) {
    if (e.target.closest('.wp-block-navigation__responsive-container-open, .wp-block-navigation__responsive-container-close')) {
      setTimeout(applyHeaderOffset, 50);
    }
  });

  // React to header size changes (if supported)
  if ('ResizeObserver' in window) {
    var header = document.querySelector('.site-header');
    if (header) {
      new ResizeObserver(applyHeaderOffset).observe(header);
    }
  }

  // Recalculate after fonts load (reduces layout shift)
  if (document.fonts && document.fonts.ready) {
    document.fonts.ready.then(applyHeaderOffset).catch(function(){});
  }
})();
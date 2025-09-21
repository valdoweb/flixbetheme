(function () {
  function applyHeaderOffset() {
    var header = document.querySelector('.site-header');
    if (!header) return;
    var cs = window.getComputedStyle(header);
    var top = parseFloat(cs.top) || 0;          // accounts for admin bar offset (32px/46px)
    var height = header.offsetHeight || 0;      // current header height
    document.body.style.paddingTop = (top + height) + 'px';
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
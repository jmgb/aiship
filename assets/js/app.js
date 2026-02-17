/**
 * AIShip Child Theme — app.js
 * Cargado en footer, después de Divi.
 */

(function () {
  'use strict';

  /* ----------------------------------------------------------
     1. ANIMACIONES DE ENTRADA AL HACER SCROLL
     Añade clase .aiship-fade-up a elementos con
     data-aiship-animate para que aparezcan al entrar en viewport.
     ---------------------------------------------------------- */
  function initScrollAnimations() {
    const targets = document.querySelectorAll('[data-aiship-animate]');
    if (!targets.length || !('IntersectionObserver' in window)) return;

    const observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('aiship-fade-up');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.15 }
    );

    targets.forEach(function (el) {
      el.style.opacity = '0';
      observer.observe(el);
    });
  }

  /* ----------------------------------------------------------
     2. HEADER SCROLL — añade clase cuando el usuario baja
     ---------------------------------------------------------- */
  function initHeaderScroll() {
    var header = document.getElementById('main-header');
    if (!header) return;

    window.addEventListener('scroll', function () {
      if (window.scrollY > 60) {
        header.classList.add('aiship-scrolled');
      } else {
        header.classList.remove('aiship-scrolled');
      }
    }, { passive: true });
  }

  /* ----------------------------------------------------------
     3. CONTADOR ANIMADO
     Uso: <span class="aiship-counter" data-target="2500" data-suffix="+">0</span>
     ---------------------------------------------------------- */
  function initCounters() {
    var counters = document.querySelectorAll('.aiship-counter');
    if (!counters.length || !('IntersectionObserver' in window)) return;

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;

        var el     = entry.target;
        var target = parseInt(el.getAttribute('data-target'), 10) || 0;
        var suffix = el.getAttribute('data-suffix') || '';
        var duration = 1600;
        var start  = null;

        function step(timestamp) {
          if (!start) start = timestamp;
          var progress = Math.min((timestamp - start) / duration, 1);
          var ease = 1 - Math.pow(1 - progress, 3); // ease-out cubic
          el.textContent = Math.floor(ease * target).toLocaleString() + suffix;
          if (progress < 1) requestAnimationFrame(step);
        }

        requestAnimationFrame(step);
        observer.unobserve(el);
      });
    }, { threshold: 0.5 });

    counters.forEach(function (el) { observer.observe(el); });
  }

  /* ----------------------------------------------------------
     4. INIT
     ---------------------------------------------------------- */
  document.addEventListener('DOMContentLoaded', function () {
    initScrollAnimations();
    initHeaderScroll();
    initCounters();
  });

})();

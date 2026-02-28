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
    var targets = document.querySelectorAll('[data-aiship-animate]');
    if (!targets.length || !('IntersectionObserver' in window)) return;

    // Aplicar delay escalonado a siblings del mismo padre
    targets.forEach(function (el, i) {
      var siblings = el.parentElement.querySelectorAll('[data-aiship-animate]');
      siblings.forEach(function (sib, idx) {
        sib.style.transitionDelay = (idx * 0.1) + 's';
      });
    });

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('aiship-fade-up');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12 }
    );

    targets.forEach(function (el) { observer.observe(el); });
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
     4. TICKER SOURCE LOG — muestra en consola el origen de los datos
     ---------------------------------------------------------- */
  function logTickerSource() {
    var bar = document.querySelector('.ap-ticker-bar[data-ticker-source]');
    if (!bar) return;

    var raw = bar.getAttribute('data-ticker-source');
    var msg, style;

    if (raw === 'api') {
      msg   = '[AIShip Ticker] Yahoo Finance API — datos frescos (caché renovada 6h)';
      style = 'color: #2ecc71; font-weight: bold;';
    } else if (raw && raw.indexOf('cache|') === 0) {
      var age = raw.split('|')[1];
      var remaining = Math.max(0, 360 - parseInt(age, 10));
      msg   = '[AIShip Ticker] WP Transient — caché de hace ' + age + ' min (expira en ~' + remaining + ' min)';
      style = 'color: #f39c12; font-weight: bold;';
    } else if (raw && raw.indexOf('fallback') === 0) {
      var detail = raw.indexOf('|') !== -1 ? ' (' + raw.split('|')[1] + ')' : '';
      msg   = '[AIShip Ticker] Fallback — valores estáticos' + detail;
      style = 'color: #e74c3c; font-weight: bold;';
    } else {
      msg   = '[AIShip Ticker] Fuente desconocida: ' + raw;
      style = 'color: #999;';
    }

    console.log('%c' + msg, style);
  }

  /* ----------------------------------------------------------
     5. WIZARD ANIMATION — highlight secuencial al scroll
     ---------------------------------------------------------- */
  function initWizardAnimation() {
    var wizard = document.querySelector('.ai-wizard');
    if (!wizard || !('IntersectionObserver' in window)) return;

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var steps = wizard.querySelectorAll('.ai-wizard__step');
        steps.forEach(function (step, idx) {
          setTimeout(function () {
            step.classList.add('ai-wizard__step--active');
          }, idx * 200);
        });
        observer.unobserve(wizard);
      });
    }, { threshold: 0.3 });

    observer.observe(wizard);
  }

  /* ----------------------------------------------------------
     6. INIT
     ---------------------------------------------------------- */
  document.addEventListener('DOMContentLoaded', function () {
    initScrollAnimations();
    initHeaderScroll();
    initCounters();
    logTickerSource();
    initWizardAnimation();
  });

})();

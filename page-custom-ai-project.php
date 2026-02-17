<?php
/**
 * Template Name: AIShip — Custom AI Project
 *
 * Página de contacto / formulario Custom AI Project.
 * Asignar en WordPress → Página "Custom AI Project" → Atributos → Plantilla.
 */

get_header();
?>

<main id="aiship-contact">

  <section class="ac-section">
    <div class="ac-container">

      <div class="ac-header">
        <span class="aiship-badge">Custom AI Project</span>
        <h1 class="ac-title">Build your<br><em>intelligence system.</em></h1>
        <p class="ac-sub">
          Tell us about your project. We'll design a custom AI solution
          around your data, your workflow, and your goals.
        </p>
      </div>

      <div class="ac-form-wrapper">
        <iframe
          data-tally-src="https://tally.so/embed/meM51q?alignLeft=1&hideTitle=1&transparentBackground=1&dynamicHeight=1"
          loading="lazy"
          width="100%"
          height="867"
          frameborder="0"
          marginheight="0"
          marginwidth="0"
          title="Custom AI Project">
        </iframe>
      </div>

    </div>
  </section>

</main>

<script>
var d = document,
    w = "https://tally.so/widgets/embed.js",
    v = function () {
      "undefined" != typeof Tally
        ? Tally.loadEmbeds()
        : d.querySelectorAll("iframe[data-tally-src]:not([src])").forEach(function (e) {
            e.src = e.dataset.tallySrc;
          });
    };
if ("undefined" != typeof Tally) {
  v();
} else if (d.querySelector('script[src="' + w + '"]') == null) {
  var s = d.createElement("script");
  s.src = w;
  s.onload = v;
  s.onerror = v;
  d.body.appendChild(s);
}
</script>

<?php get_footer(); ?>

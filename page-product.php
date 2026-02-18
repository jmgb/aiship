<?php
/**
 * Template Name: AIShip — Product
 *
 * Página de producto: Financial Intelligence Engine.
 * Asignar en WordPress → Página "Product" → Atributos → Plantilla.
 */

get_header();
?>

<main id="aiship-product">

  <!-- =========================================================
       SECCIÓN 1 — HERO
       ========================================================= -->
  <section class="ap-section ap-hero">
    <div class="ap-glow-top"></div>
    <div class="ap-dots-pattern"></div>
    <div class="ap-container">

      <div class="ap-hero__eyebrow">
        <span class="aiship-badge">Financial Intelligence Engine</span>
      </div>

      <h1 class="ap-hero__title">
        Every corporate disclosure.<br>
        <em>Analyzed in seconds.</em>
      </h1>

      <p class="ap-hero__sub">
        Our AI monitors SEC filings, press releases, NASDAQ and FINRA
        notifications, and investor communications from U.S.-listed companies
        the moment they go live — transforming them into structured investment intelligence.
      </p>

      <div class="ap-hero__ctas">
        <a href="https://aiship.co/custom-ai-project/" class="ap-btn ap-btn--primary">Start a Project</a>
        <a href="#how-it-works" class="ap-btn ap-btn--secondary">See How It Works</a>
      </div>

    </div>
  </section>


  <!-- =========================================================
       TICKER — barra de tickers bursátiles animada
       ========================================================= -->
  <?php $tickers = aiship_get_tickers(); ?>
  <div class="ap-ticker-bar" aria-hidden="true" data-ticker-source="<?php echo esc_attr( $GLOBALS['aiship_ticker_source'] ?? 'unknown' ); ?>">
    <div class="ap-ticker-track">
      <?php
      // Duplicamos para loop continuo
      $all = array_merge( $tickers, $tickers );
      foreach ( $all as $t ) :
        $cls = $t['pos'] ? 'pos' : 'neg';
      ?>
        <span class="ap-ticker-item">
          <span class="ap-ticker-sym"><?php echo esc_html( $t['sym'] ); ?></span>
          <span class="ap-ticker-chg ap-ticker-chg--<?php echo $cls; ?>"><?php echo esc_html( $t['chg'] ); ?></span>
        </span>
      <?php endforeach; ?>
    </div>
  </div>


  <!-- =========================================================
       STATS — números de credibilidad
       ========================================================= -->
  <section class="ap-section ap-stats-bar">
    <div class="ap-container">
      <div class="ap-stats-grid">

        <div class="ap-stat-item" data-aiship-animate>
          <span class="ap-stat__value aiship-counter" data-target="6000" data-suffix="+">0</span>
          <span class="ap-stat__label">Listed companies monitored</span>
        </div>

        <div class="ap-stat-item ap-stat-item--center" data-aiship-animate>
          <span class="ap-stat__value">&lt; 5<span class="ap-stat__unit">s</span></span>
          <span class="ap-stat__label">Filing to delivery</span>
        </div>

        <div class="ap-stat-item" data-aiship-animate>
          <span class="ap-stat__value">24<span class="ap-stat__unit">/7</span></span>
          <span class="ap-stat__label">Continuous monitoring</span>
        </div>

        <div class="ap-stat-item" data-aiship-animate>
          <span class="ap-stat__value aiship-counter" data-target="3800" data-suffix="+">0</span>
          <span class="ap-stat__label">SEC reports &amp; press releases processed daily</span>
        </div>

      </div>
    </div>
  </section>


  <!-- =========================================================
       SECCIÓN 2 — PIPELINE (HOW IT WORKS)
       ========================================================= -->
  <section class="ap-section ap-section--alt" id="how-it-works">
    <div class="ap-container">

      <div class="ap-section-header">
        <span class="aiship-badge neutral">Architecture</span>
        <h2>How It Works</h2>
        <p>Five steps from raw disclosure to actionable intelligence.</p>
      </div>

      <div class="ap-pipeline">

        <div class="ap-pipeline__node">
          <div class="ap-pipeline__icon">📡</div>
          <div class="ap-pipeline__label">Sources</div>
          <div class="ap-pipeline__sub">SEC EDGAR · NASDAQ · FINRA · Press Releases · IR Pages</div>
        </div>

        <div class="ap-pipeline__arrow">→</div>

        <div class="ap-pipeline__node">
          <div class="ap-pipeline__icon">⚡</div>
          <div class="ap-pipeline__label">Real-time Ingestion</div>
          <div class="ap-pipeline__sub">Monitored 24/7 · Zero delay</div>
        </div>

        <div class="ap-pipeline__arrow">→</div>

        <div class="ap-pipeline__node">
          <div class="ap-pipeline__icon">🧠</div>
          <div class="ap-pipeline__label">AI Processing</div>
          <div class="ap-pipeline__sub">LLM analysis · Extraction · Scoring</div>
        </div>

        <div class="ap-pipeline__arrow">→</div>

        <div class="ap-pipeline__node">
          <div class="ap-pipeline__icon">📊</div>
          <div class="ap-pipeline__label">Structured Intelligence</div>
          <div class="ap-pipeline__sub">Reports · Signals · Alerts · Custom outputs</div>
        </div>

        <div class="ap-pipeline__arrow">→</div>

        <div class="ap-pipeline__node">
          <div class="ap-pipeline__icon">📲</div>
          <div class="ap-pipeline__label">Delivery</div>
          <div class="ap-pipeline__sub">WhatsApp · Telegram · Email · API · SaaS</div>
        </div>

      </div>

      <!-- Phone mockup — iPhone 15 style, notificaciones SEC animadas -->
      <div class="ap-phone-wrapper" data-aiship-animate>

        <!-- Outer frame (titanium gradient) -->
        <div class="ap-phone-frame">
          <!-- Inner bezel -->
          <div class="ap-phone-bezel">
            <!-- Screen -->
            <div class="ap-phone-screen">

              <!-- Dynamic Island -->
              <div class="ap-phone-di-wrap">
                <div class="ap-phone-di">
                  <div class="ap-phone-di-cam"></div>
                </div>
              </div>

              <!-- App content (below Dynamic Island) -->
              <div class="ap-phone-app">

                <!-- Fixed app header -->
                <div class="ap-phone-app-bar">
                  <span class="ap-phone-app-title">aiship · live_alerts</span>
                  <span class="ap-phone-app-live">● LIVE</span>
                </div>

                <!-- Viewport — clips the animated stream -->
                <div class="ap-phone-vp">

                  <!-- Layer 1: Monitoring overlay (visible at start) -->
                  <div class="ap-phone-monitoring">
                    <div class="ap-phone-mon-title">📡 Monitoring now</div>
                    <div class="ap-phone-mon-item apm-i1">
                      <span class="ap-phone-mon-ticker">NVDA</span>
                      <span class="ap-phone-mon-source">SEC EDGAR · 8-K</span>
                      <span class="ap-phone-mon-status">scanning</span>
                    </div>
                    <div class="ap-phone-mon-item apm-i2">
                      <span class="ap-phone-mon-ticker">AAPL</span>
                      <span class="ap-phone-mon-source">Form 4 · Insider</span>
                      <span class="ap-phone-mon-status">scanning</span>
                    </div>
                    <div class="ap-phone-mon-item apm-i3">
                      <span class="ap-phone-mon-ticker">JPM</span>
                      <span class="ap-phone-mon-source">Press Release · IR</span>
                      <span class="ap-phone-mon-status">scanning</span>
                    </div>
                    <div class="ap-phone-mon-count">6,000+ companies · 24/7</div>
                  </div>

                  <!-- Layer 2: Alert stream (auto-scrolls) -->
                  <div class="ap-phone-stream">
                    <div class="ap-phone-msgs">

                      <!-- Alert 1: 8-K NVDA -->
                      <div class="ap-phone-alert apm-a1">
                        <div class="ap-phone-alert-top">
                          <span class="ap-phone-badge">8-K</span>
                          <span class="ap-phone-ticker">NVDA · NASDAQ</span>
                          <span class="ap-phone-time">08:31 EST</span>
                        </div>
                        <div class="ap-phone-alert-title">Material Event detected</div>
                        <div class="ap-phone-alert-sub">Revenue guidance raised · CEO commentary</div>
                      </div>

                      <!-- Processing 1 -->
                      <div class="ap-phone-proc apm-a2">
                        <span class="ap-phone-proc-icon">🧠</span>
                        <span class="ap-phone-proc-text">Analyzing<span class="apm-dots">...</span></span>
                      </div>

                      <!-- Result 1 -->
                      <div class="ap-phone-result apm-a3">
                        <div class="ap-phone-result-row">
                          <span class="ap-phone-result-key">SIGNAL</span>
                          <span class="ap-phone-result-pos">BULLISH · 0.89</span>
                        </div>
                        <div class="ap-phone-result-row">
                          <span class="ap-phone-result-key">EPS</span>
                          <span class="ap-phone-result-val">Beat $4.28 vs $3.91 · +22% guidance</span>
                        </div>
                      </div>

                      <!-- Alert 2: Form 4 AAPL -->
                      <div class="ap-phone-alert apm-a4">
                        <div class="ap-phone-alert-top">
                          <span class="ap-phone-badge ap-phone-badge--insider">Form 4</span>
                          <span class="ap-phone-ticker">AAPL · CEO</span>
                          <span class="ap-phone-time">09:14 EST</span>
                        </div>
                        <div class="ap-phone-alert-title">Insider Buy</div>
                        <div class="ap-phone-alert-sub ap-phone-alert-sub--pos">+285,000 shares · $62.1M</div>
                      </div>

                      <!-- Processing 2 -->
                      <div class="ap-phone-proc apm-a5">
                        <span class="ap-phone-proc-icon">🧠</span>
                        <span class="ap-phone-proc-text">Analyzing<span class="apm-dots">...</span></span>
                      </div>

                      <!-- Result 2 -->
                      <div class="ap-phone-result apm-a6">
                        <div class="ap-phone-result-row">
                          <span class="ap-phone-result-key">SIGNAL</span>
                          <span class="ap-phone-result-pos">BULLISH · 0.91</span>
                        </div>
                        <div class="ap-phone-result-row">
                          <span class="ap-phone-result-key">ACTION</span>
                          <span class="ap-phone-result-val">Review LONG · Initiate position</span>
                        </div>
                      </div>

                      <!-- Alert 3: PR JPM -->
                      <div class="ap-phone-alert apm-a7">
                        <div class="ap-phone-alert-top">
                          <span class="ap-phone-badge ap-phone-badge--pr">PR</span>
                          <span class="ap-phone-ticker">JPM · NYSE</span>
                          <span class="ap-phone-time">07:05 EST</span>
                        </div>
                        <div class="ap-phone-alert-title">Q4 Earnings Beat</div>
                        <div class="ap-phone-alert-sub">EPS $4.81 vs $4.11 · Net income +18% YoY</div>
                      </div>

                      <!-- Delivery -->
                      <div class="ap-phone-delivery apm-a8">
                        📲 Delivered → Telegram · WhatsApp · API
                      </div>

                      <!-- Alert 4: FDA approval — MRNA press release -->
                      <div class="ap-phone-alert apm-a9">
                        <div class="ap-phone-alert-top">
                          <span class="ap-phone-badge ap-phone-badge--fda">FDA</span>
                          <span class="ap-phone-ticker">MRNA · NASDAQ</span>
                          <span class="ap-phone-time">10:47 EST</span>
                        </div>
                        <div class="ap-phone-alert-title">Drug Approval — Press Release</div>
                        <div class="ap-phone-alert-sub">mRNA-1283 receives full FDA approval · $18B TAM</div>
                      </div>

                      <!-- Processing 3 -->
                      <div class="ap-phone-proc apm-a10">
                        <span class="ap-phone-proc-icon">🧠</span>
                        <span class="ap-phone-proc-text">Analyzing<span class="apm-dots">...</span></span>
                      </div>

                      <!-- Result 3: STRONG BUY -->
                      <div class="ap-phone-result apm-a11">
                        <div class="ap-phone-result-row">
                          <span class="ap-phone-result-key">SIGNAL</span>
                          <span class="ap-phone-result-pos">STRONG BUY · 0.97</span>
                        </div>
                        <div class="ap-phone-result-row">
                          <span class="ap-phone-result-key">CATALYST</span>
                          <span class="ap-phone-result-val">First-to-market · monopoly 7yr · TAM $18B</span>
                        </div>
                      </div>

                    </div>
                  </div><!-- /ap-phone-stream -->

                </div><!-- /ap-phone-vp -->

              </div><!-- /ap-phone-app -->

              <!-- Closing card overlay -->
              <div class="ap-phone-closing">
                <div class="ap-phone-closing-inner">
                  <p>4 signals processed<br><em>&lt; 5 seconds each</em></p>
                </div>
              </div>

              <!-- Home indicator -->
              <div class="ap-phone-home-bar"></div>

            </div><!-- /ap-phone-screen -->
          </div><!-- /ap-phone-bezel -->
        </div><!-- /ap-phone-frame -->

        <!-- Physical buttons -->
        <div class="ap-phone-btn ap-phone-btn--silent"></div>
        <div class="ap-phone-btn ap-phone-btn--vol-up"></div>
        <div class="ap-phone-btn ap-phone-btn--vol-down"></div>
        <div class="ap-phone-btn ap-phone-btn--power"></div>

        <!-- Keyframe animations (inline, self-contained) — ciclo 28s -->
        <style>
          /* Stream scroll — calculado px a px para cada card */
          @keyframes apPhoneStream {
            0%, 7%    { transform: translateY(0); }
            20%       { transform: translateY(0); }
            26%       { transform: translateY(-20px); }
            33%       { transform: translateY(-95px); }
            39%       { transform: translateY(-150px); }
            47%       { transform: translateY(-210px); }
            53%       { transform: translateY(-235px); }
            60%       { transform: translateY(-280px); }
            67%       { transform: translateY(-335px); }
            80%, 85%  { transform: translateY(-335px); }
            86%, 100% { transform: translateY(0); }
          }

          /* Monitoring overlay: visible → fade → snap back */
          @keyframes apMonOverlay {
            0%, 6%      { opacity: 1; }
            8%          { opacity: 0; }
            94%         { opacity: 0; }
            96%, 100%   { opacity: 1; }
          }

          /* Monitoring items: entrada rápida */
          @keyframes apmFadeIn {
            0%           { opacity: 0; transform: translateY(6px); }
            1%, 6%       { opacity: 1; transform: translateY(0); }
            8%, 100%     { opacity: 0; transform: translateY(6px); }
          }
          .apm-i1 { animation: apmFadeIn 28s ease-out infinite; }
          .apm-i2 { animation: apmFadeIn 28s ease-out infinite; animation-delay: 0.3s; }
          .apm-i3 { animation: apmFadeIn 28s ease-out infinite; animation-delay: 0.6s; }

          /* Alert messages — ~1.4s entre cada uno */
          .apm-a1 { animation: _apm1 28s ease-out infinite; }
          @keyframes _apm1 {
            0%, 8%       { opacity: 0; transform: translateY(8px); }
            9.5%, 85%    { opacity: 1; transform: translateY(0); }
            87%, 100%    { opacity: 0; transform: translateY(8px); }
          }
          .apm-a2 { animation: _apm2 28s ease-out infinite; }
          @keyframes _apm2 {
            0%, 13%      { opacity: 0; transform: translateY(8px); }
            14.5%, 85%   { opacity: 1; transform: translateY(0); }
            87%, 100%    { opacity: 0; transform: translateY(8px); }
          }
          .apm-a3 { animation: _apm3 28s ease-out infinite; }
          @keyframes _apm3 {
            0%, 18%      { opacity: 0; transform: translateY(8px); }
            19.5%, 85%   { opacity: 1; transform: translateY(0); }
            87%, 100%    { opacity: 0; transform: translateY(8px); }
          }
          .apm-a4 { animation: _apm4 28s ease-out infinite; }
          @keyframes _apm4 {
            0%, 23%      { opacity: 0; transform: translateY(8px); }
            24.5%, 85%   { opacity: 1; transform: translateY(0); }
            87%, 100%    { opacity: 0; transform: translateY(8px); }
          }
          .apm-a5 { animation: _apm5 28s ease-out infinite; }
          @keyframes _apm5 {
            0%, 28%      { opacity: 0; transform: translateY(8px); }
            29.5%, 85%   { opacity: 1; transform: translateY(0); }
            87%, 100%    { opacity: 0; transform: translateY(8px); }
          }
          .apm-a6 { animation: _apm6 28s ease-out infinite; }
          @keyframes _apm6 {
            0%, 33%      { opacity: 0; transform: translateY(8px); }
            34.5%, 85%   { opacity: 1; transform: translateY(0); }
            87%, 100%    { opacity: 0; transform: translateY(8px); }
          }
          .apm-a7 { animation: _apm7 28s ease-out infinite; }
          @keyframes _apm7 {
            0%, 39%      { opacity: 0; transform: translateY(8px); }
            40.5%, 85%   { opacity: 1; transform: translateY(0); }
            87%, 100%    { opacity: 0; transform: translateY(8px); }
          }
          .apm-a8 { animation: _apm8 28s ease-out infinite; }
          @keyframes _apm8 {
            0%, 47%      { opacity: 0; transform: translateY(8px); }
            48.5%, 85%   { opacity: 1; transform: translateY(0); }
            87%, 100%    { opacity: 0; transform: translateY(8px); }
          }
          /* FDA case */
          .apm-a9 { animation: _apm9 28s ease-out infinite; }
          @keyframes _apm9 {
            0%, 52%      { opacity: 0; transform: translateY(8px); }
            53.5%, 85%   { opacity: 1; transform: translateY(0); }
            87%, 100%    { opacity: 0; transform: translateY(8px); }
          }
          .apm-a10 { animation: _apm10 28s ease-out infinite; }
          @keyframes _apm10 {
            0%, 58%      { opacity: 0; transform: translateY(8px); }
            59.5%, 85%   { opacity: 1; transform: translateY(0); }
            87%, 100%    { opacity: 0; transform: translateY(8px); }
          }
          .apm-a11 { animation: _apm11 28s ease-out infinite; }
          @keyframes _apm11 {
            0%, 64%      { opacity: 0; transform: translateY(8px); }
            65.5%, 85%   { opacity: 1; transform: translateY(0); }
            87%, 100%    { opacity: 0; transform: translateY(8px); }
          }

          /* Closing card */
          @keyframes apPhoneClosing {
            0%, 82%      { opacity: 0; transform: scale(0.95); }
            84%, 93%     { opacity: 1; transform: scale(1); }
            95%, 100%    { opacity: 0; transform: scale(0.95); }
          }

          /* Dots */
          @keyframes apmDots {
            0%   { opacity: 0.3; }
            33%  { opacity: 0.6; }
            66%  { opacity: 1;   }
            100% { opacity: 0.3; }
          }
          .apm-dots { animation: apmDots 0.9s steps(4, end) infinite; }
        </style>

      </div><!-- /ap-phone-wrapper -->

    </div>
  </section>


  <!-- =========================================================
       SECCIÓN 3 — QUÉ SE MONITORIZA
       ========================================================= -->
  <section class="ap-section">
    <div class="ap-container">

      <div class="ap-section-header">
        <span class="aiship-badge neutral">Coverage</span>
        <h2>What We Monitor</h2>
        <p>SEC filings, NASDAQ &amp; FINRA notifications, press releases — every source that moves markets.</p>
      </div>

      <div class="ap-docs-grid">

        <?php
        $docs = [
          [ 'code' => '10-K',    'name' => 'Annual Report',         'desc' => 'Full-year financial performance & outlook' ],
          [ 'code' => '10-Q',    'name' => 'Quarterly Report',      'desc' => 'Q1–Q3 financials & management commentary' ],
          [ 'code' => '8-K',     'name' => 'Material Events',       'desc' => 'M&A, leadership changes, guidance updates' ],
          [ 'code' => 'S-1',     'name' => 'IPO Registration',      'desc' => 'Pre-IPO prospectus & financial history' ],
          [ 'code' => 'DEF 14A', 'name' => 'Proxy Statement',       'desc' => 'Executive compensation & governance' ],
          [ 'code' => 'SC 13D',  'name' => 'Major Shareholder',     'desc' => 'Activist investors & significant positions' ],
          [ 'code' => 'Form 4',  'name' => 'Insider Transactions',  'desc' => 'Directors & officers buying or selling' ],
          [ 'code' => '13-F',    'name' => 'Institutional Holdings', 'desc' => 'What the largest funds own each quarter' ],
          [ 'code' => '20-F',    'name' => 'Foreign Filer Report',   'desc' => 'Non-US companies listed on US exchanges' ],
          [ 'code' => 'PR',      'name' => 'Press Releases',        'desc' => 'Official company announcements' ],
        ];
        foreach ( $docs as $doc ) : ?>
          <div class="ap-doc-item">
            <div class="ap-doc-item__header">
              <span class="ap-doc-item__code"><?php echo esc_html( $doc['code'] ); ?></span>
              <span class="ap-doc-item__name"><?php echo esc_html( $doc['name'] ); ?></span>
            </div>
            <p class="ap-doc-item__desc"><?php echo esc_html( $doc['desc'] ); ?></p>
          </div>
        <?php endforeach; ?>

        <div class="ap-doc-item ap-doc-item--more">
          <div class="ap-doc-item__header">
            <span class="ap-doc-item__code">+</span>
            <span class="ap-doc-item__name">Custom Sources</span>
          </div>
          <p class="ap-doc-item__desc">Need a specific data source? We integrate it.</p>
        </div>

      </div>

    </div>
  </section>


  <!-- =========================================================
       SECCIÓN 4 — OUTPUT DE ANÁLISIS (TERMINAL)
       ========================================================= -->
  <section class="ap-section ap-section--alt">
    <div class="ap-container">

      <div class="ap-section-header">
        <span class="aiship-badge neutral">Output</span>
        <h2>Intelligence Output</h2>
        <p>This is what our system delivers — automatically, seconds after a filing goes live.
        Output format and delivery channel are fully customizable: email, Telegram, WhatsApp, API integration, or embedded in your own platform.</p>
      </div>

      <div class="ap-terminal">

        <div class="ap-terminal__bar">
          <div class="ap-terminal__dots">
            <span class="ap-terminal__dot ap-terminal__dot--r"></span>
            <span class="ap-terminal__dot ap-terminal__dot--y"></span>
            <span class="ap-terminal__dot ap-terminal__dot--g"></span>
          </div>
          <span class="ap-terminal__title">aiship_engine · analysis_output.json</span>
          <span class="ap-terminal__live">● LIVE</span>
        </div>

        <div class="ap-terminal__body">
<pre>
<span class="t-comment"># Filing detected — processing complete in 4.2s</span>
<span class="t-sep">────────────────────────────────────────────────────</span>

<span class="t-key">COMPANY      </span> <span class="t-val">Acme Corp (ACME) · NASDAQ</span>
<span class="t-key">FILING       </span> <span class="t-val">8-K — Material Event</span>
<span class="t-key">FILED        </span> <span class="t-val">2026-02-17 · 08:31 EST</span>

<span class="t-sep">────────────────────────────────────────────────────</span>

<span class="t-key">EXECUTIVE SUMMARY</span>
<span class="t-meta">  Company reports Q4 revenue of $2.8B (+18% YoY),
  beating consensus by 6.2%. Operating margin expanded
  140bps. Raises FY guidance by 8%. CFO departure
  announced — effective March 2026.</span>

<span class="t-sep">────────────────────────────────────────────────────</span>

<span class="t-key">MATERIAL CHANGES</span>
<span class="t-pos">  [+] Revenue beat: $2.8B vs $2.64B est.</span>
<span class="t-pos">  [+] Guidance raised: FY2026 $11.2B → $12.1B</span>
<span class="t-pos">  [+] Margin expansion: +140bps</span>
<span class="t-neg">  [-] CFO departure — leadership transition risk</span>
<span class="t-neg">  [-] EMEA segment -4% QoQ</span>

<span class="t-sep">────────────────────────────────────────────────────</span>

<span class="t-key">SIGNAL         </span> <span class="t-pos">BULLISH · Confidence 0.84</span>
<span class="t-key">SUGGESTED      </span> <span class="t-val">Review LONG · Monitor CFO transition</span>
<span class="ap-terminal__cursor">█</span></pre>
        </div>

      </div>

    </div>
  </section>


  <!-- =========================================================
       SECCIÓN 5 — DOS CANALES DE USO
       ========================================================= -->
  <section class="ap-section">
    <div class="ap-container">

      <div class="ap-section-header">
        <span class="aiship-badge neutral">Use Cases</span>
        <h2>Built for Two Workflows</h2>
        <p>The same intelligence engine powers two very different outcomes.</p>
      </div>

      <div class="ap-channels">

        <div class="ap-channel">
          <div class="ap-channel__top">
            <span class="ap-channel__icon">🏦</span>
            <div>
              <div class="ap-channel__title">White-Label Intelligence</div>
              <div class="ap-channel__sub">For asset managers, family offices &amp; RIAs</div>
            </div>
          </div>
          <ul class="ap-channel__list">
            <li>Branded reports delivered to your clients automatically</li>
            <li>Filters by sector, market cap or portfolio holdings</li>
            <li>Custom cadence: real-time alerts or daily digests</li>
            <li>Ready to forward — no analyst time required</li>
          </ul>
        </div>

        <div class="ap-channel">
          <div class="ap-channel__top">
            <span class="ap-channel__icon">⚡</span>
            <div>
              <div class="ap-channel__title">Automated Trading Signals</div>
              <div class="ap-channel__sub">For prop desks &amp; quant funds</div>
            </div>
          </div>
          <ul class="ap-channel__list">
            <li>Signal detected → order executed in seconds</li>
            <li>Long, short, or new position creation</li>
            <li>Integrates with IBKR, Alpaca and custom brokers</li>
            <li>Full audit trail per signal and execution</li>
          </ul>
        </div>

      </div>

    </div>
  </section>


  <!-- =========================================================
       SECCIÓN 6 — CTA FINAL
       ========================================================= -->
  <section class="ap-section ap-section--cta">
    <div class="ap-container ap-container--narrow">
      <div class="ap-cta-glow"></div>
      <h2 class="ap-cta__title">Ready to build your<br>intelligence system?</h2>
      <p class="ap-cta__sub">
        We build custom. Every system is designed around your workflow,
        your data sources, and your execution environment.
      </p>
      <a href="https://aiship.co/custom-ai-project/" class="ap-btn ap-btn--primary ap-btn--lg">Start a Project</a>
    </div>
  </section>

</main>

<?php get_footer(); ?>

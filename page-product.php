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
      <div class="ap-hero__grid">

        <!-- Copy -->
        <div class="ap-hero__copy">

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

        <!-- Live feed animation -->
        <div class="ap-hero__visual">
          <div class="ap-notif-panel">

            <div class="ap-notif-panel__bar">
              <div class="ap-notif-panel__dots">
                <span class="ap-notif-panel__dot ap-notif-panel__dot--r"></span>
                <span class="ap-notif-panel__dot ap-notif-panel__dot--y"></span>
                <span class="ap-notif-panel__dot ap-notif-panel__dot--g"></span>
              </div>
              <span class="ap-notif-panel__title">aiship_engine · live_feed</span>
              <span class="ap-notif-panel__live">● LIVE</span>
            </div>

            <div class="ap-notif-viewport">

              <div class="ap-notif-feed">

                <!-- Alert 1: 8-K NVDA -->
                <div class="ap-alert ap-alert--1">
                  <div class="ap-alert__source">
                    <span class="ap-alert__badge">8-K</span>
                    <span class="ap-alert__ticker">NVDA · NASDAQ</span>
                    <span class="ap-alert__time">08:31 EST</span>
                  </div>
                  <div class="ap-alert__title">Material Event detected</div>
                  <div class="ap-alert__meta">Revenue guidance raised · CEO commentary</div>
                </div>

                <!-- Processing 1 -->
                <div class="ap-alert ap-alert--proc ap-alert--2">
                  <span class="ap-alert__proc-text">🧠 Analyzing<span class="ap-dots">...</span></span>
                </div>

                <!-- Result 1 -->
                <div class="ap-alert ap-alert--result ap-alert--3">
                  <div class="ap-alert__row"><span class="ap-alert__key">SIGNAL</span><span class="ap-alert__pos">BULLISH · 0.89</span></div>
                  <div class="ap-alert__row"><span class="ap-alert__key">SUMMARY</span><span class="ap-alert__val">Guidance +22% · EPS beat $4.28 vs $3.91</span></div>
                </div>

                <!-- Alert 2: Form 4 AAPL -->
                <div class="ap-alert ap-alert--4">
                  <div class="ap-alert__source">
                    <span class="ap-alert__badge ap-alert__badge--insider">Form 4</span>
                    <span class="ap-alert__ticker">AAPL · CEO</span>
                    <span class="ap-alert__time">09:14 EST</span>
                  </div>
                  <div class="ap-alert__title">Insider Buy</div>
                  <div class="ap-alert__meta ap-alert__meta--pos">+285,000 shares · $62.1M</div>
                </div>

                <!-- Alert 3: PR JPM -->
                <div class="ap-alert ap-alert--5">
                  <div class="ap-alert__source">
                    <span class="ap-alert__badge ap-alert__badge--pr">PR</span>
                    <span class="ap-alert__ticker">JPM · NYSE</span>
                    <span class="ap-alert__time">07:05 EST</span>
                  </div>
                  <div class="ap-alert__title">Q4 Earnings Beat</div>
                  <div class="ap-alert__meta">EPS $4.81 vs $4.11 est. · Net income +18% YoY</div>
                </div>

                <!-- Processing 2 -->
                <div class="ap-alert ap-alert--proc ap-alert--6">
                  <span class="ap-alert__proc-text">🧠 Analyzing<span class="ap-dots">...</span></span>
                </div>

                <!-- Result 2 -->
                <div class="ap-alert ap-alert--result ap-alert--7">
                  <div class="ap-alert__row"><span class="ap-alert__key">SIGNAL</span><span class="ap-alert__pos">BULLISH · 0.91</span></div>
                  <div class="ap-alert__row"><span class="ap-alert__key">ACTION</span><span class="ap-alert__val">Review LONG · Initiate position</span></div>
                </div>

                <!-- Delivery -->
                <div class="ap-alert ap-alert--delivery ap-alert--8">
                  📲 Delivered → Telegram · WhatsApp · API
                </div>

              </div>

              <!-- Closing card -->
              <div class="ap-notif-closing">
                <div class="ap-notif-closing__inner">
                  <p>3 signals processed<br><em>&lt; 5 seconds each</em></p>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- =========================================================
       TICKER — barra de tickers bursátiles animada
       ========================================================= -->
  <div class="ap-ticker-bar" aria-hidden="true">
    <div class="ap-ticker-track">
      <?php
      $tickers = [
        [ 'sym' => 'AAPL',  'chg' => '+1.24%',  'pos' => true  ],
        [ 'sym' => 'MSFT',  'chg' => '+0.87%',  'pos' => true  ],
        [ 'sym' => 'NVDA',  'chg' => '+3.41%',  'pos' => true  ],
        [ 'sym' => 'GOOGL', 'chg' => '-0.53%',  'pos' => false ],
        [ 'sym' => 'META',  'chg' => '+2.18%',  'pos' => true  ],
        [ 'sym' => 'AMZN',  'chg' => '+0.66%',  'pos' => true  ],
        [ 'sym' => 'TSLA',  'chg' => '-1.92%',  'pos' => false ],
        [ 'sym' => 'JPM',   'chg' => '+0.44%',  'pos' => true  ],
        [ 'sym' => 'BAC',   'chg' => '-0.31%',  'pos' => false ],
        [ 'sym' => 'GS',    'chg' => '+1.07%',  'pos' => true  ],
        [ 'sym' => 'BRK.B', 'chg' => '+0.29%',  'pos' => true  ],
        [ 'sym' => 'V',     'chg' => '+0.73%',  'pos' => true  ],
      ];
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
          <span class="ap-stat__label">Average processing time</span>
        </div>

        <div class="ap-stat-item" data-aiship-animate>
          <span class="ap-stat__value">24<span class="ap-stat__unit">/7</span></span>
          <span class="ap-stat__label">Continuous monitoring</span>
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
        <p>Four steps from raw disclosure to actionable intelligence.</p>
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

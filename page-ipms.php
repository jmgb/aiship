<?php
/**
 * Template Name: AIShip — IPMS
 *
 * Página de producto: Investor Portfolio Management & Onboarding System.
 * Asignar en WordPress → Página "IPMS" → Atributos → Plantilla.
 */

get_header();
?>

<main id="aiship-ipms">

  <!-- =========================================================
       SECTION 1 — HERO
       ========================================================= -->
  <section class="ap-section ai-hero">
    <div class="ap-glow-top"></div>
    <div class="ap-dots-pattern"></div>
    <div class="ap-container">

      <div class="ai-hero__eyebrow">
        <span class="aiship-badge">Portfolio Management Platform</span>
      </div>

      <h1 class="ai-hero__title">
        Investor onboarding to portfolio management.<br>
        <em>One platform. Fully automated.</em>
      </h1>

      <p class="ai-hero__sub">
        A white-label platform built for funds, family offices, and RIAs
        to onboard investors, manage portfolios, and automate compliance —
        from day one.
      </p>

      <div class="ai-hero__ctas">
        <a href="https://aiship.co/custom-ai-project/" class="ap-btn ap-btn--primary">Schedule a Demo</a>
        <a href="#core-modules" class="ap-btn ap-btn--secondary">Explore Modules</a>
      </div>

    </div>
  </section>


  <!-- =========================================================
       SECTION 2 — STATS BAR
       ========================================================= -->
  <section class="ap-section ai-stats-bar">
    <div class="ap-container">
      <div class="ap-stats-grid">

        <div class="ap-stat-item" data-aiship-animate>
          <span class="ap-stat__value aiship-counter" data-target="10000" data-suffix="+">0</span>
          <span class="ap-stat__label">Concurrent users supported</span>
        </div>

        <div class="ap-stat-item ap-stat-item--center" data-aiship-animate>
          <span class="ap-stat__value">99.9<span class="ap-stat__unit">%</span></span>
          <span class="ap-stat__label">Platform uptime SLA</span>
        </div>

        <div class="ap-stat-item" data-aiship-animate>
          <span class="ap-stat__value">&lt; 1<span class="ap-stat__unit">s</span></span>
          <span class="ap-stat__label">API response time</span>
        </div>

        <div class="ap-stat-item" data-aiship-animate>
          <span class="ap-stat__value aiship-counter" data-target="12" data-suffix="">0</span>
          <span class="ap-stat__label">Integrated modules</span>
        </div>

      </div>
    </div>
  </section>


  <!-- =========================================================
       SECTION 3 — PROBLEM / SOLUTION
       ========================================================= -->
  <section class="ap-section ap-section--alt">
    <div class="ap-container">

      <div class="ap-section-header">
        <span class="aiship-badge neutral">The Challenge</span>
        <h2>Manual Processes Are Holding You Back</h2>
        <p>Legacy workflows create bottlenecks, compliance gaps, and poor investor experience.</p>
      </div>

      <div class="ai-split">

        <div class="ai-split__col ai-split__col--problem">
          <div class="ai-split__heading">Without IPMS</div>
          <?php
          $problems = [
            'Weeks-long onboarding with paper forms and emails',
            'Manual KYC/AML checks prone to human error',
            'Spreadsheets for portfolio tracking and allocation',
            'Quarterly reports assembled manually by analysts',
            'Compliance gaps discovered during audits, not before',
          ];
          foreach ( $problems as $p ) : ?>
            <div class="ai-split__item">
              <span class="ai-split__icon ai-split__icon--red">&#10005;</span>
              <span><?php echo esc_html( $p ); ?></span>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="ai-split__col ai-split__col--solution">
          <div class="ai-split__heading">With IPMS</div>
          <?php
          $solutions = [
            'Digital onboarding completed in minutes, not weeks',
            'Automated KYC/AML with real-time sanction screening',
            'Live portfolio dashboard with automated rebalancing',
            'One-click regulatory and investor reporting',
            'Continuous compliance monitoring with instant alerts',
          ];
          foreach ( $solutions as $s ) : ?>
            <div class="ai-split__item">
              <span class="ai-split__icon ai-split__icon--green">&#10003;</span>
              <span><?php echo esc_html( $s ); ?></span>
            </div>
          <?php endforeach; ?>
        </div>

      </div>

    </div>
  </section>


  <!-- =========================================================
       SECTION 4 — CORE MODULES
       ========================================================= -->
  <section class="ap-section" id="core-modules">
    <div class="ap-container">

      <div class="ap-section-header">
        <span class="aiship-badge neutral">Platform</span>
        <h2>Core Modules</h2>
        <p>Six integrated modules covering the full investor lifecycle.</p>
      </div>

      <div class="ai-modules-grid">
        <?php
        $modules = [
          [
            'icon'  => '&#128203;',
            'title' => 'Investor Onboarding',
            'body'  => 'Digital KYC/AML, document upload, e-signature, and automated approval workflows — onboard investors in minutes.',
          ],
          [
            'icon'  => '&#128202;',
            'title' => 'Portfolio Dashboard',
            'body'  => 'Real-time portfolio views with NAV tracking, P&L attribution, asset allocation breakdowns, and historical performance.',
          ],
          [
            'icon'  => '&#9881;&#65039;',
            'title' => 'Allocation Engine',
            'body'  => 'Rule-based and model-driven allocation with risk mapping, investment limits, rebalancing schedules, and drift alerts.',
          ],
          [
            'icon'  => '&#128737;&#65039;',
            'title' => 'Compliance & Reporting',
            'body'  => 'Automated regulatory reporting, audit trails, real-time compliance checks, and one-click export to PDF, Excel, or API.',
          ],
          [
            'icon'  => '&#127974;',
            'title' => 'Fund Management',
            'body'  => 'Multi-fund support with fee calculation, NAV computation, capital calls, distributions, and waterfall structures.',
          ],
          [
            'icon'  => '&#9997;&#65039;',
            'title' => 'Contract & e-Signature',
            'body'  => 'Digital subscription agreements, side letters, and amendments with integrated e-signature and version control.',
          ],
        ];
        foreach ( $modules as $m ) : ?>
          <div class="aiship-card" data-aiship-animate>
            <div class="card-icon"><?php echo $m['icon']; ?></div>
            <div class="card-title"><?php echo esc_html( $m['title'] ); ?></div>
            <div class="card-body"><?php echo esc_html( $m['body'] ); ?></div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>


  <!-- =========================================================
       SECTION 5 — ONBOARDING PIPELINE
       ========================================================= -->
  <section class="ap-section ap-section--alt">
    <div class="ap-container">

      <div class="ap-section-header">
        <span class="aiship-badge neutral">Workflow</span>
        <h2>Investor Onboarding Pipeline</h2>
        <p>From registration to approval — fully automated, fully compliant.</p>
      </div>

      <div class="ai-pipeline">
        <?php
        $pipeline = [
          [ 'icon' => '&#128221;', 'label' => 'Registration',       'sub' => 'Digital form &middot; Investor profile' ],
          [ 'icon' => '&#128206;', 'label' => 'Document Upload',    'sub' => 'ID &middot; Proof of address &middot; Accreditation' ],
          [ 'icon' => '&#128269;', 'label' => 'KYC Verification',   'sub' => 'Identity check &middot; PEP screening' ],
          [ 'icon' => '&#128737;&#65039;', 'label' => 'Sanction Screening', 'sub' => 'OFAC &middot; EU &middot; UN lists' ],
          [ 'icon' => '&#128200;', 'label' => 'Risk Assessment',    'sub' => 'Risk profile &middot; Suitability' ],
          [ 'icon' => '&#9989;',   'label' => 'Approval',           'sub' => 'Auto-approve or escalate' ],
        ];
        $total = count( $pipeline );
        foreach ( $pipeline as $i => $step ) : ?>
          <div class="ai-pipeline__node">
            <div class="ai-pipeline__icon"><?php echo $step['icon']; ?></div>
            <div class="ai-pipeline__label"><?php echo esc_html( $step['label'] ); ?></div>
            <div class="ai-pipeline__sub"><?php echo $step['sub']; ?></div>
          </div>
          <?php if ( $i < $total - 1 ) : ?>
            <div class="ai-pipeline__arrow"></div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

    </div>
  </section>


  <!-- =========================================================
       SECTION 6 — PORTFOLIO DASHBOARD SHOWCASE
       ========================================================= -->
  <section class="ap-section">
    <div class="ap-container">

      <div class="ap-section-header">
        <span class="aiship-badge neutral">Dashboard</span>
        <h2>Portfolio Dashboard</h2>
        <p>A real-time command center for portfolio managers and compliance teams.</p>
      </div>

      <div class="ai-dashboard" data-aiship-animate>

        <div class="ai-dashboard__bar">
          <div class="ai-dashboard__dots">
            <span class="ai-dashboard__dot ai-dashboard__dot--r"></span>
            <span class="ai-dashboard__dot ai-dashboard__dot--y"></span>
            <span class="ai-dashboard__dot ai-dashboard__dot--g"></span>
          </div>
          <span class="ai-dashboard__title">ipms_platform &middot; portfolio_overview</span>
          <span class="ai-dashboard__live">&#9679; LIVE</span>
        </div>

        <div class="ai-dashboard__body">

          <div class="ai-dashboard__metrics">
            <div class="ai-dashboard__metric">
              <span class="ai-dashboard__metric-val">$847.2M</span>
              <span class="ai-dashboard__metric-label">Total AUM</span>
            </div>
            <div class="ai-dashboard__metric">
              <span class="ai-dashboard__metric-val">2,847</span>
              <span class="ai-dashboard__metric-label">Active Investors</span>
            </div>
            <div class="ai-dashboard__metric">
              <span class="ai-dashboard__metric-val">98.7%</span>
              <span class="ai-dashboard__metric-label">Compliance Score</span>
            </div>
            <div class="ai-dashboard__metric">
              <span class="ai-dashboard__metric-val">14</span>
              <span class="ai-dashboard__metric-label">Pending KYC</span>
            </div>
          </div>

          <div class="ai-dashboard__sep"></div>

          <div class="ai-dashboard__feed">
            <div class="ai-dashboard__feed-title">Recent Activity</div>

            <div class="ai-dashboard__feed-item">
              <span class="ai-dashboard__feed-badge ai-dashboard__feed-badge--onboard">ONBOARD</span>
              <span class="ai-dashboard__feed-text">Investor #2848 — KYC approved, documents verified</span>
              <span class="ai-dashboard__feed-time">2m ago</span>
            </div>

            <div class="ai-dashboard__feed-item">
              <span class="ai-dashboard__feed-badge ai-dashboard__feed-badge--invest">INVEST</span>
              <span class="ai-dashboard__feed-text">$2.4M allocation executed — Global Equity Fund</span>
              <span class="ai-dashboard__feed-time">8m ago</span>
            </div>

            <div class="ai-dashboard__feed-item">
              <span class="ai-dashboard__feed-badge ai-dashboard__feed-badge--report">REPORT</span>
              <span class="ai-dashboard__feed-text">Q4 2025 investor statements generated (847 PDFs)</span>
              <span class="ai-dashboard__feed-time">1h ago</span>
            </div>

            <div class="ai-dashboard__feed-item">
              <span class="ai-dashboard__feed-badge ai-dashboard__feed-badge--audit">AUDIT</span>
              <span class="ai-dashboard__feed-text">Compliance check passed — zero exceptions</span>
              <span class="ai-dashboard__feed-time">3h ago</span>
            </div>
          </div>

        </div>

      </div>

    </div>
  </section>


  <!-- =========================================================
       SECTION 7 — ALLOCATION ENGINE (WIZARD)
       ========================================================= -->
  <section class="ap-section ap-section--alt">
    <div class="ap-container">

      <div class="ap-section-header">
        <span class="aiship-badge neutral">Engine</span>
        <h2>Allocation Engine</h2>
        <p>Configure sophisticated allocation rules in six simple steps.</p>
      </div>

      <div class="ai-wizard">
        <?php
        $wizard_steps = [
          [ 'num' => '01', 'label' => 'Basic Info',    'sub' => 'Fund type, strategy, currency' ],
          [ 'num' => '02', 'label' => 'Risk Mapping',  'sub' => 'Investor risk profiles & bands' ],
          [ 'num' => '03', 'label' => 'Rules',         'sub' => 'Allocation logic & constraints' ],
          [ 'num' => '04', 'label' => 'Limits',        'sub' => 'Concentration & exposure caps' ],
          [ 'num' => '05', 'label' => 'Schedule',      'sub' => 'Rebalancing frequency & triggers' ],
          [ 'num' => '06', 'label' => 'Review',        'sub' => 'Validate, test & deploy' ],
        ];
        foreach ( $wizard_steps as $i => $ws ) : ?>
          <?php if ( $i > 0 ) : ?>
            <div class="ai-wizard__line"></div>
          <?php endif; ?>
          <div class="ai-wizard__step">
            <div class="ai-wizard__circle"><?php echo $ws['num']; ?></div>
            <div class="ai-wizard__label"><?php echo esc_html( $ws['label'] ); ?></div>
            <div class="ai-wizard__sub"><?php echo esc_html( $ws['sub'] ); ?></div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>


  <!-- =========================================================
       SECTION 8 — SECURITY & COMPLIANCE
       ========================================================= -->
  <section class="ap-section">
    <div class="ap-container">

      <div class="ap-section-header">
        <span class="aiship-badge neutral">Security</span>
        <h2>Security &amp; Compliance</h2>
        <p>Enterprise-grade infrastructure designed for regulated financial services.</p>
      </div>

      <div class="ai-trust-grid">
        <?php
        $trust = [
          [ 'icon' => '&#128272;', 'title' => 'AES-256 Encryption',  'desc' => 'Data encrypted at rest and in transit with bank-grade protocols.' ],
          [ 'icon' => '&#128273;', 'title' => 'Multi-Factor Auth',    'desc' => 'MFA enforcement for all users with hardware key support.' ],
          [ 'icon' => '&#128737;&#65039;', 'title' => 'KYC / AML Engine', 'desc' => 'Integrated identity verification and anti-money laundering checks.' ],
          [ 'icon' => '&#127760;', 'title' => 'Data Residency',       'desc' => 'Choose deployment region to comply with local data regulations.' ],
          [ 'icon' => '&#128220;', 'title' => 'Audit Logs',           'desc' => 'Immutable audit trail for every action, exportable on demand.' ],
          [ 'icon' => '&#9201;&#65039;', 'title' => '99.9% SLA',      'desc' => 'Guaranteed uptime backed by multi-AZ redundancy.' ],
          [ 'icon' => '&#128260;', 'title' => 'Disaster Recovery',    'desc' => 'Automated backups with cross-region failover and RTO < 1 hour.' ],
          [ 'icon' => '&#128101;', 'title' => 'RBAC',                 'desc' => 'Role-based access control with granular permission policies.' ],
        ];
        foreach ( $trust as $t ) : ?>
          <div class="ai-trust-item" data-aiship-animate>
            <div class="ai-trust-item__icon"><?php echo $t['icon']; ?></div>
            <div class="ai-trust-item__content">
              <div class="ai-trust-item__title"><?php echo esc_html( $t['title'] ); ?></div>
              <div class="ai-trust-item__desc"><?php echo esc_html( $t['desc'] ); ?></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>


  <!-- =========================================================
       SECTION 9 — REPORTING (TERMINAL)
       ========================================================= -->
  <section class="ap-section ap-section--alt">
    <div class="ap-container">

      <div class="ap-section-header">
        <span class="aiship-badge neutral">Output</span>
        <h2>Automated Reporting</h2>
        <p>Generate investor statements, compliance reports, and fund performance summaries — automatically.</p>
      </div>

      <div class="ap-terminal">

        <div class="ap-terminal__bar">
          <div class="ap-terminal__dots">
            <span class="ap-terminal__dot ap-terminal__dot--r"></span>
            <span class="ap-terminal__dot ap-terminal__dot--y"></span>
            <span class="ap-terminal__dot ap-terminal__dot--g"></span>
          </div>
          <span class="ap-terminal__title">ipms_engine &middot; quarterly_report.json</span>
          <span class="ap-terminal__live">&#9679; LIVE</span>
        </div>

        <div class="ap-terminal__body">
<pre>
<span class="t-comment"># Q4 2025 — Fund Performance Report</span>
<span class="t-sep">────────────────────────────────────────────────────</span>

<span class="t-key">FUND          </span> <span class="t-val">AIShip Global Equity Fund I</span>
<span class="t-key">PERIOD        </span> <span class="t-val">Q4 2025 (Oct 1 – Dec 31)</span>
<span class="t-key">NAV           </span> <span class="t-val">$847,241,893</span>

<span class="t-sep">────────────────────────────────────────────────────</span>

<span class="t-key">PERFORMANCE</span>
<span class="t-pos">  [+] QTD Return        +4.82%</span>
<span class="t-pos">  [+] YTD Return       +18.37%</span>
<span class="t-pos">  [+] Since Inception  +42.16%</span>
<span class="t-meta">  Benchmark (S&amp;P 500)  +15.91% YTD</span>

<span class="t-sep">────────────────────────────────────────────────────</span>

<span class="t-key">COMPLIANCE STATUS</span>
<span class="t-pos">  [&#10003;] KYC/AML checks          2,847 / 2,847 passed</span>
<span class="t-pos">  [&#10003;] Concentration limits    All within bounds</span>
<span class="t-pos">  [&#10003;] Regulatory filings      Filed on schedule</span>
<span class="t-pos">  [&#10003;] Audit trail             Complete — 0 gaps</span>

<span class="t-sep">────────────────────────────────────────────────────</span>

<span class="t-key">REPORTS GENERATED</span>
<span class="t-meta">  &#8594; Investor Statements       847 PDFs delivered</span>
<span class="t-meta">  &#8594; Fund Fact Sheet           Published to portal</span>
<span class="t-meta">  &#8594; Compliance Summary        Sent to board</span>
<span class="t-meta">  &#8594; Tax Package (K-1s)        In preparation</span>
<span class="ap-terminal__cursor">&#9608;</span></pre>
        </div>

      </div>

    </div>
  </section>


  <!-- =========================================================
       SECTION 10 — CTA FINAL
       ========================================================= -->
  <section class="ap-section ap-section--cta">
    <div class="ap-container ap-container--narrow">
      <div class="ap-cta-glow"></div>
      <h2 class="ap-cta__title">Ready to modernize your<br>investor operations?</h2>
      <p class="ap-cta__sub">
        Every IPMS deployment is custom-built around your fund structure,
        compliance requirements, and investor workflows.
      </p>
      <div class="ai-hero__ctas">
        <a href="https://aiship.co/custom-ai-project/" class="ap-btn ap-btn--primary ap-btn--lg">Schedule a Demo</a>
        <a href="https://aiship.co/custom-ai-project/" class="ap-btn ap-btn--secondary ap-btn--lg">Start a Project</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>

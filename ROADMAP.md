# AIShip — Roadmap / Pendientes

Referencia técnica de tareas pendientes, deuda conocida y decisiones aplazadas.
Para contexto de negocio y arquitectura web ver `CLAUDE.md`.

---

## 🔴 Pendiente — Ticker bar con datos reales

**Contexto:** El ticker bursátil animado de `/product/` muestra valores estáticos hardcodeados.

**Lo que se intentó:**
- Yahoo Finance vía PHP (`wp_remote_get`): Hostinger recibe página de consentimiento GDPR → cookies sin token A3 válido → HTTP 401.
- Yahoo Finance vía JS en el browser: los endpoints `query1/query2.finance.yahoo.com` no incluyen `Access-Control-Allow-Origin` → bloqueado por CORS. Las librerías JS de Yahoo Finance (yahoo-finance2, etc.) son Node.js only, no funcionan en browser.

**Solución acordada: Finnhub**
- API oficial, gratuita, sin problemas de CORS ni crumb
- Free tier: 60 req/min (necesitamos ~12 req cada 6h → trivial)
- Caché con WP Transients (6h), igual que el diseño actual

**Pasos para activarlo:**
1. Registrarse gratis en [finnhub.io](https://finnhub.io) → obtener API key
2. Añadir en `wp-config.php`:
   ```php
   define( 'AISHIP_FINNHUB_KEY', 'tu_api_key_aqui' );
   ```
3. Decirle a Claude: "implementa Finnhub en el ticker" → reescribirá `aiship_get_tickers()` en `functions.php` usando:
   ```
   GET https://finnhub.io/api/v1/quote?symbol=AAPL&token=KEY
   ```
   (12 llamadas individuales, todas en la misma carga, resultado cacheado 6h)

**Archivos afectados:** `functions.php` (función `aiship_get_tickers`)

---

## 🟡 Pendiente — Páginas web (contenido en Divi Builder)

| Página      | Estado                          | Responsable |
|-------------|---------------------------------|-------------|
| Home        | Hero por actualizar (nuevo copy) | Usuario en Divi |
| Product     | Creada y funcional              | ✅ Listo     |
| Services    | Actualizar — dev a medida primario | Usuario en Divi |
| About       | Actualizar — especialización FinTech | Usuario en Divi |
| Contact     | Orientar a B2B / "Start a Project" | Usuario en Divi |

---

## 🟡 Pendiente — Logo con URL HTTP

**Síntoma:** Warning en consola:
```
Content-Security-Policy: Actualizando solicitud insegura 'http://aiship.co/wp-content/uploads/.../Logo_AIship...'
```
**Causa:** El logo está guardado en WordPress Media con URL `http://` en lugar de `https://`.
**Fix:** WordPress Admin → Media → editar el logo → actualizar la URL a `https://`, o usar el plugin Better Search Replace para actualizar todas las URLs de la base de datos.

---

## ⚪ Investigar — Error JS de Divi en `/product/`

**Síntoma:** Error en consola en línea 753 del HTML renderizado:
```
Uncaught TypeError: can't access property "prepend", section is null
```
**Causa probable:** Divi inyecta JS automático que busca elementos `section` de su estructura nativa. El template `page-product.php` es PHP custom, no usa módulos de Divi Builder → Divi no encuentra lo que espera.
**Impacto:** No afecta funcionalidad visible (Divi falla silenciosamente en su propio script).
**Fix potencial:** Identificar qué script de Divi genera la línea 753 en el source renderizado y añadir un guard en el child theme, o usar `remove_action` para desencolar ese script en la página Product.

---

## ✅ Completado

- Base CSS del child theme: sistema tipográfico, variables de color, componentes FinTech
- Página Product (`page-product.php`): hero, ticker bar, stats, pipeline, terminal de output, canales B2B/Trading, CTA
- Fix scroll horizontal en mobile
- Ticker bar con logging de fuente en consola (`app.js`)
- Animaciones de entrada (IntersectionObserver), contadores animados, header scroll

---

*Última actualización: 2026-02-18*

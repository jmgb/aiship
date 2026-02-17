# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Proyecto

**AIShip** — Software house especializado en FinTech / Capital Markets.
Web: [aiship.co](https://aiship.co/) · WordPress + Divi · Hostinger.

Este repo es el **Divi Child Theme**. Se carga encima del tema padre Divi sin modificarlo.
Nunca se edita `wp-content/themes/Divi/` directamente. Todo va aquí.

## Posicionamiento (nuevo, en construcción)

**Mensaje central:** "Financial Intelligence. Automated."

AIShip se reposiciona de agencia de crecimiento genérica a **software house especializado en el sector financiero**, con un producto propio de inteligencia de mercados y servicios de desarrollo a medida.

### Producto principal — SEC Intelligence Analyzer

Sistema de análisis financiero en tiempo real:

```
SEC EDGAR (10-K, 10-Q, 8-K, S-1...) + Press Releases + IR pages
                        ↓
              Ingesta en tiempo real
                        ↓
              Procesamiento con LLMs
                        ↓
         Análisis estructurado automático:
         · Resumen ejecutivo
         · Cambios materiales
         · Señales de riesgo / oportunidad
         · Comparativa vs. periodo anterior
                        ↓
         ┌──────────────────┬────────────────────┐
         │   Canal B2B      │   Canal Trading     │
         │  (white-label)   │   (ejecución)       │
         │  Gestores de     │   Long / Short /    │
         │  cartera →       │   Nueva posición    │
         │  sus clientes    │   automatizada      │
         └──────────────────┴────────────────────┘
```

**Estado:** Producto funcional. Uso interno con resultados probados. Sin clientes externos aún.

**Modelo de negocio:** Desarrollo a medida por cliente + retainer mensual (mantenimiento, actualizaciones, mejoras).

**Target:** B2B — gestores de activos, family offices, RIAs, prop desks, fondos.

### Servicios secundarios (se mantienen)

- AI Lead Generation
- AI Lead Recovery
- AI Booking Systems

## Arquitectura de la nueva web

| Página | Estado | Responsable |
|---|---|---|
| Home | Rediseñar — nuevo hero FinTech | Ambos |
| Product (nueva) | Crear — SEC Analyzer en detalle | Ambos |
| Services | Actualizar — dev a medida primario, Lead Gen secundario | Usuario en Divi |
| About | Actualizar — especialización financiera, 20+ años | Usuario en Divi |
| Contact | Orientar a B2B / "Start a Project" | Usuario en Divi |

## División de trabajo

**Usuario hace en WordPress/Divi:**
- Textos, titulares, copy de cada sección
- Estructura de páginas con el Divi Builder
- Menú de navegación
- Imágenes y media

**Claude hace desde este child theme:**
- CSS: tipografía, espaciados, variables, animaciones
- Estilos de componentes (botones, cards, badges, timelines)
- Efectos visuales que Divi no da de forma nativa
- JS para interactividad custom
- PHP hooks/filters si se necesitan

## Próximos pasos pendientes

1. Claude prepara base CSS del child theme: sistema tipográfico, componentes FinTech, animaciones
2. Usuario actualiza hero de Home en Divi con nuevo copy
3. Usuario crea página "Product" en Divi
4. Iterar sección a sección

## Colores de marca

| Variable CSS     | Hex       | Uso           |
|------------------|-----------|---------------|
| `--color-bg`     | `#01012C` | Fondo navy    |
| `--color-accent` | `#DB0EB7` | CTAs, magenta |
| `--color-white`  | `#ffffff` | Tipografía    |

## Convenciones de código

- Prefijo handles WordPress: `aiship-child-*`
- CSS personalizado → `assets/css/custom.css` (nunca en `style.css`)
- JS personalizado → `assets/js/app.js` (cargado en footer)
- `style.css` solo contiene la cabecera del tema y variables CSS globales

## Despliegue automático

```
git push → GitHub (jmgb/aiship) → Webhook → Hostinger wp-content/themes/aiship-child/
```

Cada `git push` a `main` despliega automáticamente. El tema padre Divi está en
`wp-content/themes/Divi/` en el servidor — fuera de este repo, intocable.

## Repositorio

```
https://github.com/jmgb/aiship.git
```

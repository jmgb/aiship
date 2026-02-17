# AIShip — Divi Child Theme

Child theme para [aiship.co](https://aiship.co/) · WordPress + Divi · Hostinger.

---

## Sobre AIShip

**Software house especializado en FinTech y Capital Markets.**

AIShip diseña y desarrolla software de inteligencia financiera a medida. El producto principal analiza en tiempo real todos los registros que las compañías cotizadas de Estados Unidos publican en la SEC (10-K, 10-Q, 8-K, S-1...) y sus notas de prensa, los procesa con IA y genera informes de análisis detallados.

Estos informes tienen dos usos principales:
- **B2B white-label:** gestores de activos, family offices y RIAs los reempaquetan y envían a sus propios clientes con empresas en cartera
- **Trading automatizado:** el sistema ejecuta órdenes de compra/venta (posiciones largas, cortas o nuevas) basándose en las señales detectadas

**Modelo de negocio:** desarrollo a medida por cliente + retainer mensual de mantenimiento y mejoras.

---

## Este repositorio

Contiene **únicamente el child theme**. El tema padre Divi vive en el servidor (`wp-content/themes/Divi/`) y no se modifica desde aquí.

Flujo de despliegue:
```
git push → GitHub (jmgb/aiship) → Webhook → Hostinger wp-content/themes/aiship-child/
```

---

## Estructura

```
aiship/
├── style.css              # Cabecera del tema + variables CSS de marca
├── functions.php          # Encola child styles y assets
├── assets/
│   ├── css/custom.css     # Personalizaciones CSS (sobreescribe estilos Divi)
│   └── js/app.js          # JS personalizado (footer)
└── CLAUDE.md              # Guía para Claude Code
```

---

## Colores de marca

| Nombre  | Hex       | Variable CSS         |
|---------|-----------|----------------------|
| Navy    | `#01012C` | `--color-bg`         |
| Magenta | `#DB0EB7` | `--color-accent`     |
| Blanco  | `#ffffff` | `--color-white`      |

---

## División de trabajo

| Tarea | Herramienta |
|---|---|
| Textos, copy, estructura de páginas, menús, imágenes | WordPress / Divi Builder |
| CSS, tipografía, animaciones, componentes custom, JS | Este child theme |

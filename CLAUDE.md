# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Proyecto

**AIShip Child Theme** — Divi Child Theme para [aiship.co](https://aiship.co/).
WordPress alojado en Hostinger. El tema padre es **Divi** (Elegant Themes).

La web **ya está construida y en producción con Divi**. Este child theme se carga encima del tema padre sin modificarlo. El trabajo aquí es:

- Diseñar **nuevas páginas** usando el Divi Builder
- Crear **nuevas secciones** para añadir al sitio existente
- **Modificar el diseño actual** sobreescribiendo estilos de Divi con CSS en `assets/css/custom.css`
- Añadir **funcionalidad custom** vía PHP (`functions.php`) o JS (`assets/js/app.js`)

Nunca se edita el tema padre Divi directamente. Todos los cambios van en este child theme.

## Repositorio remoto

```
https://github.com/jmgb/aiship.git
```

## Estructura del tema

```
aiship/
├── style.css            # Cabecera WordPress del tema (obligatorio) + variables CSS de marca
├── functions.php        # Encola el child style.css y assets opcionales
├── assets/
│   ├── css/custom.css   # Personalizaciones CSS adicionales
│   └── js/app.js        # JS personalizado (cargado en footer)
```

## Colores de marca

| Variable CSS          | Hex       | Uso              |
|-----------------------|-----------|------------------|
| `--color-bg`          | `#01012C` | Fondo navy       |
| `--color-accent`      | `#DB0EB7` | CTAs, magenta    |
| `--color-white`       | `#ffffff` | Tipografía       |

## Convenciones

- Prefijo de handles WordPress: `aiship-child-*`
- CSS personalizado va en `assets/css/custom.css`, no en `style.css`
- JS personalizado va en `assets/js/app.js` (cargado en footer)
- `style.css` solo contiene la cabecera del tema y variables CSS globales

## Despliegue

Subir via FTP/SFTP a `wp-content/themes/aiship-child/` en Hostinger.
Activar desde **Apariencia → Temas** en el panel de WordPress.

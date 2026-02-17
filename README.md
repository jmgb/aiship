# AIShip Child Theme

Divi Child Theme para [aiship.co](https://aiship.co/) — alojado en Hostinger.

## Contexto

La web **ya está construida y activa con Divi** (Elegant Themes). Este repositorio contiene el **tema hijo** que se carga encima de Divi sin modificarlo directamente.

El trabajo en este repo consiste en:
- **Diseñar nuevas páginas** desde cero usando módulos de Divi
- **Crear nuevas secciones** para añadir al sitio existente
- **Modificar el diseño actual** (colores, tipografía, espaciados, comportamiento) sobreescribiendo estilos de Divi mediante CSS en `assets/css/custom.css`
- **Añadir funcionalidad** personalizada vía PHP en `functions.php` o JS en `assets/js/app.js`

Todo cambio que afecte a lo que ya existe en Divi se hace desde el child theme, nunca editando el tema padre.

## Estructura

```
aiship/
├── style.css            # Cabecera del tema + estilos base
├── functions.php        # Encola estilos y scripts del child
├── assets/
│   ├── css/
│   │   └── custom.css   # Estilos personalizados
│   └── js/
│       └── app.js       # JavaScript personalizado
└── CLAUDE.md
```

## Colores de marca

| Nombre  | Hex       |
|---------|-----------|
| Navy    | `#01012C` |
| Magenta | `#DB0EB7` |
| Blanco  | `#ffffff` |

## Despliegue automático

Este repositorio está conectado a Hostinger mediante un webhook de GitHub Actions:

```
Cambios en código
      ↓
git push → GitHub (jmgb/aiship)
      ↓
Webhook automático
      ↓
Hostinger → wp-content/themes/aiship-child/
```

Cada `git push` a `main` despliega automáticamente el contenido directamente en la carpeta del child theme en el servidor.

> **Importante:** Este repositorio **solo contiene el tema hijo**. El tema padre Divi vive en `wp-content/themes/Divi/` en el servidor y no está en este repo ni puede modificarse desde aquí. Cualquier cambio al diseño o comportamiento de Divi debe hacerse sobreescribiendo desde el child theme.

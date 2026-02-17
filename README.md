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

## Despliegue

Subir el contenido de esta carpeta como tema hijo de Divi en:
`wp-content/themes/aiship-child/`

Activar desde **Apariencia → Temas** en el panel de WordPress.

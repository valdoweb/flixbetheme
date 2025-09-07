
# FlixbeHospitality — Minimal Block Theme

**Requirements:** WordPress 6.6+, PHP 7.4+

## Quick Installation
1. Download this theme as a ZIP file.
2. Go to **Appearance → Themes → Add New → Upload Theme** and upload the ZIP.
3. Activate **FlixbeHospitality**, then open the **Site Editor** to customize colors, typography, layouts, and patterns.

## Theme Structure
- `theme.json` — Defines the design system (colors, typography, spacing, layout) and registers template parts and patterns.
- `templates/` — Block-based HTML templates (home, index, page, single, 404).
- `parts/` — Reusable template parts for header and footer.
- `patterns/` — Ready-to-use block patterns (hero, call-to-action).
- `style.css` — Theme metadata and custom CSS enhancements.
- `functions.php` — Theme functions and WordPress hooks.

## Features
- **Full Site Editing (FSE)** support with block-based templates
- **Modern gradient styling** with smooth animations and hover effects
- **Responsive design** that works on all devices
- **Accessibility-ready** with proper focus states and semantic markup
- **Customizable color palette** and typography through the Site Editor
- **Card-style post layouts** with elegant hover animations
- **Sticky header** with backdrop blur effect
- **Clean, minimal design** perfect for blogs and business sites

## Customization Tips
- Customize colors and fonts through `theme.json` without touching CSS.
- Add new patterns by creating `.html` files in `patterns/` with proper headers (Title, Slug, Categories).
- Keep the theme "PHP-free" when possible: leverage core blocks and the Site Editor.
- Use the Site Editor to modify layouts, add blocks, and create custom page designs.

## Development
This theme follows WordPress Full Site Editing standards and is designed to work seamlessly with the block editor. All styling is enhanced through modern CSS with gradients, animations, and responsive design principles.

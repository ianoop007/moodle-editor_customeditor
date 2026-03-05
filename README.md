# Anoop Kakkur Rich Text Editor for Moodle

A powerful, modern WYSIWYG rich text editor plugin for Moodle LMS. Fully self-contained with zero external dependencies, bundled professional fonts, comprehensive security hardening (28 fixes across 5 audit rounds), and 50+ features rivaling commercial editors.

**Developer:** Anoop Kakkur
**Email:** anoopkakkur@gmail.com
**Website:** [anoopkakkur.com](https://anoopkakkur.com/)
**License:** GPL v3 or later
**Supported Moodle versions:** 4.5, 5.0, 5.1

---

## Features

### Text Formatting
- Bold, Italic, Underline, Strikethrough, Subscript, Superscript
- Font family selection with 18+ fonts including 7 Malayalam fonts
- Default fonts: Work Sans (body), IBM Plex Mono (code)
- Font size selection with auto-detection (default 16px)
- Text color and highlight color pickers (right-click highlight to change default)
- Line spacing control (1.0 to 3.0, custom values)
- Paragraph borders and shading with custom colors
- Text columns (1-6 column newspaper-style layouts)

### Block Formatting
- Headings H1-H6, Paragraph, Preformatted, Blockquote
- 10 pre-styled heading and subheading templates
- Text alignment (Left, Center, Right, Justify)
- Ordered and Unordered lists with indent/outdent

### Insert Features
- **Images** - URL, file upload, drag and drop from desktop, resize handles
- **Links** - with new tab option and URL protocol validation
- **Tables** - with optional header row
- **Code blocks** - syntax highlighting for 10+ languages with copy buttons
- **Code snippets** - inline and block with per-word editing
- **Shapes** - 28+ shapes across 5 categories with text overlay, resize, drag, copy/cut/paste, right-click context menu
- **SmartArt** - 10 templates with editable text (Linear Process, Step Process, Chevron, Org Chart, Cycle, Venn Diagram, Matrix, Block List, Timeline)
- **Charts** - 6 types with live preview and 6 color schemes (Bar, Column, Line, Pie, Donut, Area) - double-click to re-edit
- **Horizontal lines** - 10 styled variants with thickness control
- **Special characters** - 9 categorized tabs including 30+ world currency symbols
- **Emoji** picker
- **Video embeds** - YouTube, Vimeo, Dailymotion, Google Drive
- **Iframe** insertion with security sandboxing
- **Text boxes** - bordered, resizable, editable
- **Page breaks** - visual separator, works in print/PDF
- **Table of Contents** - auto-generated from headings, clickable, refreshable
- **Watermark** - customizable text, color, opacity, size

### Document Features
- Header and Footer (editable, shows in print/export)
- Page Break insertion for print/PDF
- Table of Contents auto-generation
- Watermark support (DRAFT, CONFIDENTIAL, custom)

### Export and Import
- Export to PDF
- Export to Word (.doc)
- Export HTML
- Export plain text
- Import from Word (.docx/.doc)

### Editing Tools
- Undo/Redo with 100-step history
- Find and Replace
- Real-time word and character count (with selection count)
- Paste normalization
- 40+ keyboard shortcuts
- Show Blocks mode (visual block outlines with tag labels)
- Source code view
- Fullscreen editing

### Admin Settings Panel
Site administrators can enable/disable individual features through a comprehensive settings page accessible from Site Administration > Plugins > Text editors.

---

## Security

28 security fixes across 5 comprehensive audit rounds including:
- DOM-based HTML sanitizer (2-phase: regex + DOM parsing)
- 14 dangerous HTML tags stripped
- All event handler attributes removed
- Dangerous URL protocols blocked
- CSS attack vectors neutralized
- Content Security Policy (CSP) headers
- All iframes sandboxed with domain whitelist
- Video embeds restricted to trusted domains with HTTPS enforcement
- All input and output paths sanitized
- Zero external dependencies (no CDN, no tracking)

---

## Installation

### Via Moodle Plugin Installer
1. Download the ZIP file
2. Go to Site Administration > Plugins > Install plugins
3. Upload the ZIP file and follow on-screen instructions
4. Go to Site Administration > Plugins > Text editors and set as preferred editor

### Manual Installation
1. Extract the ZIP file
2. Copy the `customeditor` folder to `/lib/editor/` in your Moodle installation
3. Go to Site Administration > Notifications to trigger the upgrade
4. Set as preferred editor under Site Administration > Plugins > Text editors

### After Installation
- Configure features: Site Administration > Plugins > Text editors > Anoop Kakkur Rich Text Editor > Settings
- Purge caches: Site Administration > Development > Purge all caches
- Hard refresh browser: Ctrl+Shift+R

---

## Requirements

- Moodle 4.5 or higher (tested up to 5.1)
- PHP 8.0 or higher
- Modern web browser (Chrome, Firefox, Safari, Edge)
- No external dependencies required

---

## Bundled Fonts

All fonts are bundled locally with zero external network requests.

### Default Fonts
- Work Sans (body text) - OFL 1.1
- IBM Plex Mono (code) - OFL 1.1
- Instrument Sans (alternative) - OFL 1.1

### Malayalam Fonts
- Baloo Chettan 2, Noto Sans Malayalam, Dyuthi, Mandaram, Raghu Malayalam Sans, Suruma, Thumba

---

## Keyboard Shortcuts

Press Ctrl+/ inside the editor to view all 40+ shortcuts.

---

## Contributing

Bug reports and feature requests are welcome via the issue tracker.

---

## License

This plugin is licensed under the GNU General Public License v3 or later.
Bundled fonts are licensed under the SIL Open Font License v1.1.

---

## Author

**Anoop Kakkur**
- Email: anoopkakkur@gmail.com
- Website: https://anoopkakkur.com/

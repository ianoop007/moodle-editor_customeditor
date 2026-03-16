# Changelog

## v1.0.2 (2026-03-16)

### Fixed
- Resolved all 378 Moodle prechecker errors and 37 warnings
- PHP coding style: multi-line function calls with one argument per line in settings.php
- PHP coding style: removed unnecessary MOODLE_INTERNAL checks in lib.php and provider.php
- PHP coding style: converted all array() to short array syntax []
- PHP coding style: removed blank lines after opening braces
- Language strings: reordered all string keys in strict alphabetical order
- JavaScript: emptied @package tags in AMD modules per Moodle ESLint rules
- JavaScript: added .catch() and return values to Promise .then() chains
- CSS: expanded all single-line rules to multi-line format
- CSS: added spaces after commas in rgb() and rgba() functions
- CSS: added required empty lines before @font-face declarations
- CSS: split selector lists to one selector per line
- CSS: ensured all lines within 132 character limit
- CSS: shortened Unicode decorative comment lines
- AMD build files rebuilt to match updated source
- Added GitHub Actions CI workflow for automated testing
- CI tests against Moodle 4.5 (MariaDB), 5.0 (PostgreSQL), 5.1 (PostgreSQL)

## v1.0.1 (2025-03-15)

### Fixed
- All settings strings now use get_string() API for translation support
- Added proper Moodle GPL boilerplate to styles.css
- Converted copybuttons.js to AMD ES6 module (amd/src/copybuttons.js)
- Converted editor init JS to AMD ES6 module (amd/src/editor.js)
- lib.php now uses js_call_amd() instead of js_init_code()
- Removed legacy copybuttons.js (replaced by AMD module)
- All source files have proper @copyright, @license, @package tags

## v1.0.0 (2025-03-05)

### Added
- Rich text editing with full formatting controls
- 10 heading/subheading templates
- 28+ shapes with text overlay, resize, drag, and copy/paste
- 10 SmartArt templates with editable text
- 6 chart types with live preview and re-editing
- 10 styled horizontal line options with thickness control
- Special characters and currency symbols (9 tabbed categories)
- Emoji picker
- Code blocks with syntax highlighting for 10+ languages
- Code snippets (inline and block) with copy buttons
- Table insertion with header row support
- Image insertion (URL, file upload, drag & drop) with resize handles
- Video embed support (YouTube, Vimeo, Dailymotion)
- Iframe insertion with security sandboxing
- Text boxes (bordered, resizable, editable)
- Page breaks for print/PDF
- Auto-generated Table of Contents from headings
- Editable Header and Footer
- Watermark support (customizable text, color, opacity)
- Text columns (1–6 column layouts)
- Line spacing control
- Paragraph borders and shading
- Export to PDF, Word, HTML, and plain text
- Import from Word (.docx/.doc)
- Find and Replace
- Show Blocks mode
- Fullscreen editing
- Source code view
- 40+ keyboard shortcuts
- Real-time word/character count with selection counting
- Paste normalization (minimum 14px font)
- Admin settings panel with 30+ toggleable options
- 18+ bundled fonts including Malayalam fonts
- 28 security hardening measures
- Content Security Policy headers
- 2-phase HTML sanitizer (regex + DOM-based)
- Privacy API implementation (null provider)
- Full Moodle 4.4+ compatibility

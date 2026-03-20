# Changelog

## v2.0.0 (2026-03-20) — Major Feature Release

### 120 New Features Added (all with admin settings toggles)

**General / Interface (16 new)**
- Dark mode / theme toggle with localStorage persistence
- Spell check toggle (on/off)
- Auto-save drafts every 30s with draft recovery
- Reading time estimate in status bar
- Keyboard accessibility mode (ARIA roles, labels, tabindex)
- Focus / Typewriter mode (dims all but current paragraph)
- Line numbers toggle
- Zoom controls (50%–200%)
- Reading progress bar
- Paste as plain text global toggle
- Auto-correct / Auto-replace common symbols
- Floating toolbar near selected text
- Clickable element breadcrumb in status bar
- Mini map / Document overview
- Split view (source + preview)
- Distraction-free writing mode

**Text Formatting (12 new)**
- Text case transform (UPPERCASE, lowercase, Title Case, Sentence case)
- Text direction RTL/LTR toggle
- Drop cap (large first letter)
- Small caps text styling
- Letter and word spacing controls
- Text shadow effects
- Paragraph spacing (before/after)
- Editor background colour
- Custom CSS class application
- Gradient text colouring
- Per-block text direction
- Transliteration helper (English → Malayalam/Hindi)
- Quick format painter

**Insert Features (38 new)**
- Callout / Alert boxes (Info, Warning, Success, Error)
- Footnotes with auto-numbering
- Definition lists (term/description pairs)
- Accordion / Collapsible sections
- Badges / Tags (6 colours)
- Math / Equation editor (LaTeX notation)
- Content templates (Letter, Meeting, Report, Resume, Blog, How-To, Rubric)
- Highlight annotations with hover tooltips
- Image captions
- Image gallery / Grid layouts
- Audio embed (HTML5 player)
- File attachment styled links
- Blockquote with citation attribution
- Figure with figcaption (HTML5)
- Progress bars (percentage display)
- Timeline (vertical event timeline)
- Tab panels (tabbed content)
- Checklist / Task lists (interactive checkboxes)
- Content divider with label
- Placeholder / Merge fields ({{name}}, {{date}})
- Date/Time quick-insert
- Lorem ipsum generator (1-5 paragraphs)
- Card / Box component
- Kanban board (To Do, In Progress, Done)
- Star rating display (1-5 stars)
- Glossary tooltip terms
- Citation / Reference insert (APA, MLA, Chicago)
- QR code generator from URL/text
- Quiz / Question reveal boxes
- Step-by-step instruction boxes
- Key takeaway / Summary boxes
- Compare / Versus side-by-side boxes
- Rubric table templates
- Learning objective boxes
- Table cell merge/split
- Table sorting (alphabetical/numerical)
- Table styling presets
- Non-breaking space insert
- Anchor links / Bookmarks
- Endnote section (separate from footnotes)
- Index / Keyword tagging
- JSON/XML syntax viewer
- Mermaid diagram support
- ASCII art boxes
- Colour palette swatches
- Social media embeds
- Google Maps embeds
- oEmbed auto-detection
- Moodle activity linker
- Divider patterns (extended decorative)

**Document Features (8 new)**
- Heading auto-numbering (1.0, 1.1, 1.2...)
- Document properties (title, author, metadata)
- Multi-page / Section navigator
- Running header/footer (per-section)
- Page number insert (Page X of Y)
- Cross-reference auto-links (See Figure 3)

**Export & Import (4 new)**
- Markdown import/export (full HTML ↔ MD conversion)
- Print preview with styled popup
- Export to ePub eBook format
- Export Markdown with YAML frontmatter

**Advanced Tools (12 new)**
- Word/Character limit warning
- Text statistics (sentences, paragraphs, readability score)
- Clipboard history (last 5 items)
- Content lock / Read-only sections
- Undo history panel
- Unicode character inspector
- Word count per language/script
- Broken link checker
- Duplicate content detector
- Word frequency analyser
- Passive voice detector
- Sentence length warning (>40 words)
- Jargon / Complexity highlighter
- Consistency checker (spelling patterns)
- Version compare / Diff view
- Toolbar customiser (drag-and-drop)
- Side panel / Inspector

**Accessibility & Validation (5 new)**
- Image alt text editor
- Heading level checker (hierarchy validation)
- Colour contrast checker (WCAG AA)
- Reading level indicator (Flesch-Kincaid)
- Language attribute per-selection

**Security & Privacy (4 new)**
- Content encryption (passphrase-based)
- Redaction tool (content removal)
- Invisible watermark (digital fingerprint)
- Export sanitiser (strip metadata)

### Changed
- Version bumped to 2.0.0 (plugin version: 2026032000)
- Moodle compatibility extended to 4.1–5.2 (from 4.5–5.1)
- Settings page expanded to 150 admin toggle checkboxes + 2 text fields
- Language file expanded to 349 lines with all new strings
- lib.php settings keys array expanded to pass all 152 settings to editor iframe
- About modal updated with v2.0.0 branding and feature count
- Status bar enhanced with reading time, autosave indicator, and zoom controls
- All menus expanded (File, Edit, View, Insert, Format, Tools) with new features
- 120+ new CSS rules including full dark mode theme

### Technical Details
- Dark mode uses CSS custom properties override on `body.dark-mode`
- All features respect admin toggle settings via `_isEnabled()` check
- New features use the same sanitization pipeline as existing features
- editor.html: ~5,300 lines (up from 4,784)
- settings.php: ~1,800 lines (up from 389)
- Total admin settings: 152 (150 checkboxes + 2 text fields)

---

## v1.0.4 (2026-03-17)

### Added
- PHPUnit tests (18 test cases)
- Behat feature tests

## v1.0.3 (2026-03-16)

### Fixed
- Fixed 9 remaining CSS selector-list comma formatting issues

## v1.0.2 (2026-03-16)

### Fixed
- Resolved all 378 Moodle prechecker errors and 37 warnings

## v1.0.1 (2025-03-15)

### Fixed
- All settings strings now use get_string() API
- AMD ES6 module conversion

## v1.0.0 (2025-03-05)

### Added
- Initial release with 30+ features and admin settings

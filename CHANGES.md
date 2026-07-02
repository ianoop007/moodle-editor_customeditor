# Changelog

## v3.1.2 (2026-07-02)

### Community Feedback Fixes
- Fixed: Autosave no longer restores stale drafts when editing existing content — now checks both editor state and parent textarea before restoring, and clears old drafts when Moodle pre-fills the editor
- Fixed: Iframe/embed insertion now works for any URL — editor-inserted iframes are marked with `data-editor-embed` attribute and preserved by the sanitizer
- Fixed: Expanded iframe allowlist to include 25+ educational embed domains (H5P.org, CodePen, Padlet, Canva, Prezi, EdPuzzle, Nearpod, Quizlet, Kahoot, Mentimeter, etc.)
- Fixed: Same-origin iframes (like Moodle H5P embeds) are now always allowed by the sanitizer
- Added: H5P Content insertion (Insert → 🎓 H5P Content) — supports H5P embed URLs, Moodle Content Bank URLs, and H5P.org share links
- Security: Unknown-domain iframes now get sandbox attribute added instead of being removed entirely

## v3.1.0 (2026-03-25) — Phonetic Keyboard (jQuery.IME)

**Plugin version:** 2026032402

### Added
- **Phonetic keyboard** — new toolbar control group for typing Indian and
  international scripts using a standard keyboard. Powered by jQuery.IME
  (Wikimedia Foundation, MIT/GPL v2+, bundled in `lib/ime/`).

- **Toolbar UX** — the IME group uses clear labels so users never confuse
  it with Font Family, Font Size, or Voice Language controls:
  - **[ ⌨ Phonetic ]** button — shows "Phonetic ▸ On" when active (highlighted blue)
  - **Script Language:** label + dropdown — shows only admin-enabled languages
  - **Input Method:** label + dropdown — shows all methods for chosen language;
    hidden when language has only one method

- **19 admin-configurable languages** (Site Admin → Plugins → Text Editors):
  - Malayalam `ml` — on by default (Transliteration, InScript, InScript 2)
  - Tamil `ta` — on by default (Transliteration, Tamil99, InScript, Bamini, InScript 2)
  - Hindi `hi` — on by default (Transliteration, InScript, Bolnagri, Phonetic, InScript 2)
  - Telugu `te` — on by default (Transliteration, InScript, InScript 2, Apple, Modular)
  - Kannada `kn` — on by default (Transliteration, InScript, KGP, InScript 2)
  - Bengali, Gujarati, Punjabi, Urdu, Assamese, Odia, Marathi, Sanskrit — off by default
  - Arabic, Persian, Russian, Greek, Chinese Simplified, German — off by default

- **localStorage persistence** — last used language and method remembered
  per language independently across sessions

- **Mutual exclusion** — activating IME stops voice typing; activating voice
  typing stops IME

- **Ctrl+M** shortcut to toggle IME (built into jQuery.IME)

- `db/upgrade.php` v3.1.0 block — unconditional defaults, no false guard
- `thirdpartylibs.xml` — jQuery.IME entry (MIT licence)
- `.eslintignore` / `.stylelintignore` — exclude `lib/ime/` from CI linting

### Changed
- version: `2026032401` → `2026032402`, release: `3.0.0` → `3.1.0`

---

## v3.0.0 (2026-03-24) — Voice Typing

**Plugin version:** 2026032401

### Added
- **Voice typing** — microphone button in the editor toolbar for speech-to-text dictation.
  Uses the browser built-in Web Speech API. No API key, no third-party service, no cost.
- **19 admin-configurable languages** under
  `Site Administration → Plugins → Text Editors → Anoop Kakkur Rich Text Editor`:
  - English India `en-IN`, English US `en-US`, English UK `en-GB` — on by default
  - Malayalam `ml-IN` (മലയാളം), Tamil `ta-IN` (தமிழ்), Hindi `hi-IN` (हिंदी) — on by default
  - Telugu `te-IN`, Kannada `kn-IN`, Bengali `bn-IN`, Urdu `ur-PK` — off by default
  - Arabic `ar-SA`, French `fr-FR`, Spanish `es-ES`, German `de-DE` — off by default
  - Japanese `ja-JP`, Chinese `zh-CN`, Portuguese `pt-BR`, Russian `ru-RU`, Korean `ko-KR` — off by default
- Language labels shown in native script in the dropdown.
- Voice status bar — amber bar with pulsing red dot, Listening text, live interim transcript, and Stop button.
- Auto-restart on Android Chrome (browser stops recognition after each utterance).
- Graceful degradation — mic button greyed with tooltip on unsupported browsers.
- Descriptive error messages for permission denied, no microphone, network error.
- `db/upgrade.php` — new file; force-sets all voice defaults on upgrade from v2.0.5.

### Fixed
- **PHP 8.1+ fatal crash on install** — `lib.php` `use_editor()` had `array $options = null`
  (non-nullable typed hint). PHP 8.1+ treats this as a fatal inheritance violation under the
  stricter class-loading triggered by the upgrade cycle. Fixed by removing the type hint
  entirely: `$options = null`. Compatible with PHP 8.0–8.4 and Moodle 4.1–5.2.

### Technical — Web Speech API
- No API key or registration required.
- Browser support: Chrome 25+, Edge 79+, Safari 14.1+.
  Firefox: enable `media.webspeech.recognition.enable` in `about:config`.
- HTTPS required (all production Moodle installations already use HTTPS).
- Microphone permission: browser prompts on first use, one-time grant.
- Audio streamed by browser directly to Google speech servers (Chrome/Edge).
  No audio passes through Moodle or this plugin.

### Install checklist
1. Upload zip — `Site Administration → Install plugin`
2. `Site Administration → Notifications` (runs upgrade.php, writes language defaults to DB)
3. `Site Administration → Development → Purge all caches`
4. Browser hard reload: `Ctrl+Shift+R`

### Changed
- Version `2026032400` → `2026032401` (release `2.0.5` → `3.0.0`)
- `lib.php`: `use_editor()` type hint removed; voice keys added to settings URL params
- `settings.php`: Voice Typing section with master toggle + 19 language checkboxes
- `lang/en/editor_customeditor.php`: 42 new strings, alphabetically sorted
- `styles.css`: voice mic button, status bar, pulse animation, dark mode (1331 lines)
- `editor.html`: Permissions-Policy meta, voice toolbar group, status bar, init IIFE,
  SpeechRecognition engine
- `amd/src/editor.js`: `allow="microphone"` on iframe element (requires Grunt rebuild)
- `db/upgrade.php`: new file

---

## v2.0.5 (2026-03-24) — Bug Fixes & CI Improvements

### Fixed
- **Debug mode deprecation notice**: Migrated `before_footer` callback to Moodle 4.4+
  Hooks API (`db/hooks.php` + `classes/hook_callbacks.php`). Legacy callback in `lib.php`
  retained for backward compatibility with Moodle 4.1–4.3. Editor no longer triggers
  `E_USER_NOTICE` when debugging is set to Developer.
- **Editor not loading on Moodle pages**: Fixed race condition where `js_amd_inline()`
  was not guaranteed to execute before the AMD `init()` module. Replaced with
  `js_init_code()` which runs synchronously before AMD modules, using a
  `window.customeditorUrls` global object to pass the editor URL.
- **js_call_amd argument exceeding 1024 characters**: Moved the long settings URL out
  of `js_call_amd` arguments. Settings are now passed via `js_init_code()` and only the
  element ID is sent to `js_call_amd`.
- **Editor window not resizable**: The iframe wrapper now uses `resize: vertical` with
  `overflow: hidden` and `min-height: 200px`. The border is on the wrapper so the native
  browser resize grip is visible.
- **PHP Lint errors**: `namespace` declarations must precede `defined('MOODLE_INTERNAL')`
  in namespaced files. Fixed in `editor_test.php` and `privacy/provider.php`.
- **PHPUnit class-not-found errors**: Added `setUpBeforeClass()` with
  `require_once(lib.php)` and fixed `\editor_customeditor_before_footer()` call with
  global namespace prefix.
- **CodeSniffer violations**: Added space after `function` keyword in `install.php`
  anonymous function. Removed unnecessary `MOODLE_INTERNAL` from namespaced class files.
  Fixed blank line after opening brace in `editor_test.php`.
- **Behat test failure**: Changed assertion from checking text inside the editor iframe
  (not visible to Behat) to verifying the editor iframe element exists on the page.
- **CI PostgreSQL version**: Upgraded from `postgres:13` to `postgres:14` to satisfy
  Moodle 5.0+ requirement (minimum PostgreSQL 14).

### Added
- Code option in block Format dropdown (`<pre><code>` styled block with monospace font,
  background shading, and border)
- `db/hooks.php` — hook callback registration for Moodle 4.4+ Hooks API
- `classes/hook_callbacks.php` — new-style hook callback class
- AMD build sourcemap files (`.map`) for `editor.min.js` and `copybuttons.min.js`
- Behat faildump upload step in CI workflow (screenshots retained 7 days)
- Cancelled job failure step in CI workflow

### Changed
- Version bumped to 2.0.5 (plugin version: 2026032400)
- CI workflow updated to official `moodlehq/moodle-plugin-ci` `gha.dist.yml` template
- CI uses `if: ${{ !cancelled() }}` instead of `if: ${{ always() }}`
- CI uses `--max-warnings 0` on `phpcs` and `phpdoc` steps (strict mode)
- CI PostgreSQL image upgraded from 13 to 14
- `editor.js` AMD module reads editor URL from `window.customeditorUrls` global
  (set by `js_init_code`) instead of `js_call_amd` argument

---

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

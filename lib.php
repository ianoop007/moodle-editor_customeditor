<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Main library file for the Anoop Kakkur Rich Text Editor.
 *
 * @package   editor_customeditor
 * @copyright 2026 Anoop Kakkur <anoopkakkur@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Anoop Kakkur Rich Text Editor integration class.
 *
 * @package   editor_customeditor
 * @copyright 2026 Anoop Kakkur <anoopkakkur@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class customeditor_texteditor extends texteditor {

    /**
     * Check if the editor is supported by the current browser.
     *
     * @return bool
     */
    public function supported_by_browser() {
        return true;
    }

    /**
     * Get the supported text formats.
     *
     * @return array
     */
    public function get_supported_formats() {
        return array(FORMAT_HTML => FORMAT_HTML, FORMAT_MOODLE => FORMAT_MOODLE);
    }

    /**
     * Get the preferred text format.
     *
     * @return int
     */
    public function get_preferred_format() {
        return FORMAT_HTML;
    }

    /**
     * Check if the editor supports repositories.
     *
     * @return bool
     */
    public function supports_repositories() {
        return true;
    }

    /**
     * Set up the editor for a given textarea element.
     *
     * @param string $elementid The ID of the textarea to replace.
     * @param array|null $options Editor options.
     * @param mixed $fpoptions File picker options.
     */
    public function use_editor($elementid, array $options = null, $fpoptions = null) {
        global $PAGE;

        $cachebust = get_config('editor_customeditor', 'version') ?: time();

        // Gather all settings to pass to the editor iframe.
        $settingskeys = array(
            'enable_menubar', 'enable_statusbar', 'enable_source', 'enable_fullscreen',
            'enable_font_family', 'enable_font_size', 'enable_text_color',
            'enable_line_spacing', 'enable_para_borders', 'enable_columns',
            'enable_images', 'enable_links', 'enable_tables', 'enable_code_blocks',
            'enable_hr', 'enable_special_chars', 'enable_video',
            'enable_shapes', 'enable_smartart', 'enable_charts', 'enable_textbox',
            'enable_heading_templates',
            'enable_page_break', 'enable_toc', 'enable_watermark', 'enable_header_footer',
            'enable_export_pdf', 'enable_export_word', 'enable_import_word', 'enable_export_html',
            'enable_find_replace', 'enable_show_blocks',
            'editor_height', 'default_font_size',
        );
        $params = array('v' => $cachebust);
        foreach ($settingskeys as $key) {
            $val = get_config('editor_customeditor', $key);
            if ($val !== false && $val !== '' && $val !== null) {
                $params[$key] = $val;
            }
        }
        $editorurl = new moodle_url('/lib/editor/customeditor/editor.html', $params);

        // Initialise the editor via AMD module.
        $PAGE->requires->js_call_amd(
            'editor_customeditor/editor',
            'init',
            array($elementid, $editorurl->out(false))
        );
    }
}

/**
 * Load copy-button JavaScript on every Moodle page.
 *
 * Makes the Copy buttons in code blocks and snippets work
 * when content is viewed outside the editor (on Moodle pages).
 *
 * @return void
 */
function editor_customeditor_before_footer() {
    global $PAGE;
    $PAGE->requires->js_call_amd('editor_customeditor/copybuttons', 'init');
}

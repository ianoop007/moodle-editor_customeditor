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
 * @copyright 2025 Anoop Kakkur <anoopkakkur@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Anoop Kakkur Rich Text Editor integration class.
 *
 * @package   editor_customeditor
 * @copyright 2025 Anoop Kakkur <anoopkakkur@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class customeditor_texteditor extends texteditor {

    public function supported_by_browser() {
        return true;
    }

    public function get_supported_formats() {
        return array(FORMAT_HTML => FORMAT_HTML, FORMAT_MOODLE => FORMAT_MOODLE);
    }

    public function get_preferred_format() {
        return FORMAT_HTML;
    }

    public function supports_repositories() {
        return true;
    }

    public function use_editor($elementid, array $options = null, $fpoptions = null) {
        global $PAGE;

        $cachebust = get_config('editor_customeditor', 'version') ?: time();

        // Gather all settings to pass to the editor iframe
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
            // Only pass non-default (disabled) values to keep URL short
            if ($val !== false && $val !== '' && $val !== null) {
                $params[$key] = $val;
            }
        }
        $editorurl = new moodle_url('/lib/editor/customeditor/editor.html', $params);

        $js = '
        (function() {
            var elementid = ' . json_encode($elementid) . ';
            var editorurl = ' . json_encode($editorurl->out(false)) . ';

            function initCustomEditor() {
                var textarea = document.getElementById(elementid);
                if (!textarea) return;
                if (textarea.dataset.customEditorInit) return;
                textarea.dataset.customEditorInit = "true";

                textarea.style.display = "none";

                var attoWrap = textarea.closest(".editor_atto_wrap");
                if (attoWrap) attoWrap.style.display = "none";
                var tinyWrap = textarea.parentNode.querySelector(".tox.tox-tinymce");
                if (tinyWrap) tinyWrap.style.display = "none";

                var wrapper = document.createElement("div");
                wrapper.id = "custom-editor-wrap-" + elementid;
                wrapper.style.cssText = "width:100%;margin-bottom:0.5rem";

                var iframe = document.createElement("iframe");
                iframe.id = "custom-editor-iframe-" + elementid;
                iframe.src = editorurl;
                iframe.setAttribute("allowfullscreen", "true");
                var editorHeight = new URLSearchParams(editorurl.split("?")[1] || "").get("editor_height") || "75vh";
                iframe.style.cssText = "width:100%;height:" + editorHeight + ";border:1px solid #ccc;border-radius:8px;background:#fff;display:block";
                wrapper.appendChild(iframe);

                textarea.parentNode.insertBefore(wrapper, textarea);

                iframe.addEventListener("load", function() {
                    try {
                        var content = textarea.value || "";
                        if (content) iframe.contentWindow.setMoodleEditorContent(content);
                    } catch(e) { console.warn("Custom editor load:", e); }
                });

                var form = textarea.closest("form");
                if (form && !form.dataset.customEditorBound) {
                    form.dataset.customEditorBound = "true";
                    form.addEventListener("submit", function() { syncAllEditors(form); }, true);
                    var buttons = form.querySelectorAll("[type=submit], .btn-primary, [name=submitbutton], [name=submitbutton2]");
                    buttons.forEach(function(btn) {
                        btn.addEventListener("click", function() { syncAllEditors(form); });
                    });
                }
            }

            function syncAllEditors(form) {
                var iframes = form.querySelectorAll("[id^=custom-editor-iframe-]");
                iframes.forEach(function(iframe) {
                    var taId = iframe.id.replace("custom-editor-iframe-", "");
                    var ta = document.getElementById(taId);
                    if (ta) {
                        try { ta.value = iframe.contentWindow.getMoodleEditorContent(); }
                        catch(e) { console.warn("Custom editor sync:", e); }
                    }
                });
            }

            if (document.readyState === "loading") {
                document.addEventListener("DOMContentLoaded", initCustomEditor);
            } else {
                setTimeout(initCustomEditor, 300);
            }
        })();
        ';

        $PAGE->requires->js_init_code($js, true);
    }
}

/**
 * Load copy-button JavaScript on every Moodle page.
 *
 * Makes the Copy buttons in code blocks and snippets work
 * when content is viewed outside the editor (on Moodle pages).
 *
 * @package   editor_customeditor
 * @copyright 2025 Anoop Kakkur <anoopkakkur@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
function editor_customeditor_before_footer() {
    global $PAGE;
    $jsurl = new moodle_url('/lib/editor/customeditor/copybuttons.js');
    $PAGE->requires->js($jsurl, true);
}

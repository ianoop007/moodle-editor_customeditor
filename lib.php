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

// phpcs:ignore moodle.Files.MoodleInternal.MoodleInternalNotNeeded
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
        return [FORMAT_HTML => FORMAT_HTML, FORMAT_MOODLE => FORMAT_MOODLE];
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
     * @return void
     */
    public function use_editor($elementid, $options = null, $fpoptions = null) {
        global $PAGE;

        $cachebust = get_config('editor_customeditor', 'version') ?: time();

        // Gather all settings to pass to the editor iframe.
        $settingskeys = [
            'enable_menubar', 'enable_statusbar', 'enable_source', 'enable_fullscreen',
            'enable_font_family', 'enable_font_size', 'enable_text_color', 'enable_line_spacing',
            'enable_para_borders', 'enable_columns', 'enable_images', 'enable_links',
            'enable_tables', 'enable_code_blocks', 'enable_hr', 'enable_special_chars',
            'enable_video', 'enable_shapes', 'enable_smartart', 'enable_charts', 'enable_textbox',
            'enable_heading_templates', 'enable_page_break', 'enable_toc', 'enable_watermark',
            'enable_header_footer', 'enable_export_pdf', 'enable_export_word',
            'enable_import_word', 'enable_export_html', 'enable_find_replace',
            'enable_show_blocks', 'enable_dark_mode', 'enable_spellcheck_toggle',
            'enable_autosave', 'enable_reading_time', 'enable_accessibility',
            'enable_text_transform', 'enable_callout_boxes', 'enable_footnotes',
            'enable_definition_list', 'enable_accordion', 'enable_badges', 'enable_math_editor',
            'enable_content_templates', 'enable_annotations', 'enable_markdown',
            'enable_print_preview', 'enable_rtl_ltr', 'enable_drop_cap', 'enable_small_caps',
            'enable_letter_spacing', 'enable_text_shadow', 'enable_para_spacing',
            'enable_image_caption', 'enable_image_gallery', 'enable_audio_embed',
            'enable_file_attachment', 'enable_blockquote_cite', 'enable_figure_caption',
            'enable_progress_bar', 'enable_timeline', 'enable_tab_panels', 'enable_table_merge',
            'enable_table_sort', 'enable_table_styles', 'enable_checklist',
            'enable_auto_numbering', 'enable_content_divider', 'enable_word_limit',
            'enable_text_statistics', 'enable_clipboard_history', 'enable_placeholders',
            'enable_date_time_insert', 'enable_lorem_ipsum', 'enable_zoom_controls',
            'enable_focus_mode', 'enable_sticky_toolbar', 'enable_bg_color_editor',
            'enable_custom_css_class', 'enable_gradient_text', 'enable_card_component',
            'enable_divider_patterns', 'enable_alt_text_editor', 'enable_heading_checker',
            'enable_contrast_checker', 'enable_reading_level', 'enable_lang_attribute',
            'enable_citation_insert', 'enable_glossary_tooltip', 'enable_reading_progress',
            'enable_quiz_box', 'enable_step_instruction', 'enable_key_takeaway',
            'enable_compare_box', 'enable_rubric_template', 'enable_learning_objective',
            'enable_line_numbers', 'enable_soft_hard_return', 'enable_nbsp_insert',
            'enable_paste_plain_toggle', 'enable_auto_correct', 'enable_content_lock',
            'enable_undo_history', 'enable_format_painter', 'enable_floating_toolbar',
            'enable_breadcrumb_click', 'enable_minimap', 'enable_split_view',
            'enable_distraction_free', 'enable_unicode_inspector', 'enable_per_block_direction',
            'enable_transliteration', 'enable_word_count_lang', 'enable_qr_code',
            'enable_maps_embed', 'enable_social_embed', 'enable_oembed', 'enable_anchor_links',
            'enable_doc_properties', 'enable_export_epub', 'enable_export_md_frontmatter',
            'enable_section_navigator', 'enable_endnotes', 'enable_keyword_index',
            'enable_running_header', 'enable_page_number', 'enable_cross_reference',
            'enable_broken_link_check', 'enable_duplicate_detector', 'enable_word_frequency',
            'enable_passive_voice', 'enable_sentence_length', 'enable_jargon_check',
            'enable_consistency_check', 'enable_json_viewer', 'enable_mermaid_diagrams',
            'enable_ascii_art', 'enable_kanban_board', 'enable_star_rating',
            'enable_color_palette', 'enable_content_encrypt', 'enable_redaction_tool',
            'enable_invisible_watermark', 'enable_export_sanitiser', 'enable_moodle_linker',
            'enable_ruler_guides', 'enable_version_compare', 'enable_toolbar_customiser',
            'enable_side_panel', 'editor_height', 'default_font_size',
            // Phonetic keyboard (IME).
            'enable_ime',
            'ime_lang_ml', 'ime_lang_ta', 'ime_lang_hi', 'ime_lang_te', 'ime_lang_kn',
            'ime_lang_bn', 'ime_lang_gu', 'ime_lang_pa', 'ime_lang_ur', 'ime_lang_as',
            'ime_lang_or', 'ime_lang_mr', 'ime_lang_sa', 'ime_lang_ar', 'ime_lang_fa',
            'ime_lang_ru', 'ime_lang_el', 'ime_lang_zh', 'ime_lang_de',
            // Voice typing.
            'enable_voice_typing',
            'voice_lang_en_in', 'voice_lang_en_us', 'voice_lang_en_gb',
            'voice_lang_ml_in', 'voice_lang_ta_in', 'voice_lang_hi_in',
            'voice_lang_te_in', 'voice_lang_kn_in', 'voice_lang_bn_in',
            'voice_lang_ur_pk', 'voice_lang_ar_sa', 'voice_lang_fr_fr',
            'voice_lang_es_es', 'voice_lang_de_de', 'voice_lang_ja_jp',
            'voice_lang_zh_cn', 'voice_lang_pt_br', 'voice_lang_ru_ru',
            'voice_lang_ko_kr',
        ];
        $params = ['v' => $cachebust];
        foreach ($settingskeys as $key) {
            $val = get_config('editor_customeditor', $key);
            if ($val !== false && $val !== '' && $val !== null) {
                $params[$key] = $val;
            }
        }

        // Build the editor URL with settings as query parameters.
        $editorurl = new moodle_url('/lib/editor/customeditor/editor.html', $params);
        $urlstring = $editorurl->out(false);

        // Store the URL in a global JS object (runs synchronously before AMD modules).
        // This avoids exceeding Moodle's 1024-char limit on js_call_amd arguments.
        $PAGE->requires->js_init_code(
            'if(typeof window.customeditorUrls==="undefined"){window.customeditorUrls={};}' .
            'window.customeditorUrls[' . json_encode($elementid) . ']=' . json_encode($urlstring) . ';'
        );

        // Pass only the element ID to js_call_amd (well under 1024 chars).
        $PAGE->requires->js_call_amd(
            'editor_customeditor/editor',
            'init',
            [$elementid]
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

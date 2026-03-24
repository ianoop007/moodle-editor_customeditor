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
 * Settings for the Anoop Kakkur Rich Text Editor.
 *
 * @package   editor_customeditor
 * @copyright 2026 Anoop Kakkur <anoopkakkur@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $cmp = 'editor_customeditor';

    // General settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/general',
            get_string('general', $cmp),
            get_string('general_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_menubar',
            get_string('enable_menubar', $cmp),
            get_string('enable_menubar_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_statusbar',
            get_string('enable_statusbar', $cmp),
            get_string('enable_statusbar_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_source',
            get_string('enable_source', $cmp),
            get_string('enable_source_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_fullscreen',
            get_string('enable_fullscreen', $cmp),
            get_string('enable_fullscreen_desc', $cmp),
            1
        )
    );

    // Formatting settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/formatting_heading',
            get_string('formatting_heading', $cmp),
            get_string('formatting_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_font_family',
            get_string('enable_font_family', $cmp),
            get_string('enable_font_family_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_font_size',
            get_string('enable_font_size', $cmp),
            get_string('enable_font_size_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_text_color',
            get_string('enable_text_color', $cmp),
            get_string('enable_text_color_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_line_spacing',
            get_string('enable_line_spacing', $cmp),
            get_string('enable_line_spacing_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_para_borders',
            get_string('enable_para_borders', $cmp),
            get_string('enable_para_borders_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_columns',
            get_string('enable_columns', $cmp),
            get_string('enable_columns_desc', $cmp),
            1
        )
    );

    // Insert settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/insert_heading',
            get_string('insert_heading', $cmp),
            get_string('insert_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_images',
            get_string('enable_images', $cmp),
            get_string('enable_images_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_links',
            get_string('enable_links', $cmp),
            get_string('enable_links_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_tables',
            get_string('enable_tables', $cmp),
            get_string('enable_tables_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_code_blocks',
            get_string('enable_code_blocks', $cmp),
            get_string('enable_code_blocks_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_hr',
            get_string('enable_hr', $cmp),
            get_string('enable_hr_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_special_chars',
            get_string('enable_special_chars', $cmp),
            get_string('enable_special_chars_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_video',
            get_string('enable_video', $cmp),
            get_string('enable_video_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_shapes',
            get_string('enable_shapes', $cmp),
            get_string('enable_shapes_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_smartart',
            get_string('enable_smartart', $cmp),
            get_string('enable_smartart_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_charts',
            get_string('enable_charts', $cmp),
            get_string('enable_charts_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_textbox',
            get_string('enable_textbox', $cmp),
            get_string('enable_textbox_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_heading_templates',
            get_string('enable_heading_templates', $cmp),
            get_string('enable_heading_templates_desc', $cmp),
            1
        )
    );

    // Document settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/document_heading',
            get_string('document_heading', $cmp),
            get_string('document_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_page_break',
            get_string('enable_page_break', $cmp),
            get_string('enable_page_break_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_toc',
            get_string('enable_toc', $cmp),
            get_string('enable_toc_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_watermark',
            get_string('enable_watermark', $cmp),
            get_string('enable_watermark_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_header_footer',
            get_string('enable_header_footer', $cmp),
            get_string('enable_header_footer_desc', $cmp),
            1
        )
    );

    // Export settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/export_heading',
            get_string('export_heading', $cmp),
            get_string('export_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_export_pdf',
            get_string('enable_export_pdf', $cmp),
            get_string('enable_export_pdf_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_export_word',
            get_string('enable_export_word', $cmp),
            get_string('enable_export_word_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_import_word',
            get_string('enable_import_word', $cmp),
            get_string('enable_import_word_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_export_html',
            get_string('enable_export_html', $cmp),
            get_string('enable_export_html_desc', $cmp),
            1
        )
    );

    // Advanced settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/advanced_heading',
            get_string('advanced_heading', $cmp),
            get_string('advanced_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_find_replace',
            get_string('enable_find_replace', $cmp),
            get_string('enable_find_replace_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_show_blocks',
            get_string('enable_show_blocks', $cmp),
            get_string('enable_show_blocks_desc', $cmp),
            1
        )
    );

    // General settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/general',
            get_string('general', $cmp),
            get_string('general_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_dark_mode',
            get_string('enable_dark_mode', $cmp),
            get_string('enable_dark_mode_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_spellcheck_toggle',
            get_string('enable_spellcheck_toggle', $cmp),
            get_string('enable_spellcheck_toggle_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_autosave',
            get_string('enable_autosave', $cmp),
            get_string('enable_autosave_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_reading_time',
            get_string('enable_reading_time', $cmp),
            get_string('enable_reading_time_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_accessibility',
            get_string('enable_accessibility', $cmp),
            get_string('enable_accessibility_desc', $cmp),
            1
        )
    );

    // Formatting settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/formatting_heading',
            get_string('formatting_heading', $cmp),
            get_string('formatting_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_text_transform',
            get_string('enable_text_transform', $cmp),
            get_string('enable_text_transform_desc', $cmp),
            1
        )
    );

    // Insert settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/insert_heading',
            get_string('insert_heading', $cmp),
            get_string('insert_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_callout_boxes',
            get_string('enable_callout_boxes', $cmp),
            get_string('enable_callout_boxes_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_footnotes',
            get_string('enable_footnotes', $cmp),
            get_string('enable_footnotes_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_definition_list',
            get_string('enable_definition_list', $cmp),
            get_string('enable_definition_list_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_accordion',
            get_string('enable_accordion', $cmp),
            get_string('enable_accordion_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_badges',
            get_string('enable_badges', $cmp),
            get_string('enable_badges_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_math_editor',
            get_string('enable_math_editor', $cmp),
            get_string('enable_math_editor_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_content_templates',
            get_string('enable_content_templates', $cmp),
            get_string('enable_content_templates_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_annotations',
            get_string('enable_annotations', $cmp),
            get_string('enable_annotations_desc', $cmp),
            1
        )
    );

    // Export settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/export_heading',
            get_string('export_heading', $cmp),
            get_string('export_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_markdown',
            get_string('enable_markdown', $cmp),
            get_string('enable_markdown_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_print_preview',
            get_string('enable_print_preview', $cmp),
            get_string('enable_print_preview_desc', $cmp),
            1
        )
    );

    // Formatting settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/formatting_heading',
            get_string('formatting_heading', $cmp),
            get_string('formatting_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_rtl_ltr',
            get_string('enable_rtl_ltr', $cmp),
            get_string('enable_rtl_ltr_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_drop_cap',
            get_string('enable_drop_cap', $cmp),
            get_string('enable_drop_cap_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_small_caps',
            get_string('enable_small_caps', $cmp),
            get_string('enable_small_caps_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_letter_spacing',
            get_string('enable_letter_spacing', $cmp),
            get_string('enable_letter_spacing_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_text_shadow',
            get_string('enable_text_shadow', $cmp),
            get_string('enable_text_shadow_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_para_spacing',
            get_string('enable_para_spacing', $cmp),
            get_string('enable_para_spacing_desc', $cmp),
            1
        )
    );

    // Insert settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/insert_heading',
            get_string('insert_heading', $cmp),
            get_string('insert_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_image_caption',
            get_string('enable_image_caption', $cmp),
            get_string('enable_image_caption_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_image_gallery',
            get_string('enable_image_gallery', $cmp),
            get_string('enable_image_gallery_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_audio_embed',
            get_string('enable_audio_embed', $cmp),
            get_string('enable_audio_embed_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_file_attachment',
            get_string('enable_file_attachment', $cmp),
            get_string('enable_file_attachment_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_blockquote_cite',
            get_string('enable_blockquote_cite', $cmp),
            get_string('enable_blockquote_cite_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_figure_caption',
            get_string('enable_figure_caption', $cmp),
            get_string('enable_figure_caption_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_progress_bar',
            get_string('enable_progress_bar', $cmp),
            get_string('enable_progress_bar_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_timeline',
            get_string('enable_timeline', $cmp),
            get_string('enable_timeline_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_tab_panels',
            get_string('enable_tab_panels', $cmp),
            get_string('enable_tab_panels_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_table_merge',
            get_string('enable_table_merge', $cmp),
            get_string('enable_table_merge_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_table_sort',
            get_string('enable_table_sort', $cmp),
            get_string('enable_table_sort_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_table_styles',
            get_string('enable_table_styles', $cmp),
            get_string('enable_table_styles_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_checklist',
            get_string('enable_checklist', $cmp),
            get_string('enable_checklist_desc', $cmp),
            1
        )
    );

    // Document settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/document_heading',
            get_string('document_heading', $cmp),
            get_string('document_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_auto_numbering',
            get_string('enable_auto_numbering', $cmp),
            get_string('enable_auto_numbering_desc', $cmp),
            1
        )
    );

    // Insert settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/insert_heading',
            get_string('insert_heading', $cmp),
            get_string('insert_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_content_divider',
            get_string('enable_content_divider', $cmp),
            get_string('enable_content_divider_desc', $cmp),
            1
        )
    );

    // Advanced settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/advanced_heading',
            get_string('advanced_heading', $cmp),
            get_string('advanced_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_word_limit',
            get_string('enable_word_limit', $cmp),
            get_string('enable_word_limit_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_text_statistics',
            get_string('enable_text_statistics', $cmp),
            get_string('enable_text_statistics_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_clipboard_history',
            get_string('enable_clipboard_history', $cmp),
            get_string('enable_clipboard_history_desc', $cmp),
            1
        )
    );

    // Insert settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/insert_heading',
            get_string('insert_heading', $cmp),
            get_string('insert_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_placeholders',
            get_string('enable_placeholders', $cmp),
            get_string('enable_placeholders_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_date_time_insert',
            get_string('enable_date_time_insert', $cmp),
            get_string('enable_date_time_insert_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_lorem_ipsum',
            get_string('enable_lorem_ipsum', $cmp),
            get_string('enable_lorem_ipsum_desc', $cmp),
            1
        )
    );

    // General settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/general',
            get_string('general', $cmp),
            get_string('general_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_zoom_controls',
            get_string('enable_zoom_controls', $cmp),
            get_string('enable_zoom_controls_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_focus_mode',
            get_string('enable_focus_mode', $cmp),
            get_string('enable_focus_mode_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_sticky_toolbar',
            get_string('enable_sticky_toolbar', $cmp),
            get_string('enable_sticky_toolbar_desc', $cmp),
            1
        )
    );

    // Formatting settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/formatting_heading',
            get_string('formatting_heading', $cmp),
            get_string('formatting_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_bg_color_editor',
            get_string('enable_bg_color_editor', $cmp),
            get_string('enable_bg_color_editor_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_custom_css_class',
            get_string('enable_custom_css_class', $cmp),
            get_string('enable_custom_css_class_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_gradient_text',
            get_string('enable_gradient_text', $cmp),
            get_string('enable_gradient_text_desc', $cmp),
            1
        )
    );

    // Insert settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/insert_heading',
            get_string('insert_heading', $cmp),
            get_string('insert_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_card_component',
            get_string('enable_card_component', $cmp),
            get_string('enable_card_component_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_divider_patterns',
            get_string('enable_divider_patterns', $cmp),
            get_string('enable_divider_patterns_desc', $cmp),
            1
        )
    );

    // Accessibility settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/accessibility_heading',
            get_string('accessibility_heading', $cmp),
            get_string('accessibility_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_alt_text_editor',
            get_string('enable_alt_text_editor', $cmp),
            get_string('enable_alt_text_editor_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_heading_checker',
            get_string('enable_heading_checker', $cmp),
            get_string('enable_heading_checker_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_contrast_checker',
            get_string('enable_contrast_checker', $cmp),
            get_string('enable_contrast_checker_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_reading_level',
            get_string('enable_reading_level', $cmp),
            get_string('enable_reading_level_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_lang_attribute',
            get_string('enable_lang_attribute', $cmp),
            get_string('enable_lang_attribute_desc', $cmp),
            1
        )
    );

    // Insert settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/insert_heading',
            get_string('insert_heading', $cmp),
            get_string('insert_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_citation_insert',
            get_string('enable_citation_insert', $cmp),
            get_string('enable_citation_insert_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_glossary_tooltip',
            get_string('enable_glossary_tooltip', $cmp),
            get_string('enable_glossary_tooltip_desc', $cmp),
            1
        )
    );

    // General settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/general',
            get_string('general', $cmp),
            get_string('general_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_reading_progress',
            get_string('enable_reading_progress', $cmp),
            get_string('enable_reading_progress_desc', $cmp),
            1
        )
    );

    // Insert settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/insert_heading',
            get_string('insert_heading', $cmp),
            get_string('insert_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_quiz_box',
            get_string('enable_quiz_box', $cmp),
            get_string('enable_quiz_box_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_step_instruction',
            get_string('enable_step_instruction', $cmp),
            get_string('enable_step_instruction_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_key_takeaway',
            get_string('enable_key_takeaway', $cmp),
            get_string('enable_key_takeaway_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_compare_box',
            get_string('enable_compare_box', $cmp),
            get_string('enable_compare_box_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_rubric_template',
            get_string('enable_rubric_template', $cmp),
            get_string('enable_rubric_template_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_learning_objective',
            get_string('enable_learning_objective', $cmp),
            get_string('enable_learning_objective_desc', $cmp),
            1
        )
    );

    // General settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/general',
            get_string('general', $cmp),
            get_string('general_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_line_numbers',
            get_string('enable_line_numbers', $cmp),
            get_string('enable_line_numbers_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_soft_hard_return',
            get_string('enable_soft_hard_return', $cmp),
            get_string('enable_soft_hard_return_desc', $cmp),
            1
        )
    );

    // Insert settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/insert_heading',
            get_string('insert_heading', $cmp),
            get_string('insert_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_nbsp_insert',
            get_string('enable_nbsp_insert', $cmp),
            get_string('enable_nbsp_insert_desc', $cmp),
            1
        )
    );

    // General settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/general',
            get_string('general', $cmp),
            get_string('general_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_paste_plain_toggle',
            get_string('enable_paste_plain_toggle', $cmp),
            get_string('enable_paste_plain_toggle_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_auto_correct',
            get_string('enable_auto_correct', $cmp),
            get_string('enable_auto_correct_desc', $cmp),
            1
        )
    );

    // Advanced settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/advanced_heading',
            get_string('advanced_heading', $cmp),
            get_string('advanced_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_content_lock',
            get_string('enable_content_lock', $cmp),
            get_string('enable_content_lock_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_undo_history',
            get_string('enable_undo_history', $cmp),
            get_string('enable_undo_history_desc', $cmp),
            1
        )
    );

    // Formatting settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/formatting_heading',
            get_string('formatting_heading', $cmp),
            get_string('formatting_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_format_painter',
            get_string('enable_format_painter', $cmp),
            get_string('enable_format_painter_desc', $cmp),
            1
        )
    );

    // General settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/general',
            get_string('general', $cmp),
            get_string('general_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_floating_toolbar',
            get_string('enable_floating_toolbar', $cmp),
            get_string('enable_floating_toolbar_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_breadcrumb_click',
            get_string('enable_breadcrumb_click', $cmp),
            get_string('enable_breadcrumb_click_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_minimap',
            get_string('enable_minimap', $cmp),
            get_string('enable_minimap_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_split_view',
            get_string('enable_split_view', $cmp),
            get_string('enable_split_view_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_distraction_free',
            get_string('enable_distraction_free', $cmp),
            get_string('enable_distraction_free_desc', $cmp),
            1
        )
    );

    // Advanced settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/advanced_heading',
            get_string('advanced_heading', $cmp),
            get_string('advanced_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_unicode_inspector',
            get_string('enable_unicode_inspector', $cmp),
            get_string('enable_unicode_inspector_desc', $cmp),
            1
        )
    );

    // Formatting settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/formatting_heading',
            get_string('formatting_heading', $cmp),
            get_string('formatting_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_per_block_direction',
            get_string('enable_per_block_direction', $cmp),
            get_string('enable_per_block_direction_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_transliteration',
            get_string('enable_transliteration', $cmp),
            get_string('enable_transliteration_desc', $cmp),
            1
        )
    );

    // Advanced settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/advanced_heading',
            get_string('advanced_heading', $cmp),
            get_string('advanced_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_word_count_lang',
            get_string('enable_word_count_lang', $cmp),
            get_string('enable_word_count_lang_desc', $cmp),
            1
        )
    );

    // Insert settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/insert_heading',
            get_string('insert_heading', $cmp),
            get_string('insert_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_qr_code',
            get_string('enable_qr_code', $cmp),
            get_string('enable_qr_code_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_maps_embed',
            get_string('enable_maps_embed', $cmp),
            get_string('enable_maps_embed_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_social_embed',
            get_string('enable_social_embed', $cmp),
            get_string('enable_social_embed_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_oembed',
            get_string('enable_oembed', $cmp),
            get_string('enable_oembed_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_anchor_links',
            get_string('enable_anchor_links', $cmp),
            get_string('enable_anchor_links_desc', $cmp),
            1
        )
    );

    // Document settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/document_heading',
            get_string('document_heading', $cmp),
            get_string('document_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_doc_properties',
            get_string('enable_doc_properties', $cmp),
            get_string('enable_doc_properties_desc', $cmp),
            1
        )
    );

    // Export settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/export_heading',
            get_string('export_heading', $cmp),
            get_string('export_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_export_epub',
            get_string('enable_export_epub', $cmp),
            get_string('enable_export_epub_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_export_md_frontmatter',
            get_string('enable_export_md_frontmatter', $cmp),
            get_string('enable_export_md_frontmatter_desc', $cmp),
            1
        )
    );

    // Document settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/document_heading',
            get_string('document_heading', $cmp),
            get_string('document_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_section_navigator',
            get_string('enable_section_navigator', $cmp),
            get_string('enable_section_navigator_desc', $cmp),
            1
        )
    );

    // Insert settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/insert_heading',
            get_string('insert_heading', $cmp),
            get_string('insert_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_endnotes',
            get_string('enable_endnotes', $cmp),
            get_string('enable_endnotes_desc', $cmp),
            1
        )
    );

    // Document settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/document_heading',
            get_string('document_heading', $cmp),
            get_string('document_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_keyword_index',
            get_string('enable_keyword_index', $cmp),
            get_string('enable_keyword_index_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_running_header',
            get_string('enable_running_header', $cmp),
            get_string('enable_running_header_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_page_number',
            get_string('enable_page_number', $cmp),
            get_string('enable_page_number_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_cross_reference',
            get_string('enable_cross_reference', $cmp),
            get_string('enable_cross_reference_desc', $cmp),
            1
        )
    );

    // Advanced settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/advanced_heading',
            get_string('advanced_heading', $cmp),
            get_string('advanced_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_broken_link_check',
            get_string('enable_broken_link_check', $cmp),
            get_string('enable_broken_link_check_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_duplicate_detector',
            get_string('enable_duplicate_detector', $cmp),
            get_string('enable_duplicate_detector_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_word_frequency',
            get_string('enable_word_frequency', $cmp),
            get_string('enable_word_frequency_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_passive_voice',
            get_string('enable_passive_voice', $cmp),
            get_string('enable_passive_voice_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_sentence_length',
            get_string('enable_sentence_length', $cmp),
            get_string('enable_sentence_length_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_jargon_check',
            get_string('enable_jargon_check', $cmp),
            get_string('enable_jargon_check_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_consistency_check',
            get_string('enable_consistency_check', $cmp),
            get_string('enable_consistency_check_desc', $cmp),
            1
        )
    );

    // Insert settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/insert_heading',
            get_string('insert_heading', $cmp),
            get_string('insert_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_json_viewer',
            get_string('enable_json_viewer', $cmp),
            get_string('enable_json_viewer_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_mermaid_diagrams',
            get_string('enable_mermaid_diagrams', $cmp),
            get_string('enable_mermaid_diagrams_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_ascii_art',
            get_string('enable_ascii_art', $cmp),
            get_string('enable_ascii_art_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_kanban_board',
            get_string('enable_kanban_board', $cmp),
            get_string('enable_kanban_board_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_star_rating',
            get_string('enable_star_rating', $cmp),
            get_string('enable_star_rating_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_color_palette',
            get_string('enable_color_palette', $cmp),
            get_string('enable_color_palette_desc', $cmp),
            1
        )
    );

    // Security settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/security_heading',
            get_string('security_heading', $cmp),
            get_string('security_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_content_encrypt',
            get_string('enable_content_encrypt', $cmp),
            get_string('enable_content_encrypt_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_redaction_tool',
            get_string('enable_redaction_tool', $cmp),
            get_string('enable_redaction_tool_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_invisible_watermark',
            get_string('enable_invisible_watermark', $cmp),
            get_string('enable_invisible_watermark_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_export_sanitiser',
            get_string('enable_export_sanitiser', $cmp),
            get_string('enable_export_sanitiser_desc', $cmp),
            1
        )
    );

    // Insert settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/insert_heading',
            get_string('insert_heading', $cmp),
            get_string('insert_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_moodle_linker',
            get_string('enable_moodle_linker', $cmp),
            get_string('enable_moodle_linker_desc', $cmp),
            1
        )
    );

    // General settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/general',
            get_string('general', $cmp),
            get_string('general_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_ruler_guides',
            get_string('enable_ruler_guides', $cmp),
            get_string('enable_ruler_guides_desc', $cmp),
            1
        )
    );

    // Advanced settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/advanced_heading',
            get_string('advanced_heading', $cmp),
            get_string('advanced_heading_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_version_compare',
            get_string('enable_version_compare', $cmp),
            get_string('enable_version_compare_desc', $cmp),
            1
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_toolbar_customiser',
            get_string('enable_toolbar_customiser', $cmp),
            get_string('enable_toolbar_customiser_desc', $cmp),
            1
        )
    );

    // General settings.
    $settings->add(
        new admin_setting_heading(
            $cmp . '/general',
            get_string('general', $cmp),
            get_string('general_desc', $cmp)
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            $cmp . '/enable_side_panel',
            get_string('enable_side_panel', $cmp),
            get_string('enable_side_panel_desc', $cmp),
            1
        )
    );


    // ── Voice Typing ─────────────────────────────────────────────────────────
    $settings->add(new admin_setting_heading(
        $cmp . '/voice_typing_heading',
        get_string('voice_typing_heading', $cmp),
        get_string('voice_typing_heading_desc', $cmp)
    ));

    $settings->add(new admin_setting_configcheckbox(
        $cmp . '/enable_voice_typing',
        get_string('enable_voice_typing', $cmp),
        get_string('enable_voice_typing_desc', $cmp),
        1
    ));

    $settings->add(new admin_setting_heading(
        $cmp . '/voice_lang_heading',
        get_string('voice_lang_heading', $cmp),
        get_string('voice_lang_heading_desc', $cmp)
    ));

    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_en_in', get_string('voice_lang_en_in', $cmp), get_string('voice_lang_en_in_desc', $cmp), 1));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_en_us', get_string('voice_lang_en_us', $cmp), get_string('voice_lang_en_us_desc', $cmp), 1));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_en_gb', get_string('voice_lang_en_gb', $cmp), get_string('voice_lang_en_gb_desc', $cmp), 1));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_ml_in', get_string('voice_lang_ml_in', $cmp), get_string('voice_lang_ml_in_desc', $cmp), 1));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_ta_in', get_string('voice_lang_ta_in', $cmp), get_string('voice_lang_ta_in_desc', $cmp), 1));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_hi_in', get_string('voice_lang_hi_in', $cmp), get_string('voice_lang_hi_in_desc', $cmp), 1));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_te_in', get_string('voice_lang_te_in', $cmp), get_string('voice_lang_te_in_desc', $cmp), 0));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_kn_in', get_string('voice_lang_kn_in', $cmp), get_string('voice_lang_kn_in_desc', $cmp), 0));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_bn_in', get_string('voice_lang_bn_in', $cmp), get_string('voice_lang_bn_in_desc', $cmp), 0));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_ur_pk', get_string('voice_lang_ur_pk', $cmp), get_string('voice_lang_ur_pk_desc', $cmp), 0));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_ar_sa', get_string('voice_lang_ar_sa', $cmp), get_string('voice_lang_ar_sa_desc', $cmp), 0));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_fr_fr', get_string('voice_lang_fr_fr', $cmp), get_string('voice_lang_fr_fr_desc', $cmp), 0));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_es_es', get_string('voice_lang_es_es', $cmp), get_string('voice_lang_es_es_desc', $cmp), 0));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_de_de', get_string('voice_lang_de_de', $cmp), get_string('voice_lang_de_de_desc', $cmp), 0));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_ja_jp', get_string('voice_lang_ja_jp', $cmp), get_string('voice_lang_ja_jp_desc', $cmp), 0));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_zh_cn', get_string('voice_lang_zh_cn', $cmp), get_string('voice_lang_zh_cn_desc', $cmp), 0));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_pt_br', get_string('voice_lang_pt_br', $cmp), get_string('voice_lang_pt_br_desc', $cmp), 0));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_ru_ru', get_string('voice_lang_ru_ru', $cmp), get_string('voice_lang_ru_ru_desc', $cmp), 0));
    $settings->add(new admin_setting_configcheckbox($cmp . '/voice_lang_ko_kr', get_string('voice_lang_ko_kr', $cmp), get_string('voice_lang_ko_kr_desc', $cmp), 0));

    // Text configuration settings.
    $settings->add(
        new admin_setting_configtext(
            $cmp . '/editor_height',
            get_string('editor_height', $cmp),
            get_string('editor_height_desc', $cmp),
            '75vh'
        )
    );

    $settings->add(
        new admin_setting_configtext(
            $cmp . '/default_font_size',
            get_string('default_font_size', $cmp),
            get_string('default_font_size_desc', $cmp),
            '16'
        )
    );
}

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
    $settings->add(new admin_setting_heading($cmp . '/general',
        get_string('general', $cmp), get_string('general_desc', $cmp)));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_menubar',
        get_string('enable_menubar', $cmp), get_string('enable_menubar_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_statusbar',
        get_string('enable_statusbar', $cmp), get_string('enable_statusbar_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_source',
        get_string('enable_source', $cmp), get_string('enable_source_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_fullscreen',
        get_string('enable_fullscreen', $cmp), get_string('enable_fullscreen_desc', $cmp), 1));

    // Text formatting.
    $settings->add(new admin_setting_heading($cmp . '/formatting_heading',
        get_string('formatting_heading', $cmp), get_string('formatting_heading_desc', $cmp)));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_font_family',
        get_string('enable_font_family', $cmp), get_string('enable_font_family_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_font_size',
        get_string('enable_font_size', $cmp), get_string('enable_font_size_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_text_color',
        get_string('enable_text_color', $cmp), get_string('enable_text_color_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_line_spacing',
        get_string('enable_line_spacing', $cmp), get_string('enable_line_spacing_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_para_borders',
        get_string('enable_para_borders', $cmp), get_string('enable_para_borders_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_columns',
        get_string('enable_columns', $cmp), get_string('enable_columns_desc', $cmp), 1));

    // Insert features.
    $settings->add(new admin_setting_heading($cmp . '/insert_heading',
        get_string('insert_heading', $cmp), get_string('insert_heading_desc', $cmp)));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_images',
        get_string('enable_images', $cmp), get_string('enable_images_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_links',
        get_string('enable_links', $cmp), get_string('enable_links_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_tables',
        get_string('enable_tables', $cmp), get_string('enable_tables_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_code_blocks',
        get_string('enable_code_blocks', $cmp), get_string('enable_code_blocks_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_hr',
        get_string('enable_hr', $cmp), get_string('enable_hr_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_special_chars',
        get_string('enable_special_chars', $cmp), get_string('enable_special_chars_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_video',
        get_string('enable_video', $cmp), get_string('enable_video_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_shapes',
        get_string('enable_shapes', $cmp), get_string('enable_shapes_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_smartart',
        get_string('enable_smartart', $cmp), get_string('enable_smartart_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_charts',
        get_string('enable_charts', $cmp), get_string('enable_charts_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_textbox',
        get_string('enable_textbox', $cmp), get_string('enable_textbox_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_heading_templates',
        get_string('enable_heading_templates', $cmp), get_string('enable_heading_templates_desc', $cmp), 1));

    // Document features.
    $settings->add(new admin_setting_heading($cmp . '/document_heading',
        get_string('document_heading', $cmp), get_string('document_heading_desc', $cmp)));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_page_break',
        get_string('enable_page_break', $cmp), get_string('enable_page_break_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_toc',
        get_string('enable_toc', $cmp), get_string('enable_toc_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_watermark',
        get_string('enable_watermark', $cmp), get_string('enable_watermark_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_header_footer',
        get_string('enable_header_footer', $cmp), get_string('enable_header_footer_desc', $cmp), 1));

    // Export and import.
    $settings->add(new admin_setting_heading($cmp . '/export_heading',
        get_string('export_heading', $cmp), get_string('export_heading_desc', $cmp)));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_export_pdf',
        get_string('enable_export_pdf', $cmp), get_string('enable_export_pdf_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_export_word',
        get_string('enable_export_word', $cmp), get_string('enable_export_word_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_import_word',
        get_string('enable_import_word', $cmp), get_string('enable_import_word_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_export_html',
        get_string('enable_export_html', $cmp), get_string('enable_export_html_desc', $cmp), 1));

    // Advanced settings.
    $settings->add(new admin_setting_heading($cmp . '/advanced_heading',
        get_string('advanced_heading', $cmp), get_string('advanced_heading_desc', $cmp)));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_find_replace',
        get_string('enable_find_replace', $cmp), get_string('enable_find_replace_desc', $cmp), 1));

    $settings->add(new admin_setting_configcheckbox($cmp . '/enable_show_blocks',
        get_string('enable_show_blocks', $cmp), get_string('enable_show_blocks_desc', $cmp), 1));

    $settings->add(new admin_setting_configtext($cmp . '/editor_height',
        get_string('editor_height', $cmp), get_string('editor_height_desc', $cmp), '75vh'));

    $settings->add(new admin_setting_configtext($cmp . '/default_font_size',
        get_string('default_font_size', $cmp), get_string('default_font_size_desc', $cmp), '16'));
}

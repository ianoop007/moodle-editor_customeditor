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
 * @copyright 2025 Anoop Kakkur <anoopkakkur@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    // ── General Settings ──
    $settings->add(new admin_setting_heading(
        'editor_customeditor/general',
        'General Settings',
        'Configure general editor behavior.'
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_menubar',
        'Show Menu Bar',
        'Show the File, Edit, View, Insert, Format, Tools, Help menu bar.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_statusbar',
        'Show Status Bar',
        'Show the bottom status bar with word count, character count, and element path.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_source',
        'Source Code View',
        'Allow users to view and edit the HTML source code.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_fullscreen',
        'Fullscreen Mode',
        'Allow users to enter fullscreen editing mode (F11).',
        1
    ));

    // ── Text Formatting ──
    $settings->add(new admin_setting_heading(
        'editor_customeditor/formatting_heading',
        'Text Formatting',
        'Enable or disable text formatting features.'
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_font_family',
        'Font Family Selector',
        'Allow users to change font family.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_font_size',
        'Font Size Selector',
        'Allow users to change font size.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_text_color',
        'Text Color',
        'Allow users to change text and highlight colors.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_line_spacing',
        'Line Spacing',
        'Allow users to adjust line spacing.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_para_borders',
        'Paragraph Borders & Shading',
        'Allow users to add borders and shading to paragraphs.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_columns',
        'Text Columns',
        'Allow users to create multi-column text layouts.',
        1
    ));

    // ── Insert Features ──
    $settings->add(new admin_setting_heading(
        'editor_customeditor/insert_heading',
        'Insert Features',
        'Enable or disable content insertion features.'
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_images',
        'Images',
        'Allow users to insert images (URL, file upload, drag & drop).',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_links',
        'Links',
        'Allow users to insert hyperlinks.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_tables',
        'Tables',
        'Allow users to insert and edit tables.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_code_blocks',
        'Code Blocks & Snippets',
        'Allow users to insert code blocks with syntax highlighting and code snippets.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_hr',
        'Horizontal Lines',
        'Allow users to insert styled horizontal lines.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_special_chars',
        'Special Characters & Emoji',
        'Allow users to insert special characters, currency symbols, and emoji.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_video',
        'Video & Iframe Embeds',
        'Allow users to embed YouTube/Vimeo videos and iframes.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_shapes',
        'Shapes',
        'Allow users to insert shapes with text overlay, resize, and drag.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_smartart',
        'SmartArt',
        'Allow users to insert SmartArt templates (process, hierarchy, cycle, etc.).',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_charts',
        'Charts',
        'Allow users to insert charts (bar, column, line, pie, donut, area).',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_textbox',
        'Text Boxes',
        'Allow users to insert bordered, resizable text boxes.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_heading_templates',
        'Heading Templates',
        'Allow users to use pre-styled heading and subheading templates.',
        1
    ));

    // ── Document Features ──
    $settings->add(new admin_setting_heading(
        'editor_customeditor/document_heading',
        'Document Features',
        'Enable or disable document-level features.'
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_page_break',
        'Page Break',
        'Allow users to insert page breaks for print/PDF export.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_toc',
        'Table of Contents',
        'Allow users to generate a table of contents from headings.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_watermark',
        'Watermark',
        'Allow users to add watermark text behind content.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_header_footer',
        'Header & Footer',
        'Allow users to add editable headers and footers.',
        1
    ));

    // ── Export / Import ──
    $settings->add(new admin_setting_heading(
        'editor_customeditor/export_heading',
        'Export & Import',
        'Enable or disable export and import features.'
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_export_pdf',
        'Export to PDF',
        'Allow users to export content as PDF.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_export_word',
        'Export to Word',
        'Allow users to export content as a Word document.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_import_word',
        'Import from Word',
        'Allow users to import content from Word documents.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_export_html',
        'Export HTML',
        'Allow users to export the raw HTML.',
        1
    ));

    // ── Advanced ──
    $settings->add(new admin_setting_heading(
        'editor_customeditor/advanced_heading',
        'Advanced Settings',
        'Advanced configuration options.'
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_find_replace',
        'Find & Replace',
        'Allow users to use the find and replace feature.',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'editor_customeditor/enable_show_blocks',
        'Show Blocks',
        'Allow users to toggle visual block outlines.',
        1
    ));

    $settings->add(new admin_setting_configtext(
        'editor_customeditor/editor_height',
        'Editor Height',
        'Height of the editor iframe (CSS value, e.g. 75vh, 500px).',
        '75vh'
    ));

    $settings->add(new admin_setting_configtext(
        'editor_customeditor/default_font_size',
        'Default Font Size',
        'Default font size in pixels for the editor content.',
        '16'
    ));
}

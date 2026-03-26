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
 * Upgrade script for the Anoop Kakkur Rich Text Editor.
 *
 * @package   editor_customeditor
 * @copyright 2026 Anoop Kakkur <anoopkakkur@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Upgrade the plugin from a previous version.
 *
 * @param int $oldversion The version being upgraded from.
 * @return bool true on success
 */
function xmldb_editor_customeditor_upgrade($oldversion) {

    if ($oldversion < 2026032401) {
        // Version 3.0.0 - Voice Typing feature added.
        // Force-set all voice language defaults unconditionally so that
        // stale zero values written by Moodle before this upgrade ran
        // are correctly overwritten.

        set_config('enable_voice_typing', 1, 'editor_customeditor');

        // Primary languages enabled by default.
        $primarylangs = [
            'voice_lang_en_in',
            'voice_lang_en_us',
            'voice_lang_en_gb',
            'voice_lang_ml_in',
            'voice_lang_ta_in',
            'voice_lang_hi_in',
        ];
        foreach ($primarylangs as $key) {
            set_config($key, 1, 'editor_customeditor');
        }

        // Additional languages disabled by default.
        $extralangs = [
            'voice_lang_te_in',
            'voice_lang_kn_in',
            'voice_lang_bn_in',
            'voice_lang_ur_pk',
            'voice_lang_ar_sa',
            'voice_lang_fr_fr',
            'voice_lang_es_es',
            'voice_lang_de_de',
            'voice_lang_ja_jp',
            'voice_lang_zh_cn',
            'voice_lang_pt_br',
            'voice_lang_ru_ru',
            'voice_lang_ko_kr',
        ];
        foreach ($extralangs as $key) {
            set_config($key, 0, 'editor_customeditor');
        }

        upgrade_plugin_savepoint(true, 2026032401, 'editor', 'customeditor');
    }

    if ($oldversion < 2026032402) {
        // Version 3.1.0 - Phonetic keyboard (jQuery.IME) feature added.
        // Force-set defaults unconditionally — no false guard.

        set_config('enable_ime', 1, 'editor_customeditor');

        // Default-on: Malayalam, Tamil, Hindi, Telugu, Kannada.
        $imedefaulton = [
            'ime_lang_ml',
            'ime_lang_ta',
            'ime_lang_hi',
            'ime_lang_te',
            'ime_lang_kn',
        ];
        foreach ($imedefaulton as $key) {
            set_config($key, 1, 'editor_customeditor');
        }

        // Default-off: remaining 14 languages.
        $imedefaultoff = [
            'ime_lang_bn',
            'ime_lang_gu',
            'ime_lang_pa',
            'ime_lang_ur',
            'ime_lang_as',
            'ime_lang_or',
            'ime_lang_mr',
            'ime_lang_sa',
            'ime_lang_ar',
            'ime_lang_fa',
            'ime_lang_ru',
            'ime_lang_el',
            'ime_lang_zh',
            'ime_lang_de',
        ];
        foreach ($imedefaultoff as $key) {
            set_config($key, 0, 'editor_customeditor');
        }

        // Reset editor_height default to '0' (auto-detect from plugin rows attribute).
        // Previous default was '75vh' — new default respects each plugin form definition.
        $current = get_config('editor_customeditor', 'editor_height');
        if ($current === '75vh' || $current === false) {
            set_config('editor_height', '0', 'editor_customeditor');
        }

        upgrade_plugin_savepoint(true, 2026032402, 'editor', 'customeditor');
    }

    return true;
}

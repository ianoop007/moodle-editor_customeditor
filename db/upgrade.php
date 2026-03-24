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
        // v3.0.0 — Voice Typing.
        // Force-set all voice language defaults unconditionally.
        // No get_config() guard — we must overwrite any stale '0' values
        // that Moodle may have saved when the admin visited the settings
        // page before this upgrade ran.

        set_config('enable_voice_typing', 1, 'editor_customeditor');

        // Primary languages on by default.
        foreach (['voice_lang_en_in', 'voice_lang_en_us', 'voice_lang_en_gb',
                  'voice_lang_ml_in', 'voice_lang_ta_in', 'voice_lang_hi_in'] as $key) {
            set_config($key, 1, 'editor_customeditor');
        }

        // Additional languages off by default (admin can enable).
        foreach (['voice_lang_te_in', 'voice_lang_kn_in', 'voice_lang_bn_in',
                  'voice_lang_ur_pk', 'voice_lang_ar_sa', 'voice_lang_fr_fr',
                  'voice_lang_es_es', 'voice_lang_de_de', 'voice_lang_ja_jp',
                  'voice_lang_zh_cn', 'voice_lang_pt_br', 'voice_lang_ru_ru',
                  'voice_lang_ko_kr'] as $key) {
            set_config($key, 0, 'editor_customeditor');
        }

        upgrade_plugin_savepoint(true, 2026032401, 'editor', 'customeditor');
    }

    return true;
}

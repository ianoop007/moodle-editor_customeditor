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
 * Post-installation script for the Anoop Kakkur Rich Text Editor.
 *
 * This runs ONCE after the plugin is first installed.
 * It sets the custom editor as the primary (default) text editor
 * and purges caches so the change takes effect immediately.
 *
 * @package   editor_customeditor
 * @copyright 2026 Anoop Kakkur <anoopkakkur@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Post-installation hook.
 *
 * Sets editor_customeditor as the primary text editor by prepending it
 * to the texteditors configuration. The admin can change the order
 * later from Site Administration > Plugins > Text Editors > Manage Editors.
 *
 * @return bool true on success
 */
function xmldb_editor_customeditor_install() {
    global $CFG;

    // Get the current list of active text editors.
    $editors = !empty($CFG->texteditors) ? $CFG->texteditors : 'atto,tiny,textarea';
    $editorlist = explode(',', $editors);

    // Remove customeditor if it's already in the list (avoid duplicates).
    $editorlist = array_filter($editorlist, function ($e) {
        return trim($e) !== 'customeditor';
    });

    // Prepend customeditor to make it the default (first in list).
    array_unshift($editorlist, 'customeditor');

    // Save the new editor order.
    $neweditors = implode(',', $editorlist);
    set_config('texteditors', $neweditors);

    // Purge all caches so the change takes effect immediately.
    purge_all_caches();

    return true;
}

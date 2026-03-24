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

namespace editor_customeditor;

/**
 * Hook callbacks for the Anoop Kakkur Rich Text Editor.
 *
 * @package   editor_customeditor
 * @copyright 2026 Anoop Kakkur <anoopkakkur@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class hook_callbacks {
    /**
     * Load copy-button JavaScript on every Moodle page.
     *
     * This replaces the legacy editor_customeditor_before_footer() callback
     * for Moodle 4.4+ which uses the Hooks API.
     *
     * @param \core\hook\output\before_footer_html_generation $hook The hook instance.
     * @return void
     */
    public static function before_footer(\core\hook\output\before_footer_html_generation $hook): void {
        global $PAGE;
        $PAGE->requires->js_call_amd('editor_customeditor/copybuttons', 'init');
    }
}

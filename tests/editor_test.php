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
 * Unit tests for the Anoop Kakkur Rich Text Editor.
 *
 * @package   editor_customeditor
 * @copyright 2026 Anoop Kakkur <anoopkakkur@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

namespace editor_customeditor;

/**
 * Unit tests for the customeditor_texteditor class.
 *
 * @package   editor_customeditor
 * @copyright 2026 Anoop Kakkur <anoopkakkur@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers    \customeditor_texteditor
 */
class editor_test extends \advanced_testcase {
    /**
     * Test that the editor class exists and can be instantiated.
     */
    public function test_editor_class_exists(): void {
        $editor = new \customeditor_texteditor();
        $this->assertInstanceOf(\texteditor::class, $editor);
    }

    /**
     * Test that the editor reports browser support.
     */
    public function test_supported_by_browser(): void {
        $editor = new \customeditor_texteditor();
        $this->assertTrue($editor->supported_by_browser());
    }

    /**
     * Test that the editor supports HTML format.
     */
    public function test_get_supported_formats(): void {
        $editor = new \customeditor_texteditor();
        $formats = $editor->get_supported_formats();
        $this->assertIsArray($formats);
        $this->assertArrayHasKey(FORMAT_HTML, $formats);
        $this->assertArrayHasKey(FORMAT_MOODLE, $formats);
    }

    /**
     * Test that the preferred format is HTML.
     */
    public function test_get_preferred_format(): void {
        $editor = new \customeditor_texteditor();
        $this->assertEquals(FORMAT_HTML, $editor->get_preferred_format());
    }

    /**
     * Test that the editor supports repositories.
     */
    public function test_supports_repositories(): void {
        $editor = new \customeditor_texteditor();
        $this->assertTrue($editor->supports_repositories());
    }

    /**
     * Test that the editor HTML file exists.
     */
    public function test_editor_html_exists(): void {
        global $CFG;
        $editorpath = $CFG->dirroot . '/lib/editor/customeditor/editor.html';
        $this->assertFileExists($editorpath);
    }

    /**
     * Test that the version file exists and has required fields.
     */
    public function test_version_file(): void {
        global $CFG;
        $plugin = new \stdClass();
        require($CFG->dirroot . '/lib/editor/customeditor/version.php');
        $this->assertNotEmpty($plugin->version);
        $this->assertNotEmpty($plugin->component);
        $this->assertEquals('editor_customeditor', $plugin->component);
    }

    /**
     * Test that use_editor does not throw an exception.
     */
    public function test_use_editor(): void {
        global $PAGE;
        $this->resetAfterTest();
        $PAGE->set_url('/');

        $editor = new \customeditor_texteditor();
        $editor->use_editor('testid');

        // If we get here without exception, the test passes.
        $this->assertTrue(true);
    }

    /**
     * Test that use_editor works with options.
     */
    public function test_use_editor_with_options(): void {
        global $PAGE;
        $this->resetAfterTest();
        $PAGE->set_url('/');

        $editor = new \customeditor_texteditor();
        $editor->use_editor('testid2', ['context' => \context_system::instance()]);

        $this->assertTrue(true);
    }

    /**
     * Test that plugin settings can be read.
     */
    public function test_settings_defaults(): void {
        $this->resetAfterTest();

        // Default settings should return false (not set yet).
        $menubar = get_config('editor_customeditor', 'enable_menubar');
        // Value is either false (not set) or a valid value.
        $this->assertTrue($menubar === false || $menubar === '0' || $menubar === '1');
    }

    /**
     * Test that settings can be written and read.
     */
    public function test_settings_write_read(): void {
        $this->resetAfterTest();

        set_config('enable_menubar', '0', 'editor_customeditor');
        $this->assertEquals('0', get_config('editor_customeditor', 'enable_menubar'));

        set_config('enable_menubar', '1', 'editor_customeditor');
        $this->assertEquals('1', get_config('editor_customeditor', 'enable_menubar'));
    }

    /**
     * Test that the editor height setting works.
     */
    public function test_editor_height_setting(): void {
        $this->resetAfterTest();

        set_config('editor_height', '500px', 'editor_customeditor');
        $this->assertEquals('500px', get_config('editor_customeditor', 'editor_height'));
    }

    /**
     * Test that the default font size setting works.
     */
    public function test_default_font_size_setting(): void {
        $this->resetAfterTest();

        set_config('default_font_size', '18', 'editor_customeditor');
        $this->assertEquals('18', get_config('editor_customeditor', 'default_font_size'));
    }

    /**
     * Test that the privacy provider class exists.
     */
    public function test_privacy_provider_exists(): void {
        $this->assertTrue(
            class_exists('\editor_customeditor\privacy\provider')
        );
    }

    /**
     * Test that the privacy provider returns a reason string.
     */
    public function test_privacy_provider_reason(): void {
        $reason = \editor_customeditor\privacy\provider::get_reason();
        $this->assertEquals('privacy:metadata', $reason);
    }

    /**
     * Test that language strings are defined.
     */
    public function test_language_strings(): void {
        $pluginname = get_string('pluginname', 'editor_customeditor');
        $this->assertNotEmpty($pluginname);
        $this->assertEquals('Anoop Kakkur Rich Text Editor', $pluginname);
    }

    /**
     * Test that capability is defined.
     */
    public function test_capability_exists(): void {
        $capabilities = get_all_capabilities();
        $found = false;
        foreach ($capabilities as $cap) {
            if ($cap['name'] === 'editor/customeditor:use') {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, 'Capability editor/customeditor:use should exist');
    }

    /**
     * Test the before_footer callback loads AMD module.
     */
    public function test_before_footer(): void {
        global $PAGE;
        $this->resetAfterTest();
        $PAGE->set_url('/');

        editor_customeditor_before_footer();

        // If no exception, the AMD module was queued successfully.
        $this->assertTrue(true);
    }
}

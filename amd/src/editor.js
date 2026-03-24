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
 * Editor initialisation module for the Anoop Kakkur Rich Text Editor.
 *
 * @module     editor_customeditor/editor
 * @package
 * @copyright 2026 Anoop Kakkur <anoopkakkur@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Sync all editor iframes to their textareas.
 *
 * @param {HTMLFormElement} form The form element.
 */
const syncAllEditors = (form) => {
    const iframes = form.querySelectorAll('[id^=custom-editor-iframe-]');
    iframes.forEach((iframe) => {
        const taId = iframe.id.replace('custom-editor-iframe-', '');
        const ta = document.getElementById(taId);
        if (ta) {
            try {
                ta.value = iframe.contentWindow.getMoodleEditorContent();
            } catch (e) {
                window.console.warn('Custom editor sync:', e);
            }
        }
    });
};

/**
 * Initialise the custom editor for a given textarea.
 *
 * @param {string} elementid The textarea element ID.
 */
export const init = (elementid) => {
    const initEditor = () => {
        const textarea = document.getElementById(elementid);
        if (!textarea) {
            return;
        }
        if (textarea.dataset.customEditorInit) {
            return;
        }
        textarea.dataset.customEditorInit = 'true';

        // Read the editor URL from the global config set by PHP (via js_init_code, runs before AMD).
        const editorurl = (window.customeditorUrls && window.customeditorUrls[elementid]) || '';
        if (!editorurl) {
            return;
        }

        textarea.style.display = 'none';

        // Hide any existing Atto or TinyMCE wrappers.
        const attoWrap = textarea.closest('.editor_atto_wrap');
        if (attoWrap) {
            attoWrap.style.display = 'none';
        }
        const tinyWrap = textarea.parentNode.querySelector('.tox.tox-tinymce');
        if (tinyWrap) {
            tinyWrap.style.display = 'none';
        }

        // Create the editor wrapper and iframe.
        const wrapper = document.createElement('div');
        wrapper.id = 'custom-editor-wrap-' + elementid;

        const urlParams = new URLSearchParams(editorurl.split('?')[1] || '');
        const editorHeight = urlParams.get('editor_height') || '75vh';
        wrapper.style.cssText = 'width:100%;margin-bottom:0.5rem;' +
            'resize:vertical;overflow:hidden;' +
            'min-height:200px;height:' + editorHeight + ';' +
            'border:1px solid #ccc;border-radius:8px;position:relative';

        const iframe = document.createElement('iframe');
        iframe.id = 'custom-editor-iframe-' + elementid;
        iframe.src = editorurl;
        iframe.setAttribute('allowfullscreen', 'true');

        iframe.style.cssText = 'width:100%;height:100%;border:none;border-radius:8px;' +
            'background:#fff;display:block';

        wrapper.appendChild(iframe);
        textarea.parentNode.insertBefore(wrapper, textarea);

        // Load existing content into the editor.
        iframe.addEventListener('load', () => {
            try {
                const content = textarea.value || '';
                if (content) {
                    iframe.contentWindow.setMoodleEditorContent(content);
                }
            } catch (e) {
                window.console.warn('Custom editor load:', e);
            }
        });

        // Bind form submit to sync content back to textarea.
        const form = textarea.closest('form');
        if (form && !form.dataset.customEditorBound) {
            form.dataset.customEditorBound = 'true';
            form.addEventListener('submit', () => {
                syncAllEditors(form);
            }, true);
            const buttons = form.querySelectorAll(
                '[type=submit], .btn-primary, [name=submitbutton], [name=submitbutton2]'
            );
            buttons.forEach((btn) => {
                btn.addEventListener('click', () => {
                    syncAllEditors(form);
                });
            });
        }
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initEditor);
    } else {
        setTimeout(initEditor, 300);
    }
};

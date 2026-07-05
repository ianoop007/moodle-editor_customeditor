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

        // Snapshot the textarea content NOW — at initialisation time — before any
        // form submit handlers can overwrite it via syncAllEditors().
        // Reading textarea.value at iframe 'load' time is too late: if the user
        // submitted a previous entry on this same page, syncAllEditors() may have
        // already written the previous entry's content back into this textarea,
        // causing the new editor to show stale content from the previous submission.
        const initialContent = textarea.value || '';

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
        const editorHeightSetting = urlParams.get('editor_height') || '0';

        // Resolve the actual CSS height to use for the wrapper.
        // If editor_height is '0' (the default), auto-detect from the textarea's
        // rows attribute — which is set by each Moodle plugin's own form definition.
        // This means HotQuestion (rows=3) gets a compact editor and Diary (rows=10)
        // gets a taller one, matching exactly what the plugin author intended.
        // If editor_height is any other value (e.g. '75vh', '400px'), use it as-is.
        let editorHeight;
        if (!editorHeightSetting || editorHeightSetting === '0') {
            // Auto mode: derive height from textarea rows attribute.
            // Each row ≈ 24px (line-height) + top/bottom padding overhead of ~140px
            // for the toolbar rows, status bar, and IME/voice bars.
            const rows = parseInt(textarea.rows, 10) || 5;
            const px = Math.max(200, rows * 24 + 140);
            editorHeight = px + 'px';
        } else {
            editorHeight = editorHeightSetting;
        }

        wrapper.style.cssText = 'width:100%;margin-bottom:0.5rem;' +
            'resize:vertical;overflow:hidden;' +
            'min-height:200px;height:' + editorHeight + ';' +
            'border:1px solid #ccc;border-radius:8px;position:relative';

        const iframe = document.createElement('iframe');
        iframe.id = 'custom-editor-iframe-' + elementid;
        iframe.src = editorurl;
        iframe.setAttribute('allowfullscreen', 'true');
        iframe.setAttribute('allow', 'microphone');

        iframe.style.cssText = 'width:100%;height:100%;border:none;border-radius:8px;' +
            'background:#fff;display:block';

        wrapper.appendChild(iframe);
        textarea.parentNode.insertBefore(wrapper, textarea);

        // Load the snapshotted content into the editor.
        // Uses initialContent captured above — not textarea.value which may
        // have been overwritten by syncAllEditors() by the time 'load' fires.
        iframe.addEventListener('load', () => {
            try {
                if (initialContent) {
                    iframe.contentWindow.setMoodleEditorContent(initialContent);
                }
            } catch (e) {
                window.console.warn('Custom editor load:', e);
            }
        });

        // ─── Moodle File Picker integration ───
        // Listen for postMessage from the editor iframe requesting the file picker.
        // Opens Moodle's built-in M.core_filepicker, and sends the selected file URL back.
        window.addEventListener('message', (event) => {
            if (!event.data || event.data.type !== 'customeditor-filepicker') {
                return;
            }
            if (event.data.action !== 'open') {
                return;
            }
            // Check if M.core_filepicker is available (Moodle's file picker)
            if (typeof M === 'undefined' || !M.core_filepicker) {
                // Fallback: tell user to use URL or upload
                try {
                    iframe.contentWindow.postMessage({
                        type: 'customeditor-filepicker-response',
                        url: '',
                        error: 'File picker not available'
                    }, '*');
                } catch (err) {
                    window.console.warn('File picker not available:', err);
                }
                return;
            }
            // Build file picker options
            const fpOptions = {
                env: 'editor',
                itemid: textarea.dataset.itemid || 0,
                context: M.cfg.contextid || 1,
                client_id: 'customeditor_' + elementid + '_' + Date.now(),
                accepted_types: ['.png', '.jpg', '.jpeg', '.gif', '.svg', '.webp', '.bmp', '.ico'],
                maxbytes: -1,
                maxfiles: 1
            };

            // Get repository options from the page if available
            if (typeof M.core_filepicker !== 'undefined' && M.core_filepicker.instances) {
                // Try to borrow repository config from an existing file picker on the page
                const existingPickers = Object.values(M.core_filepicker.instances);
                if (existingPickers.length > 0 && existingPickers[0].options) {
                    const existingOpts = existingPickers[0].options;
                    if (existingOpts.repositories) {
                        fpOptions.repositories = existingOpts.repositories;
                    }
                    if (existingOpts.context) {
                        fpOptions.context = existingOpts.context;
                    }
                }
            }

            // Open the file picker
            try {
                M.core_filepicker.show(Y, {
                    ...fpOptions,
                    formcallback: (params) => {
                        // File selected — send URL back to iframe
                        const fileUrl = params.url || '';
                        const fileName = params.file || '';
                        try {
                            iframe.contentWindow.postMessage({
                                type: 'customeditor-filepicker-response',
                                url: fileUrl,
                                filename: fileName
                            }, '*');
                        } catch (err) {
                            window.console.warn('File picker response error:', err);
                        }
                    }
                });
            } catch (err) {
                window.console.warn('File picker open error:', err);
                // Fallback: tell iframe file picker is not available
                try {
                    iframe.contentWindow.postMessage({
                        type: 'customeditor-filepicker-response',
                        url: '',
                        error: 'Could not open file picker: ' + err.message
                    }, '*');
                } catch (e2) {
                    // Silently fail
                }
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

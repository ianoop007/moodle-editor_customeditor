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
 * Display-side copy button handler for the Anoop Kakkur Rich Text Editor.
 *
 * Makes the Copy buttons in code blocks and snippets work
 * when content is viewed outside the editor (on Moodle pages).
 *
 * @module     editor_customeditor/copybuttons
 * @package
 * @copyright 2026 Anoop Kakkur <anoopkakkur@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Copy text to clipboard with fallback for older browsers.
 *
 * @param {string} text The text to copy.
 * @returns {Promise} Resolves when copy succeeds.
 */
const clipboardCopy = (text) => {
    return new Promise((resolve, reject) => {
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(text).then(resolve).catch(() => {
                fallbackCopy(text, resolve, reject);
            });
        } else {
            fallbackCopy(text, resolve, reject);
        }
    });
};

/**
 * Fallback copy using textarea and execCommand.
 *
 * @param {string} text The text to copy.
 * @param {Function} resolve Promise resolve.
 * @param {Function} reject Promise reject.
 */
const fallbackCopy = (text, resolve, reject) => {
    const ta = document.createElement('textarea');
    ta.value = text;
    ta.style.cssText = 'position:fixed;left:-9999px;top:-9999px;opacity:0';
    document.body.appendChild(ta);
    ta.focus();
    ta.select();
    try {
        const ok = document.execCommand('copy');
        document.body.removeChild(ta);
        if (ok) {
            resolve();
        } else {
            reject(new Error('Copy failed'));
        }
    } catch (e) {
        document.body.removeChild(ta);
        reject(e);
    }
};

/**
 * Show copied feedback on a button.
 *
 * @param {HTMLElement} btn The button element.
 * @param {string} type 'inline' or 'block'.
 */
const showCopied = (btn, type) => {
    if (!btn) {
        return;
    }
    const orig = btn.innerHTML;
    const svg = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">' +
        '<polyline points="20 6 9 17 4 12"/></svg>';
    btn.innerHTML = type === 'inline' ? svg : svg + 'Copied!';
    btn.classList.add('copied');
    setTimeout(() => {
        btn.innerHTML = orig;
        btn.classList.remove('copied');
    }, 2000);
};

/**
 * Initialise copy button and interactive component event handlers.
 */
export const init = () => {
    // Register global functions for onclick handlers embedded in the HTML content.
    window.copyCodeBlock = (id) => {
        const pre = document.getElementById(id);
        if (!pre) {
            return;
        }
        const code = pre.querySelector('code');
        const text = code ? (code.innerText || code.textContent) : '';
        clipboardCopy(text).then(() => {
            showCopied(pre.querySelector('.copy-code-btn'), 'block');
            return true;
        }).catch(() => {
            // Clipboard copy failed silently.
        });
    };

    window.copySnippet = (id, type) => {
        const el = document.getElementById(id);
        if (!el) {
            return;
        }
        let text = '';
        if (type === 'inline') {
            const st = el.querySelector('.snippet-text');
            text = st ? st.textContent : '';
        } else {
            const sc = el.querySelector('.snippet-block-code');
            text = sc ? sc.textContent : '';
        }
        clipboardCopy(text).then(() => {
            const btn = type === 'inline'
                ? el.querySelector('.snippet-copy-btn')
                : el.querySelector('.snippet-block-copy');
            showCopied(btn, type);
            return true;
        }).catch(() => {
            // Clipboard copy failed silently.
        });
    };

    // Use a single delegated click listener on the document body for
    // all interactive components (accordion, tabs, quiz, checklist).
    document.body.addEventListener('click', (e) => {
        const target = e.target;

        // ── Accordion toggle ──
        if (target.closest('.ed-accordion-header')) {
            const header = target.closest('.ed-accordion-header');
            const accordion = header.closest('.ed-accordion');
            if (accordion) {
                accordion.classList.toggle('open');
            }
            return;
        }

        // ── Tab panel switch ──
        if (target.closest('.ed-tab-btn')) {
            const btn = target.closest('.ed-tab-btn');
            const tabs = btn.closest('.ed-tabs');
            if (!tabs) {
                return;
            }
            // Deactivate all tabs and panels.
            const allBtns = tabs.querySelectorAll('.ed-tab-btn');
            const allPanels = tabs.querySelectorAll('.ed-tab-panel');
            allBtns.forEach((b) => {
                b.classList.remove('active');
            });
            allPanels.forEach((p) => {
                p.classList.remove('active');
            });
            // Activate clicked tab.
            btn.classList.add('active');
            const idx = Array.from(allBtns).indexOf(btn);
            if (allPanels[idx]) {
                allPanels[idx].classList.add('active');
            }
            return;
        }

        // ── Quiz reveal toggle ──
        if (target.closest('[data-quiz-toggle]')) {
            const toggle = target.closest('[data-quiz-toggle]');
            const quiz = toggle.closest('.ed-quiz');
            if (quiz) {
                quiz.classList.toggle('revealed');
                if (quiz.classList.contains('revealed')) {
                    toggle.textContent = 'Hide Answer';
                } else {
                    toggle.textContent = 'Show Answer';
                }
            }
            return;
        }

        // ── Checklist toggle ──
        if (target.closest('.check-box')) {
            const box = target.closest('.check-box');
            const li = box.closest('li');
            if (li) {
                li.classList.toggle('checked');
                if (li.classList.contains('checked')) {
                    box.textContent = '\u2713';
                } else {
                    box.textContent = '  ';
                }
            }
        }
    });
};

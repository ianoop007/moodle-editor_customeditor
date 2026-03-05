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
 * Display-side copy button functions for the Anoop Kakkur Rich Text Editor.
 *
 * Makes the Copy buttons in code blocks and snippets work
 * when content is viewed outside the editor (on Moodle pages).
 *
 * @package   editor_customeditor
 * @copyright 2025 Anoop Kakkur <anoopkakkur@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Universal clipboard copy with fallback
function clipboardCopy(text) {
    return new Promise(function(resolve, reject) {
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(text).then(resolve).catch(function() {
                fallbackCopy(text, resolve, reject);
            });
        } else {
            fallbackCopy(text, resolve, reject);
        }
    });
}

function fallbackCopy(text, resolve, reject) {
    var ta = document.createElement('textarea');
    ta.value = text;
    ta.style.cssText = 'position:fixed;left:-9999px;top:-9999px;opacity:0';
    document.body.appendChild(ta);
    ta.focus();
    ta.select();
    try {
        var ok = document.execCommand('copy');
        document.body.removeChild(ta);
        if (ok) resolve(); else reject(new Error('copy failed'));
    } catch(e) {
        document.body.removeChild(ta);
        reject(e);
    }
}

function showCopied(btn, type) {
    var orig = btn.innerHTML;
    if (type === 'inline') {
        btn.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>';
    } else {
        btn.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>Copied!';
    }
    btn.classList.add('copied');
    setTimeout(function() { btn.innerHTML = orig; btn.classList.remove('copied'); }, 2000);
}

// Global functions called by onclick handlers in the HTML content
window.copyCodeBlock = function(id) {
    var pre = document.getElementById(id);
    if (!pre) return;
    var code = pre.querySelector('code');
    var text = code ? (code.innerText || code.textContent) : '';
    clipboardCopy(text).then(function() {
        showCopied(pre.querySelector('.copy-code-btn'), 'block');
    });
};

window.copySnippet = function(id, type) {
    var el = document.getElementById(id);
    if (!el) return;
    var text = '';
    if (type === 'inline') {
        var st = el.querySelector('.snippet-text');
        text = st ? st.textContent : '';
    } else {
        var sc = el.querySelector('.snippet-block-code');
        text = sc ? sc.textContent : '';
    }
    clipboardCopy(text).then(function() {
        var btn = type === 'inline' ? el.querySelector('.snippet-copy-btn') : el.querySelector('.snippet-block-copy');
        showCopied(btn, type);
    });
};

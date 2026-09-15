<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Block greeting.
 *
 * @package    block_greeting
 * @copyright  2026 Jean Lúcio
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Block greeting definition.
 */
class block_greeting extends block_base {
    #[\Override]
    public function init(): void {
        $this->title = get_string('pluginname', 'block_greeting');
    }

    #[\Override]
    public function get_content(): ?stdClass {
        if ($this->content !== null) {
            return $this->content;
        }
        $this->content = new stdClass();
        // Section 4 of SCOPE.md: get the message from \block_greeting\local\greeting_text,
        // render it through a Mustache template (section 8), and register the AMD module
        // (block_greeting/greeting) here.
        $this->content->text = '';
        $this->content->footer = '';
        return $this->content;
    }
}

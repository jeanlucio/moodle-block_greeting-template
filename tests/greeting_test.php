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
 * Tests for block_greeting.
 *
 * @package    block_greeting
 * @copyright  2026 Jean Lúcio
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_greeting;

/**
 * The block must render the greeting string.
 *
 * @covers \block_greeting
 * @covers \block_greeting\local\greeting_text
 */
final class greeting_test extends \advanced_testcase {
    /**
     * A freshly added block shows the text from the 'greeting' language string.
     */
    public function test_block_shows_the_greeting(): void {
        $this->resetAfterTest();
        $this->setAdminUser();

        $page = new \moodle_page();
        $page->set_context(\context_system::instance());

        $block = \block_instance('greeting');
        $block->page = $page;
        $content = $block->get_content();

        $this->assertStringContainsString(
            get_string('greeting', 'block_greeting'),
            $content->text
        );
    }
}

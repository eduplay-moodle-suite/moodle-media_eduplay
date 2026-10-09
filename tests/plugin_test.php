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

namespace media_eduplay;

/**
 * Tests for the EduPlay media player.
 *
 * @package    media_eduplay
 * @category   test
 * @copyright  2026 Kelson da Costa Medeiros <kelsoncm@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \media_eduplay_plugin
 */
final class plugin_test extends \advanced_testcase {
    /**
     * A canonical URL is rendered as the official iframe, with an accessible title and a fallback link.
     */
    public function test_canonical_url_is_embedded(): void {
        $this->resetAfterTest();
        $player = new \media_eduplay_plugin();
        $html = $player->embed(
            [new \moodle_url('https://eduplay.rnp.br/app/video/353479')],
            'My lesson',
            0,
            0,
            []
        );
        $this->assertStringContainsString('<iframe', $html);
        $this->assertStringContainsString('src="https://eduplay.rnp.br/app/video/embed/353479"', $html);
        $this->assertStringContainsString('title="My lesson"', $html);
        $this->assertStringContainsString('href="https://eduplay.rnp.br/app/video/353479"', $html);
    }

    /**
     * Unsupported URLs are not embedded.
     *
     * @dataProvider unsupported_provider
     * @param string $url
     */
    public function test_unsupported_url_is_not_embedded(string $url): void {
        $this->resetAfterTest();
        $player = new \media_eduplay_plugin();
        $html = $player->embed([new \moodle_url($url)], '', 0, 0, []);
        $this->assertStringNotContainsString('<iframe', $html);
    }

    /**
     * Unsupported URLs.
     *
     * @return array
     */
    public static function unsupported_provider(): array {
        return [
            'other host' => ['https://evil.example/app/video/1'],
            'http' => ['http://eduplay.rnp.br/app/video/1'],
            'embed route' => ['https://eduplay.rnp.br/app/video/embed/1'],
            'userinfo trick' => ['https://eduplay.rnp.br@evil.example/app/video/1'],
        ];
    }

    /**
     * The Moodle media manager loads the player (media_eduplay_plugin) and embeds a canonical link once enabled.
     */
    public function test_media_manager_embeds_when_enabled(): void {
        global $PAGE;
        $this->resetAfterTest();
        \core\plugininfo\media::enable_plugin('eduplay', 1);
        \core_media_manager::reset_caches();
        $PAGE->set_url('/');
        $manager = \core_media_manager::instance();
        $url = new \moodle_url('https://eduplay.rnp.br/app/video/353479');
        $this->assertTrue($manager->can_embed_url($url));
        $this->assertStringContainsString('/app/video/embed/353479', $manager->embed_url($url, 'Lesson'));
        $this->assertFalse($manager->can_embed_url(new \moodle_url('https://evil.example/app/video/1')));
    }

    /**
     * The player advertises the marker used by Moodle to pre-filter text.
     */
    public function test_markers_and_rank(): void {
        $player = new \media_eduplay_plugin();
        $this->assertSame(['eduplay.rnp.br/app/video/'], $player->get_embeddable_markers());
        $this->assertGreaterThan(1000, $player->get_rank());
    }
}

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

use local_eduplay\local\url_parser;
use moodle_url;

/**
 * Media player that embeds the official EduPlay player in an iframe.
 *
 * @package    media_eduplay
 * @copyright  2026 Kelson da Costa Medeiros <kelsoncm@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class plugin extends \core_media_player_external {
    /**
     * Render the official player for a canonical EduPlay URL.
     *
     * @param moodle_url $url
     * @param string $name Optional link text, used as the iframe title when meaningful.
     * @param int $width
     * @param int $height
     * @param array $options
     * @return string Empty string when the URL is not supported, so Moodle falls back to a plain link.
     */
    protected function embed_external(moodle_url $url, $name, $width, $height, $options) {
        global $OUTPUT;

        $reference = url_parser::parse_reference($url->out(false));
        if ($reference === null) {
            return '';
        }

        $title = trim((string) $name);
        if ($title === '' || strpos($title, 'http') === 0) {
            $title = get_string('iframetitle', 'media_eduplay');
        }

        return $OUTPUT->render_from_template('media_eduplay/player', [
            'embedurl' => $reference->embed_url(),
            'canonicalurl' => $reference->canonical_url(),
            'title' => $title,
            'linktext' => get_string('openineduplay', 'media_eduplay'),
        ]);
    }

    /**
     * Regular expression matching canonical EduPlay video URLs.
     *
     * The strict validation is done by the local_eduplay URL parser.
     *
     * @return string
     */
    protected function get_regex() {
        return '~^https://eduplay\.rnp\.br/app/video/[0-9]+/?$~';
    }

    /**
     * Strings used by Moodle to pre-filter text before trying to embed.
     *
     * @return array
     */
    public function get_embeddable_markers() {
        return ['eduplay.rnp.br/app/video/'];
    }

    /**
     * Rank of this player; higher values are tried first.
     *
     * @return int
     */
    public function get_rank() {
        return 1100;
    }
}

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

namespace media_eduplay\privacy;

use core_privacy\local\metadata\collection;

/**
 * Privacy provider: the plugin stores no personal data.
 *
 * The viewer's browser loads the official EduPlay player directly from EduPlay, under its own privacy policy.
 *
 * @package    media_eduplay
 * @copyright  2026 Kelson da Costa Medeiros <kelsoncm@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class provider implements \core_privacy\local\metadata\provider {
    /**
     * Describe the data the viewer's browser sends to the external EduPlay service.
     *
     * @param collection $collection
     * @return collection
     */
    public static function get_metadata(collection $collection): collection {
        $collection->add_external_location_link('eduplay', [
            'ipaddress' => 'privacy:metadata:eduplay:ipaddress',
        ], 'privacy:metadata:eduplay');
        return $collection;
    }
}

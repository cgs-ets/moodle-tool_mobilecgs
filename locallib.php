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
 * Lib functions, mostly callbacks.
 *
 * @package    tool_mobilecgs
 * @copyright  2017 Juan Leyva
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Get a list of blocks instances for courses.
 *
 * @return array
 */
function tool_mobilecgs_get_blocks_list() {
    global $DB;

    $blocks = array();

    $sql = "SELECT 
                   b.id as blockid,
                   c.instanceid as courseid,
                   b.blockname,
                   b.configdata
              FROM {block_instances} b, 
                   {context} c
             WHERE c.id = b.parentcontextid
               AND c.contextlevel = 50
          ORDER BY courseid, blockid ASC";

    $blockinstances = $DB->get_records_sql($sql);
    foreach ($blockinstances as $block) {
        $title = '';
        if ($configdata = unserialize(base64_decode($block->configdata))) {
            if (isset($configdata->title)) {
                $title = ' ("' . strip_tags($configdata->title) . '")';
            }
        }
        $blocks[$block->blockid] = 'course ' . $block->courseid . ' → block ' . $block->blockid . ' → ' . $block->blockname . $title;
    }

    return $blocks;

}

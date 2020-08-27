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
 * Settings
 *
 * This file contains settings used by tool_mobilecgs
 *
 * @package    tool_mobilecgs
 * @copyright  2020 Michael Vangelovski
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once(dirname(__FILE__) . '\locallib.php');

if ($hassiteconfig) {

    // Show only mobile settings if the mobile service is enabled.
    if (!empty($CFG->enablemobilewebservice)) {
        // Features related settings.
        $settings = new admin_settingpage('cgsmobilefeatures', new lang_string('cgsmobilefeatures', 'tool_mobilecgs'));
        $ADMIN->add('tools', $settings);

        $settings->add(new admin_setting_heading('tool_mobilecgs/features',
                    new lang_string('cgsmobilefeatures', 'tool_mobilecgs'), ''));

        // Disabled blocks.
        $options = tool_mobilecgs_get_blocks_list();
        $name = 'tool_mobilecgs/disabledblocks';
        $title = new lang_string('disabledfeatures', 'tool_mobilecgs');
        $description = new lang_string('disabledfeatures_desc', 'tool_mobilecgs');
        $setting = new admin_setting_configmultiselect($name, $title, $description, array(), $options);
        $settings->add($setting);

    }

}

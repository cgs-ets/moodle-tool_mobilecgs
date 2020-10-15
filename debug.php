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
 * Debugger
 *
 * @package   tool_mobilecgs
 * @copyright 2020 Michael Vangelovski
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */

require_once(dirname(__FILE__) . '/../../../config.php');

// Set context.
$context = context_system::instance();

// Set up page parameters.
$PAGE->set_context($context);
$pageurl = new moodle_url('/admin/tool/mobilecgs/debug.php');
$PAGE->set_url($pageurl);
$title = get_string('pluginname', 'tool_mobilecgs');
$PAGE->set_heading($title);
$PAGE->set_title($SITE->fullname . ': ' . $title);
$PAGE->navbar->add($title);

// Ensure user is logged in and has capability to update course.
require_login();
require_capability('moodle/site:config', $context, $USER->id); 

//$api = new \block_my_day_timetable\external\api();
//header('Content-Type: text/plain');
//var_export(
//	json_encode(
//		$api->get_timetable_data_for_date("50288","student",1,"2020-09-04",474)
//	)
//);
//exit;

//$blocks = tool_mobilecgs_get_blocks_list();
//var_export($blocks); 
//exit;

// Send a notification
/*$userfrom = \core_user::get_noreply_user();
$userto = \core_user::get_user_by_username('43563');
$eventdata = new \core\message\message();
$eventdata->courseid            = SITEID;
$eventdata->component           = 'local_announcements';
$eventdata->name                = 'notifications';
$eventdata->name            = 'forced';
$eventdata->userfrom            = $userfrom;
$eventdata->userto              = $userto;
$eventdata->subject             = 'TEST NOTIFICATION';
$eventdata->fullmessage         = 'TEST NOTIFICATION';
$eventdata->fullmessageformat   = FORMAT_PLAIN;
$eventdata->fullmessagehtml     = 'TEST NOTIFICATION';
$eventdata->notification        = 1;
$eventdata->smallmessage = 'TEST NOTIFICATION';
echo message_send($eventdata);
exit;*/


// Build page output
$output = '';
$output .= $OUTPUT->header();
$output .= $OUTPUT->footer();
echo $output;
<?php

/**
 * Embedded Google Calendar customization wrapper script
 *
 * Applies a custom color scheme to an embedded Google Calendar.
 *
 * Usage:
 *
 *     Replace standard Google Calendar embedding code, e.g.:
 *
 * <iframe src="http://www.google.com/calendar/embed?src=..."></iframe>
 *
 *     with a reference to this script:
 *
 * <iframe src="gcalendar-wrapper.php?src=..."></iframe>
 *
 * @author      Chris Dornfeld <dornfeld (at) unitz.com>
 * @version     $Id: gcalendar-wrapper.php 1571 2010-11-15 07:08:05Z dornfeld $
 * @link        http://www.unitz.com/gcalendar-wrapper/
 */

/**
 * Set your color scheme below
 */

/**
$calColorBgDark      = '#c3d9ff';	// dark background color
$calColorTextOnDark  = '#000000';	// text appearing on top of dark bg color
$calColorBgLight     = '#e8eef7';	// light background color
$calColorTextOnLight = '#000000';	// text appearing on top of light bg color
$calColorBgToday     = '#ffffcc';	// background color for "today" box
**/


$calColorBgDark      = 'transparent';
$calColorTextOnDark  = '#615034';
$calColorBgLight     = '#fff';
$calColorTextOnLight = '#615034';
$calColorBgToday     = '#f3f3f3';
$calColorBgBody  = 'transparent';
$calColorBorder  = '#e8e8e8';
$calColorTh  = '#615034';
$calColorNonMonth  = '#bbb';

/**
 * Orange color scheme
 */
/*
$calColorBgDark      = '#ffa200';
$calColorTextOnDark  = '#ffffff';
$calColorBgLight     = '#ffeccb';
$calColorTextOnLight = '#000000';
$calColorBgToday     = '#fef0ff';
*/

/**
 * Purple color scheme
 */
/*
$calColorBgDark      = '#4b53a1';
$calColorTextOnDark  = '#ffffff';
$calColorBgLight     = '#d0cfff';
$calColorTextOnLight = '#000000';
$calColorBgToday     = '#fff2cf';
*/

/**
 * Green color scheme
 */
/*
$calColorBgDark      = '#336633';
$calColorTextOnDark  = '#ffffff';
$calColorBgLight     = '#ace0ac';
$calColorTextOnLight = '#003300';
$calColorBgToday     = '#ffe5ac';
*/

/**
 * Google Calendar default color scheme (simplified)
 */
/*
$calColorBgDark      = '#c3d9ff';
$calColorTextOnDark  = '#000000';
$calColorBgLight     = '#e8eef7';
$calColorTextOnLight = '#000000';
$calColorBgToday     = '#ffffcc';
*/

/**
 * For normal use, no changes are needed below this line
 */

define('GOOGLE_CALENDAR_BASE', 'https://www.google.com/');
define('GOOGLE_CALENDAR_EMBED_URL', GOOGLE_CALENDAR_BASE . 'calendar/embed');

/**
 * Prepare stylesheet customizations
 */

$calCustomStyle =<<<EOT

/* my settings */


.rb-n {
	background-color: #b81e1e !important;
}
.bubble .details .title {
	color: #333 !important;
}
.te-t,.te-s {
	color: #fff;
	display: block;
	padding: 3px 5px;
	background-color: #b81e1e;
}
.bubble-top {
	border-top: 0px;
}
.bubble-mid {
	border: 0px;
}
@media (max-width: 670px ) {
	.bubble {
    width: 100% !important;
    left: 0 !important;
    box-sizing: border-box;
	}
}
.mv-event-container {
	top: 23px;
}
.mv-dayname {
	height: 20px;
	light-hight: 20px;
}
#mvDaynamesTable {
	position: relative;
	z-index: 1;
}
.bubble-bottom {
	border-bottom: 0px;
}
.bubble {
	border: 1px solid #ccc;
	background-color: #fff;
}
.links,.separator,.bubble-corner{
	display: none;
}
#calendarTitle,#calendarListButton1,.tab-name {
	display: none;
}
.navForward,#navBack1,.date-nav-buttons {
	display: none;
}
.header img,#footer1 {
	display: none;
}

body {
    background-color:{$calColorBgBody} !important;
}
body,
#calendarTitle,
.calendar-container,
.te-t,
.st-c-pos {
    font-family:'Josefin Sans', sans-serif;
}
.mv-event-container {
    border-top:none !important;
    border-bottom:1px solid {$calColorBorder} !important;
}
.st-bg-table {
    border-collapse: collapse;
}
.st-bg-table,
.st-bg-table th,
.st-bg-table td,
.st-bg-table td.st-bg,
.st-bg-table td.st-dtitle,
.st-grid td.st-dtitle {
    border:1px solid {$calColorBorder} !important;
    border-bottom: none !important;
}
.te {
    color:{$calColorTh} !important;
    padding:3px !important;
}
.calendar-nav {
    padding:0 5px !important;
}
.st-dtitle {
    font-size: 14px !important;
    padding:3px !important;
    font-weight:normal;
}
.st-dtitle-nonmonth span {
    color:{$calColorNonMonth} !important;
}
#calendarTitle {
    padding-left: 7px !important;
}
.today-button {
    margin:0 0 0 7px !important;
}
#container table.mv-daynames-table,
#container td#calendarTabs1 div.ui-rtsr-unselected {
    background-color:{$calColorTh} !important;
    color:#fff !important;
}
body #container td.st-dtitle-today,
body #container td.st-bg st-bg-today {
    background-color:{$calColorBgToday} !important;
}
#container td.st-dtitle {
    background-color:#fff !important;
}
.st-grid {
    border-collapse: collapse !important;
}
#calendarTabs1 table {
    margin:0 6px 0 0;
}
img:focus {
    outline:none !important;
}
.t1-embed,
.t2-embed {
    display:none !important;
}























/* hoge */

/* misc interface */
.cc-titlebar {
	background-color: {$calColorBgLight} !important;
}
.date-picker-arrow-on,
.drag-lasso,
.agenda-scrollboxBoundary {
	background-color: {$calColorBgDark} !important;
}
td#timezone {
	color: {$calColorTextOnDark} !important;
}
/* tabs */
td#calendarTabs1 div.ui-rtsr-selected,
div.view-cap,
div.view-container-border {
	background-color: {$calColorBgDark} !important;
}
td#calendarTabs1 div.ui-rtsr-selected {
	color: {$calColorTextOnDark} !important;
}
td#calendarTabs1 div.ui-rtsr-unselected {
	background-color: {$calColorBgLight} !important;
	color: {$calColorTextOnLight} !important;
}

/* week view */
table.wk-weektop,
th.wk-dummyth {
	/* days of the week */
	background-color: {$calColorBgDark} !important;
}
div.wk-dayname {
	color: {$calColorTextOnDark} !important;
}
div.wk-today {
	background-color: {$calColorBgLight} !important;
	border: 1px solid #EEEEEE !important;
	color: {$calColorTextOnLight} !important;
}
td.wk-allday {
	background-color: #EEEEEE !important;
}
td.tg-times {
	background-color: {$calColorBgLight} !important;
	color: {$calColorTextOnLight} !important;
}
div.tg-today {
	background-color: {$calColorBgToday} !important;
}

/* month view */
table.mv-daynames-table {
	background-color: {$calColorBgDark} !important;
	/* days of the week */
	color: {$calColorTextOnDark} !important;
}
td.st-bg,
td.st-dtitle {
	/* cell borders */
	border-left: 1px solid {$calColorBgDark} !important;
}
td.st-dtitle {
	/* days of the month */
	background-color: {$calColorBgLight} !important;
	color: {$calColorTextOnLight} !important;
	/* cell borders */
	border-top: 1px solid {$calColorBgDark} !important;
}
td.st-bg-today {
	background-color: {$calColorBgToday} !important;
}

/* agenda view */
div.scrollbox {
	border-top: 1px solid {$calColorBgDark} !important;
	border-left: 1px solid {$calColorBgDark} !important;
}
div.underflow-top {
	border-bottom: 1px solid {$calColorBgDark} !important;
}
div.date-label {
	background-color: {$calColorBgLight} !important;
	color: {$calColorTextOnLight} !important;
}
div.event {
	border-top: 1px solid {$calColorBgDark} !important;
}
div.day {
	border-bottom: 1px solid {$calColorBgDark} !important;
}

EOT;

$calCustomStyle = '<style type="text/css">'.$calCustomStyle.'</style>';

/**
 * Construct calendar URL
 */

$calQuery = '';
if (isset($_SERVER['QUERY_STRING'])) {
	$calQuery = $_SERVER['QUERY_STRING'];
} else if (isset($HTTP_SERVER_VARS['QUERY_STRING'])) {
	$calQuery = $HTTP_SERVER_VARS['QUERY_STRING'];
}
$calUrl = GOOGLE_CALENDAR_EMBED_URL.'?'.$calQuery;

/**
 * Retrieve calendar embedding code
 */

$calRaw = '';
if (in_array('curl', get_loaded_extensions())) {
	$curlObj = curl_init();
	curl_setopt($curlObj, CURLOPT_URL, $calUrl);
	curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
	// trust any SSL certificate (we're only retrieving public data)
	curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curlObj, CURLOPT_SSL_VERIFYHOST, FALSE);
	if (function_exists('curl_version')) {
		$curlVer = curl_version();
		if (is_array($curlVer)) {
			if (!in_array('https', $curlVer['protocols'])) {
				trigger_error("Can't use https protocol with cURL to retrieve Google Calendar", E_USER_ERROR);
			}
			if (!empty($curlVer['version']) &&
				version_compare($curlVer['version'], '7.15.2', '>=') &&
				!ini_get('open_basedir') && !ini_get('safe_mode')) {
				// enable HTTP redirect following for cURL:
				// - CURLOPT_FOLLOWLOCATION is disabled when PHP is in safe mode
				// - cURL versions before 7.15.2 had a bug that lumped
				//   redirected page content with HTTP headers
				// http://simplepie.org/support/viewtopic.php?id=1004
				curl_setopt($curlObj, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curlObj, CURLOPT_MAXREDIRS, 5);
			}
		}
	}
	$calRaw = curl_exec($curlObj);
	curl_close($curlObj);
} else if (ini_get('allow_url_fopen')) {
	if (function_exists('stream_get_wrappers')) {
		if (!in_array('https', stream_get_wrappers())) {
			trigger_error("Can't use https protocol with fopen to retrieve Google Calendar", E_USER_ERROR);
		}
	} else if (!in_array('openssl', get_loaded_extensions())) {
		trigger_error("Can't use https protocol with fopen to retrieve Google Calendar", E_USER_ERROR);
	}
	// fopen should follow HTTP redirects in recent versions
	$fp = fopen($calUrl, 'r');
	while (!feof($fp)) {
		$calRaw .= fread($fp, 8192);
	}
	fclose($fp);
} else {
	trigger_error("Can't use cURL or fopen to retrieve Google Calendar", E_USER_ERROR);
}

/**
 * Insert BASE tag to accommodate relative paths
 */

$titleTag = '<title>';
$baseTag = '<base href="'.GOOGLE_CALENDAR_EMBED_URL.'">';
$calCustomized = preg_replace("/".preg_quote($titleTag,'/')."/i", $baseTag.$titleTag, $calRaw);

/**
 * Insert custom styles
 */

$headEndTag = '</head>';
$calCustomized = preg_replace("/".preg_quote($headEndTag,'/')."/i", $calCustomStyle.$headEndTag, $calCustomized);

/**
 * Extract and modify calendar setup data
 */

$calSettingsPattern = "(\{\s*window\._init\(\s*)(\{.+\})(\s*\)\;\s*\})";

if (preg_match("/$calSettingsPattern/", $calCustomized, $matches)) {
	$calSettingsJson = $matches[2];

	$pearJson = null;
	if (!function_exists('json_encode')) {
		// no built-in JSON support, attempt to use PEAR::Services_JSON library
		if (!class_exists('Services_JSON')) {
			require_once('Services/JSON.php');
		}
		$pearJson = new Services_JSON();
	}

	if (function_exists('json_decode')) {
		$calSettings = json_decode($calSettingsJson);
	} else {
		$calSettings = $pearJson->decode($calSettingsJson);
	}

	// set base URL to accommodate relative paths
	$calSettings->baseUrl = GOOGLE_CALENDAR_BASE;

	// splice in updated calendar setup data
	if (function_exists('json_encode')) {
		$calSettingsJson = json_encode($calSettings);
	} else {
		$calSettingsJson = $pearJson->encode($calSettings);
	}
	// prevent unwanted variable substitutions within JSON data
	// preg_quote() results in excessive escaping
	$calSettingsJson = str_replace('$', '\\$', $calSettingsJson);
	$calCustomized = preg_replace("/$calSettingsPattern/", "\\1$calSettingsJson\\3", $calCustomized);
}

/**
 * Show output
 */

header('Content-type: text/html');
print $calCustomized;

<?php
include('../mod/branding.php');
$allowedThemes = array('dark', 'fluent', 'l2013');

if(in_array($site['siteTheme'], $allowedThemes)) {
	header('Content-Type: text/css');
	die(file_get_contents('./themes/'.$site['siteTheme'].'.css'));
} else {
	http_response_code(404);
	include('../../404.php');
	die();
}
?>
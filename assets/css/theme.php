<?php
require_once('../mod/branding.php');

if(in_array($site['siteTheme'], $site['allowedThemes'])) {
	header('Content-Type: text/css');
	die(file_get_contents('./themes/'.$site['siteTheme'].'.css'));
} else {
	http_response_code(404);
	require_once('../../404.php');
	die();
}
?>
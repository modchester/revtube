<?php
$site = array();

$site['videoPlayer'] = $_COOKIE['videoPlayer'] ?? 'yt2013';
$site['siteTheme'] = $_COOKIE['siteTheme'] ?? 'default';
$site['name'] = 'RevTube';

if($site['siteTheme'] == 'dark') {
    $site['logo_source'] = '/assets/img/revtube_dark.png';
} else {
    $site['logo_source'] = '/assets/img/revtube.png';
}
?>
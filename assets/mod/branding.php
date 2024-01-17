<?php
$site = array();

$site['videoPlayer'] = $_COOKIE['videoPlayer'] ?? 'yt2013';
$site['siteTheme'] = $_COOKIE['siteTheme'] ?? 'default';
$site['errorGato'] = $_COOKIE['errorGato'] ?? 'revoozie_rtx';
$site['name'] = 'RevTube';

if($site['siteTheme'] == 'dark') {
    $site['logo_source'] = '/assets/img/revtube_dark.png';
} else {
    $site['logo_source'] = '/assets/img/revtube.png';
}
  
if($site['errorGato'] == 'anal') {
    $site['errorGatoNum'] = 6;
} elseif($site['errorGato'] == 'revoozie') {
    $site['errorGatoNum'] = 7;
} else {
    $site['errorGatoNum'] = rand(1,5);
}
?>
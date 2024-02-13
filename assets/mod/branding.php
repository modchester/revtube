<?php
$site = array();

$site['videoPlayer'] = $_COOKIE['videoPlayer'] ?? 'yt2013';
$site['siteTheme'] = $_COOKIE['siteTheme'] ?? 'default';
$site['errorGato'] = $_COOKIE['errorGato'] ?? 'revoozie_rtx';
$site['name'] = 'RevTube';

// the commented lines are for the pre-late 2013 logo
// it kinda sucks, i was testing
if($site['siteTheme'] == 'dark') {
    //$site['logo_source'] = '/assets/img/logos/2013_dark.png';
    $site['logo_source'] = '/assets/img/logos/2013L_dark.png';
} elseif($site['siteTheme'] == 'l2013') {
    $site['logo_source'] = '/assets/img/logos/2013L.png';
} else {
    //$site['logo_source'] = '/assets/img/logos/2013.png';
    $site['logo_source'] = '/assets/img/logos/2013L.png';
}
  
if($site['errorGato'] == 'anal') {
    $site['errorGatoNum'] = 6;
} elseif($site['errorGato'] == 'revoozie') {
    $site['errorGatoNum'] = rand(7, 12);
} else {
    $site['errorGatoNum'] = rand(1,5);
}
?>
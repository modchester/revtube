<?php 
require_once("../assets/mod/branding.php"); 

if($site['videoPlayer'] == 'yt2016') {
    require_once("./2016/index.php");
} elseif($site['videoPlayer'] == 'videotag') {
    require_once("./videotag/index.php");
} else {
    require_once("./2013/index.php");
}
?>

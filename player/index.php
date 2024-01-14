<?php 
include("../assets/mod/branding.php"); 

if($site['videoPlayer'] == 'yt2016') {
    include("./2016/index.php");
} else {
    include("./2013/index.php");
}
?>

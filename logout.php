<?php
include("./assets/mod/db.php");
 session_start();
 unset($_SESSION['']);

 if(session_destroy())
 {
  if(!isset($_GET['url'])) {
    header("Location: /");
  } else {
    header("Location: ".$_GET['url']);
  }
 }
?>
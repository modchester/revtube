<?php
require_once("./assets/mod/db_init.php");
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
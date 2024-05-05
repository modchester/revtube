<?php
// Chester, 2024

if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/assets/mod/db.php')) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/mod/db.php');
} else {
    // It's a <pre> because I wanted to match the failed to connect to the database message.
    die('<pre>Config is missing.</pre>');
}
?>
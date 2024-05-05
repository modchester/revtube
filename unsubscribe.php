<?php require("assets/lib/profile.php"); ?>
<?php require("assets/mod/db_init.php"); ?>
<?php
$name = $_GET['name'];

if(!isset($_SESSION['profileuser3']) || !isset($_GET['name'])) {
    die("You are not logged in or you did not put in an argument");
}

$stmt = $mysqli->prepare("SELECT * FROM subscribers WHERE sender = ? AND receiver = ?");
$stmt->bind_param("ss", $_SESSION['profileuser3'], $name);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) die('You already are not subscribed to this person!');
$stmt->close();

$stmt = $mysqli->prepare("DELETE FROM subscribers WHERE sender = ? AND receiver = ?");
$stmt->bind_param("ss", $_SESSION['profileuser3'], $name);

$stmt->execute();
$stmt->close();

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
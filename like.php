<?php require("assets/lib/profile.php"); ?>
<?php require("assets/mod/db_init.php"); ?>

<?php
$name = $_GET['v'];

if(!isset($_SESSION['profileuser3']) || !isset($_GET['v'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '&err=You must login to like a video.');
    die("You are not logged in or you did not put in an argument");
}

$stmt = $mysqli->prepare("SELECT * FROM likes WHERE sender = ? AND reciever = ? AND type = 'l'");
$stmt->bind_param("ss", $_SESSION['profileuser3'], $name);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 1) {
        removeLike($_SESSION['profileuser3'], $name, $mysqli);
        goto skip;
    }

$stmt = $mysqli->prepare("SELECT * FROM likes WHERE sender = ? AND reciever = ? AND type = 'd'");
$stmt->bind_param("ss", $_SESSION['profileuser3'], $name);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 1) {
        removeLike($_SESSION['profileuser3'], $name, $mysqli);
        goto skip;
    }
$stmt->close();

$stmt = $mysqli->prepare("INSERT INTO likes (sender, reciever, type) VALUES (?, ?, 'l')");
$stmt->bind_param("ss", $_SESSION['profileuser3'], $name);

$stmt->execute();
$stmt->close();

skip:
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
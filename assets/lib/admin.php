<?php
/* admin functions for tictac and other catrilldev projects */
function banUser($username, $mysqli) {
    // $stmt = $mysqli->prepare("UPDATE videos SET privacy = 'private' WHERE author = ?");
    // $stmt->bind_param("s", $username);
    // $stmt->execute();
    // $stmt->close();
    
    $stmt = $mysqli->prepare("UPDATE users SET strikes = '3' WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();

    // $stmt = $mysqli->prepare("UPDATE users SET banreason = ? WHERE username = ?");
    // $stmt->bind_param("ss", $reason, $username);
    // $stmt->execute();
    // $stmt->close();
    
    // $stmt = $mysqli->prepare("UPDATE users SET bantime = now() WHERE username = ?");
    // $stmt->bind_param("s", $username);
    // $stmt->execute();
    // $stmt->close();
}
function unbanUser($username, $mysqli) {
    $stmt = $mysqli->prepare("UPDATE users SET strikes = '2' WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();
}
function verifyUser($username, $mysqli) {
    $stmt = $mysqli->prepare("UPDATE users SET is_verified = '1' WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();
}
function unverifyUser($username, $mysqli) {
    $stmt = $mysqli->prepare("UPDATE users SET is_verified = '0' WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();
}
function makeAdmin($username, $mysqli) {
    $stmt = $mysqli->prepare("UPDATE users SET is_admin = '1' WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();
}
?>
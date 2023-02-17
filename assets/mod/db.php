<?php
    // put your discord webhook here
    $webhook = "";
    
    // debug mode
    $debug = "true";

    $mysqli = new mysqli("localhost", "root", "", "skytube");
    session_start();

    function idFromUser($nameuser){
    	global $mysqli;
    	$uid = 0;
    	$username = $mysqli->escape_string($nameuser);
		$statement = $mysqli->prepare("SELECT `id` FROM `users` WHERE `username` = ?");
		$statement->bind_param("s", $username);
		$statement->execute();
		$result = $statement->get_result();
		while($row = $result->fetch_assoc()){
			$uid = (int)$row["id"];
		}
		$statement->close();
		return $uid;
    }

    function getUserPic($uid){
    	$userpic = (string)$uid;
		if(file_exists("./pfp/".$userpic) !== TRUE){
			$userpic = "default";
		}
		return $userpic;
    }
    
   $loggedIn = isset($_SESSION['profileuser3']);

   if($debug == 'true') {
   //DEBUG ONLY
   $sql = "SELECT COUNT(*) FROM users";
   $result = mysqli_query($mysqli, $sql);
   $usercount = mysqli_fetch_assoc($result)['COUNT(*)'];
   $sql2 = "SELECT COUNT(*) FROM videos";
   $result2 = mysqli_query($mysqli, $sql2);
   $videocount = mysqli_fetch_assoc($result2)['COUNT(*)'];
   $sql3 = "SELECT COUNT(*) FROM comments";
   $result3 = mysqli_query($mysqli, $sql3);
   $commentcount = mysqli_fetch_assoc($result3)['COUNT(*)'];
   $phpver = phpversion();
   echo "<center>DEBUG ONLY <span style='color: red;'>DO NOT USE IN PRODUCTION ENVIRONMENT</span> - Users: $usercount | Videos: $videocount | Comments: $commentcount | Running PHP $phpver </center>";
	//echo '<br>skytube is undergoing some changes please ignore any huge bugs as they most likely will be fixed soon after';
   }
?>

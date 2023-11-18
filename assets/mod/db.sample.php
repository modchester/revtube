<?php
    // put your discord webhook here
    $webhook = "";
    
    // debug mode
    $debug = "true";

    // ffmpeg
    $ffmpeg = 'C:\ffmpeg.exe';
    $ffprobe = 'C:\ffprobe.exe';
    
    $mysqli = new mysqli("localhost", "root", "", "clipit");
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
		if(file_exists("content/pfp/".$userpic) !== TRUE){
			$userpic = "default.png";
		}
		return $userpic;
    }
    
    function getBackground($uid){
      $backg = (string)$uid;
     if(file_exists("content/background/".$backg) !== TRUE){
        $backg = "default";
     }
     return $backg;
   }
    
   $loggedIn = isset($_SESSION['profileuser3']);

   if($debug == 'true') {
   //  Debug mode
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
   $debugmsg = "<center><span style='color: white;'>[DEBUG]</span> Logged in as ".$_SESSION["profileuser3"]." - Users: $usercount | Videos: $videocount | Comments: $commentcount | Running PHP $phpver </center>";
	//echo '<br>revista is undergoing some changes please ignore any huge bugs as they most likely will be fixed soon after';
   }

      // get subs
      function getSubscribers($id, $mysqli) {
         $stmt = $mysqli->prepare("SELECT * FROM subscribers WHERE receiver = ?");
         $stmt->bind_param("s", $id);
         $stmt->execute();
         $result = $stmt->get_result();
         $rows = mysqli_num_rows($result); 
         $stmt->close();
      
         return $rows;
      }
      //idk
      function ifSubscribed($user, $reciever, $mysqli) {
          $stmt = $mysqli->prepare("SELECT * FROM subscribers WHERE sender = ? AND receiver = ?");
          $stmt->bind_param("ss", $user, $reciever);
          $stmt->execute();
      $result = $stmt->get_result();
      $user = $result->fetch_assoc();
      if($result->num_rows === 1) { return true; } else { return false; }
      $stmt->close();
      
      return $user;
      }
?>

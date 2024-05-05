<?php
header("Content-Type:application/json");
if (isset($_GET['username']) && $_GET['username']!="") {
	require_once('../assets/mod/db_init.php');
	$username = $_GET['username'];
	$result = mysqli_query(
	$mysqli,
	"SELECT * FROM `users` WHERE username='$username'");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
    $uuid = $row['id'];
	$strikes = $row['strikes'];
    $joined = $row['date'];
	$description = $row['description'];
	$email = $row['email'];
	response($uuid, $username, $strikes, $joined, $description,$email);
	mysqli_close($mysqli);
	}else{
		response("This user does not exist!", NULL, NULL, NULL, NULL);
		}
}else{
	response(NULL, NULL, 400,"Invalid Request");
	}

function response($uuid, $username, $strikes, $joined, $description,$email){
    $response['uuid'] = $uuid;
	$response['username'] = $username;
	$response['strikes'] = $strikes;
    $response['created'] = $joined;
	$response['description'] = $description;
	$response['email'] = $email;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>
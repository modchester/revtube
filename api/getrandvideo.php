<?php
header("Content-Type:application/json");
if (isset($_GET['return']) && $_GET['return']!="") {
	require_once('../assets/mod/db_init.php');
	$result = mysqli_query(
	$mysqli,
	"SELECT * FROM `videos` ORDER BY RAND() LIMIT 1");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
    $title = htmlspecialchars($row['videotitle']);
	$vid = $row['vid'];
    $description = $row['description'];
	$author = $row['author'];
	$date = $row['date'];
	response($title, $vid, $description, $author, $date);
	mysqli_close($mysqli);
	}else{
		response("This video does not exist!", NULL, NULL, NULL, NULL);
		}
}else{
	response(NULL, NULL, 400,"Invalid Request");
	}

function response($title, $vid, $description, $author, $date){
    $response['title'] = $title;
	$response['video_id'] = $vid;
	$response['description'] = $description;
    $response['uploader'] = $author;
	$response['uploaded_on'] = $date;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>
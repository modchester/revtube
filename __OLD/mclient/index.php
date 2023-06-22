<?php include("header.php"); ?>
<h4>randomly selected video</h4>

<?php
	$url = "http://localhost/api/getrandvideo.php?return=yes";
	
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	
	$result = json_decode($response);
	echo "<a href='watch.php?v=$result->video_id'><img width=128 src='../../content/thumb/$result->video_id.jpg'></a>";
	echo "<table>";
    echo "<tr><td><h4><a href='watch.php?v=$result->video_id'>$result->title</a></h4></td></tr>";
	echo "<tr><td>Video ID:</td><td>$result->video_id</td></tr>";
	echo "<tr><td>Description:</td><td>$result->description</td></tr>";
    echo "<tr><td>Author:</td><td>$result->uploader</td></tr>";
	echo "<tr><td>Uploaded on:</td><td>$result->uploaded_on</td></tr>";
	echo "</table>";
    ?>
    <a href="">Try again</a>
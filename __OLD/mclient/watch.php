<?php include("header.php"); ?>
<form action="" method="POST">
<label>Enter Video ID:</label><br />
<input class="yt-search-input" type="text" name="vid" placeholder="Enter video ID" required/>
<br /><br />
<button class="btn" type="submit" name="submit">Submit</button>
</form>
<?php
if (isset($_GET['v']) && $_GET['v']!="") {
    $vid = $_GET['v'];

	$url = "http://localhost/api/getvideo.php?id=".$vid;
	
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	
	$result = json_decode($response);
	echo "<video width=256 src='../../content/video/$result->video_id.mp4' controls></video>";
	echo "<table>";
    echo "<tr><td><h2>$result->title</h2></td></tr>";
	echo "<tr><td>Video ID:</td><td>$result->video_id</td></tr>";
	echo "<tr><td>Description:</td><td>$result->description</td></tr>";
    echo "<tr><td>Author:</td><td><a href='profile.php?username=$result->uploader'>$result->uploader</a></td></tr>";
	echo "<tr><td>Uploaded on:</td><td>$result->uploaded_on</td></tr>";
	echo "</table>";
}
if (isset($_POST['vid']) && $_POST['vid']!="") {
    $vid = $_POST['vid'];

	$url = "http://localhost/api/getvideo.php?id=".$vid;
	
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	
	$result = json_decode($response);
	echo "<video width=256 src='../../content/video/$result->video_id.mp4' controls></video>";
	echo "<table>";
    echo "<tr><td><h2>$result->title</h2></td></tr>";
	echo "<tr><td>Video ID:</td><td>$result->video_id</td></tr>";
	echo "<tr><td>Description:</td><td>$result->description</td></tr>";
    echo "<tr><td>Author:</td><td>$result->uploader</td></tr>";
	echo "<tr><td>Uploaded on:</td><td>$result->uploaded_on</td></tr>";
	echo "</table>";
}
    ?>
    <h3>Built using clipIt API v0.1
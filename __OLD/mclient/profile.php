<?php include("header.php"); ?>
<form action="" method="POST">
<label>Enter Username:</label><br />
<input type="text" name="username" placeholder="Enter username" required/>
<br /><br />
<button type="submit" name="submit">Submit</button>
</form>
<?php
if (isset($_GET['username']) && $_GET['username']!="") {
$username = $_GET['username'];
$url = "http://localhost/api/getuser.php?username=".$username;
	
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);

$result = json_decode($response);
echo "<img width=256 height=256 src='../../content/pfp/$result->uuid'>";
echo "<table>";
echo "<tr><td>UUID:</td><td>$result->uuid</td></tr>";
echo "<tr><td>Username:</td><td>$result->username</td></tr>";
echo "<tr><td>Strikes:</td><td>$result->strikes</td></tr>";
echo "<tr><td>Joined:</td><td>$result->created</td></tr>";
echo "<tr><td>Bio:</td><td>$result->description</td></tr>";
echo "<tr><td>Email:</td><td>$result->email</td></tr>";
echo "</table>";
}
if (isset($_POST['username']) && $_POST['username']!="") {
	$username = $_POST['username'];
	$url = "http://localhost/api/getuser.php?username=".$username;
	
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	
	$result = json_decode($response);
	echo "<img width=256 height=256 src='../../content/pfp/$result->uuid'>";
	echo "<table>";
    echo "<tr><td>UUID:</td><td>$result->uuid</td></tr>";
	echo "<tr><td>Username:</td><td>$result->username</td></tr>";
	echo "<tr><td>Strikes:</td><td>$result->strikes</td></tr>";
    echo "<tr><td>Joined:</td><td>$result->created</td></tr>";
	echo "<tr><td>Bio:</td><td>$result->description</td></tr>";
	echo "<tr><td>Email:</td><td>$result->email</td></tr>";
	echo "</table>";
}
    ?>
    <h3>Built using clipIt API v0.1
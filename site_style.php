<?php
	// written by skyiebox, 1/14/2023
	if(isset($_POST)) {
		if(isset($_POST['theme'])) {
			setrawcookie("siteTheme", $_POST['theme'], time() + 2000000, "/");
		}
		
		if(isset($_POST['player'])) {
			setrawcookie("videoPlayer", $_POST['player'], time() + 2000000, "/");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include './assets/mod/meta.php';?>      
</head>

  <body>
<?php include './assets/mod/db.php';?>
<?php include './assets/mod/header.php';?>
    <div class="container">
 <div class="content">
        <div class="page-header">
        <?php include './assets/mod/alert.php';?>
          <h1>Change Site Style <small>BETA</small></h1>
        </div>
        <div class="row">
          <div class="span10">
		  <ul class="yt-navigation-dark">
	<a href="/account"><li>Edit Profile</li></a>
	<a href="/account_status"><li>Status</li></a>
	<li class="selected">Style</li>
</ul>

<div class="alert-message info"><p>There settings only apply locally, not site wide.</p></div>
	<form action="" method="POST">
		<h3><i class="bi bi-brush"></i> Site Style</h3>
		<select name="theme">
			<option value="default"> Default</option>
  			<option value="fluent"> Fluent</option>
			<option value="dark"> Dark</option>
		</select>
		<br><br>
		<h3><i class="bi bi-play-btn"></i> Video Player</h3>
		<select name="player">
  			<option value="yt2013"> YouTube (2013)</option>
			<option value="yt2016"> YouTube (2016)</option>
		</select>
		<div class="input-group">
			<br>
			<div><input class="yt-button" type="submit" value="Update" name="submit"></div>
		</div>
	</form>	
</div><div class="span4">
			<h3>Your Account Details</h3>
			<?php
			if(isset($_SESSION['profileuser3'])){
			    $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
			    $statement->bind_param("s", $_SESSION['profileuser3']);
			    $statement->execute();
			    $result = $statement->get_result();
			    if($result->num_rows === 0) exit('No rows');
			    while($row = $result->fetch_assoc()) {
					$rows = getSubscribers($_SESSION['profileuser3'], $mysqli);
			        echo "
			        <div class=\"user-info\">
				        <a href=\"./profile?user=".$row["username"]."\"><img width=\"225px\" height=\"225px\" src=\"/content/pfp/".getUserPic($row["id"])."\"></a>
				        <div class=\"user-stats\">
					        <div class=\"username\"><a href=\"./profile?user=".$row["username"]."\">".$row["username"]."</a></div>
					        <div><span class=\"subscribers black\">".$rows."</span> subscribers</div>
					        <div>Your E-mail: <span class=\"black\">".$row["email"]."</span></div>
					        <div>Joined: <span class=\"black\">".$row["date"]."</span></div>
				        </div>
			        </div>
			        <hr>
			        <h3>Your Current Description</h3>
			        <textarea class=\"current-description\" readonly>".$row["description"]."</textarea>";
			    }
			    $statement->close();
			}
			?>
            </div>
        </div>
      </div>

    </div> <!-- /container -->

  </body>
</html>
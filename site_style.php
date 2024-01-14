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

	$theme = ucfirst($_COOKIE['siteTheme']) ?? 'Default';
	$videoPlayer = $_COOKIE['videoPlayer'] ?? 'yt2013';

	if($videoPlayer == 'yt2016') {
		$videoPlayer = 'YouTube (2016)';
	} elseif($videoPlayer == 'videotag') {
		$videoPlayer = 'Browser Default';
	} else {
		$videoPlayer = 'YouTube (2013)';
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
			<option value="videotag"> Browser Default </option>
		</select>
		<div class="input-group">
			<br>
			<div><input class="yt-button" type="submit" value="Update" name="submit"></div>
		</div>
	</form>	
</div><div class="span4">
			<h3>Selected Options</h3>
			<p><i class="bi bi-brush"></i> Site Style</p>
			<input type="text" disabled value="<?php echo htmlspecialchars($theme); ?>">
			<br><br>
			<p><i class="bi bi-play-btn"></i> Video Player</p>
			<input type="text" disabled value="<?php echo htmlspecialchars($videoPlayer); ?>">

            </div>
        </div>
      </div>

    </div> <!-- /container -->

  </body>
</html>
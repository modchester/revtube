<!DOCTYPE html>
<html lang="en">
  <head>
  <?php 
  require_once './assets/mod/meta.php';
   ?>   
</head>

  <body>
<?php require_once './assets/mod/db.php';?>
<?php require_once './assets/mod/header.php';?>
    <div class="container">
 <div class="content">
        <div class="page-header">
        <?php require_once './assets/mod/alert.php';?>
          <h1>Manage Your Account <small>BETA</small></h1>
        </div>
        <div class="row">
          <div class="span10">
		  <ul class="yt-navigation-dark">
	<?php if(isset($_SESSION['profileuser3'])) { ?>
	<li class="selected">Edit Profile</li>
	<a href="/account_status"><li>Status</li></a>
	<?php } ?>
	<a href="/customize"><li>Customize</li></a>
</ul>
		    <h3>Edit your settings</h3>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="input-group">
				    <label for="new_pic">Set a new picture: </label>
				    <input type="file" name="new_pic" id="new_pic">
				</div>
				<div class="input-group">
				    <label for="new_bck">Profile background: </label>
				    <input type="file" name="new_bck" id="new_bck">
				</div>
				<div class="input-group">
				    <label for="description">Bio: </label>
				    <textarea class="yt-search-input" name="description" rows="4" cols="50"></textarea>
				</div>
			<?php
			if(isset($_SESSION['profileuser3'])){
			    $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
			    $statement->bind_param("s", $_SESSION['profileuser3']);
			    $statement->execute();
			    $result = $statement->get_result();
			    if($result->num_rows === 0) errorPage(404, 404);
			    while($row = $result->fetch_assoc()) { ?>
				
				<?php if($row['is_verified'] == 1) { ?>
				<div class="input-group">
				    <label for="css">Custom CSS: </label>
				    <textarea class="yt-search-input" name="css" rows="4" cols="50"><?php echo $row['custom_css']; ?></textarea>
				</div>
				
			    <?php } }
			    $statement->close();
			}
			?>
			
				<div class="input-group">
					<div></div>
					<div><input style="float:right;margin-right:159px;" class="yt-button" type="submit" value="Update" name="submit"></div>
				</div>
				<div class="input-group">
					<div></div>
					<div class="red">
						<?php
				if (isset($_POST["submit"])){
					if(isset($_FILES["new_pic"]) && is_uploaded_file($_FILES["new_pic"]["tmp_name"])){
						$supportedFormats = [
							"image/jpeg",
							"image/png",
							"image/gif",
						];
					    $uid = 0;
					    try{
					    	$uid = idFromUser($_SESSION["profileuser3"]);
						    $target_file = "./content/pfp/".$uid;
						    $supported = false;
						    foreach($supportedFormats as $value){
						    	if($value === mime_content_type($_FILES["new_pic"]["tmp_name"])){
						    		$supported = true;
						    	}
						    }
						    if($supported === true && $_FILES["new_pic"]["size"] < 5000000){
						    	file_put_contents($target_file, file_get_contents($_FILES["new_pic"]["tmp_name"]));
						    }
						    else{
						    	if(!$supported){
						    		echo "Image not supported (jpg, png or gif)";
						    	}
						    	else{
							    	echo "Image is too large";
						    	}
						    }
					    }
					    catch(Exception $e){
					    	echo "Something happened: ".$e;
					    }
					}
					if(isset($_FILES["new_bck"]) && is_uploaded_file($_FILES["new_bck"]["tmp_name"])){
						$supportedFormats = [
							"image/jpeg",
							"image/png",
							"image/gif",
						];
					    $uid = 0;
					    try{
					    	$uid = idFromUser($_SESSION["profileuser3"]);
						    $target_file = "./content/background/".$uid;
						    $supported = false;
						    foreach($supportedFormats as $value){
						    	if($value === mime_content_type($_FILES["new_bck"]["tmp_name"])){
						    		$supported = true;
						    	}
						    }
						    if($supported === true && $_FILES["new_bck"]["size"] < 5000000){
						    	file_put_contents($target_file, file_get_contents($_FILES["new_bck"]["tmp_name"]));
						    }
						    else{
						    	if(!$supported){
						    		echo "Image not supported (jpg, png or gif)";
						    	}
						    	else{
							    	echo "Image is too large";
						    	}
						    }
					    }
					    catch(Exception $e){
					    	echo "Something happened: ".$e;
					    }
					}
					if(!empty($_POST['description'])){
						$statement = $mysqli->prepare("UPDATE `users` SET `description` = ? WHERE `username` = '" . $_SESSION["profileuser3"] . "'");
					    $statement->bind_param("s", $description);
					    $description = str_replace(PHP_EOL, "<br>", htmlspecialchars($_POST['description']));
					    $statement->execute();
					    $statement->close();
					}
					
					if(isset($_POST['css'])) {
						if(isset($_SESSION['profileuser3'])) {
			   				$statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
			    			$statement->bind_param("s", $_SESSION['profileuser3']);
			    			$statement->execute();
			    			$result = $statement->get_result();
			    			if($result->num_rows === 0) errorPage(404, 404);
			    			while($row = $result->fetch_assoc()) {
								
								if($row['is_verified'] == 1) {
									$statement = $mysqli->prepare("UPDATE `users` SET `custom_css` = ? WHERE `username` = '" . $_SESSION["profileuser3"] . "'");
					    			$statement->bind_param("s", $_POST['css']);
					    			$statement->execute();
					    			$statement->close();
								}
					}	
				} } }
			?></div></div></div><div class="span4">
						<?php require_once("./assets/mod/account_settings_card.php"); ?>

            </div>
        </div>
      </div>

    </div> <!-- /container -->

  </body>
</html>
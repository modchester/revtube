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
		<?php
			if(isset($_SESSION['profileuser3'])){
			    $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
			    $statement->bind_param("s", $_SESSION['profileuser3']);
			    $statement->execute();
			    $result = $statement->get_result();
			    if($result->num_rows === 0) exit('No rows');
			    while($row = $result->fetch_assoc()) {
					if($row['strikes'] == 0) {
						$strikenum = 0;
						$strikestyle = "color: green; font-weight: bold;";
						$msg = "You are <b>eligible</b> to apply for the Partner Program!<br><br><a id='partnerButton' href='#' onclick='applyPartner();' style='width: 280px; text-align: center;' class='yt-button'>Apply</a>";
						$etc = "strikes";
						$icon = '<i style="color: #008008" class="bi bi-check-circle-fill"></i>';
						$standing = " <span style='".$strikestyle."'>Good standing</span>";
					}
					if($row['strikes'] == 1) {
						$strikenum = 1;
						$strikestyle = "color: orange; font-weight: bold;";
						$msg = "You are <b>eligible</b> to apply for the Partner Program!<br><br><a id='partnerButton' href='#' onclick='applyPartner();' style='width: 280px; text-align: center;' class='yt-button'>Apply</a>";
						$etc = "strike";
						$icon = '<i style="color: orange" class="bi bi-exclamation-circle-fill"></i>';
						$standing = " <span style='".$strikestyle."'>Middling standing</span>";
					}
					if($row['strikes'] == 2) {
						$strikenum = 2;
						$strikestyle = "color: red; font-weight: bold;";
						$msg = "You are <b>NOT</b> eligible to apply for the Partner Program.";
						$etc = "strikes";
						$icon = '<i style="color: red" class="bi bi-dash-circle-fill"></i>';
						$standing = " <span style='".$strikestyle."'>Bad standing</span>";
					}
					if($row['strikes'] > 3) {
						$strikenum = number_format($row['strikes']);
						$strikestyle = "color: red; font-weight: bold;";
						$msg = "Your account has been terminated.";
						$etc = "strikes";
						$icon = '<i style="color: red" class="bi bi-dash-circle-fill"></i>';
						$standing = " <span style='".$strikestyle."'>Bad standing</span>";
					}
			    }
$strike = 'You currently have <span style="'.$strikestyle.'">'.$strikenum.' '.$etc.'</span><h3>Partner Program</h3>'.$msg.'';
			}
			?>
          <h1>Account Status <?php echo $icon; ?><!--<small>BETA</small>--></h1>
        </div>
        <div class="row">
          <div class="span10">
		  <ul class="yt-navigation-dark">
	<a href="/account"><li>Edit Profile</li></a>
	<li class="selected">Status</li>
	<a href="/site_style"><li>Style</li></a>
</ul>
		    <h3>Account Status</h3>
			Community guidelines: <?php echo $icon; ?> <?php echo $standing;?><br>
<?php echo $strike; ?>
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
					        <div class=\"username\"><a href=\"./profile?user=".htmlspecialchars($row["username"])."\">".htmlspecialchars($row["username"])."</a></div>
					        <div><span class=\"subscribers black\">".$rows."</span> subscribers</div>
					        <div>Your E-mail: <span class=\"black\">".htmlspecialchars($row["email"])."</span></div>
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
		<script>
			function applyPartner() {
				var partnerButton = document.getElementById('partnerButton');
				alert('Soon.');

				// thing to do when the application is sent (which we will do later) - skyiebox
				partnerButton.innerHTML = 'Applied';
				partnerButton.onclick = '';
				partnerButton.setAttribute('disabled', true);
			}
		</script>
  </body>
</html>
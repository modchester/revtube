<!DOCTYPE html>
<html lang="en">
  <head>
  <?php 
  include './assets/mod/meta.php';
   ?>   
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
			    if($result->num_rows === 0) errorPage(404, 404);
			    while($row = $result->fetch_assoc()) {
					if($row['strikes'] == 0) {
						$strikenum = 0;
						$strikestyle = "color: green; font-weight: bold;";
						$msg = "You are <b>eligible</b> to apply for the Partner Program!";
						$etc = "strikes";
						$icon = '<i style="color: #008008" class="bi bi-check-circle-fill"></i>';
						$standing = " <span style='".$strikestyle."'>Good standing</span>";
						$canApply = true;
					}
					if($row['strikes'] == 1) {
						$strikenum = 1;
						$strikestyle = "color: orange; font-weight: bold;";
						$msg = "You are <b>eligible</b> to apply for the Partner Program!";
						$etc = "strike";
						$icon = '<i style="color: orange" class="bi bi-exclamation-circle-fill"></i>';
						$standing = " <span style='".$strikestyle."'>Middling standing</span>";
						$canApply = true;
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
	<?php if(isset($_SESSION['profileuser3'])) { ?>
	<a href="/account"><li>Edit Profile</li></a>
	<li class="selected">Status</li>
	<?php } ?>
	<a href="/customize"><li>Customize</li></a>
</ul>
		    <h3>Account Status</h3>
			Community guidelines: <?php echo $icon; ?> <?php echo $standing;?><br>
<?php echo $strike; ?>

<?php if($canApply) { ?>
	<?php
		// temp
		$partnerStatus = 'not_sent'; // not_sent, not_reviewed, denied, accepted

		if($partnerStatus == 'denied') {
			$partnerText = '<p>Your partner application has been <b style="color: red;">denied</b>.</p>';
			$alreadyApplied = true;
		} elseif($partnerStatus == 'accepted') { 
			$partnerText = '<p>Your partner application has been <b style="color: #008008;">accepted</b>!</p>';
			$alreadyApplied = true;
		} elseif($partnerStatus == 'not_reviewed') {
			$partnerText = '<p>Your partner application has not been reviewed yet.</p>';
			$alreadyApplied = true;
		} else {
			$partnerText = "<p>You haven't sent a partner application.</p>";
			$alreadyApplied = false;
		}
	?>

	<br><br>
	<?php echo $partnerText; ?>
	<a id='partnerButton' href='#' <?php if(!$alreadyApplied) { ?>onclick='applyPartner();'<?php } ?> style='width: 280px; text-align: center;' <?php if($alreadyApplied) { ?>disabled<?php } ?> class='yt-button'><?php if(!$alreadyApplied) { ?>Apply<?php } else { ?>Applied<?php } ?></a>
<?php } ?>
				</div><div class="span4">
			<?php include("./assets/mod/account_settings_card.php"); ?>
            </div>
        </div>
      </div>

    </div> <!-- /container -->
		<script>
			<?php if(!$alreadyApplied) { ?>
			function applyPartner() {
				var partnerButton = document.getElementById('partnerButton');
				alert('Soon.');

				// thing to do when the application is sent (which we will do later) - skyiebox/cattskit
				partnerButton.innerHTML = 'Applied';
				partnerButton.onclick = '';
				partnerButton.setAttribute('disabled', true);
			}
			<?php } ?>
		</script>
  </body>
</html>
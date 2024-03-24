<?php 
if(!isset($noGuide)) {

require_once("branding.php"); 

if(isset($_SESSION['profileuser3'])) {
  require_once("signed_in_guide.php");
} else {
?>
<div class="guide">
    <ul>
        <a href="/"><li class="guide-item"><i class="bi bi-house-door-fill"></i> Home</li></a>    
        <!--<span>Most of <?php echo $site['name']; ?></span>-->
        <a href="/videos"><li class="guide-item"><i class="bi bi-camera-video-fill"></i> Videos</li></a>
        <a href="/explore"><li class="guide-item"><i class="bi bi-compass-fill"></i> Explore</li></a>
    <?php
      if(isset($_SESSION['profileuser3'])) {
        $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
			    $statement->bind_param("s", $_SESSION['profileuser3']);
			    $statement->execute();
			    $result = $statement->get_result();
			    if($result->num_rows === 0) errorPage(404, 404);
			    while($row = $result->fetch_assoc()) {
			        echo '<hr>
                    <span>My channel</span>
                        <a href="/account"><li class="guide-item"><i class="bi bi-gear-fill"></i> Settings</li></a>
                        <a href="/upload"><li class="guide-item"><i class="bi bi-file-earmark-arrow-up-fill"></i> Upload</li></a>
                        <a href="/inbox/index"><li class="guide-item"><i class="bi bi-envelope-fill"></i> Inbox</li></a>
                        <!--<a href="/account_status"><li class="guide-item"><i class="bi bi-activity"></i> Account Status</li></a>-->';
			    }
			    $statement->close();
      }
    ?>
   <?php require_once("getsubs.php"); ?><hr>
        <a href="//discord.gg/GbbQBsWXPK"><li class="guide-item"><i class="bi bi-discord"></i> Discord</li></a>
        <a href="/channels"><li class="guide-item"><i class="bi bi-plus-circle-fill"></i> Browse channels</li></a>
        <?php if(!isset($_SESSION['profileuser3'])) {
        echo '
        <div class="sign-in-box">
          Sign in now to see your channels and recommendations!

        <br><br>
          <a class="yt-button primary" href="/login">Sign in ›</a>
        </div>';
      } ?>
    </ul>
</div>
<?php } } ?>
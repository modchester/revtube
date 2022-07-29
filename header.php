    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand logost" href="./index.php"><!--<strong>RevTube</strong>--><img src="./assets/revtubenavbar.png" height="23px" width="69px"></a>
          <ul class="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="videos.php">Videos</a></li>
            <li><a href="channels.php">Channels</a></li>
            <li><a href="community.php">Community</a></li>
            <li><a href="upload.php">Upload</a></li>
          </ul>
          	<?php
      if(!$loggedIn) {
        echo '<ul class="nav secondary-nav"><li><strong><a class="yt-button dark" href="aregister.php">Sign Up</a></li> <li><a class="yt-button dark" href="alogin.php">Login</a></strong></li></ul>';
      } else {
        $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
			    $statement->bind_param("s", $_SESSION['profileuser3']);
			    $statement->execute();
			    $result = $statement->get_result();
			    if($result->num_rows === 0) exit('No rows');
			    while($row = $result->fetch_assoc()) {
			        echo "<ul class=\"nav secondary-nav\">
            <li class=\"dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\">".$row["username"]."</a>
              <ul class=\"dropdown-menu\">
                <li><a href=\"./profile.php?id=".$row["id"]."\">Your Channel</a></li>
                <li><a href=\"settings.php\">Account Settings</a></li>
                <li class=\"divider\"></li>
                <li><a href=\"#\">Logout ".$row["username"]."</a></li>
              </ul>
            </li>
          </ul><!--<br><div style=\"color: white\" class=\"pull-right\"><strong><a href=\"./profile.php?id=".$row["id"]."\">".$row["username"]."</a></strong> - <a href=\"./account.php\">Manage Account</a> - <a href=\"./alogout.php\">Logout</a></div>-->";
			    }
			    $statement->close();
      }
    ?>
    <script type="text/javascript" src="bootstrap-dropdown.js"></script>
          <!--<form action="" class="pull-right">
            <input class="input-small" type="text" placeholder="Username">
            <input class="input-small" type="email" placeholder="Email">
            <input class="input-small" type="password" placeholder="Password">
            <button class="btn" type="submit">login</button>-->
          </form>
        </div>
      </div>
    </div>
    <script>
   $(function(){
      $('#topbar').dropdown()
   }); 
</script>
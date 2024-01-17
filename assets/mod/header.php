<!-- <div class="gbar">
  test
</div> -->
<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>
<div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand logost" href="/"><strong><?php echo $site['name']; ?></strong></a>
         <!-- <ul class="nav">
            <li><a href="/">Home</a></li>
            <li><a href="/videos">Videos</a></li>
            <li><a href="/channels">Channels</a></li>
            <li><a href="/explore">Explore</a></li>
           <!- <li><a href="/upload">Upload</a></li> ->
          </ul>-->
          <form class="pull-left" action="results">
            <input name="q" type="text" placeholder="Search">
            <button type="submit" class="yt-button searchbtn"><i class="bi bi-search"></i></button>
          </form>
          <?php if($loggedIn) { ?>
          <div class="yt-button-group upload-group">
	          <a class="pull-left uploadbtn yt-button" href="upload">Upload</a>
            <li class="dropdown" data-dropdown="dropdown">
              <a href="#" class="dropdown-toggle pull-left uploadbtn yt-button"><i class="bi bi-caret-down-fill"></i></a>
              <ul class="dropdown-menu">
                <li><a href="/my_videos">My Videos</a></li>
                <li><a href="/profile?user=<?php echo htmlspecialchars($_SESSION['profileuser3']); ?>">My Channel</a></li>
                <li><a href="/account">My Account</a></li>

              </ul>
            </li>

          </div>
          <?php } else { ?>
            <a class="pull-left uploadbtn yt-button" href="upload">Upload</a>
          <?php } ?>
          	<?php
      if(!$loggedIn) {
        echo '<ul class="nav secondary-nav"><li><a class="nav-buttons yt-button primary" href="/login">Sign in</a></li></ul>';
      } else {
        $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
			    $statement->bind_param("s", $_SESSION['profileuser3']);
			    $statement->execute();
			    $result = $statement->get_result();
			    if($result->num_rows === 0) exit('No rows');
			    while($row = $result->fetch_assoc()) {
             if($row['strikes'] > 3) {
               echo('<script>window.location.href = "/logout?url=/?err=Your account has been terminated for a violation of '.$site['name'].'\'s Community Guidelines.";</script>');
             }
            if ($row["is_admin"] == 1) {
              $adminlink = "<li><a href=\"admin\">Admin Panel</a></li>";
            } else {
              $adminlink = "";
            }
			        echo "<ul class=\"nav secondary-nav\">
            <li class=\"dropdown\" data-dropdown=\"dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\">".htmlspecialchars($row["username"])." <img style='margin-top: -7px; vertical-align: middle;' height='32px' width='32px' src='/content/pfp/".getUserPic($row["id"])."'></a>
              <ul class=\"dropdown-menu dropdown-menu-profile\">
              <li></li>
                <li><a href=\"./profile?user=".htmlspecialchars($row["username"])."\">Your Channel</a></li>
                <!--<li><a href=\"upload\">Upload</a></li>-->
                <li><a href='my_videos'>Studio</a></li>
                <li class=\"divider\"></li>
                <li><a href=\"account\">Settings</a></li>
                ".$adminlink."
                <li><a href=\"logout?url=".htmlspecialchars($_SERVER['REQUEST_URI'])."\">Logout ".htmlspecialchars($row["username"])."</a></li>
              </ul>
            </li>
          </ul><!--<br><div style=\"color: white\" class=\"pull-right\"><strong><a href=\"./profile?id=".$row["id"]."\">".htmlspecialchars($row["username"])."</a></strong> - <a href=\"./account\">Manage Account</a> - <a href=\"./alogout\">Logout</a></div>-->";
			    }
			    $statement->close();
      }
    ?>
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
   $(function dropdown(){
      $('#topbar').dropdown()
   }); 
</script>
<!-- <div class="stickybanner">clipIt will</div> -->
<!-- guide -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/mod/guide.php';?>
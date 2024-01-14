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
          <a class="brand logost" href="/"><!--<strong><?php echo $site['name']; ?></strong>--></a>
          <ul class="nav">
            <li><a href="/">Home</a></li>
            <li><a href="/videos">Videos</a></li>
            <li><a href="/channels">Channels</a></li>
            <li><a href="/explore">Explore</a></li>
           <!-- <li><a href="/upload">Upload</a></li> -->
          </ul>
          <form class="pull-left" action="results">
            <input name="q" type="text" placeholder="Search">
            <button type="submit" class="yt-button searchbtn"><i class="bi bi-search"></i></button>
          </form>
          <a class="pull-left uploadbtn yt-button" href="upload">Upload</a>
          	<?php
      if(!$loggedIn) {
        echo '<ul class="nav secondary-nav"><li><a class="nav-buttons yt-button primary" href="/alogin">Sign in</a></li><li><a class="nav-buttons yt-button primary" href="/aregister">Register</a></li></ul>';
      } else {
        $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
			    $statement->bind_param("s", $_SESSION['profileuser3']);
			    $statement->execute();
			    $result = $statement->get_result();
			    if($result->num_rows === 0) exit('No rows');
			    while($row = $result->fetch_assoc()) {
             if($row['strikes'] == 3) {
               echo('<script>window.location.href = "logout";</script>');
     } else {
       echo "";
     }
            if ($row["is_admin"] == 1) {
              $adminlink = "<li><a href=\"admin\">Admin Panel</a></li>";
            } else {
              $adminlink = "";
            }
			        echo "<ul class=\"nav secondary-nav\">
            <li class=\"dropdown\" data-dropdown=\"dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\">".$row["username"]." <img style='margin-bottom:-2px;' height='12px' width='12px' src='/content/pfp/".getUserPic($row["id"])."'></a>
              <ul class=\"dropdown-menu\">
              <li></li>
                <li><a href=\"./profile?user=".$row["username"]."\">Your Channel</a></li>
                <!--<li><a href=\"upload\">Upload</a></li>-->
                <li><a href='my_videos'>Studio</a></li>
                <li class=\"divider\"></li>
                <li><a href=\"account\">Settings</a></li>
                ".$adminlink."
                <li><a href=\"logout\">Logout ".$row["username"]."</a></li>
              </ul>
            </li>
          </ul><!--<br><div style=\"color: white\" class=\"pull-right\"><strong><a href=\"./profile?id=".$row["id"]."\">".$row["username"]."</a></strong> - <a href=\"./account\">Manage Account</a> - <a href=\"./alogout\">Logout</a></div>-->";
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
<div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand logost" href="/"><strong>Catmail</strong></a>
          <ul class="nav">
            <li><a href="/">Home</a></li>
            <li><a href="/inbox/index">Inbox</a></li>
            <li><a href="/inbox/contacts">Contacts</a></li>
           <!-- <li><a href="/upload">Upload</a></li> -->
          </ul>
          	<?php
      if(!$loggedIn) {
        echo '<ul class="nav secondary-nav"><li><a class="nav-buttons yt-button primary" href="/alogin">Sign in</a></li></ul>';
      } else {
        $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
			    $statement->bind_param("s", $_SESSION['profileuser3']);
			    $statement->execute();
			    $result = $statement->get_result();
			    if($result->num_rows === 0) exit('No rows');
			    while($row = $result->fetch_assoc()) {
			        echo "<ul class=\"nav secondary-nav\">
            <li class=\"dropdown\" data-dropdown=\"dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\">".$row["username"]."</a>
              <ul class=\"dropdown-menu\">
              <li></li>
                <li><a href=\"../\">Back to clipIt</a></li>
                <li class=\"divider\"></li>
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
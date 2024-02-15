<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include './assets/mod/meta.php';?>      
</head>

  <body>
<?php include './assets/mod/db.php';?>
<?php include './assets/mod/header.php';?>
<?php 
            $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
            $statement->bind_param("s", $_GET['user']);
            $statement->execute();
            $result = $statement->get_result();
            while($row = $result->fetch_assoc()) {
                if ($row['strikes'] > 3) {
                  echo('<script>
             window.location.href = "/?err=This account has been terminated for a violation of '.$site['name'].'\'s Community Guidelines.";
             </script>');
                  }
            }
            $statement->close();
        ?>
<style>
            body {
                background: url('/content/background/<?php $id = idFromUser($_GET['user']); echo getBackground($id);?>') !important;
            }
            
            #editprof-container {
              text-align: center;
              margin: 0 auto;
            }
            </style>
    <div class="container">
 <div class="content">
        <div class="page-header">
        <?php include './assets/mod/alert.php';?>
          <h1>Channel <small><div id="clockbox"></div></small></h1>
          <?php include './assets/mod/todaysdate.php'; ?>
        </div>
        <div class="row">
          <div class="span10">
        <div class="container-flex">
            <div class="col-2-3">
              <!-- <img class="profilebanner" src="content/banners/default.png"> -->
              <ul class="yt-tabs" data-tabs="tabs">
  <li><a href="profile?user=<?php echo htmlspecialchars($_GET['user']); ?>">Home</a></li>
  <li><a href="all_videos?user=<?php echo htmlspecialchars($_GET['user']); ?>">All Videos</a></li>
  <li class="active"><a href="subscribers?user=<?php echo htmlspecialchars($_GET['user']); ?>">Subscribers</a></li>
  <li><a href="subscriptions?user=<?php echo htmlspecialchars($_GET['user']); ?>">Subscriptions</a></li>
  <li><a href="community?user=<?php echo htmlspecialchars($_GET['user']); ?>">Community</a></li>
</ul>
                <?php
                    $statement = $mysqli->prepare("SELECT `username`, `id` FROM `users` WHERE `username` = ? LIMIT 1");
                    $statement->bind_param("s", $_GET['user']);
                    $statement->execute();
                    $result = $statement->get_result();
                    while($row = $result->fetch_assoc()) {
                     /*   $finalstring = "<h2>".$row['username']."</h2>
                       <!-- <img style=\"width:128px;\" src=\"pfp/".getUserPic($row["id"])."\">
                        <div class=\"user-info\"> -->
                            <!--<div class=\"user-name\"><a href=\"profile.php?id=".$row["id"]."\">".$row["username"]."</a></div>-->
                            <div><h3><span class=\"black\">".$row["subscribers"]."</span> subscribers</h3></div>";
                            if($_SESSION["subscribedto".$row["id"]] === false) {
                                $finalstring .= "<div><a class\"btn danger\" href=\"subscribe.php?id=".$row["id"]."&u=0\"><!--<img src=\"buttonsub.png\">-->SUBSCRIBE</a></div>";
                            }
                            else{
                                $finalstring .= "<div><a class\"btn danger\"href=\"subscribe.php?id=".$row["id"]."&u=1\"><!--<img src=\"buttonunsub.png\">-->UNSUBSCRIBE</a></div>";
                            }
                                            if ($row['verified'] == 'TRUE') {
                    echo "
                <span class=\"label success\">Verified</span>
                "; 
                } */
                     //   $finalstring .= "</div>";

                       // echo $finalstring;
                        $username = $row["username"];
                    }
                    $statement = $mysqli->prepare("SELECT * FROM subscribers WHERE receiver = ?");
                    $statement->bind_param("s", $_GET['user']);
                    $statement->execute();
                    $result = $statement->get_result();
                    echo "<h3>".htmlspecialchars($_GET['user'])."'s subscribers</h3>";
                    if($result->num_rows !== 0){
                    while($row = $result->fetch_assoc()) {
                        $pid = idFromUser($row['sender']);
                        $rows = getSubscribers($row['sender'], $mysqli);
                        $name = htmlspecialchars($row['sender']);
                        echo "<div class='user'>
				    	<div class='user-info'>
						    <div><a href='./profile?user=".$name."'><img class='cmn' height='34px' width='34px' style='padding-right:2px;' src='content/pfp/".getUserPic($pid). "'> <b>".$name."</b></a> (".$rows." subscribers)</div>
						    <!-- <div><span class='black'>".$rows."</span> subscribers</div> -->
					    </div>
					  <!-- <div><a href='./profile?user=".htmlspecialchars($name)."'><img class='cmn' height='34px' width='34px' src='content/pfp/".getUserPic($pid)."'></a></div> -->
				    </div>
				    <hr>";
                    }
                    }
                    else{
                        echo("This user has no subscribers.");
                    }
                    $statement->close();
                ?>
            </div>
        </div>
          </div>
          <div class="span4">
          <?php
                $statement = $mysqli->prepare("SELECT * FROM `users` WHERE `username` = ? LIMIT 1");
                $statement->bind_param("s", $_GET['user']);
                $statement->execute();
                $result = $statement->get_result();
                while($row = $result->fetch_assoc()) {
                  $pfp = idFromUser($_GET['user']);
                  $rows = getSubscribers($_GET['user'], $mysqli);
                  if($row['is_admin'] == 1) {
                    $staff = '<i class="bi bi-shield-fill"></i>';
                  } else {
                    $staff = '';
                  }
                  if($row['is_verified'] == 1) {
                    if(!empty($row['custom_css'])) {
                      $customCSS = '<style>'.$row['custom_css'].'</style>';
                      echo $customCSS;
                    }

                    $verified = '<img style="margin-bottom:-3px;" height="24px" src="/assets/img/verified_dark.png">';
                  } else {
                    $verified = '';
                  }
                  echo('
            <h3><h2>'.htmlspecialchars($row["username"]).' '.$staff.' '.$verified.'</h2></h3>
            <img id="prfp" style="height:225px;width:225px;" src="/content/pfp/' .getUserPic($pfp). '">
            '); 
      if(isset($_SESSION['profileuser3'])) {
        if($row['username'] == $_SESSION['profileuser3']) {
          echo '
          <div id="editprof-container"><a href="/account" id="editprof" class="yt-button primary" type="button">Manage Account</a></div>';
      } else {
          if(ifSubscribed($_SESSION['profileuser3'], $row['username'], $mysqli) == false) {
         echo '
         <a class="yt-button danger" href="/subscribe?name=' . htmlspecialchars($row['username']) . '">Subscribe ('.$rows.')</a>
         ';
         } else { 
          echo '
          <a class="yt-button" href="/unsubscribe?name=' . htmlspecialchars($row['username']) . '">Unsubscribe ('.$rows.')</a>
      ';
           }}
          } else {
              echo'
              <a class="yt-button danger disabled">Subscribe ('.$rows.')</a>
          ';
          }
        }
      //}}
            echo '';
            ?>
            <hr>
            <?php 
            // this doesnt work because i forgot views have their own table not including author names
            // never mind i fixed
            $statement = $mysqli->prepare("SELECT SUM(views) AS total FROM videos WHERE author = ?");
            $statement->bind_param("s", $_GET['user']);
            $statement->execute();
            $result = $statement->get_result();
            if($result->num_rows == 0) {
                $totalviews = 0;
            }
            while($row = $result->fetch_assoc()) {
            $totalviews = $row["total"];
            }
            // can still use basically the same thing for video count
            //  $statement = $mysqli->prepare("SELECT vid, count(*) as author FROM videos WHERE author = ? GROUP BY vid");
            //  $statement->bind_param("i", $_GET['user']);
            //  $statement->execute();
            //  $totalviews = $statement->fetch();
            //  $statement->close();
            ?>
             <?php 
            // omg
            $statement = $mysqli->prepare("SELECT * FROM videos WHERE author = ?");
            $statement->bind_param("s", $_GET['user']);
            $statement->execute();
            $result = $statement->get_result();
            if($result->num_rows == 0) {
              $totalviews = 0;
          }
          ?>
            <h3>Bio</h3>
                            <?php
                $statement = $mysqli->prepare("SELECT `description`, `date` FROM `users` WHERE `username` = ? LIMIT 1");
                $statement->bind_param("s", $_GET['user']);
                $statement->execute();
                $result = $statement->get_result();
                while($row = $result->fetch_assoc()) {
                  $join = strtotime($row["date"]);
                  $join2 = date('F d, Y',$join);
                    echo "<div class='card message'>
                    ".htmlspecialchars($row["description"])."
                    </div>
                    <hr>
                    <h3>Statistics</h3>
                    <div class='card message'>
                    <span class='stat'>".$rows."</span> subscribers
                    <br>
                    <span class='stat'>".$totalviews."</span> views
                    <br>
                    <span style='display:inline-block;float:right !important;'>Joined ".$join2."</span>
                    ";
                }
                $statement->close();
                ?>
            <!--<input class="input" type="text" placeholder="Username">
            <br>
            <input class="input" type="password" placeholder="Password">
            <br>
            <button class="btn" type="submit">login</button>-->
          </div>
        </div>
      </div>

    </div></div> <!-- /container -->
    <?php include './assets/mod/footer.php'; ?>
  </body>
</html>

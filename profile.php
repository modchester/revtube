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
          <h1>Channel <small><div id="clockbox"></div></small></h1>
          <?php include './assets/mod/todaysdate.php'; ?>
        </div>
        <div class="row">
          <div class="span10">
        <div class="container-flex">
            <div class="col-2-3">
              <img class="profilebanner" src="content/banners/default.png">
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
                    $statement = $mysqli->prepare("SELECT * FROM `videos` WHERE `author` = ?");
                    $statement->bind_param("s", $username);
                    $statement->execute();
                    $result = $statement->get_result();
                    echo "<h3>Videos</h3>";
                    if($result->num_rows !== 0){
                      include("assets/lib/profile.php");
                    while($row = $result->fetch_assoc()) {
                      $likec = getLikes($row['vid'], $mysqli);
    $dislikec = getDislikes($row['vid'], $mysqli);
    $views = getViews($row['vid'], $mysqli); 
                        echo '
                        <div class="video container-flex">
                                <div class="col-1-3 video-thumbnail">
                                <a href="/watch?v='.$row['vid'].'">
                                    <video>
                                        <source src="/content/video/'.$row['filename'].'" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video> 
                                </a>
                                </div>
                                <div class="col-1-3 video-title"><a href="/watch?v='.$row['vid'].'"><b>'.$row['videotitle'].'</b></a></div>
                                <div class="col-1-3 video-info">
                                    <div>'.$views.' views &bull; <i class="bi bi-hand-thumbs-up-fill"></i> '.$likec.' <i class="bi bi-hand-thumbs-down-fill"></i> '.$dislikec.'</div>
                                    <div><em>'.$row['description'].'</em></div>
                                </div>
                            </div>
                            <hr>';
                    }
                    }
                    else{
                        echo("This channel has no videos.");
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
                  echo('
            <h3><h2>'.$row["username"].'</h2></h3>
            <img id="prfp" style="height:225px;width:225px;" src="/content/pfp/' .getUserPic($pfp). '">
            '); 
      if(isset($_SESSION['profileuser3'])) {
        if($row['username'] == $_SESSION['profileuser3']) {
          echo '
          <a href="account" id="editprof" class="yt-button primary" type="button">Manage Account</a>';
      } else {
          if(ifSubscribed($_SESSION['profileuser3'], $row['username'], $mysqli) == false) {
         echo '
         <a class="yt-button danger" href="/subscribe?name=' . $row['username'] . '">Subscribe ('.$rows.')</a>
         ';
         } else { 
          echo '
          <a class="yt-button" href="/unsubscribe?name=' . $row['username'] . '">Unsubscribe ('.$rows.')</a>
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
            <h3>Bio</h3>
                            <?php
                $statement = $mysqli->prepare("SELECT `description`, `date` FROM `users` WHERE `username` = ? LIMIT 1");
                $statement->bind_param("s", $_GET['user']);
                $statement->execute();
                $result = $statement->get_result();
                while($row = $result->fetch_assoc()) {
                    echo "<div class='card message'>
                    ".$row["description"]."
                    </div>
                    <hr>
                    <h3>Statistics</h3>
                    <div class='card message'>
                    Joined ".$row["date"]."
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

<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include './assets/mod/meta.php';?>   
</head>

  <body>
<?php include './assets/mod/db.php';?>
<?php include './assets/mod/header.php';?>
<?php include './assets/lib/profile.php';?>
<!-- guide -->
<?php include './assets/mod/guide.php';?>
<?php if($debug == 'true') { ?>
<div class="alert-message warning page-alert">
    <?php echo "<p><strong>Current video ID:</strong>";
    echo var_dump($_GET['v']);
    echo "</p>";
    ?>
    </div>
    <?php } ?>
    <?php
    $likec = getLikes($_GET['v'], $mysqli);
    $dislikec = getDislikes($_GET['v'], $mysqli);
    $views = getViews($_GET['v'], $mysqli); 
if(isset($_SESSION["profileuser3"])) {
addView($_GET['v'], @$_SESSION['profileuser3'], $mysqli);
}
        $stmt = $mysqli->prepare("SELECT * FROM videos WHERE vid = ?");
        $stmt->bind_param("s", $_GET['v']);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 0) exit('No rows');
        while($row = $result->fetch_assoc()) {
            $uploaddate = date('F d, Y', strtotime($row['date']));
            $pfp = idFromUser($row['author']);
            echo '
            <div class="rewatch">
            <iframe height="360px" width="640px" src="/embed?v=' . $row["filename"] . '" style="border: none;"></iframe>
            <div class="rewatch-content rewatch-main">
             <h1 id="rewatch-title">
               <span id="title">' . $row['videotitle'] . '</span>
             </h1>
             <div class="rewatch-views">
               <span class="rewatch-views-text">'.$views.'</span><br>
               <span class="rewatch-likes"><i class="bi bi-hand-thumbs-up-fill"></i> '.$likec.' <i class="bi bi-hand-thumbs-down-fill"></i> '.$dislikec.'</span>
             </div>
             <div id="rewatch-author">
              <img class="rewatch-pfp" src="content/pfp/' .getUserPic($pfp). '" height="48">
              <span class="rewatch-name">' . $row['author'] . '</span>';
              if($row['author'] == $_SESSION['profileuser3']) {
                echo '
                <a href="account" id="editprof" style="margin-left: 44px; margin-top: 4px;" class="yt-button primary" type="button">Manage Account</a>';
            } else {
        if(isset($_SESSION['profileuser3'])) {
            if(ifSubscribed($_SESSION['profileuser3'], $row['author'], $mysqli) == false) {
           echo '
           <a class="yt-button danger" style="margin-left: 44px; margin-top: 4px;" href="/subscribe?name=' . $row['author'] . '">Subscribe</a>
           ';
           } else { 
            echo '
            <a class="yt-button" style="margin-left: 44px; margin-top: 4px;" href="/unsubscribe?name=' . $row['author'] . '">Unsubscribe</a>
        ';
             } 
            } else {
                echo'
                <a class="yt-button danger disabled" style="margin-left: 44px; margin-top: 4px;">Subscribe</a>
            ';
            }
        }
           echo '</div>
            <div class="rewatch-buttons">
            <a class="yt-button" href="/like?v=' . $row['vid'] . '"><i class="bi bi-hand-thumbs-up-fill"></i> Like</a> <a style="margin-left:0px;" class="yt-button" href="/dislike?v=' . $row['vid'] . '"><i class="bi bi-hand-thumbs-down-fill"></i> Dislike</a>
            </div>
            </div>
            <div class="rewatch-content">
            <p id="rewatch-date"><strong>Uploaded on ' . $uploaddate . '</strong></p>
               <span id="description">' . $row['description'] . '</span>
           <hr>         
                ';
            $videoid = $row['vid'];
        }
        ?>
        <?php
        $stmt = $mysqli->prepare("SELECT * FROM comments WHERE tovideoid = ? ORDER BY date DESC");
        $stmt->bind_param("s", $_GET['v']);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 0) echo('No comments.');
        while($row = $result->fetch_assoc()) {
          $count = $result->num_rows;
        }
        ?>
<?php
        // mysqli_query($mysqli, "UPDATE videos SET views = views+1 WHERE vid = '" . $videoid . "'");
        // $stmt->close();
       // echo '<hr style="
//    margin-top: 50px;
// ">';
            $stmt = $mysqli->prepare("SELECT * FROM videos WHERE vid = ?");
            $stmt->bind_param("s", $_GET['v']);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows === 0) exit('No rows');
            while($row = $result->fetch_assoc()) {
                if ($row['featured'] == '1') {
                    echo "<strong style='font-size:8pt;''>This video is featured on the main page!</strong>";
                }
            }

        echo '<h4><strong><a href="/all_comments?id='.$_GET['v'].'">All comments ('.$count.')</a></strong></h4>';
?>


<?php

        if(isset($_POST['submit'])) {
            if(!isset($_SESSION['profileuser3'])) {
                die("Please login to comment.");
            }
            else {
                $stmt = $mysqli->prepare("INSERT INTO comments (tovideoid, author, comment, date) VALUES (?, ?, ?, now())");
                $stmt->bind_param("sss", $_GET['v'], $_SESSION['profileuser3'], $comment);
    
                $comment = str_replace(PHP_EOL, "<br>", htmlspecialchars($_POST['bio']));
    
                $stmt->execute();
                $stmt->close();
                
                echo '<div class="alert-message success page-alert"><p>Comment published!</p></div>';
            }
        }
    ?>


    <form action="" method="post" enctype="multipart/form-data"><br>
        <textarea class="yt-search-input" name="bio" rows="3" cols="40" required="required" style="width: 600px; height: 60px;"></textarea><br><br>
        <input class="yt-button primary" type="submit" value="Comment" name="submit" style="float: right;">
        <br>
        <br>
        <small>Make sure to follow our <a href="/tos">Terms of Service</a>!</small>
    </form>
    <hr>
    <?php
        $stmt = $mysqli->prepare("SELECT * FROM comments WHERE tovideoid = ? ORDER BY date DESC");
        $stmt->bind_param("s", $_GET['v']);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 0) echo('No comments.');
        while($row = $result->fetch_assoc()) {
          $count = $result->num_rows;
          $pfp = idFromUser($row['author']);
            echo "<div class='comment'><img class='cmn' height='32px' src='content/pfp/" .getUserPic($pfp). "'><div class='commenttitle'>" . $row['author'] . " (" . $row['date'] . ")</div><div class='cmntxt'>" . $row['comment'] . "</div></div>";
        }
        $stmt->close();
    ?>
    <?php
    $stmt = $mysqli->prepare("SELECT * FROM videos WHERE vid = ?");
    $stmt->bind_param("s", $_GET['v']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) echo('No comments.');
    $stmt->close();
    ?>
</div>
            <ul class="unstyled">

            </ul>
          </div>
          <!--<div class="span4">
            <h3>What's New</h3>
            <ul class="unstyled">
<li>Hopefully we will be able to replace the shitty 2009 frontend soon</li>
            </ul>
            <!--<input class="input" type="text" placeholder="Username">
            <br>
            <input class="input" type="password" placeholder="Password">
            <br>
            <button class="btn" type="submit">login</button>
          </div>-->
        </div>
      </div>

      <?php include './assets/mod/footer.php'; ?>

    </div> <!-- /container -->

  </body>
</html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

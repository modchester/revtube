<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include './assets/mod/meta.php';?>   
</head>

  <body>
<?php include './assets/mod/db.php';?>
<?php include './assets/mod/header.php';?>
<?php include './assets/lib/profile.php';?>
<link rel="stylesheet" href="./assets/css/sub.css">
     <?php if($debug) { 
      $omid = $_GET['v'];
      $debugmsg1 = '<div class="alert-message warning debug-alert"><p><strong>Current video ID:</strong> '.$omid.' </p></div>'; 
     } else {
      $debugmsg1 = null;
     } ?>
     <?php
     $stmt = $mysqli->prepare("SELECT * FROM videos WHERE vid = ?");
     $stmt->bind_param("s", $_GET['v']);
     $stmt->execute();
     $result = $stmt->get_result();
     if($result->num_rows === 0) exit('No rows');
     error_reporting(E_ALL ^ E_WARNING);
     while($row = $result->fetch_assoc()) {
      $name = $row['author'];
     }
     $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
     $stmt->bind_param("s", $name);
     $stmt->execute();
     $result = $stmt->get_result();
     if($result->num_rows === 0) exit('No rows');
     error_reporting(E_ALL ^ E_WARNING);
     while($row = $result->fetch_assoc()) {
      if($row['is_verified'] == 1) {
        $verified = '<img rel="twipsy" id="vfb" title="Verified" class="verihover" src="assets/img/verified_small.png">';
      } else {
        $verified = '';
      }
     }
     ?>
    <?php
    $likec = getLikes($_GET['v'], $mysqli);
    $dislikec = getDislikes($_GET['v'], $mysqli);
    $views = getViews($_GET['v'], $mysqli); 
// if(isset($_SESSION["profileuser3"])) {
// addView($_GET['v'], session_id(), $mysqli);
// }
if(isset($_SESSION['views'.$_GET['v'].'']))
$_SESSION['views'.$_GET['v'].''] = $_SESSION['views'.$_GET['v'].'']+1;
else
$_SESSION['views'.$_GET['v'].'']=1;
//check if the user has already viewed the video
if ($_SESSION['views'.$_GET['v'].''] > 1) {
echo "";
} else {
mysqli_query($mysqli, "UPDATE videos SET views = views+1 WHERE vid = '".$_GET['v']."'");
}
        $stmt = $mysqli->prepare("SELECT * FROM videos WHERE vid = ?");
        $stmt->bind_param("s", $_GET['v']);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 0) exit('No rows');
        error_reporting(E_ALL ^ E_WARNING);
        while($row = $result->fetch_assoc()) {
            $uploaddate = date('F d, Y', strtotime($row['date']));
            $pfp = idFromUser($row['author']);
            $rows = getSubscribers($row['author'], $mysqli);
            /* spagetti idea
            <div class="alert-message vidmang"><p><span style="color: transparent; user-select: none; -o-user-select: none; -ms-user-select: none; -moz-user-select: none; -webkit-user-select: none; -khtml-user-select: none; cursor: default;">stupid hack.</span></p><span id="IhateThisShit"><a class="pull-left yt-button" href="/my_videos">Video Manager</a></span><span style="float: right; margin-top: -22px;"><a class="pull-left yt-button" href="/my_videos">Video Manager</a></span></div>
            it sucks so much istg
            */
            echo '
            <div class="rewatch">
            <iframe height="360px" width="640px" src="/player/index?v=//'.$_SERVER["SERVER_NAME"].'/content/video/' . $row["filename"] . '&vid='.$row['vid'].'" style="border: none;"></iframe>
            <!--<video height="360px" width="640px" src="content/video/' . $row["filename"] . '" controls>No HTML5?</video>-->
            '.$debugmsg1.'
            
            <div class="rewatch-content rewatch-main">
             <h1 id="rewatch-title">
               <span id="title">' . htmlspecialchars($row['videotitle']) . '</span>
             </h1>
             <div class="rewatch-views">
               <span class="rewatch-views-text" style="width: 47px;display: inline-block;padding-bottom: 3px;">'.$row['views'].'</span><br>
               <span class="rewatch-likes"><i class="bi bi-hand-thumbs-up-fill"></i> '.$likec.' <i class="bi bi-hand-thumbs-down-fill"></i> '.$dislikec.'</span>
             </div>
             <div id="rewatch-author">
              <img class="rewatch-pfp" src="content/pfp/' .htmlspecialchars(getUserPic($pfp)). '" width="48" height="48">
              <a style="color:#333;text-decoration:none;" href="profile?user='.htmlspecialchars($row['author']).'"><span class="rewatch-name">' . htmlspecialchars($row['author']) . ' '.$verified.'</a>';
              if($row['author'] == $_SESSION['profileuser3']) {
                echo '
                <a href="account" id="editprof" style="margin-left: 44px; margin-top: 8px;" class="yt-button" type="button"><i class="bi bi-gear-fill"></i> Manage Account</a>';
              } else {
        if(isset($_SESSION['profileuser3'])) {
            if(ifSubscribed($_SESSION['profileuser3'], $row['author'], $mysqli) == false) {
           echo '
           <a class="yt-button danger" style="margin-left: 44px; margin-top: 8px;" href="/subscribe?name=' . htmlspecialchars($row['author']) . '">Subscribe</a> <span class="yt-subscription-button-subscriber-count-branded-horizontal subscribed">'.$rows.'</span> 
           ';
           } else { 
            echo '
            <a class="yt-button" style="margin-left: 44px; margin-top: 8px;" href="/unsubscribe?name=' . htmlspecialchars($row['author']) . '">Unsubscribe</a> <span class="yt-subscription-button-subscriber-count-branded-horizontal subscribed">'.$rows.'</span>
        ';
             } 
            } else {
                echo'
                <a class="yt-button danger disabled" style="margin-left: 44px; margin-top: 8px;">Subscribe</a> <span class="yt-subscription-button-subscriber-count-branded-horizontal subscribed">'.$rows.'</span>
            ';
            }
        }
           echo '</div>
            <div class="rewatch-buttons">
            <a class="yt-button ok" href="/like?v=' . $row['vid'] . '"><i class="bi bi-hand-thumbs-up-fill"></i> Like</a> <a style="margin-left:0px;" class="yt-button ok" href="/dislike?v=' . $row['vid'] . '"><i class="bi bi-hand-thumbs-down-fill"></i> Dislike</a> <a style="margin-left:0px;float:right;" class="yt-button ok" href="/report?v=' . $row['vid'] . '&offender=' . $row['author'] . '"><i class="bi bi-flag-fill"></i> Report</a>
            </div>
            </div>
            <div class="rewatch-content">
            <p id="rewatch-date"><strong>Published on ' . $uploaddate . '</strong></p>
               <span id="description">' . htmlspecialchars($row['description']) . '</span>
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
        if($result->num_rows === 0) {
          //echo('No comments.');
          $count = "0";
        }
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

        echo '<h4 class="allc"><a href="/all_comments?v='.$_GET['v'].'"><strong>ALL COMMENTS</strong></a> <span class="allcc">('.$count.')</span></h4>';
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
        <small>Make sure to follow our <a href="/guidelines">Community Guidelines</a>!</small>
    </form>
    <hr>
    <?php
        $stmt = $mysqli->prepare("SELECT * FROM comments WHERE tovideoid = ? ORDER BY date DESC");
        $stmt->bind_param("s", $_GET['v']);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 0) echo('No comments.');
        include("assets/lib/time.php");
        while($row = $result->fetch_assoc()) {
          error_reporting(~E_ALL & ~E_DEPRECATED);
          $count = $result->num_rows;
          $pfp = idFromUser($row['author']);
          $time = time_elapsed_string($row['date']);
            echo "<div class='comment'><img class='cmn' height='48px' width='48px' src='content/pfp/" .htmlspecialchars(getUserPic($pfp)). "'><div class='commenttitle'><a style='font-weight:bold;' href='profile?user=" . htmlspecialchars($row['author']) . "'>" . htmlspecialchars($row['author']) . " ".getVerified($row["author"])."</a> <span title='".$row["date"]."'><span class='cmt'>" . $time . "</span></span></div><div class='cmntxt'>" . htmlspecialchars($row['comment']) . "</div></div><br>";
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

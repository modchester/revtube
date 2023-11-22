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
          <h1>All Comments <small><div id="clockbox"></div></small></h1>
          <?php include './assets/mod/todaysdate.php'; ?>
        </div>
        <div class="row">
          <div class="span10">
          <?php
                    $statement = $mysqli->prepare("SELECT * FROM videos WHERE vid = ? LIMIT 1");
                $statement->bind_param("s", $_GET['v']);
                $statement->execute();
                $result = $statement->get_result();
                if($result->num_rows !== 0){
                  include("assets/lib/profile.php");
                    while($row = $result->fetch_assoc()) {
                      $likec = getLikes($row['vid'], $mysqli);
    $dislikec = getDislikes($row['vid'], $mysqli);
    $views = getViews($row['vid'], $mysqli); 
    if($row['duration'] > 3600) {
      $lengthlist = floor($row['duration'] / 3600) . ":" . gmdate("i:s", $row['duration'] % 3600);
    } else { 
      $lengthlist = gmdate("i:s", $row['duration'] % 3600) ;
    };
                        echo '
                            <div class="video container-flex">
                                <div class="col-1-3 video-thumbnail">
                                <a href="/watch?v='.$row['vid'].'">
                                <img height="70px" width="120px" src="content/thumb/' . $row['thumb'] . '">
                                </a>
                                </div>
                                <div class="col-1-3 video-title"><a href="/watch?v='.$row['vid'].'"><b>'.$row['videotitle'].'</b></a></div>
                                <div class="col-1-3 video-info">
                                    <div><a href="profile?user='.$row['author'].'">'.$row['author'].'</a></div>
                                    <div>'.$lengthlist.' &bull; '.$row['views'].' views &bull; <i class="bi bi-hand-thumbs-up-fill"></i> '.$likec.' <i class="bi bi-hand-thumbs-down-fill"></i> '.$dislikec.'</div>
                                    <div><em>'.$row['description'].'</em></div>
                                </div>
                            </div>
                            <hr>';
                    }
                }
                else{
                    echo "That video doesn't exist, sorry!";
                }
                $statement->close();
            ?>
                <?php
        $stmt = $mysqli->prepare("SELECT * FROM comments WHERE tovideoid = ? ORDER BY date DESC");
        $stmt->bind_param("s", $_GET['v']);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 0) echo('No comments.');
        error_reporting(E_ALL & ~E_DEPRECATED);
        while($row = $result->fetch_assoc()) {
          $count = $result->num_rows;
          $pfp = idFromUser($row['author']);
          $time = time_elapsed_string($row['date']);
            echo "<div class='comment'><img class='cmn' height='34px' width='34px' src='content/pfp/" .getUserPic($pfp). "'><div class='commenttitle'><a style='font-weight:bold;' href='profile?user=" . $row['author'] . "'>" . $row['author'] . "</a> <span title='".$row["date"]."'>(" . $time . ")</span></div><div class='cmntxt'>" . $row['comment'] . "</div></div>";
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
          <div class="span4">
         <?php include './assets/mod/whatsnew.php'; ?>
          </div>
        </div>
      </div>

    </div>      
    <?php include './assets/mod/footer.php'; ?>
</div></div> <!-- /container -->

  </body>
</html>
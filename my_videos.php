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
          <h1>Studio <small><div id="clockbox"></div></small></h1>
          <?php include './assets/mod/todaysdate.php'; ?>
        </div>
        <div class="row">
          <div class="span10">
                            <?php
                    $statement = $mysqli->prepare("SELECT * FROM videos WHERE author = ? ORDER BY date DESC");
                $statement->bind_param("s", $_SESSION['profileuser3']); 
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
                            <div class="editoptions">
                            <a href="editvideo?v='.$row['vid'].'" id="editprof" style="margin-left: 44px; margin-top: 8px;" class="yt-button primary" type="button"><i class="bi bi-pencil-fill"></i> Edit</a> <a href="deletevideo?v='.$row['vid'].'" id="editprof" style="margin-left:0px;margin-top: 8px;" class="yt-button delete danger" type="button"><i class="bi bi-trash3-fill"></i> Delete</a>
                            </div>
                                <div class="col-1-3 video-thumbnail">
                                <a href="/watch?v='.$row['vid'].'">
                                <img height="70px" width="120px" src="content/thumb/' . $row['thumb'] . '">
                                </a>
                                </div>
                                <div class="col-1-3 video-title"><a href="/watch?v='.$row['vid'].'"><b>'.htmlspecialchars($row['videotitle']).'</b></a></div>
                                <div class="col-1-3 video-info">
                                    <div><a href="profile?user='.htmlspecialchars($row['author']).'">'.htmlspecialchars($row['author']).'</a></div>
                                    <div>'.$lengthlist.' &bull; '.$row['views'].' views &bull; <i class="bi bi-hand-thumbs-up-fill"></i> '.$likec.' <i class="bi bi-hand-thumbs-down-fill"></i> '.$dislikec.'</div>
                                    <div><em>'.htmlspecialchars($row['description']).'</em></div>
                                </div>
                            </div>
                            <hr>';
                    }
                }
                else{
                    echo "You haven't uploaded anything yet. This area will populate once you <a href='upload'>upload</a> some videos.";
                }
                $statement->close();
            ?>
            <ul class="unstyled">

            </ul>
          </div>
          <div class="span4">
        <?php include './assets/mod/whatsnew.php'; ?>
      </div>

      

    </div></div></div> <!-- /container -->
    <?php include './assets/mod/footer.php'; ?>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php require_once './assets/mod/meta.php';?>      
</head>

  <body>
<?php require_once './assets/mod/db.php';?>
<?php require_once './assets/mod/header.php';?>
    <div class="container">
 <div class="content">
        <div class="page-header">
        <?php require_once './assets/mod/alert.php';?>
          <h1>Uploads <small><div id="clockbox"></div></small></h1>
          <?php require_once './assets/mod/todaysdate.php'; ?>
        </div>
        <div class="row">
          <div class="span10">
            <h2>Most Viewed</h2>
                            <?php
                    $statement = $mysqli->prepare("SELECT * FROM videos ORDER BY views DESC");
                //$statement->bind_param("s", $_POST['fr']); i have no idea what this is but we don't need it
                $statement->execute();
                $result = $statement->get_result();
                if($result->num_rows !== 0){
                  require_once("assets/lib/profile.php");
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
                    echo "No videos were found.";
                }
                $statement->close();
            ?>
            <ul class="unstyled">

            </ul>
          </div>
          <div class="span4">
        <?php require_once './assets/mod/whatsnew.php'; ?>
      </div>

      

    </div></div></div> <!-- /container -->
    <?php require_once './assets/mod/footer.php'; ?>
  </body>
</html>
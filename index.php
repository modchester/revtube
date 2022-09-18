<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'meta.php';?>
    </head>

  <body>
<?php include 'db.php';?>
<?php include 'header.php';?>
    <div class="container">
 <div class="content">
 <!--<img src="wii1.png" width="820px" height="180px" alt="Theres no add here Why not add one?" border="0" align="absmiddle">-->
        <div class="page-header">
          <?php
          
       if ($_GET === null) {
        echo ' ';
       } else {
        echo '
         <div class="alert-message success">
        <p>'.$_GET["msg"].'</p>
       </div>';
       }
  //  echo $_GET['msg'];
          ?>
            <?php include 'alert.php'?>
          <h1>Uploads <small><div id="clockbox"></div></small></h1>
          <?php include 'todaysdate.php'; ?>
        </div>
        <div class="row">
          <div class="span10">
          <h3>Featured Videos</h3>
            <div class="featured-videos container-flex">
                <?php
                    $statement = $mysqli->prepare("SELECT * FROM videos WHERE featured = TRUE LIMIT 4"); //sexy variable names
                    //$statement->bind_param("s", $_POST['fr']);
                    $statement->execute();
                    $result = $statement->get_result();
                    $howmany = 0;
                    if($result->num_rows !== 0){
                        while($row = $result->fetch_assoc()) {
                            echo '
                            <div class="featured-video col-generic">
                                <div class="video-thumbnail">
                                    <a href="viewvideo.php?id=' . $row['id'] . '">
                                        <video>
                                            <source src="videos/' . $row['filename'] . '" type="video/mp4">
                                            Your browser does not support the video tag.
                                         </video>
                                    </a>
                                </div>
                                <div class="featured-video-info">
                                    <div class="video-title"><a href="viewvideo.php?id='.$row['id'].'">'.$row['videotitle'].'</a></div>
                                    <div class="video-author"><a href="profile.php?id='.$row['author'].'">'.$row['author'].'</a></div>
                                </div>
                            </div>';
                            $howmany++;
                        }
                        if($howmany !== 4){
                            for($i = 4-$howmany; $i > 3; $i++){
                                echo("the j");
                            }
                        }
                    }
                    else{
                        echo "It seems there are no videos here. Perhaps one of your videos could be here?";
                    }
                ?>
            </div>
            <br>
            <br>
            <h2>Latest Uploads</h2>
            <?php
                    $statement = $mysqli->prepare("SELECT * FROM videos ORDER BY date DESC");
                //$statement->bind_param("s", $_POST['fr']); i have no idea what this is but we don't need it
                $statement->execute();
                $result = $statement->get_result();
                if($result->num_rows !== 0){
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="video container-flex">
                                <div class="col-1-3 video-thumbnail">
                                <a href="watch.php?id='.$row['id'].'">
                                    <video>
                                        <source src="content/video/'.$row['filename'].'" type="video/mp4">
                                        Thumbnail could not be loaded :(
                                    </video> 
                                </a>
                                </div>
                                <div class="col-1-3 video-title"><a href="watch.php?id='.$row['id'].'">'.$row['videotitle'].'</a></div>
                                <div class="col-1-3 video-info">
                                    <div><a href="profile.php?id='.$row['author'].'">'.$row['author'].'</a></div>
                                    <div><span>'.$row['views'].'</span> views</div>
                                    <div><span>'.$row['likes'].'</span> likes</div>
                                </div>
                            </div>
                            <hr>';
                    }
                }
                else{
                    echo "Hm. Interesting. Either nobody has uploaded yet or we have a serious problem o_o";
                }
                $statement->close();
            ?>
            <ul class="unstyled">

            </ul>
          </div>
          <div class="span4">
            <?php include 'whatsnew.php'; ?>
            <!--<input class="input" type="text" placeholder="Username">
            <br>
            <input class="input" type="password" placeholder="Password">
            <br>
            <button class="btn" type="submit">login</button>-->
          </div>
        </div>
      </div>

      <footer>
        <p>&copy;Redst0ne 2012-2022</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
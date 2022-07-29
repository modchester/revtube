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
        <div class="page-header">
            <?php include 'alert.php'?>
          <h1>Uploads <small><div id="clockbox"></div></small></h1>
          <?php include 'todaysdate.php'; ?>
        </div>
        <div class="row">
          <div class="span10">
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
                                        <source src="../videos/'.$row['filename'].'" type="video/mp4">
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
            <h3>What's New</h3>
            <ul class="unstyled">
<li>none yet, just the "to do" list</li>
<br>
<li>1. report button on video page</li>
<li>2. upload button on header</li>
<li>3. new video player</li>
            </ul>
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
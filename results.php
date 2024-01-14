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
          <h1><?php
        $re = htmlspecialchars($_GET["q"]);
    echo ("Search results for &quot;".$re."&quot;");
    if($_GET['q'] == "do a barrel roll") {
      echo ('<style>@-webkit-keyframes roll {
        from { -webkit-transform: rotate(0deg) }
        to   { -webkit-transform: rotate(360deg) }
        }
        
        @-moz-keyframes roll {
        from { -moz-transform: rotate(0deg) }
        to   { -moz-transform: rotate(360deg) }
        }
        
        @keyframes roll {
        from { transform: rotate(0deg) }
        to   { transform: rotate(360deg) }
        }
        
        body {
        -moz-animation-name: roll;
        -moz-animation-duration: 4s;
        -moz-animation-iteration-count: 1;
        -webkit-animation-name: roll;
        -webkit-animation-duration: 4s;
        -webkit-animation-iteration-count: 1;
        }</style>');
    }
    ?> <small><div id="clockbox"></div></small></h1>
          <?php include './assets/mod/todaysdate.php'; ?>
        </div>
        <div class="row">
          <div class="span10">
                            <?php
                    $search = htmlspecialchars($_GET['q']);
                    $statement = $mysqli->prepare("select * from videos where videotitle like '%$search%' or description like '%$search%'");
                //$statement->bind_param("s", $_POST['fr']); i have no idea what this is but we don't need it
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
                    $randnm = rand(1, 5);
                    echo "<center><img width='300px' src='/assets/img/404/".$randnm.".png'><br> There are no videos matching your search. Maybe you could <a href='upload'>upload</a> one.</center>";
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
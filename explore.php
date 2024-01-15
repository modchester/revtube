<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include './assets/mod/meta.php';?>
    <?php include './assets/mod/db.php';?>
    <style>
      @media(max-width: 1357px) {
  .guide {
    display: none;
  }
  </style>
    </head>
    <?php include './assets/mod/guide.php';?>
  <body>
<?php include './assets/mod/header.php';?>
<!-- guide -->
    <div class="container">
 <div class="content">
        <div class="page-header">
        <?php include './assets/mod/msg.php'; ?>
        <?php include './assets/mod/err.php'; ?>
            <?php include './assets/mod/alert.php'?>
          <h1>Explore <small><div id="clockbox"></div></small></h1>
          <?php include './assets/mod/todaysdate.php'; ?>
        </div>
        
        <div class="row">
        <?php //include './assets/mod/guide.php';?>
          <div class="span10">
          <?php if(isset($_SESSION['profileuser3'])) {
          echo '<h3>From your subscriptions</h3>';
$subscribed = array();

if(isset($_SESSION['profileuser3'])) {
    $stmt = $mysqli->prepare("SELECT * FROM subscribers WHERE sender = ? LIMIT 25");
    $stmt->bind_param("s", $_SESSION['profileuser3']);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        array_push($subscribed, $row['receiver']);
    }
}
$stmt = $mysqli->prepare("SELECT * FROM videos ORDER BY date DESC LIMIT 250");
$stmt->execute();
$result = $stmt->get_result();
$i = 0;
include("assets/lib/profile.php");
error_reporting(0);
while($row = $result->fetch_assoc()) { 
	if(in_array($row['author'], $subscribed)) { 
		$i++;
		if($i <= 50) {
            $upload = time_elapsed_string($row['date']);
            $likec = getLikes($row['vid'], $mysqli);
        $dislikec = getDislikes($row['vid'], $mysqli);
            if($row['duration'] > 3600) {
                $lengthlist = floor($row['duration'] / 3600) . ":" . gmdate("i:s", $row['duration'] % 3600);
            } else { 
                $lengthlist = gmdate("i:s", $row['duration'] % 3600) ;
            };
                        echo '
						<div class="video container-flex">
                                <div class="col-1-3 video-thumbnail">
                                <a href="watch?v='.$row['vid'].'">
                                <img height="70px" width="120px" src="content/thumb/' . $row['thumb'] . '">
                                </a>
                                </div>
                                <div class="col-1-3 video-title"><a href="watch?v='.$row['vid'].'"><b>'.htmlspecialchars($row['videotitle']).'</b></a></div>
                                <div class="col-1-3 video-info">
                                    <div><a href="profile?user='.htmlspecialchars($row['author']).'">'.htmlspecialchars($row['author']).'</a></div>
                                    <div>'.$lengthlist.' &bull; '.$row['views'].' views &bull; <i class="bi bi-hand-thumbs-up-fill"></i> '.$likec.' <i class="bi bi-hand-thumbs-down-fill"></i> '.$dislikec.'</div>
                                </div>
                            </div>
                            <hr class="indexdivider">';}}} if($i == 0) {
	echo "<p>There is nothing new from your subscriptions.</p>";
}} else {
  $statement = $mysqli->prepare("SELECT * FROM videos ORDER BY RAND() DESC LIMIT 8");
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
                  <a href="watch?v='.$row['vid'].'">
                  <img height="70px" width="120px" src="content/thumb/' . $row['thumb'] . '">
                  </a>
                  </div>
                  <div class="col-1-3 video-title"><a href="watch?v='.$row['vid'].'"><b>'.htmlspecialchars($row['videotitle']).'</b></a></div>
                  <div class="col-1-3 video-info">
                      <div><a href="profile?user='.$row['author'].'">'.htmlspecialchars($row['author']).'</a></div>
                      <div>'.$lengthlist.' &bull; '.$row['views'].' views &bull; <i class="bi bi-hand-thumbs-up-fill"></i> '.$likec.' <i class="bi bi-hand-thumbs-down-fill"></i> '.$dislikec.'</div>
                  </div>
              </div>
              <hr class="indexdivider">';
      }
  }
  else{
      echo "There are no videos uploaded to this instance.";
  }
}
  ?>
          </div>
          <div class="span4">
            <?php include './assets/mod/whatsnew.php'; ?>
            <!--<input class="input" type="text" placeholder="Username">
            <br>
            <input class="input" type="password" placeholder="Password">
            <br>
            <button class="btn" type="submit">login</button>-->
          </div>
        </div>
      </div>

    </div> <!-- /container -->
    <?php include './assets/mod/footer.php'; ?>
  </body>
</html>
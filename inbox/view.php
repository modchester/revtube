<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once '../assets/mod/meta.php';?>
    <?php require_once '../assets/mod/db.php';?>
    </head>
    <?php require_once '../assets/mod/inboxguide.php';?>
  <body>
<?php require_once '../assets/mod/inboxheader.php';?>
<!-- guide -->
    <div class="container">
 <div class="content">
        <div class="page-header">
              <?php require_once '../assets/mod/msg.php'; ?>
            <?php require_once '../assets/mod/inboxalert.php'?>
          <h1>Inbox <small><div id="clockbox"></div></small></h1>
          <?php require_once '../assets/mod/todaysdate.php'; ?>
        </div>
        
        <div class="row">
        <?php //require_once './assets/mod/guide.php';?>
          <div class="span10">
<?php
  $stmt = $mysqli->prepare("SELECT * FROM inbox WHERE id = ?");
  $stmt->bind_param("s", $_GET['id']);
  $stmt->execute();
  $result = $stmt->get_result();
  if($result->num_rows === 0) errorPage(404, 404);
  error_reporting(E_ALL ^ E_WARNING);
  while($row = $result->fetch_assoc()) {
   $name = $row['sender'];
  }
$stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) errorPage(404, 404);
error_reporting(E_ALL ^ E_WARNING);
while($row = $result->fetch_assoc()) {
 if($row['is_verified'] == 1) {
   $verified = '<img rel="twipsy" id="vfb" title="Verified" class="verihover" src="../assets/img/verified_small.png">';
 } else {
   $verified = '';
 }
}
?>
            <?php
                    $statement = $mysqli->prepare("SELECT * FROM inbox WHERE reciever = ? AND id = ? ORDER BY id DESC");
                $statement->bind_param("si", $_SESSION['profileuser3'], $_GET['id']);
                $statement->execute();
                $result = $statement->get_result();
                if($result->num_rows !== 0){
                    while($row = $result->fetch_assoc()) {
                        if ($row['sender'] == "redst0ne" OR $row['sender'] == $site['name']) {
                            $official = '<i title="This is an official message from the '.$site['name'].' team." class="bi bi-patch-check-fill"></i>';
                        } else {
                            $official = "";
                        }
                        if ($_SESSION['profileuser3'] !== $row['reciever']) {
                            echo '<script>window.location.href = "../index?err=Forbidden.";</script>';
                        }
                        echo '<h2>'.htmlspecialchars($row['subject']).'</h2>';
                        $uploaddate = date('F d, Y', strtotime($row['date']));
            $pfp = idFromUser($row['sender']);
            $rows = getSubscribers($row['sender'], $mysqli);
                        echo '  
                        <div class="rewatch-views">
                        <p style="margin-right:20px;"><b>'.$uploaddate.'</b></p>
                        </div>
                        <link rel="stylesheet" href="../assets/css/sub.css">
                        <div id="rewatch-author">
                        <img class="rewatch-pfp" src="../content/pfp/' .htmlspecialchars(getUserPicN($pfp)). '" width="48" height="48">
                        <a style="color:#333;text-decoration:none;" href="/profile?user='.htmlspecialchars($row['sender']).'"><span class="rewatch-name">' . htmlspecialchars($row['sender']) . ' '.$verified.'</a>';
                        if($row['sender'] == $_SESSION['profileuser3']) {
                          echo '
                          <a href="/account" id="editprof" style="margin-left: 44px; margin-top: 8px;" class="yt-button" type="button"><i class="bi bi-gear-fill"></i> Manage Account</a>';
                        } else {
                  if(isset($_SESSION['profileuser3'])) {
                      if(ifSubscribed($_SESSION['profileuser3'], $row['sender'], $mysqli) == false) {
                     echo '
                     <a class="yt-button sub-button" style="margin-left: 44px; margin-top: 8px;" href="/subscribe?name=' . htmlspecialchars($row['sender']) . '"><span class="sub-button-text">Subscribe</span></a> <span class="yt-subscription-button-subscriber-count-branded-horizontal subscribed">'.$rows.'</span> 
                     ';
                     } else { 
                      echo '
                      <a class="yt-button subbed-button" style="margin-left: 44px; margin-top: 8px;" href="/unsubscribe?name=' . htmlspecialchars($row['sender']) . '"><span class="sub-button-text">Unsubscribe</span></a> <span class="yt-subscription-button-subscriber-count-branded-horizontal subscribed">'.$rows.'</span>
                  ';
                       } 
                      } else {
                          echo'
                          <a class="yt-button disabled sub-button" style="margin-left: 44px; margin-top: 8px;"><span class="sub-button-text">Subscribe</span></a> <span class="yt-subscription-button-subscriber-count-branded-horizontal subscribed">'.$rows.'</span>
                      ';
                      }
                  }
                     echo '</div><hr>
                     <p style="font-size:14px;"> '.htmlspecialchars($row['content']).'</p>';
                    }
                }
                else{
                    echo "<h2>Oops!</h2><hr>The message you are looking for does not exist.";
                }
                $statement->close();
            ?>
            </tbody>
                      </table>
            <ul class="unstyled">

            </ul>
          </div>
          <div class="span4">
            <?php require_once '../assets/mod/inboxwhatsnew.php'; ?>
            <!--<input class="input" type="text" placeholder="Username">
            <br>
            <input class="input" type="password" placeholder="Password">
            <br>
            <button class="btn" type="submit">login</button>-->
          </div>
        </div>
      </div>

    </div> <!-- /container -->
    <?php require_once '../assets/mod/footer.php'; ?>
  </body>
</html>

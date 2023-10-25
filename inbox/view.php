<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include '../assets/mod/meta.php';?>
    <?php include '../assets/mod/db.php';?>
    </head>
    <?php include '../assets/mod/inboxguide.php';?>
  <body>
<?php include '../assets/mod/inboxheader.php';?>
<!-- guide -->
    <div class="container">
 <div class="content">
        <div class="page-header">
          <?php
      if(empty($_GET["msg"])) {
        echo "<p style='display:none;'>no</p>";
      } else if($_GET["msg"] === " ") {
        echo "<p style='display:none;'>no</p>";
      } else { echo '
          <div class="alert-message success">
        <p>'.$_GET["msg"].'</p>
      </div>';
    }
          ?>
            <?php include '../assets/mod/inboxalert.php'?>
          <h1>Inbox <small><div id="clockbox"></div></small></h1>
          <?php include '../assets/mod/todaysdate.php'; ?>
        </div>
        
        <div class="row">
        <?php //include './assets/mod/guide.php';?>
          <div class="span10">

            <?php
                    $statement = $mysqli->prepare("SELECT * FROM inbox WHERE reciever = ? AND id = ? ORDER BY id DESC");
                $statement->bind_param("si", $_SESSION['profileuser3'], $_GET['id']);
                $statement->execute();
                $result = $statement->get_result();
                if($result->num_rows !== 0){
                    while($row = $result->fetch_assoc()) {
                        if ($row['sender'] == "system") {
                            $official = '<i title="This is an official message from the clipIt team." class="bi bi-patch-check-fill"></i>';
                        } else {
                            $official = "";
                        }
                        if ($_SESSION['profileuser3'] != $row['reciever'] OR $_SESSION['profileuser3'] != $row['sender']) {
                            echo '<script>window.location.href = "../index?err=Forbidden.";</script>';
                        }
                        echo '<h2>'.$row['subject'].'</h2>
<em>From: '.$row['sender'].' '.$official.'<br>
To: '.$row['reciever'].'<br>Sent: '.$row['date'].'<br></em><hr>
                           <p> '.$row['content'].'</p>
                        ';
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
            <?php include '../assets/mod/inboxwhatsnew.php'; ?>
            <!--<input class="input" type="text" placeholder="Username">
            <br>
            <input class="input" type="password" placeholder="Password">
            <br>
            <button class="btn" type="submit">login</button>-->
          </div>
        </div>
      </div>

    </div> <!-- /container -->
    <?php include '../assets/mod/footer.php'; ?>
  </body>
</html>
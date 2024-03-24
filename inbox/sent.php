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
          <h1>Sent <small><div id="clockbox"></div></small></h1>
          <?php require_once '../assets/mod/todaysdate.php'; ?>
        </div>
        
        <div class="row">
        <?php //require_once './assets/mod/guide.php';?>
          <div class="span10">
            <h2></h2>
            <table class="condensed-table">
                        <thead>
                          <tr>
                            <th>To</th>
                            <th>Subject</th>
                            <th>Content</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
            <?php
                    $statement = $mysqli->prepare("SELECT * FROM inbox WHERE sender = ? ORDER BY id DESC");
                $statement->bind_param("s", $_SESSION['profileuser3']);
                $statement->execute();
                $result = $statement->get_result();
                if($result->num_rows !== 0){
                    while($row = $result->fetch_assoc()) {
                        $out = strlen($row['content']) > 25 ? mb_substr($row['content'],0,25)."..." : $row['content'];
                        echo '
                          <tr>
                            <td>'.htmlspecialchars($row['reciever']).'</td>
                            <td>'.htmlspecialchars($row['subject']).'</td>
                            <td>'.htmlspecialchars($out).'</td>
                            <td><a href="view?id='.$row['id'].'">View</a></td>
                          </tr>
                          <tr>
                        ';
                    }
                }
                else{
                    echo "You have no mail.";
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
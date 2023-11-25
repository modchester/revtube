<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include './assets/mod/db.php';?>
    <?php include './assets/mod/meta.php';?>
    </head>
<?php include './assets/mod/guide.php';?>
  <body>
<?php include './assets/mod/header.php';?>
<?php
                    $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? ");
                    $statement->bind_param("s", $_SESSION['profileuser3']);
                    $statement->execute();
                    $result = $statement->get_result();
                    if($result->num_rows !== 0){
                        while($row = $result->fetch_assoc()) {
                        if ($row["is_admin"] !== 1) {
                          echo('<script>
      window.location.href = "index.php?msg=You are not allowed to view that page.";
      </script>');
                        }  
                        }
                    }
                    else{
                        echo "";
                    }
                ?>
    <div class="container">
 <div class="content">
        <div class="page-header">
          <?php
      if(empty($_GET)) {
        echo "<p style='display:none;'>no</p>";
      } else if($_GET === " ") {
        echo "<p style='display:none;'>no</p>";
      } else { echo '
          <div class="alert-message success">
        <p>'.$_GET["msg"].'</p>
      </div>';
    }
          ?>
            <?php include './assets/mod/alert.php'?>
          <h1>Admin Panel <small><div id="clockbox"></div></small></h1>
          <?php include './assets/mod/todaysdate.php'; ?>
        </div>
        <div class="row">
          <div class="span10">
            <h2>Moderation</h2>
            <form class="form-stacked" action="banuser" method="post" enctype="multipart/form-data">
            <label for="banusern">Ban user </label>
            <input class="large" id="banusern" name="banusern"></input>
      <input style="margin-left:5px;margin-top:1px;" type="submit" name="submit" class="yt-button primary" value="Ban User">
            </form>
            <form class="form-stacked" action="unbanuser" method="post" enctype="multipart/form-data">
            <label for="unbanuser">Unban user </label>
            <input class="large" id="unbanuser" name="unbanuser"></input>
      <input style="margin-left:5px;margin-top:1px;" type="submit" name="submit" class="yt-button primary" value="Unban User">
            </form>
            <form class="form-stacked" action="verifyuser" method="post" enctype="multipart/form-data">
            <label for="verifyuser">Verify user </label>
            <input class="large" id="verifyuser" name="verifyuser"></input>
      <input style="margin-left:5px;margin-top:1px;" type="submit" name="submit" class="yt-button primary" value="Verify User">
            </form>
            <form class="form-stacked" action="unverifyuser" method="post" enctype="multipart/form-data">
            <label for="unverifyuser">Unverify user </label>
            <input class="large" id="unverifyuser" name="unverifyuser"></input>
      <input style="margin-left:5px;margin-top:1px;" type="submit" name="submit" class="yt-button primary" value="Unverify User">
            </form>
            <form class="form-stacked" action="makeadmin" method="post" enctype="multipart/form-data">
            <label style="color:red;" for="user">Make user admin </label>
            <input class="large" id="user" name="user"></input>
      <input style="margin-left:5px;margin-top:1px;" type="submit" name="submit" class="yt-button danger" value="Make Admin">
            </form>
            <hr>
            <h2>Users</h2>
            <table class="condensed-table">
            <thead>
          <tr>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            <th>Joined</th>
            <th>Verified</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
                    $statement = $mysqli->prepare("SELECT * FROM users ORDER BY date DESC");
                $statement->execute();
                $result = $statement->get_result();
                if($result->num_rows !== 0){
                    while($row = $result->fetch_assoc()) {
                      if($row['is_verified'] == 1) {
                        $verified = '<img style="width:22.7px;margin-left:10px;" src="/assets/img/verified.png">';
                      } else {
                        $verified = '';
                      }
                        echo '
                        
        
            <th>'.$row['id'].'</th>
            <td>'.$row['username'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['date'].'</td>
            <td>'.$verified.'</td>
          </tr>
                        ';
                    }
                }
                else{
                    echo "No users? Well something fucked up.";
                }
                $statement->close();
            ?>
            </tbody>
      </table>
      <hr>
      <h2>Announcements</h2>
      <p>This will put an alert on the top of most pages. Friendly reminder that everyone can see what you say here.</p>
     <form action="post" method="post" enctype="multipart/form-data">
      <textarea class="xxlarge" id="textarea2" name="textarea2" rows="3"></textarea>
      <br>
      <input style="margin-top:5px;" type="submit" class="yt-button primary" value="Post announcement">
            </form>
            <?php
    if (isset($_POST['submit'])){
        if(!isset($_SESSION['profileuser3'])) {
            die("Login to post announcements...");
        } else if(1 === 1)  {
        $video = $_POST['videotitle'];
        $user = $_POST['author'];
        $statement = $mysqli->prepare("INSERT INTO announcements (content, author, date) VALUES (?, ?, now())");
        $statement->bind_param("ssss", $content, $author);
        $content = htmlspecialchars($_POST['textarea2']);
        $author = htmlspecialchars($_SESSION['profileuser3']);
        $statement->execute();
        $statement->close();
        echo('<script>
      window.location.href = "index.php?msg=Your announcement has been posted!";
      </script>');
    } 
     } 
    ?>
      <p>Last 5 announcements</p>
            <ul class="unstyled">
<!-- <li>ipod &bull; hello everyone i am your mother &bull; 2022-09-17 00:00:00 -->
<?php
                    $statement = $mysqli->prepare("SELECT * FROM announcements ORDER BY date DESC LIMIT 5");
                    $statement->execute();
                    $result = $statement->get_result();
                    if($result->num_rows !== 0){
                        while($row = $result->fetch_assoc()) {
                            echo '<li>' . $row['author'] . ' &bull; ' . $row['content'] . ' &bull; ' . $row['date'] . '</li>';
                        }
                    }
                    else{
                        echo "No announcements have been posted.";
                    }
                ?>
            </ul>
          </div>
          <div class="span4">
            <?php include './assets/mod/whatsnew.php'; ?>
            <hr>
            <h3>Reminders</h3>
            <ul>
                <li>Please <b>DO NOT</b> leak user data</li>
                <li>No leaking the admin panel</li>
                <li>Don't abuse the announcements <ul><li>Doing so will result in demotion, depending on the severity of the abuse</li></ul></li>
          </div>
        </div>
      </div>

    </div> <!-- /container -->
    <?php include './assets/mod/footer.php'; ?>
  </body>
</html>
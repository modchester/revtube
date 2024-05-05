<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once '../assets/mod/meta.php';?>
    <?php require_once '../assets/mod/db_init.php';?>
    </head>
    <?php require_once '../assets/mod/inboxguide.php';?>
  <body>
<?php require_once '../assets/mod/inboxheader.php';?>
<!-- guide -->
    <div class="container">
 <div class="content">
        <div class="page-header">
          <?php require_once './assets/mod/msg.php'; ?>
          ?>
            <?php require_once '../assets/mod/inboxalert.php'?>
          <h1>Compose <small><div id="clockbox"></div></small></h1>
          <?php require_once '../assets/mod/todaysdate.php'; ?>
        </div>
        
        <div class="row">
        <?php //require_once './assets/mod/guide.php';?>
          <div class="span10">
            <h2></h2>
            <?php
    if(!isset($_SESSION['profileuser3'])) {
        echo('<script>
             window.location.href = "/";
             </script>');
    }
   if (isset($_POST['submit'])){
//     if(empty($_POST['fileToUpload'])) {
//         error_reporting(E_ALL);
//  ini_set('display_errors', '1');
//         echo('<script>
//         window.location.href = "/?err=No video file.";
//         </script>');
//     }
    if(empty($_POST['reciever'])) {
        echo('<script>
        window.location.href = "/?err=No reciever.";
        </script>');
    }
    if(empty($_POST['content'])) {
        echo('<script>
        window.location.href = "/?err=No content.";
        </script>');
    }
    if(empty($_POST['subject'])) {
        echo('<script>
        window.location.href = "/?err=No subject.";
        </script>');
    }
    // if (strlen($_POST['subject']) > 21) {
    //     echo('<script>
    //     window.location.href = "/?err=subject";
    //     </script>');
    //     exit();
    // }
       if(!isset($_SESSION['profileuser3'])) {
        echo '<script>
        window.location.href = "../login";
        </script>';
       }
               $statement = $mysqli->prepare("INSERT INTO inbox (sender, reciever, subject, content, date) VALUES (?, ?, ?, ?, now())");
               $statement->bind_param("ssss", $user, $reciever, $subject, $content);               
               $user = $_SESSION['profileuser3'];
               $reciever = $_POST['reciever'];
               $subject = $_POST['subject'];
               $content = str_replace(PHP_EOL, "<br>", htmlspecialchars($_POST['content']));
               $statement->execute();
               $statement->close();
               echo('<script>
             window.location.href = "/";
             </script>');
       }
   ?>
            <form action="/inbox/compose" method="post" enctype="multipart/form-data">
                     <br>
                     <div class="input-group">
                       <!-- <label for="videotitle">Title </label>-->
                        <input class="yt-search-input" type="text" id="reciever" placeholder="To" name="reciever">
                    </div>
                    <div class="input-group">
                       <!-- <label for="videotitle">Title </label>-->
                        <input class="yt-search-input" type="text" id="subject" placeholder="Subject" name="subject">
                    </div>
                     <br>
                    <div class="input-group">
                 <!--       <label for="bio">Description </label> -->
                        <textarea class="yt-search-input" name="content" placeholder="Content" rows="4" style="width: 500px;" required="required"></textarea>
                    </div>
                    <div class="input-group">
                         <br>
                    </div>
                    <button type="submit" name="submit" class="yt-button big primary"><i class="bi bi-send-fill"></i> Send</button>

            <ul class="unstyled">

            </ul>
          </div>
          <div class="span4">
            <?php require_once("../assets/mod/inboxwhatsnew.php");?>
          </form><!--<input class="input" type="text" placeholder="Username">
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
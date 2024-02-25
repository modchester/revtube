<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include './assets/mod/meta.php';?>      
  <link rel="stylesheet" href="./assets/css/upload.css">
</head>

  <body>
<?php include './assets/mod/db.php';?>
    <?php include("./assets/mod/header.php"); ?>
<div class="container">
<div class="content">
<!-- TODO: Remove this old page header completely 
<div class="page-header">
            <?php //include './assets/mod/msg.php'; ?>
            <?php //include './assets/mod/alert.php'?>
          <h1>Upload your video <small><div id="clockbox"></div></small></h1>
          <?php //include './assets/mod/todaysdate.php'; ?>
        </div>
-->
<?php
    if(!isset($_SESSION['profileuser3'])) {
        echo('<script>
             window.location.href = "/";
             </script>');
    }
    
    if(isset($_SERVER['HTTPS'])) {
        $protocol = 'https';
    } else {
        $protocol = 'http';
    }

   if (isset($_POST['submit'])){
//     if(empty($_POST['fileToUpload'])) {
//         error_reporting(E_ALL);
// ini_set('display_errors', '1');
//         echo('<script>
//         window.location.href = "/?err=No video file.";
//         </script>');
//     }
    if(empty($_POST['videotitle'])) {
        $_POST['videotitle'] = date('F j, Y');
    }
    if(empty($_POST['bio'])) {
        $_POST['bio'] = 'I am too lazy to put in a description.';
    }
    if (strlen($_POST['videotitle']) > 50) {
        echo('<script>
        window.location.href = "/?err=Video title too long.";
        </script>');
        exit();
    }
       if(!isset($_SESSION['profileuser3'])) {
        echo '<script>
        window.location.href = "login.php";
        </script>';
       }
       function randstr($len, $charset = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-"){
           return substr(str_shuffle($charset),0,$len);
       }
       $v_id = randstr(11);
       $target_dir = "content/tmp/";
       $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
       if(!is_dir($target_dir)){
           mkdir($target_dir);
       }
       $uploadOk = 1;
       $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
       if (file_exists($target_file)) {
           echo "
           <div class='alert-message error page-alert'>
           Video with the same filename already exists. That's.....interesting.
           </div>
           ";
           $uploadOk = 0;
       }
       if($imageFileType != "mp4" && $imageFileType != "avi") {
           echo "
           <div class='alert-message error page-alert'>
           Only MP4 files are allowed.
           </div>
           ";
           $uploadOk = 0;
       }
       if ($uploadOk == 0) {
           echo "
           <div class='alert-message error page-alert'>
           Unknown error.
           </div>
           ";
       } else {
           if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
               rename("$target_file", "content/unprocessed/$v_id.mp4");
               $new_target_file = "content/unprocessed/$v_id.mp4";
               exec("$ffmpeg -i ".$new_target_file." -vf scale=640x480 -c:v libx264 -b:a 256k  -c:a aac -ar 22050 content/video/$v_id.mp4");
               $processed_file = "content/video/$v_id.mp4";
               unlink("content/unprocessed/$v_id.mp4");
               $target_thumb = "content/thumb/".$v_id.".jpg";
               $thumbcmd = "$ffmpeg -i $processed_file -vf \"thumbnail\" -frames:v 1 -s 1280x720 $target_thumb";
               $length = round(exec("$ffprobe -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 ".$processed_file));
               $video = $_POST['videotitle'];
               $user = $_SESSION['profileuser3'];
               //  $v_id = randstr(11);
               $statement = $mysqli->prepare("INSERT INTO videos (videotitle, vid, description, author, filename, thumb, duration, date) VALUES (?, ?, ?, ?, ?, ?, ?, now())");
               $statement->bind_param("sssssss", $videotitle, $v_id, $description, $author, $filename, $thumb, $length);
               $videotitle = htmlspecialchars($_POST['videotitle']);
               $description = str_replace(PHP_EOL, "<br>", htmlspecialchars($_POST['bio']));
               $author = htmlspecialchars($_SESSION['profileuser3']);
               $filename = "$v_id.mp4";
               $thumb = "$v_id.jpg";
               exec($thumbcmd);
               $statement->execute();
               $statement->close();
               $webhookurl = $webhook;
               $msg = "**$user** just uploaded **$video** => $protocol://".$_SERVER["SERVER_NAME"]."/watch?v=".$v_id."";
               $json_data = array ('content'=>"$msg");
               $make_json = json_encode($json_data);
               $ch = curl_init( $webhookurl );
               curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
               curl_setopt( $ch, CURLOPT_POST, 1);
               curl_setopt( $ch, CURLOPT_POSTFIELDS, $make_json);
               curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
               curl_setopt( $ch, CURLOPT_HEADER, 0);
               curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
               $response = curl_exec( $ch );
               echo('<script>
             window.location.href = "/?msg=Your video has been uploaded!";
             </script>');
           } else {
               echo "The upload failed. Error code: ";
               echo $_FILES["fileToUpload"]["error"];
           }
       }
   }
   ?>
                            <!-- <br>
            <br>
            <br>
            <br> -->
            <?php
            if(!isset($_SESSION['profileuser3'])) {
              echo('<script>
              window.location.href = "/login";
              </script>');
          }
          ?>
          <div class="bar">
            <div class="bar-left">
                <p>Upload</p>
            </div>
            <div class="bar-right">
                <a class="yt-button" href="my_videos">Video Manager</a>
        </div>
        </div>
          <div class="row">
          <div class="span8">
                <!-- <h1>Upload Video</h1> -->
               <!-- <h3><i>Please check if you're logged in, if you're not, you need to sign in to upload videos.</i></h3>
                <small>This will be fixed in a later update.</small> -->
                <br>
                <form class="form-stacked" action="" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                       <label for="videofile">File (.mp4 only) </label>
                        <input type="file" accept=".mp4" name="fileToUpload" id="fileToUpload">
                    </div>
                     <br>
                    <div class="input-group">
                       <label for="videotitle">Title </label>
                        <input class="yt-search-input" type="text" id="videotitle" placeholder="Title" name="videotitle">
                    </div>
                     <br>
                    <div class="input-group">
                  <label for="bio">Description</label> 
                        <textarea class="yt-search-input" style="background-color: var(--inputlol);" name="bio" placeholder="Enter a description for your video here" rows="4" cols="50"></textarea>
                    </div>
                    <div class="input-group">
                         <br>
                        <div></div>
                        <div><input type="submit" class="yt-button primary" value="Upload" name="submit"></div>
                    </div>
                
        </div>
        <div class="span6">
        <div class="input-group">
                       <label class="rlabel" for="privacy">Privacy Settings </label>
        <select class="upload-select" name="privacy">
			<option value="public"> Public</option>
			<option value="unlisted"> Unlisted</option>
			<option value="private"> Private</option>
		</select>
        </div>

        <div class="input-group">
                       <label class="rlabel" for="category">Category </label>
        <select class="upload-select" name="category">
			<option value="select"> Select a category</option>
		</select>
        </div>
        </div>
    </form>
        </div>
            </div>
        </div>
    <hr>
    <?php include("./assets/mod/footer.php") ?>
</body>
</html>
<?php $mysqli->close();?>

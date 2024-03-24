<?php require_once("./assets/mod/webhook.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php require_once './assets/mod/meta.php';?>
</head>

  <body>
<?php require_once './assets/mod/db.php';?>
    <?php require_once("./assets/mod/header.php");?>
    <center>
    <?php
    if (isset($_POST['submit'])){
        if(!isset($_SESSION['profileuser3'])) {
            die("<br>Login to report....");
        }} 
        if(!isset($reports_webhook)) {
            die("<br><h2>Video reporting isn't enabled on this instance.</h2>");
        }
        if(empty($reports_webhook)) {
            die("<br><h2>Video reporting isn't enabled on this instance.</h2>");
        }
        ?>
        </center>
    <div class="container-flex"> 
    <?php 
            if (isset($_GET['v'])) {
                $video = $_GET['v'];
                $disabled = 'disabled';
            } else {
                $video = "";
                $disabled = "";
            }
            if (isset($_GET['offender'])) {
                $offender = $_GET['offender'];
                $disableda = 'disabled';
            } else {
                $offender = "";
                $disableda = "";
            }
            ?>
    <?php
    if(isset($_POST["submit"])){
        if(!isset($video)) {
            $link = @$_POST["sitelink"];
        } else {
            $link = $video;
        }
        if(!isset($offender)){
            $user = @$_POST["username"];
        } else {
            $user = $offender;
        }
    $proname = @$_POST["reason"];
    $username = $_SESSION['profileuser3'];

    $msg = "### New report by $username:\nReason: $proname\nVideo ID: $link\nUploader: $user";
    $json_data = array ('content'=>"$msg");
    $make_json = json_encode($json_data);
    $ch = curl_init( $reports_webhook );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $make_json);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec( $ch );
    echo('<script>
               window.location.href = "index?msg=Your report has been submitted successfully!";
               </script>');
    }
/* old report system isnt working?
$proname = @$_POST["reason"];
$link = @$_POST["sitelink"];
$user = @$_POST["username"];

if(isset($_POST["submit"])){

    $dw = new DiscordWebhook($reports_webhook);
    $username = $_SESSION['profileuser3'];

    $dw->newMessage()
    ->setContent("**".$username."** just submitted a report:")
    ->setTitle("New Report")
    ->setColor("#3238a8")
    ->addFields(
        ["Reason:", $proname, true],
        ["Offending video:", $link, true],
        ["User:", $user, true]
    )
    ->setTimestamp()
    ->setUsername($username)
    ->send(); 
     echo('<script>
               window.location.href = "index?err=Your report has been submitted successfully!";
               </script>');
} */
?>
        <div class="col-1-2">
            <br>
            <br>
            <br>
            <br>
            <center><h3>Report a video</h3>
            <br>
            <div class="card blue">
                <form method="post" action="">
                    <div class="input-group">
                    <input type="text" name="reason" placeholder="Reason" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="text" name="sitelink" value="<?php echo $video;?>" placeholder="Offending Video" required <?php echo $disabled;?>>
                    </div>
                    <br>
                    <div class="input-group">
                    <input type="text" name="username" value="<?php echo $offender;?>" placeholder="Uploader" required <?php echo $disableda;?>>
                    </div>
                    <br>                   
                    <div class="input-group">
                    <input class="yt-button" type="submit" name="submit" value="Submit Report">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <?php require_once("./assets/mod/footer.php") ?>
</body>
</html>
<?php $mysqli->close();?>
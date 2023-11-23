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
          <h1>Statistics <small>Accurate as of <span id="clockbox"></span></small></h1>
          <?php include './assets/mod/todaysdate.php'; ?>
        </div>
        <div class="row">
          <div class="span10">
            <?php
            $sql = "SELECT COUNT(*) FROM users";
            $result = mysqli_query($mysqli, $sql);
            $usercount = mysqli_fetch_assoc($result)['COUNT(*)'];
            $sql2 = "SELECT COUNT(*) FROM videos";
            $result2 = mysqli_query($mysqli, $sql2);
            $videocount = mysqli_fetch_assoc($result2)['COUNT(*)'];
            $sql3 = "SELECT COUNT(*) FROM comments";
            $result3 = mysqli_query($mysqli, $sql3);
            $commentcount = mysqli_fetch_assoc($result3)['COUNT(*)'];
            ?>
            <h2>Registered Users: <?php echo $usercount;?></h2>
            <h2>Submissions: <?php echo $videocount;?></h2>
            <h2>Comments: <?php echo $commentcount;?></h2>
            <hr>
            <?php include("/assets/lib/sysinfo.php"); ?>
            <?php
// Example
$system = new SystemInfo();

echo "CPU usage: " . $system->getCpuLoadPercentage() . "%\n";
echo "Disc: \n";
print_r($system->getDiskSize(PHP_OS == 'WINNT' ? 'C:' : '/'));
echo "\n\n";
echo "RAM total: " . round($system->getRamTotal() / 1024 / 1024) . " MB \n";
echo "RAM free: " . round($system->getRamFree() / 1024 / 1024) . " MB \n";
?>
          </div>
          <div class="span4">
<?php include './assets/mod/whatsnew.php'; ?>
      </div>

</div></div>
    </div><!-- /container -->
    <?php include './assets/mod/footer.php'; ?>
  </body>
</html>
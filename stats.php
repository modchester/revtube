<!DOCTYPE html>
<html lang="en">
  <head>
  <?php require_once './assets/mod/meta.php';?>      
</head>

  <body>
<?php require_once './assets/mod/db.php';?>
<?php require_once './assets/mod/header.php';?>
    <div class="container">
 <div class="content">
        <div class="page-header">
        <?php require_once './assets/mod/alert.php';?>
          <h1>Statistics <small>Accurate as of <span id="clockbox"></span></small></h1>
          <?php require_once './assets/mod/todaysdate.php'; ?>
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
            <p>More stats later</p>
            <hr>
<h3>Server info</h3>
<p>OS: <?php echo php_uname() ?></p>
<!-- <p>CPU: <?php //exec('wmic cpu get name | find /v "Name"', $cpuname); print($cpuname[0]); ?></p> -->
          </div>
          <div class="span4">
<?php require_once './assets/mod/whatsnew.php'; ?>
      </div>

</div></div>
    </div><!-- /container -->
    <?php require_once './assets/mod/footer.php'; ?>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php require_once './assets/mod/meta.php';?>      
</head>

  <body>
<?php require_once './assets/mod/db_init.php';?>
<?php require_once './assets/mod/header.php';?>
    <div class="container">
 <div class="content">
        <div class="page-header">
        <?php require_once './assets/mod/alert.php';?>
          <h1>Channels <small><div id="clockbox"></div></small></h1>
          <?php require_once './assets/mod/todaysdate.php'; ?>
        </div>
        <div class="row">
          <div class="span10">
			<?php
			$statement = $mysqli->prepare("SELECT * FROM users ORDER BY username DESC");
			$statement->execute();
			$result = $statement->get_result();
			if($result->num_rows !== 0){
				while($row = $result->fetch_assoc()) {
					$rows = getSubscribers($row['username'], $mysqli);
				    echo "
				    <div class='user'>
				    	<div class='user-info'>
						    <div><a href='./profile?user=".htmlspecialchars($row['username'])."'><img class='cmn' height='34px' width='34px' style='padding-right:2px;' src='content/pfp/".getUserPic($row['id']). "'> <b>".htmlspecialchars($row['username'])."</b></a> (".$rows." subscribers)</div>
						    <!-- <div><span class='black'>".$rows."</span> subscribers</div> -->
							<div><em>".htmlspecialchars($row["description"])."</em></div>
					    </div>
					  <!-- <div><a href='./profile?user=".htmlspecialchars($row["username"])."'><img class='cmn' height='34px' width='34px' src='content/pfp/".getUserPic($row['id']). "'></a></div> -->
				    </div>
				    <hr>";
				}
			}
			else{
				echo "There are no channels. Why not make one?";
			}
			$statement->close();
			?>
          </div>
          <div class="span4">
         <?php require_once './assets/mod/whatsnew.php'; ?>
          </div>
        </div>
      </div>

    </div></div></div> <!-- /container -->
	<?php require_once './assets/mod/footer.php'; ?>
  </body>
</html>
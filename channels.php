<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include 'meta.php';?>      
</head>

  <body>
<?php include 'db.php';?>
<?php include 'header.php';?>
    <div class="container">
 <div class="content">
        <div class="page-header">
        <?php include 'alert.php';?>
          <h1>Channels <small><div id="clockbox"></div></small></h1>
          <?php include 'todaysdate.php'; ?>
        </div>
        <div class="row">
          <div class="span10">
			<?php
			$statement = $mysqli->prepare("SELECT * FROM users ORDER BY subscribers DESC");
			$statement->execute();
			$result = $statement->get_result();
			if($result->num_rows !== 0){
				while($row = $result->fetch_assoc()) {
				    echo "
				    <div class='user'>
				    	<div class='user-info'>
						    <div><a href='./profile.php?id=".$row['id']."'>".$row['username']."</a></div>
						    <div><span class='black'>".$row['subscribers']."</span> subscribers</div>
					    </div>
					  <!--  <div><a href='./profile.php?id=".$row["id"]."'><img class='user-picture' src='./pfp/".getUserPic($row["id"])."'></a></div> -->
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
            <h3>What's New</h3>
            <ul class="unstyled">
<li>Hopefully we will be able to replace the shitty 2009 frontend soon</li>
<br>
<li>BT12012 is semi-finished, and will probably be completely finished by 2022</li>
            </ul>
            <!--<input class="input" type="text" placeholder="Username">
            <br>
            <input class="input" type="password" placeholder="Password">
            <br>
            <button class="btn" type="submit">login</button>-->
          </div>
        </div>
      </div>

      <footer>
        <p>&copy;Redst0ne 2012-2022</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
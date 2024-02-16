<h3>Hiya, <?php echo htmlspecialchars($_SESSION['profileuser3']); ?>!</h3>
<?php
			if(isset($_SESSION['profileuser3'])){
			    $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
			    $statement->bind_param("s", $_SESSION['profileuser3']);
			    $statement->execute();
			    $result = $statement->get_result();
			    if($result->num_rows === 0) errorPage(404, 404);
			    while($row = $result->fetch_assoc()) {
					$join = strtotime($row["date"]);
					$join2 = date('F d, Y',$join);
					$rows = getSubscribers($_SESSION['profileuser3'], $mysqli);
			        echo "
			        <div class=\"user-info\">
				        <a href=\"./profile?user=".$row["username"]."\"><img width=\"225px\" height=\"225px\" src=\"/content/pfp/".getUserPic($row["id"])."\"></a>
				        <div class=\"user-stats\">
					        <div class=\"username\"><a href=\"./profile?user=".htmlspecialchars($row["username"])."\">".htmlspecialchars($row["username"])."</a></div>
							<div><i class='bi bi-envelope-at-fill'></i> - <span class=\"black\">".htmlspecialchars($row["email"])."</span></div>
					        <div><span class=\"subscribers black\">".$rows."</span> subscribers</div>
				        </div>
			        </div>
			        <hr>
			        <h3>Your Current Bio</h3>
			        <textarea class=\"current-description\" readonly>".htmlspecialchars($row["description"])."</textarea>
					<hr>
					<span style='display:inline-block;float:right !important;'>Joined ".$join2."</span>";
			    }
			    $statement->close();
			}
			?>
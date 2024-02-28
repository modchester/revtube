<link rel="stylesheet" href="./assets/css/sub.css">
<div class="page-header">
        <?php
                $statement = $mysqli->prepare("SELECT * FROM `users` WHERE `username` = ? LIMIT 1");
                $statement->bind_param("s", $_GET['user']);
                $statement->execute();
                $result = $statement->get_result();
                while($row = $result->fetch_assoc()) {
                  $pfp = idFromUser($_GET['user']);
                  $rows = getSubscribers($_GET['user'], $mysqli);
                  if($row['is_admin'] == 1) {
                    $staff = '<i class="bi bi-shield-fill"></i>';
                  } else {
                    $staff = '';
                  }
                  if($row['is_verified'] == 1) {
                    if(!empty($row['custom_css'])) {
                      $customCSS = '<style>'.$row['custom_css'].'</style>';
                      echo $customCSS;
                    }
                    
                    $verified = '<img style="margin-bottom:-3px;" height="24px" src="/assets/img/verified_dark.png">';
                  } else {
                    $verified = '';
                  }
                  echo('
                  <img id="rechannel-pfp" src="/content/pfp/' .getUserPic($pfp). '">
          <h1>'.htmlspecialchars($row["username"]).' '.$verified.'<small><div id="usernamecontainer">@'.htmlspecialchars($row["username"]).'</div></small></h1>
            '); 
            if(isset($_SESSION['profileuser3'])) {
              if($row['username'] == $_SESSION['profileuser3']) {
                echo '
                <div id="editprof-container"><a href="/account" id="editprof" class="yt-button" type="button"><i class="bi bi-gear-fill"></i> Manage Account</a></div>';
            } else {
                if(ifSubscribed($_SESSION['profileuser3'], $row['username'], $mysqli) == false) {
               echo '
               <div class="subbtnrechannel">
               <a class="yt-button sub-button" style="margin-left: 44px; margin-top: 8px;" href="/subscribe?name=' . htmlspecialchars($row['username']) . '"><span class="sub-button-text">Subscribe</span></a> <span class="yt-subscription-button-subscriber-count-branded-horizontal subscribed">'.$rows.'</span> 
               </div>
               ';
               } else { 
                echo '
                <div class="subbtnrechannel">
                <a class="yt-button subbed-button" style="margin-left: 44px; margin-top: 8px;" href="/unsubscribe?name=' . htmlspecialchars($row['username']) . '"><span class="sub-button-text">Unsubscribe</span></a> <span class="yt-subscription-button-subscriber-count-branded-horizontal subscribed">'.$rows.'</span>
                </div>
                ';
                 }}
                } else {
                    echo'
                    <div class="subbtnrechannel">
                    <a class="yt-button disabled sub-button" style="margin-left: 44px; margin-top: 8px;"><span class="sub-button-text">Subscribe</span></a> <span class="yt-subscription-button-subscriber-count-branded-horizontal subscribed">'.$rows.'</span>
                    </div>
                    ';
                }
              }
            ?>
        </div>
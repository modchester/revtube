<!DOCTYPE html>
<html lang="en">
  <head>
  <?php require_once './assets/mod/meta.php';?>
  <link rel="stylesheet" href="/assets/css/sub.css">
  <script src="https://kit.fontawesome.com/fbb4da9442.js" crossorigin="anonymous"></script>      
</head>

  <body>
<?php require_once './assets/mod/db_init.php';?>
<?php require_once './assets/mod/header.php';?>
<?php 
            $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
            $statement->bind_param("s", $_GET['user']);
            $statement->execute();
            $result = $statement->get_result();
            while($row = $result->fetch_assoc()) {
                if ($row['strikes'] > 3) {
                  echo('<script>
             window.location.href = "/?err=This account has been terminated for a violation of '.$site['name'].'\'s Community Guidelines.";
             </script>');
                  }
            }
            $statement->close();
        ?>
<style>
            body {
                background: url('/content/background/<?php $id = idFromUser($_GET['user']); echo getBackground($id);?>') !important;
            }

            #editprof-container {
              text-align: center;
              margin: 0 auto;
            }
            </style>
    <div class="container">
 <div class="content">
 <?php require_once ("./assets/mod/channelheader.php"); ?>
        <div class="row">
          <div class="span10">
        <div class="container-flex">
            <div class="col-2-3">
              <!-- <img class="profilebanner" src="content/banners/default.png"> -->
              <ul class="yt-tabs" data-tabs="tabs">
  <li><a href="/user/<?php echo htmlspecialchars($_GET['user']); ?>">Home</a></li>
  <li><a href="/videos/<?php echo htmlspecialchars($_GET['user']); ?>">All Videos</a></li>
  <li><a href="/subscribers/<?php echo htmlspecialchars($_GET['user']); ?>">Subscribers</a></li>
  <li class="active"><a href="/subscriptions/<?php echo htmlspecialchars($_GET['user']); ?>">Subscriptions</a></li>
  <li><a href="/discussion/<?php echo htmlspecialchars($_GET['user']); ?>">Discussion</a></li>
</ul>
                <?php
                    $statement = $mysqli->prepare("SELECT `username`, `id` FROM `users` WHERE `username` = ? LIMIT 1");
                    $statement->bind_param("s", $_GET['user']);
                    $statement->execute();
                    $result = $statement->get_result();
                    while($row = $result->fetch_assoc()) {
                     /*   $finalstring = "<h2>".$row['username']."</h2>
                       <!-- <img style=\"width:128px;\" src=\"pfp/".getUserPic($row["id"])."\">
                        <div class=\"user-info\"> -->
                            <!--<div class=\"user-name\"><a href=\"profile.php?id=".$row["id"]."\">".$row["username"]."</a></div>-->
                            <div><h3><span class=\"black\">".$row["subscribers"]."</span> subscribers</h3></div>";
                            if($_SESSION["subscribedto".$row["id"]] === false) {
                                $finalstring .= "<div><a class\"btn danger\" href=\"subscribe.php?id=".$row["id"]."&u=0\"><!--<img src=\"buttonsub.png\">-->SUBSCRIBE</a></div>";
                            }
                            else{
                                $finalstring .= "<div><a class\"btn danger\"href=\"subscribe.php?id=".$row["id"]."&u=1\"><!--<img src=\"buttonunsub.png\">-->UNSUBSCRIBE</a></div>";
                            }
                                            if ($row['verified'] == 'TRUE') {
                    echo "
                <span class=\"label success\">Verified</span>
                "; 
                } */
                     //   $finalstring .= "</div>";

                       // echo $finalstring;
                        $username = $row["username"];
                    }
                    $statement = $mysqli->prepare("SELECT * FROM subscribers WHERE sender = ?");
                    $statement->bind_param("s", $_GET['user']);
                    $statement->execute();
                    $result = $statement->get_result();
                    echo "<h3>".htmlspecialchars($_GET['user'])."'s subscriptions</h3>";
                    if($result->num_rows !== 0){
                    while($row = $result->fetch_assoc()) {
                        $pid = idFromUser($row['receiver']);
                        $rowe = getSubscribers($row['receiver'], $mysqli);
                        $name = htmlspecialchars($row['receiver']);
                        echo "<div class='user'>
				    	<div class='user-info'>
						    <div><a href='./profile?user=".htmlspecialchars($name)."'><img class='cmn' height='34px' width='34px' style='padding-right:2px;' src='content/pfp/".getUserPic($pid). "'> <b>".htmlspecialchars($name)."</b></a> (".$rows." subscribers)</div>
						    <!-- <div><span class='black'>".$rowe."</span> subscribers</div> -->
					    </div>
					  <!-- <div><a href='./profile?user=".htmlspecialchars($name)."'><img class='cmn' height='34px' width='34px' src='content/pfp/".getUserPic($pid)."'></a></div> -->
				    </div>
				    <hr>";
                    }
                    }
                    else{
                        echo("This user has no subscriptions.");
                    }
                    $statement->close();
                ?>
            </div>
        </div>
          </div>
          <div class="span4" id="channel">
            <?php 
            // this doesnt work because i forgot views have their own table not including author names
            // never mind i fixed
            $statement = $mysqli->prepare("SELECT SUM(views) AS total FROM videos WHERE author = ?");
            $statement->bind_param("s", $_GET['user']);
            $statement->execute();
            $result = $statement->get_result();
            if($result->num_rows == 0) {
                $totalviews = 0;
            }
            while($row = $result->fetch_assoc()) {
            $totalviews = $row["total"];
            }
            // can still use basically the same thing for video count
            //  $statement = $mysqli->prepare("SELECT vid, count(*) as author FROM videos WHERE author = ? GROUP BY vid");
            //  $statement->bind_param("i", $_GET['user']);
            //  $statement->execute();
            //  $totalviews = $statement->fetch();
            //  $statement->close();
            ?>
             <?php 
            // omg
            $statement = $mysqli->prepare("SELECT * FROM videos WHERE author = ?");
            $statement->bind_param("s", $_GET['user']);
            $statement->execute();
            $result = $statement->get_result();
            if($result->num_rows == 0) {
              $totalviews = 0;
          }
          ?>
                        <h3>About Me</h3>
                            <?php
                $statement = $mysqli->prepare("SELECT `description`, `date`, `lastfmuser` FROM `users` WHERE `username` = ? LIMIT 1");
                $statement->bind_param("s", $_GET['user']);
                $statement->execute();
                $result = $statement->get_result();
                while($row = $result->fetch_assoc()) {
                  $join = strtotime($row["date"]);
                  $join2 = date('F d, Y',$join);
                  $lastfmuser = $row['lastfmuser'];
                    echo "<div class='card message'>
                    ".htmlspecialchars($row["description"])."
                    </div><hr>";
                }
                ?>
                                 <?php
                    if(!empty($lastfmuser) && isset($lastfmkey)) {
 $user     = $lastfmuser; // Enter your username here
 $key      = $lastfmkey; // Enter your API Key
 $status   = 'Last Played'; // default to this, if 'Now Playing' is true, the json will reflect this.
 $endpoint = 'https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=' . $user . '&&limit=2&api_key=' . $key . '&format=json';
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $endpoint);
 curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
 curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); // 0 for indefinite
 curl_setopt($ch, CURLOPT_TIMEOUT, 10); // 10 second attempt before timing out
 curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
 $response = curl_exec($ch);
 $lastfm[] = json_decode($response, true);
 curl_close($ch);

 $artwork = $lastfm[0]['recenttracks']['track'][0]['image'][2]['#text'];
 if ( empty( $artwork ) ) {  // Check if album artwork exists on last.fm, else use our own fallback image
    $artwork = 'img/no_art.jpg';
}

$trackInfo = [
    'name'       => $lastfm[0]['recenttracks']['track'][0]['name'],
    'artist'     => $lastfm[0]['recenttracks']['track'][0]['artist']['#text'],
    'link'       => $lastfm[0]['recenttracks']['track'][0]['url'],
    'albumArt'   => $artwork,
    'status'     => $status
];

if ( !empty($lastfm[0]['recenttracks']['track'][0]['@attr']['nowplaying']) ) {
    $trackInfo['nowPlaying'] = $lastfm[0]['recenttracks']['track'][0]['@attr']['nowplaying'];
    $trackInfo['status'] = 'Now Playing';
}
echo '<div><img style="float:left;margin-right:5px;margin-top:4px;" height="48px" width="48px" src="'.$trackInfo['albumArt'].'"><b>'.$trackInfo['status'].' <i class="fab fa-lastfm"></i></b><br><div class="nooverflow"><a href="'.$trackInfo['link'].'">'.$trackInfo['name'].'</a><br>'.$trackInfo['artist'].'</div></div><hr>';
                    }
 ?>
                <?php echo "
                    <h3>Statistics</h3>
                    <div class='card message'>
                    <span class='stat'>".$rows."</span> subscribers
                    <br>
                    <span class='stat'>".$totalviews."</span> views<br>
                    <span style='display:inline-block;float:right !important;'>Joined ".$join2."</span>

                    ";
                $statement->close();
                ?>
            <!--<input class="input" type="text" placeholder="Username">
            <br>
            <input class="input" type="password" placeholder="Password">
            <br>
            <button class="btn" type="submit">login</button>-->
          </div>
        </div>
      </div>

    </div></div> <!-- /container -->
    <?php require_once './assets/mod/footer.php'; ?>
  </body>
</html>

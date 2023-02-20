<div class="guide">
    <ul>
        <a href="/"><li class="guide-item"><i class="bi bi-house-door-fill"></i> Home</li></a>    
    <span>Most of Revista</span>
        <a href="/videos"><li class="guide-item"><i class="bi bi-camera-video-fill"></i> Videos</li></a>
        <a href="/community"><li class="guide-item"><i class="bi bi-people-fill"></i> Community</li></a>
    <?php
      if(!$loggedIn) {
        echo '
        <div class="sign-in-box">
        Yo, you are not signed in. By signing in, you will enjoy Revista more.
        <br>
        <a class="yt-button primary" href="/alogin">Sign in</a>
        </div>';
      } else {
        $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
			    $statement->bind_param("s", $_SESSION['profileuser3']);
			    $statement->execute();
			    $result = $statement->get_result();
			    if($result->num_rows === 0) exit('No rows');
			    while($row = $result->fetch_assoc()) {
			        echo '
                    <span>My channel</span>
                        <a href="/account"><li class="guide-item"><i class="bi bi-gear-fill"></i> Settings</li></a>
                        <a href="/upload"><li class="guide-item"><i class="bi bi-file-earmark-arrow-up-fill"></i> Upload</li></a>';
			    }
			    $statement->close();
      }
    ?>
    <hr>
        <a href="/channels"><li class="guide-item"><i class="bi bi-plus-circle-fill"></i> Browse channels</li></a>
    </ul>
</div>
<div class="guide">
    <ul>
        <a href="/profile?user=<?php echo htmlspecialchars($_SESSION['profileuser3']); ?>"><li class="guide-item"><b><?php echo htmlspecialchars($_SESSION['profileuser3']); ?></b></li></a>    
        <!--<span>Most of <?php echo $site['name']; ?></span>-->
        <a href="/my_videos"><li class="guide-item">Studio</li></a>
        <a href="/explore"><li class="guide-item">Explore</li></a>
        <hr>
        <a href="/"><li class="guide-item">What to Watch</li></a>
        <a href="/inbox/index"><li class="guide-item">Inbox</li></a>
        <a href="/account"><li class="guide-item">Settings</li></a>
        <a href="/upload"><li class="guide-item">Upload</li></a>
        <hr>
        <?php require_once("getsubs.php"); ?>
        <a href="//discord.gg/GbbQBsWXPK"><li class="guide-item"><i class="bi bi-discord"></i> Discord</li></a>
        <a href="/channels"><li class="guide-item"><i class="bi bi-plus-circle-fill"></i> Browse channels</li></a>
    </ul>
</div>
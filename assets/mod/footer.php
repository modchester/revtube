<footer class="yt-footer">
    <h3><a class="logost" href="/"><strong>clipIt</strong><!--<img src="./assets/navlogo.png" height="17px" width="59px">--></a></h3>
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
    <p><abbr title="semi-2013 made by Cattskit and redst0ne, name by Cattskit">&copy; clipIt 2012-2023</abbr> &bull; Running PHP <?php $phpver = phpversion(); echo $phpver;?> | Users: <?php echo $usercount;?> | Videos: <?php echo $videocount;?> | Comments: <?php echo $commentcount;?></p>
    <!-- almost ready for launch i guess -redst0ne 05/04/23 -->
</footer>
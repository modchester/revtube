<footer class="yt-footer">
    <h3><a class="logost" href="/"><strong>clipIt</strong><!--<img src="./assets/navlogo.png" height="17px" width="59px">--></a></h3>
    <?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
?>
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
            $phpver = phpversion();
            ?>
    <p><abbr title="semi-2013 made by Cattskit and redst0ne, name by Chaziz">&copy; clipIt 2012-2023</abbr> <?php if ($debug == "true") { echo '&bull; <span style="color:red;">[DEBUG]</span> Running PHP '.$phpver.' | Users: '.$usercount.' | Videos: '.$videocount.' | Comments:'.$commentcount.' | Page loaded in '.$total_time.' seconds';}?></p>
    <!-- almost ready for launch i guess -redst0ne 05/04/23 -->
</footer>


<footer class="yt-footer">
<style>      .footerlogost {
        content: url('<?php echo $logosrc; ?>') !important;
        height: 23px;
        margin-top: -2px !important;
        margin-right: -13px !important;
        margin-bottom: -1px;
        /* filter: invert(1); */
    } </style>
    <h3><a class="footerlogost" href="/"><strong><?php echo $sitename; ?></strong><!--<img src="./assets/navlogo.png" height="17px" width="59px">--></a></h3>
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
    <p><abbr title="semi-2011 made by Cattskit and redst0ne">&copy; <?php echo $sitename; ?> 2021-<?php echo date("Y"); ?></abbr> <?php if(isset($debugmsg)) { echo $debugmsg; } ?></p>
    <!-- almost ready for launch i guess -redst0ne 05/04/23 -->
    <!-- will people ever be willing to actually use this? -redst0ne 06/17/23 -->
    <!-- maybe? -redst0ne 11/22/23 -->
</footer>


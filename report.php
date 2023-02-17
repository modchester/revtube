<?php include './assets/mod/db.php';?>
<?php include("./assets/mod/webhook.php"); ?>
<h1>Report Video</h1>
<form action="report.php" method="POST">
        <input type="text" name="reason" placeholder="Reason">
        <br>
        <input type="text" name="sitelink" placeholder="Offending Video">
        <br>
        <input type="text" name="username" placeholder="Name of Channel with Video">
        <br>
        <h3><input type="submit" name="submit" value="Submit Report"></h3>
        </form>
        <br>
        <?php
$proname = @$_POST["reason"];
$link = @$_POST["sitelink"];
$user = @$_POST["username"];

if(isset($_POST["submit"])){

    $dw = new DiscordWebhook($webhook);

    $dw->newMessage()
    ->setContent("New report submitted")
    ->setTitle("New Report")
    ->setDescription($shit)
    ->setColor("#3238a8")
    ->addFields(
        ["Reason:", $proname, true],
        ["Offending video:", $link, true],
        ["User:", $user, true]
    )
    ->setTimestamp()
    ->send();    
}
?>

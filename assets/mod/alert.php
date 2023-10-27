<!-- <div class='alert-message warning'>
  <p><strong>clipIt's user interface <!-semi-2013-> is currently in development. </strong>Please note, it is still unfinished.</p>
</div> -->
<!-- <div class='alert-message info'>
<img style="float:left;margin-left: -4px;margin-top:0px;margin-right:10px;" src="assets/img/asterisk.png">
  <p style="margin-top:2px;"><strong>We've updated our Community Guidelines!</strong> Take a moment to read the <a href="/guidelines">updated guidelines</a>.</p>
</div> -->
<?php
                    include("assets/mod/time.php");
                    $statement = $mysqli->prepare("SELECT * FROM announcements ORDER BY date DESC LIMIT 1 ");
                    $statement->execute();
                    $result = $statement->get_result();
                    if($result->num_rows !== 0){
                        while($row = $result->fetch_assoc()) {
                          $humandate = time_elapsed_string(''.$row['date'].'');
                            echo '<div class="alert-message info"><p><b>' . $row['author'] . ' said:</b> ' . $row['content'] . ' ('.$humandate.')</p></div>';
                        }
                    }
                    else{
                        echo "";
                    }
                ?>
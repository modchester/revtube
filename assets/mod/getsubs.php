
<?php 
                                        if(isset($_SESSION['profileuser3'])) {
                                          $stmt = $mysqli->prepare("SELECT * FROM subscribers WHERE sender = ?");
                                          $stmt->bind_param("s", $_SESSION['profileuser3']);
                                          $stmt->execute();
                                          $result = $stmt->get_result();
                                          if($result->num_rows == 0){ echo 'You are not subscribed to any channels.'; }
                                          while($row = $result->fetch_assoc()) {
                                            $pid = idFromUser($row['receiver']);
                                            $rows = getSubscribers($row['receiver'], $mysqli);
echo '<a href="/profile?user='.$row['receiver'].'"><li class="guide-item"><img src="/content/pfp/' .getUserPic($pid). '" width="8px" height"8px"> '.$row['receiver'].'</li></a>';
                                          }
                                        }
                                        ?>
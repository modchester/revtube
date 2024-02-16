
<?php 
                                        if(isset($_SESSION['profileuser3'])) {
                                          $stmt = $mysqli->prepare("SELECT * FROM subscribers WHERE sender = ?");
                                          $stmt->bind_param("s", $_SESSION['profileuser3']);
                                          $stmt->execute();
                                          $result = $stmt->get_result();
                                          if($result->num_rows !== 0){ echo "<span>Your subscriptions</span>"; }
                                          
                                          while($row = $result->fetch_assoc()) {
                                            $pid = idFromUser($row['receiver']);
                                            $rows = getSubscribers($row['receiver'], $mysqli);
echo '<a href="/profile?user='.htmlspecialchars($row['receiver']).'"><li class="guide-item"><img style="vertical-align: bottom;" src="/content/pfp/' .getUserPic($pid). '" width="21px" height="19px"> '.htmlspecialchars($row['receiver']).'</li></a>';
                                          }
                                        }
                                        ?>
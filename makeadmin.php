<?php
require_once("assets/lib/admin.php");
require_once("assets/mod/db_init.php");
                    $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? ");
                    $statement->bind_param("s", $_SESSION['profileuser3']);
                    $statement->execute();
                    $result = $statement->get_result();
                    if($result->num_rows !== 0){
                        while($row = $result->fetch_assoc()) {
                        if ($row["is_admin"] == 1) {
                            if (isset($_POST["submit"])){
                                makeAdmin($_POST['user'], $mysqli);
                                echo('<script>window.location.href = "/?msg='.$_POST['user'].' made admin successfully!";</script>');
                            }
                        }
                    }
                }
                ?>
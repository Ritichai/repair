
           <?php
                            if (isset($_GET['submit'])) {
                                include '../conn.php';
                                $profile_fname = $_GET['profile_fname'];
                                $profile_lname = $_GET['profile_lname'];
                                $profile_old = $_GET['profile_old'];
                                $position_id = $_GET['position_id'];
                                $users_usersname = $_GET['users_usersname'];
                                $users_password = $_GET['users_password'];
                                
                                
                                
                                
                                $code = "A";
                                $yearMonth = substr(date("Y") + 543, -2) . date("m");
                                $sql_auto_id = "SELECT MAX(id) AS users_id FROM users";
                                $qry = mysql_query($sql_auto_id) or die(mysql_error());
                                $rs = mysql_fetch_assoc($qry);
                                $maxId = substr($rs['last_id'], -5);
                                $maxId = ($maxId + 1);
                                $maxId = substr("00000" . $maxId, -5);
                                $nextId = $code . $yearMonth . $maxId;
                            }
                            ?>
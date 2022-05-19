     <div class="card shadow">
                        <h5 class="card-header">ลงทะเบียนสมาชิก</h5>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['submit'])) {
                                include '../conn.php';
                                $code = "A";
                                $yearMonth = substr(date("Y") + 543, -2) . date("m");
                                $query = "SELECT MAX(users_id) FROM users";
                                $resultmax = mysqli_query($conn, $query);
                                $rowmax = mysqli_fetch_row($resultmax);
                                $maxId = substr("00000" . $rowmax[0], -5);
                                $maxId = $maxId + 1;
                                $nextId = $code . $maxId;
                                // $users_usersname = $_GET['users_usersname'];
                                $users_password = $_GET['users_password'];
                                $users_position = $_GET['users_position'];
                                $sql1 = "insert into users values";
                                $sql1 .= "('$nextId','$nextId','$users_password','0','$users_position')";

                                mysqli_query($conn, $sql1);
                                mysqli_close($conn);
                                echo "สร้างบัญชีเสร็จสิ้น";
                                echo "เพิ่มผู้ใช้ username : $nextId <br>";
                                echo "เพิ่มผู้ใช้ password : $users_password <br>";
                                 echo '<a class="btn btn-danger col-12 text-white mt-2" href="index.php"><i class="fas fa-backward"> ปิด</i></a>';
                                
                               
                            } else {
                                ?>

                                <form class="form-horizontal needs-validation" role="form" name="user_add"  id="users_add" action="<?php echo $_SERVER['PHP_SELF'] ?>" novalidate>
                                    <div class="form-row form-group">
                                        <div class="col-md-12 col-lg-12 col-sm-12">
                                            <select name="users_position" id="users_position" class="form-control shadow">
                                                <?php
                                                include '../conn.php';
                                                $sql = 'SELECT * FROM position order by position_name';
                                                $result = mysqli_query($conn, $sql);
                                                while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                                    echo '<option value=';
                                                    echo '"' . $row['position_id'] . '">';
                                                    echo $row['position_name'];
                                                    echo '</option>';
                                                }
                                                mysqli_free_result($result);
                                                mysqli_close($conn);
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <input type="password" class="form-control shadow " placeholder="รหัสผ่าน" name="users_password" id="users_password"  minlength="6"required>
                                            <div class="valid-feedback">สามารถใช้รหัสผ่านนี้ได้</div>
                                            <div class="invalid-feedback">กรอกรหัสผ่าน</div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <input type="password" class="form-control shadow" placeholder="ยืนยันรหัสผ่าน" name="confirm_password" id="confirm_password" minlength="6" required> 
                                            <div class="valid-feedback">สามารถใช้รหัสผ่านนี้ได้</div>
                                            <div class="invalid-feedback">รหัสผ่านไม่ตรงกัน</div>
                                        </div>
                                    </div>     
                                    <input type="submit" name="submit" class="btn btn-primary btn-lg form-control shadow" value="ตกลง">
                                </form>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
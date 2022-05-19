<?php session_start(); ?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/manu_Left.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <title>เพิ่มอุปกรณ์สำนักงาน</title>
    </head>
    <body style="background-color: #eff2f4">
        <?php include '../conn.php'; ?> 
        <?php include './header.php'; ?>


        <div  class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-light " style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <?php include './profile_view.php'; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card text-white bg-secondary " style="max-width: 40rem;">

                        <div class="card-header">แบบฟอร์มนำอุปกรณ์เข้าระบบ</div>
                        <div class="card-body">
                            <?php
                            date_default_timezone_set('Asia/Bangkok');
                            include '../conn.php';
                            if (isset($_GET['submit'])) {
                                $oe_code = $_GET['oe_code'];
                                $oe_name = $_GET['oe_name'];
                                $oe_position = $_GET['oe_position'];
                                $sessionID = $_SESSION['users_id'];
                                $check = "SELECT * FROM   oe WHERE  oe_code = '$oe_code' ";
                                $result = mysqli_query($conn, $check);
                                $num = mysqli_num_rows($result);
                                if ($num > 0) {
                                    echo "<script>";
                                    echo "alert(' อุปกรณ์หมายเลข $oe_code มีอยู่ในระบบเเล้ว !!!');";
                                    echo "window.location='add_oe.php?oe_code=$oe_code'";

                                    echo "</script>";
                                } else {
                                    $sql = "INSERT INTO oe (oe_code, oe_name, oe_position, oe_create_by, oe_create_at,oe_update_at)"
                                            . " VALUES ('$oe_code', '$oe_name', '$oe_position', '$sessionID' , current_timestamp(), current_timestamp())";

                                    mysqli_query($conn, $sql);
                                    $showID = mysqli_insert_id($conn);
                                }
                                echo "เพิ่ม $oe_name หมายเลข Serial Number $oe_code เรียบร้อยแล้ว<br>";
                                echo '<a href="./index.php">ถัดไป</a>';
                            } else {
                                ?>
                            <form role="form" class="needs-validation" name="add_oe" action="<?php echo $_SERVER['PHP_SELF'] ?>" novalidate>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="oe_code" name="oe_code" placeholder="กรอก serial number" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="oe_name" name="oe_name" placeholder="กรอกชื่ออุปกรณ์" required="">
                                    </div>
                                    <div class="form-group">
                                        <select  id="oe_position" name="oe_position" class="form-control shadow">
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
                                        <small id="emailHelp" class="form-text">เลือกแผนกรับอุปกรณ์</small>
                                    </div>

                                    <input type="submit" name="submit" value="ตกลง" class="btn btn-danger col-12">
                                </form>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 







        <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>      
        <script type="text/javascript">
            (function () {
                'use strict';
                window.addEventListener('load', function () {
                    var forms = document.getElementsByClassName('needs-validation');
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener('submit', function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </body>
</html>



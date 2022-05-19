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
        <title>รายละเอียดอุปกรณ์</title>
    </head>
    <body style="background-color: #eff2f4">
        <?php include '../conn.php'; ?> 
        <?php include './header.php'; ?>


        <div  class="container">
            <div class="row">
                <div class="card bg-light col-md-4">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <?php include './profile_view.php'; ?>
                    </div>
                </div>
                <div>
                    <?php
                    include '../conn.php';

                    function DateThai($strDate) {
                        $strYear = date("Y", strtotime($strDate)) + 543;
                        $strMonth = date("n", strtotime($strDate));
                        $strDay = date("j", strtotime($strDate));
                        $strHour = date("H", strtotime($strDate));
                        $strMinute = date("i", strtotime($strDate));
                        $strSeconds = date("s", strtotime($strDate));
                        $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
                        $strMonthThai = $strMonthCut[$strMonth];
                        return "$strDay $strMonthThai $strYear";
                    }

                    $sql = "SELECT 
                            repair_detail.repair_detail_id,
                            repair_detail.repair_detail_data,
                            repair_detail.repair_detail_create_at,
                            repair_detail.repair_detail_update_at,
                            profile.profile_fname,
                            profile.profile_lname,
                            oe.oe_name,
                            oe.oe_code,
                            oe.oe_id,
                            position.position_name
                    FROM ((
                        repair_detail
                            INNER JOIN oe      ON repair_detail.repair_detail_oe_id = oe.oe_id
                            INNER join position on position.position_id = oe.oe_position)
                            INNER JOIN profile ON repair_detail.repair_detail_users_id = profile.profile_users_id)"
                          . "WHERE repair_detail.repair_detail_id = '" . $_GET['repair_detail_id'] . "' ";
                    $result = mysqli_query($conn, $sql);
                    $jobdetails = mysqli_fetch_assoc($result);


                    $strDate = $jobdetails['repair_detail_create_at'];
                    $strDate2 = $jobdetails['repair_detail_update_at'];
                    ?>
                </div>
            </div>
            <div class="card mt-2">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-striped">                  
                            <tbody>
                                <tr>
                                    <th scope="row">เลขที่ การซ่อม</th>
                                    <td><?php echo $jobdetails['repair_detail_id']; ?></td>
                                </tr>       
                                <tr>
                                    <th scope="row">ชื่อผู้แจ้ง</th>
                                    <td><?php echo $jobdetails['profile_fname']; ?> <?php echo $jobdetails['profile_lname']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">ข้อมูลอุปกรณ์</th>
                                    <td>
                                        หมายเลขเครื่อง: <?php echo $jobdetails['oe_code'];?><br>
                                        ชื่อ: <?php echo $jobdetails['oe_name'];?><br>
                                        อุปกรณ์แผนก: <?php echo $jobdetails['position_name'];?><br>
                                        
                                        อาการเสีย: <?php echo $jobdetails['repair_detail_data'];?>
                                    </td>
                                </tr>       
                                <tr>
                                    <th scope="row">วันที่นำเข้าระบบ</th>
                                    <td> <?php echo DateThai($strDate); ?></td>
                                </tr> 
                                <tr>
                                    <th scope="row">วันที่ล่าสุดที่มีการเปลียนแปลงข้อมูล</th>
                                    <td><?php echo DateThai($strDate2); ?></td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4">
                        <div class="card-body">
                            <h5 class="card-title">ใบแจ้งซ่อม</h5>
                            <?php
                            if (isset($_GET['submit'])) {
                                include '../conn.php';
                                $repair_detail_id = $jobdetails['repair_detail_id'];
                                $repair_completed_comment = $_GET['repair_completed_comment'];
                                $sessionID = $_SESSION['users_id'];
                                $sql = $sql = "INSERT INTO `repair_completed`"
                                        . "(`repair_completed_id`, "
                                        . "`repair_completed_repair_detail_id`, "
                                        . "`repair_completed_comment`, "
                                        . "`repair_completed_technician_id`, "
                                        . "`repair_completed_create_at`) "
                                        . "VALUES (Null ,'$repair_detail_id','$repair_completed_comment','$sessionID',current_timestamp())";

                                
                                $sql_update ="UPDATE repair_detail SET repair_detail_status_id = '2' WHERE repair_detail_id = '$repair_detail_id'";
                                
                                
                                mysqli_query($conn, $sql);
                                mysqli_query($conn, $sql_update);
                                mysqli_close($conn);

                                echo "<meta http-equiv='refresh'; URL=./repair_list.php'>";
                                echo '<div class="alert alert-success">บันทึกข้อมูลเเล้ว</div>';
                                echo '<a class="btn btn-danger col-12 text-white mt-2" href="index.php"><i class="fas fa-backward"> กลับหน้าหลัก</i></a>';
                            } else {
                                ?>
                            <form class="needs-validation" method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>" novalidate>
                                    <input type="hidden" name="repair_detail_id" id="repair_detail_id" value="<?php echo $jobdetails['repair_detail_id'];?>">
                                    <div class="form-group">                                     
                                        <div class="form-group">
                                            <textarea class="form-control" id="repair_completed_comment"  name="repair_completed_comment" rows="3"  placeholder="รายละเอียดการซ่อม" required></textarea>    
                                        </div>       
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-primary col-12"><i class="fas fa-save"> บันทึก</i></button>
                                    <a class=" btn btn-danger col-12 text-white mt-2" href="repair_list.php"><i class="fas fa-backward"> กลับหน้าหลัก</i></a>
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



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
                        $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
                        $strMonthThai = $strMonthCut[$strMonth];
                        
                        
                        return "$strDay $strMonthThai $strYear";
                    }

                    $sql = "select oe.oe_id,"
                            . "oe.oe_code,"
                            . "oe.oe_name,"
                            . "oe.oe_create_at,"
                            . "oe.oe_update_at,"
                            . "position.position_name "
                            . "from position inner join oe "
                            . "ON oe.oe_position=position.position_id WHERE oe.oe_id = '" . $_GET['oe_id'] . "' ORDER BY oe_id ";
                    $result = mysqli_query($conn, $sql);
                    $jobdetails = mysqli_fetch_assoc($result);
                    $strDate = $jobdetails['oe_create_at'];
                    $strDate2 = $jobdetails['oe_update_at'];
                    ?>
                </div>
            </div>
            <div class="card mt-2">
                <?php
                                
                ?>
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-striped">                  
                            <tbody>
                                <tr>
                                    <th scope="row">หมายเลข Serial Number</th>
                                    <td><?php echo $jobdetails['oe_code']; ?></td>
                                </tr>       
                                <tr>
                                    <th scope="row">ชื่อ</th>
                                    <td><?php echo $jobdetails['oe_name']; ?></td>
                                </tr>       
                                <tr>
                                    <th scope="row">แผนก</th>
                                    <td><?php echo $jobdetails['position_name']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">วันที่นำเข้าระบบ</th>
                                    <td> <?php echo DateThai($strDate); ?></td>
                                </tr> 
                                <tr>
                                    <th scope="row">วันที่ล่าสุดที่มีการเปลียนแปลงข้อมูล</th>
                                    <td> <?php echo DateThai($strDate2); ?></td>
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
                                $oe_id = $jobdetails['oe_id'];
                                $repair_detail_data = $_GET['repair_detail_data'];
                                $repair_detail_id = $_GET['repair_detail_id'];
                                $sessionID = $_SESSION['users_id'];
                                $check = "SELECT * FROM repair_detail  WHERE  	repair_detail_oe_id = '$oe_id' and repair_detail_status_id='1'";
                                $result = mysqli_query($conn, $check);
                                $num = mysqli_num_rows($result);
                                if ($num > 0) {
                                    echo "<script>";
                                    echo "alert('มีข้อมูลอยู่ในระบบแล้ว !!!');";
                                    echo "window.location='repair_view.php?oe_id=$oe_id';";
                                    echo "</script>";
                                } else {
                                    $sql = "INSERT INTO `repair_detail` "
                                            . "(`repair_detail_id`, "
                                            . "`repair_detail_data`,"
                                            . " `repair_detail_users_id`,"
                                            . " `repair_detail_create_at`, "
                                            . " `repair_detail_update_at`, "
                                            . " `repair_detail_status_id`, "
                                            . " `repair_detail_oe_id`)"
                                            . "VALUES (NULL, '$repair_detail_data', '$sessionID', current_timestamp(), current_timestamp(), '1', '$oe_id');";

                                    mysqli_query($conn, $sql);
                                    $showID = mysqli_insert_id($conn);
                                }

                                

                                echo "<meta http-equiv='refresh'; URL=./repair_list.php'>"; //                                echo"<a href=\"add.php?id=$cid\">กดทีนี่</a>";
                                echo '<div class="alert alert-success">' . "บันทึกข้อมูลเแจ้งซ่อมหมายเลข" . " $showID" . " แล้ว" . '</div>';
                                mysqli_close($conn);
                                echo "<a target ='_blank' href='print.php?repair_detail_id=$showID' class='btn btn-warning col-12  mt-2'><i class='fas fa-print'> พิมพ์ใบสำเนา</i></a>";
                                echo '<a class="btn btn-danger col-12 text-white mt-2" href="index.php"><i class="fas fa-backward"> กลับหน้าหลัก</i></a>';
                            } else {
                                ?>
                            <form method="GET" class="needs-validation" action="<?php echo $_SERVER['PHP_SELF'] ?>" novalidate="">
                                    <input type="hidden" name="oe_id" id="oe_id" value="<?php echo $jobdetails['oe_id']; ?>" >
                                    <input type="hidden" name="repair_detail_id" id="repair_detail_id" value="<?php $showid['repair_detail_id']; ?>">
                                    <div class="form-group">                                     
                                        <div class="form-group">
                                            <textarea class="form-control" id="repair_detail_data"  name="repair_detail_data" rows="3"  placeholder="ระบุอาการชำรุด" required></textarea>    
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
            <br>
            <h3> ประวัติการซ่อม</h3>


            <?php
            include '../conn.php';
            $sql_his = "SELECT
       repair_completed.repair_completed_id,
       repair_completed.repair_completed_comment,
       repair_completed.repair_completed_create_at,
       repair_completed.repair_completed_technician_id,
       profile.profile_fname,
       profile.profile_lname,
       repair_completed.repair_completed_repair_detail_id,
       repair_detail.repair_detail_id,
        repair_detail.repair_detail_data,
        repair_detail.repair_detail_create_at,
       oe.oe_id,
       repair_detail.repair_detail_oe_id,
       position.position_id,
       oe.oe_position,
       position.position_name,
       oe.oe_name,
       oe.oe_code
           FROM
                (
        (
            repair_completed
        INNER JOIN profile ON repair_completed.repair_completed_technician_id = profile.profile_users_id
        )
    INNER JOIN repair_detail ON repair_completed.repair_completed_repair_detail_id = repair_detail.repair_detail_id
    INNER JOIN oe ON repair_detail.repair_detail_oe_id = oe.oe_id
    INNER JOIN position ON position.position_id = oe.oe_position
    )
WHERE
    oe.oe_id='" . $_GET['oe_id'] . "' and repair_detail.repair_detail_status_id = 3";



            $result_his = mysqli_query($conn, $sql_his);
            ?>

            <table class="table table-striped">
                <thead>

                    <tr>
                        <th scope="col">เลขที่ใบซ่อม</th>
                        <th scope="col">อากรเสีย</th>
                        <th scope="col">วันที่ส่งซ่อม</th>
                        <th scope="col">วันที่ซ่อมเสร็จ</th>
                    </tr>

                </thead>
                <tbody>
                    <?php while ($jobdetails_his = mysqli_fetch_assoc($result_his)) { ?>
                        <?php
                        $strDate_his_create = $jobdetails_his['repair_detail_create_at'];
                        $strDate_his_end = $jobdetails_his['repair_completed_create_at'];
                        $repair_detail_id = $jobdetails_his['repair_detail_id'];
                        $repair_detail_data = $jobdetails_his['repair_detail_data'];
                        ?>
                        <tr>
                            <td><?php echo $jobdetails_his['repair_detail_id']; ?></td>
                            <td><?php echo $jobdetails_his['repair_detail_data']; ?></td>
                            <td><?php echo DateThai($strDate_his_create); ?></td>
                            <td><?php echo DateThai($strDate_his_end); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


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



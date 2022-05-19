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
                 repair_completed.repair_completed_id,
                 repair_completed.repair_completed_comment,
                 repair_completed.repair_completed_create_at,
                 repair_completed.repair_completed_technician_id,
                 profile.profile_fname,
                 profile.profile_lname,
                 repair_completed.repair_completed_repair_detail_id,
                 repair_detail.repair_detail_id,
                 oe.oe_id,
                 repair_detail.repair_detail_oe_id,
                 position.position_id,
                 oe.oe_position,
                 position.position_name,
                 oe.oe_name,
                 oe.oe_code,
                 repair_detail.repair_detail_data,
                 repair_detail.repair_detail_status_id
FROM
    (
        (
            repair_completed
        INNER JOIN profile ON repair_completed.repair_completed_technician_id = profile.profile_users_id
        )
    INNER JOIN repair_detail ON repair_completed.repair_completed_repair_detail_id = repair_detail.repair_detail_id
    INNER JOIN oe ON repair_detail.repair_detail_oe_id = oe.oe_id
    INNER JOIN position ON position.position_id = oe.oe_position
    )"
                            . "WHERE repair_completed.repair_completed_id = '" . $_GET['repair_completed_id'] . "'  ORDER BY repair_completed_id";
                    $result = mysqli_query($conn, $sql);
                    $jobdetails = mysqli_fetch_assoc($result);


                    $strDate = $jobdetails['repair_completed_create_at'];
                    ?>
                </div>
            </div>
            <div class="card mt-2">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-striped">                  
                            <tbody>
                                <tr>
                                    <th scope="row">หมายเลขการซ่อม</th>
                                    <td><?php echo $jobdetails['repair_detail_id']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">ข้อมูลการซ่อม</th>
                                    <td>
                                        ช่างซ่อม : <?php echo $jobdetails['profile_fname'].' '.$jobdetails['profile_lname'];?><br>
                                        ความเห็นช่าง : <?php echo $jobdetails['repair_completed_comment']; ?>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">ข้อมูลอุปกรณ์</th>
                                    <td>
                                         เลขที่แจ้งซ่อม : <?php echo $jobdetails['repair_detail_id']; ?><br>
                                         หมายเลข SN : <?php echo $jobdetails['oe_code']; ?><br>
                                         ชื่ออุปกรณ์   : <?php echo $jobdetails['oe_name']; ?><br>
                                         แผนก      : <?php echo $jobdetails['position_name']; ?><br>
                                         อาการเสีย      : <?php echo $jobdetails['repair_detail_data']; ?><br>
                                    </td>
                                </tr>       
                                <tr>
                                    <th scope="row">วันที่ซ่อมเสร็จ</th>
                                    <td> <?php echo DateThai($strDate); ?></td>
                                </tr> 
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4">
                        <div class="card-body">
                            <h5 class="card-title">ยืนยันการรับของ</h5>
                            <?php
                            date_default_timezone_set('Asia/Bangkok');
                            if (isset($_GET['submit'])) {
                                include '../conn.php';
                                $sessionID = $_SESSION['users_id'];
                                
                                $repair_completed_id = $jobdetails['repair_completed_id'];
                                $repair_detail_id = $jobdetails['repair_detail_id'];
                                $sql = "INSERT INTO `repair_end` (`repair_end_id`, `repair_end_repair_completed`, `repair_end_create_at`) VALUES (NULL, '$repair_completed_id', CURRENT_TIMESTAMP);";
                                
                                $sql_update ="UPDATE repair_detail SET repair_detail_status_id = '3' WHERE repair_detail_id = '$repair_detail_id'";
                                
                                mysqli_query($conn, $sql);
                                mysqli_query($conn, $sql_update);
                                mysqli_close($conn);

                                echo "<meta http-equiv='refresh'; URL=./repair_list.php'>";
                                echo '<div class="alert alert-success">บันทึกข้อมูลเเล้ว</div>';
                                echo '<a class="btn btn-danger col-12 text-white mt-2" href="index.php"><i class="fas fa-backward"> กลับหน้าหลัก</i></a>';
                            } else {

                                ?>
                                <form method="GET" action="<?php echo $_SERVER['PHP_SELF']?>">
                                    <input type="hidden" name="repair_completed_id" id="repair_completed_id" value="<?php echo $jobdetails['repair_completed_id'];?>">
                                    <button type="submit" name="submit" class="btn btn-primary col-12"><i class="fas fa-save">ยืนยันรับอุปกรณ์</i></button>
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

    </body>
</html>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


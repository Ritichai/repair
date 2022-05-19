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
        <title>อุปกรณ์ซ่อมเสร็จรอรับ</title>
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
            </div>

            <?php
            include '../conn.php';
       
            $sessionID = $_SESSION['users_position'];
            $text_serch = isset($_POST['text_serch']) ? $_POST['text_serch'] : '';
            $page = 'repair_list';
            $perpage = 5;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $start = ($page - 1) * $perpage;
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
    )"
                       . "WHERE  repair_detail.repair_detail_id like '%$text_serch%' and repair_detail.repair_detail_status_id = 2 and oe.oe_position = 3 "
                    . "order by repair_completed_id limit {$start} , {$perpage} ";
            $query = mysqli_query($conn, $sql);
            ?>

            <div class="container" style="padding-top: 20px;">
                <div class="card shadow">
                    <form class="form-inline" action="Waiting.php" method="POST">
                        <div class="card-body">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="หมายเลขการซ่อม" id="text_serch" name="text_serch">
                                    <div class="input-group-append">
                                        <input class="btn btn-outline-success" type="submit" value="ค้นหา" /> 
                                    </div>
                                </div>
                            </div>                     
                        </div>
                    </form>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>หมายเลขการแจ้งซ่อม</th>
                                <th>อุปกรณ์</th>
                                <th>รับเครื่อง</th>
                            </tr>                
                        </thead>
                        <tbody>
                            <?php while ($result = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                    
                                    <td><?php echo $result['repair_detail_id']; ?></td>
                                    <td><?php echo $result['oe_name'].' SN '.$result['oe_code']; ?></td>
                                    <td>
                                        <a href="Waiting_view.php?repair_completed_id=<?php echo $result['repair_completed_id'];?>"class="btn btn-warning col-12"><i class="fas fa-wrench"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php
                   
                    $sql2 = "SELECT
                     repair_detail.repair_detail_status_id FROM
                ((repair_completed
            INNER JOIN profile ON repair_completed.repair_completed_technician_id = profile.profile_users_id)
            INNER JOIN repair_detail ON repair_completed.repair_completed_repair_detail_id = repair_detail.repair_detail_id
            INNER JOIN oe ON repair_detail.repair_detail_oe_id = oe.oe_id)"
           . "WHERE repair_detail.repair_detail_status_id = 2 and oe.oe_position = 3 ";
                    $query2 = mysqli_query($conn, $sql2);
                    $total_record = mysqli_num_rows($query2);
                    $total_page = ceil($total_record / $perpage);
                    ?>
                    <div class="col-12">
                        <nav>
                            <ul class="pagination justify-content">
                                <li class="page-item">
                                    <a class="page-link" href="Waiting_view.php?page=1" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                                    <li class="page-item "><a class="page-link" href="Waiting.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php } ?>
                                <li class="page-item">
                                    <a class="page-link" href="Waiting.php?page=<?php echo $total_page; ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav> 
                    </div>               
                </div>
            </div>
            <br>





        </div>

        <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    </body>
</html>



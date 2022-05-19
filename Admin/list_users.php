<?php session_start(); ?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="../Css/boxhelp.css">   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <title>Admin</title>
    </head>
    <body style="background-color: #eff2f4">
        <?php include './../conn.php'; ?>
        <?php
        $text_serch = isset($_POST['text_serch']) ? $_POST['text_serch'] : '';
        $page = 'list_users';
        include './header.php';
        $perpage = 5;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $start = ($page - 1) * $perpage;
        $sql = "select users.users_id, position.position_name from position inner join users ON users.users_position=position.position_id WHERE users.users_id like '%$text_serch%'  order by users_id limit {$start} , {$perpage} ";
        $query = mysqli_query($conn, $sql);
        ?>    
        <div class="container" style="padding-top: 20px;">
            <div class="card shadow">
                <form class="form-inline" action="list_users.php" method="POST">
                    <div class="card-body">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="กรอกรหัสพนักงาน" id="text_serch" name="text_serch">
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
                            <th>รหัสพนักงาน</th>
                            <th>ตำแหน่งงาน</th>
                            <th>จัดการ</th>
                        </tr>                
                    </thead>
                    <tbody>
                        <?php while ($result = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?php echo $result['users_id']; ?></td>
                                <td><?php echo $result['position_name']; ?></td>
                                <td>
                                    <a href="update.php?users_id=<?php echo $result['users_id'];?>"class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="JavaScript:if(confirm('ยืนยันการลบ')==true){window.location='del_users.php?users_id=<?php echo $result["users_id"]; ?>'}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php
                $sql2 = "select * from users order by users_id ";
                $query2 = mysqli_query($conn, $sql2);
                $total_record = mysqli_num_rows($query2);
                $total_page = ceil($total_record / $perpage);
                ?>
                <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content">
                            <li class="page-item">
                                <a class="page-link" href="list_users.php?page=1" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                                <li class="page-item "><a class="page-link" href="list_users.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php } ?>
                            <li class="page-item">
                                <a class="page-link" href="list_users.php?page=<?php echo $total_page; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav> 
                </div>               
            </div>
        </div>

        <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="Jsadmin/confirm_pass.js"></script>


    </body>
</html>

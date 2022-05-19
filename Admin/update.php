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
        <title>แก้ไขข้อมูล</title>
    </head>
    <body style="background-color: #eff2f4">
        <?php
        include './header.php';
        ?>


        <div class="container">
            <?php
            include '../conn.php';
            if (isset($_GET['submit'])) {
                $users_id = $_GET['users_id'];
                $users_position = $_GET['users_position'];
                $sql = "update users set users_position='$users_position' where users_id='$users_id'";
                mysqli_query($conn, $sql);
                mysqli_close($conn);
                echo "แก้ไขตำแหน่งงานเรียบร้อยแล้ว<br>";
                echo "<meta http-equiv='refresh' content='2; URL=list_users.php'>";
            } else {
                $users_idS = $_REQUEST['users_id'];
                $sql = "SELECT * FROM users where users_id='$users_idS' order by users_id";
                $result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $users_positionS = $row['users_position'];
                $users_passwordS = $row['users_password'];
                mysqli_free_result($result);
                mysqli_close($conn);
                ?>


                <form class="form-horizontal" role="form" name="update" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <div class="card text-center mt-5 w-50 mx-auto">
                        <div class="card-header">
                            ตำแหน่งงานของ : <?php echo $_SESSION['users_id'] ?>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group row">
                                    <label for="users_id" class="col-sm-3 col-form-label">รหัสพนังงาน</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" readonly name="users_id" id="users_id" value="<?php echo "$users_idS"; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="users_password" class="col-sm-3 col-form-label">รหัสผ่าน</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" readonly name="users_password" id="users_password" value="<?php echo "$users_passwordS" ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="users_password" class="col-sm-3 col-form-label">แผนก</label>
                                    <div class="col-sm-9">
                                        <select name="users_position" id="users_position" class="form-control  mt-1" >
                                            <?php
                                            include '../conn.php';
                                            $sql2 = 'SELECT * FROM position order by position_id';
                                            $result2 = mysqli_query($conn, $sql2);
                                            while (($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) != NULL) {
                                                echo '<option value=';
                                                echo '"' . $row2['position_id'] . '">';
                                                echo $row2['position_name'];
                                                echo '</option>';
                                            }
                                            mysqli_free_result($result2);
                                            mysqli_close($conn);
                                            ?>
                                        </select>   
                                    </div>
                                </div> 

                            </div>
                            <div class=" btn-group">
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"> บันทึก</i></button>
    <!--                            <input type="submit" name="submit" value="ตกลง" class="btn btn-primary fas fa-save">-->
                                <a href="index.php" class="btn badge-danger"><i class="fas fa-undo"> กลับหน้าหลัก</i></a>
                            </div>
                        </div>
                    </div>   
                </form>

            <?php } ?>
        </div>



        <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="Jsadmin/confirm_pass.js"></script>


    </body>
</html>






<!--       <div class="card-body">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group row">
                                    <label for="users_id" class="col-sm-3 col-form-label">รหัสพนังงาน</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly disabled class="form-control " id="users_id" value="<?php echo "$users_idS"; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="users_password" class="col-sm-3 col-form-label">รหัสผ่าน</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly  disabled class="form-control " id="users_password" value="<?php echo "$users_passwordS"; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="users_password" class="col-sm-3 col-form-label">แผนก</label>
                                    <div class="col-sm-9">
                                        <select name="users_position" id="users_position" class="form-control  mt-1" >
<?php
include '../conn.php';
$sql2 = 'SELECT * FROM position order by position_id';
$result2 = mysqli_query($conn, $sql2);
while (($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) != NULL) {
    echo '<option value=';
    echo '"' . $row2['position_id'] . '">';
    echo $row2['position_name'];
    echo '</option>';
}
mysqli_free_result($result2);
mysqli_close($conn);
?>
                                        </select>   
                                    </div>
                                </div>                             
                            </div> 
                        </div>-->
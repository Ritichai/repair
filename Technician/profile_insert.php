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
        <title>แผนกคลังสินค้า : <?php echo $_SESSION['users_id'] ?></title>
    </head>
    <body style="background-color: #eff2f4">
        <?php include '../conn.php'; ?> 

        <div class="container">
            <div class="card mt-2 mx-auto" style="width: 500px;">
                <div class="card-header bg-dark text-white text-center">
                    กรอกข้อมูล
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['submit'])) {
                        $profile_fname = $_GET['profile_fname'];
                        $profile_lname = $_GET['profile_lname'];
                        $sessionID = $_SESSION['users_id'];
                        $sql = "INSERT INTO profile (profile_fname, profile_lname, profile_create_at, profile_update_at, profile_users_id)"
                                . " VALUES ('$profile_fname', '$profile_lname', current_timestamp(), current_timestamp(), '$sessionID')";
                        include '../conn.php';
                        
                        mysqli_query($conn, $sql);
                        mysqli_close($conn);
                        
                        echo '<a href="./index.php">ถัดไป</a>';
                    } else {
                        ?>
                        <form>
                            <div class="form" action="<?php echo $_SERVER['PHP_SELF']?>">
                                <input type="text" class="form-control my-1" id="profile_fname"  name="profile_fname" placeholder="ชื่อ">    
                                <input type="text" class="form-control my-1" id="profile_lname"  name="profile_lname" placeholder="นามสกุล">
                            </div>
                            <input type="submit" name="submit" value="ตกลง" class="btn btn-danger col-12">
                        </form>       
                  <?php
                    }
                    ?>
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



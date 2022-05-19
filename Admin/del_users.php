
     <?php
            include '../conn.php';
            $users_id = $_GET['users_id'];
            $sql = "delete from users where users_id='$users_id'";
            $result = mysqli_query($conn,$sql);
            echo '<meta http-equiv="refresh" content="0;URL=list_users.php">';
            mysqli_close($conn);
        ?>
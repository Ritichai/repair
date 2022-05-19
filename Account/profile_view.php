<blockquote class="blockquote mb-0">
    <?php
    include '../conn.php';
    $sql = "SELECT * FROM profile  where profile_users_id='" . $_SESSION['users_id'] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $sql_users = "select users.users_id, position.position_name from position inner join users ON users.users_position=position.position_id where users.users_id='" . $_SESSION['users_id'] . "'";
    $result_user = mysqli_query($conn, $sql_users);
    $row_user = mysqli_fetch_array($result_user, MYSQLI_ASSOC);
    if ($row_user['users_id'] == $row['profile_users_id']) {
        echo '<p>' . 'รหัสพนักงาน : ' . $_SESSION['users_id'] . '</p>';
        echo '<footer class="blockquote-footer">' . ''
        . '<small class="text-muted">' . 'ชื่อ : ' . $row['profile_fname'] . ' ' . $row['profile_lname'] . ' <cite title="Source Title"></cite>' . '</small>' . '</footer>';
        echo '<footer class="blockquote-footer">' . ''
        . '<small class="text-muted">' . 'แผนก : ' . $row_user['position_name'] . ' <cite title="Source Title"></cite>' . '</small>' . '</footer>';
    } else {
        echo "<meta http-equiv='refresh' content='0 ;URL=../Account/profile_insert.php'>";
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>

</blockquote>

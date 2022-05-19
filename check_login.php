<?php
session_start();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<?php
include './conn.php';
$users_username = mysqli_escape_string($conn, $_POST['users_username']);
$users_password = mysqli_escape_string($conn, $_POST['users_password']);
$sql = "SELECT * FROM users WHERE users_username=? AND  users_password=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $users_username, $users_password);
mysqli_execute($stmt);
$result_user = mysqli_stmt_get_result($stmt);

$sql_profile = "SELECT * FROM profile";
$resul_profile = mysqli_query($conn, $sql_profile);
$row_profile = mysqli_fetch_array($resul_profile, MYSQLI_ASSOC);


if ($result_user->num_rows != 1) {
    echo "<meta http-equiv='refresh' content='2 ;URL=index.php'>";
    echo '<div class="alert alert-danger">ข้อมูลผู้ใช้หรือรหัสผ่านผิดกรุณาตรวจสอบอีกครั้ง</div>';
} else {
    $row_user = mysqli_fetch_array($result_user, MYSQLI_ASSOC);
    $_SESSION['users_id'] = $row_user['users_id'];
    $_SESSION['users_username'] = $row_user['users_username'];
    $_SESSION['users_password'] = $row_user['users_password'];
    $_SESSION['users_status_role'] = $row_user['users_status_role'];
    $_SESSION['users_position'] = $row_user['users_position'];
    $row_profile['profile_users_id'] = $row_user['users_id'];

    if ($row_user["users_status_role"] == '1') {

        echo "<meta http-equiv='refresh' content='0 ;URL=Admin/index.php'>";
    } else if ($row_user["users_status_role"] == '0' && $row_user["users_position"] == '4') {
        echo "<meta http-equiv='refresh' content='0 ;URL=Technician/index.php'>";
    } else if ($row_user["users_status_role"] == '0' && $row_user["users_position"] == '3') {
        echo "<meta http-equiv='refresh' content='0 ;URL=Treasury/index.php'>";
    } else if ($row_user["users_status_role"] == '0' && $row_user["users_position"] == '1') {
        echo "<meta http-equiv='refresh' content='0 ;URL=Account/index.php'>";
    }
}
?>


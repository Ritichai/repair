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
if ($result_user->num_rows != 1) {
    echo "<meta http-equiv='refresh' content='2 ;URL=index.php'>";
    echo '<div class="alert alert-danger">ข้อมูลผู้ใช้หรือรหัสผ่านผิดกรุณาตรวจสอบอีกครั้ง</div>';
//    header('Content-Type: application/json');
//    $errors = "Username หรือ Password ไม่ถูกต้อง" . mysqli_error($conn);
//    echo json_encode(array('status' => 'danger', 'message' => $errors));
} else {
    $row_user = mysqli_fetch_array($result_user, MYSQLI_ASSOC);
    $_SESSION['users_id'] = $row_user['users_id'];
    $_SESSION['users_username'] = $row_user['users_username'];
    $_SESSION['users_password'] = $row_user['users_password'];
    $_SESSION['users_status_role'] = $row_user['users_status_role'];
    $_SESSION['users_position'] = $row_user['users_position'];
    // users_status_role 1 admin 2 พนักงานแต่ละแผนก
    if ($row_user["users_status_role"] == '1') {
        // echo "<meta http-equiv='refresh' content='2; URL=Admin/index.php'>";
        echo "<meta http-equiv='refresh' content='0 ;URL=Admin/index.php'>";
        //   echo '<div class="alert alert-success">' . 'เข้าสู่ระบบโดย ' . $_SESSION['users_username'] . '</div>';
    } elseif ($row_user["users_status_role"] == '0' && $row_user["users_position"] == '1') {
        echo "<meta http-equiv='refresh' content='0 ;URL=Accounting/index.php'>";
        //   echo '<div class="alert alert-success">' . 'เข้าสู่ระบบโดย ' . $_SESSION['users_username'] . '</div>';
    } elseif ($row_user["users_status_role"] == '0' && $row_user["users_position"] == '3') {
        echo "<meta http-equiv='refresh' content='0 ;URL=Treasury/index.php'>";
    }
}
?>
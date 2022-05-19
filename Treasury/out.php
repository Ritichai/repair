<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" href="css/animate.css">

<?php
session_start();
if (session_destroy()) {
    echo "<meta http-equiv='refresh' content='2; URL=../index.php'>";
     echo '<div class="alert alert-success">ออกจากระบบเรียบร้อยแล้ว</div>';
}

?>

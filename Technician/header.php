<?php
if (!isset($_SESSION['users_id'])) {
    header("location:../Technician/index.php");
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">ช่างซ่อม</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="<?php
            if ($page == 'list_users') {
                echo 'active';
            }
            ?>">
                <a class="nav-link"  href="repair_list.php"><b>รายการอุปกรณ์แจ้งซ่อม</b></a></li>
        </ul>
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent" style="margin-right: 70px;">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true"><?php echo $_SESSION['users_username'] ?></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item col-12" href="out.php">ออกจากระบบ</a>
                </div>
            </li>
        </ul>
    </div>
</nav>


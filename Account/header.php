<?php
if (!isset($_SESSION['users_id'])) {
    header("location:../Account/index.php");
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">แจ้งซ่อม</a>
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
        </ul>
        <ul class="navbar-nav">
            <li><a class="nav-link"  href="repair_list.php"><b>แจ้งซ่อม/ประวัติการซ่อม</b></a></li>
        </ul>
        <ul class="navbar-nav">
             <?php {
                            include '../conn.php';
                            $result = mysqli_query($conn, "SELECT COUNT(repair_detail.repair_detail_status_id) AS repair_detail,
                                                           repair_detail.repair_detail_status_id,
                                                           oe.oe_position FROM(( repair_detail
                                                           INNER JOIN oe ON repair_detail.repair_detail_oe_id = oe.oe_id
                                                           INNER JOIN position ON position.position_id = oe.oe_position)
                                                           INNER JOIN profile ON repair_detail.repair_detail_users_id = profile.profile_users_id) 
                                                           WHERE repair_detail.repair_detail_status_id = 2 and oe.oe_position = 1 ");
                            $row = mysqli_fetch_array($result);
                            $count = $row['repair_detail'];
                            ?>
            <li><a class="nav-link" href="Waiting.php"><b>อุปกรณ์ซ่อมเสร็จ</b><span class="badge badge-danger"><?php echo $count;?></span></a>
            </li>
                            <?php } ?>
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


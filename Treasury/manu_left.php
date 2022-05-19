<?php
if (!isset($_SESSION['users_id'])) {
    header("location:../Treasury/index.php");
}
?>

<div class="nav-side-menu">
    <div class="brand"><a href="../index.php">แจ้งซ่อม</a></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
        <!--Profile-------------------------------------------------------------------------------------->
        <ul id="menu-content" class="menu-content collapse out">
            <div>
                <div class="text-left" style="margin-left: 10px;">
                    <a class="text-left"><?php echo $_SESSION['users_id'] ?></a>
                    <div>
                        <a>ชื่อ</a>
                    </div>
                    <div>
                        <a>แผนก</a>
                    </div>
                </div>
                <div class="text-left" style="margin-left: 10px;">
                    <form class="form-inline" action="out.php" style="margin: 0px 10px 10px 0px;">
                        <button class="btn btn-danger col-sm-12 col-md-12 col-lg-12 btn-sm" type="submit">ออกจากระบบ</button>
                    </form>
                </div>
            </div>


            <!-- link-------------------------------------------------------------------------------------->
            <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                <a href="#"><i class="fa fa-gift fa-lg"></i> จัดการอุปกรณ์สำนักงาน <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="products">
                <li class="active"><a href="#">ลงทะเบียนอุปกร์สำนักงาน</a></li>
                <li><a href="#">รายการอปุการสำนักงาน</a></li>
            </ul>


            <li data-toggle="collapse" data-target="#new" class="collapsed">
                <a href="#"><i class="fa fa-car fa-lg"></i> แจ้งซ่อมอุปกรณ์ <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="new">
                <li>ลงทะเบียนอุปกร์แจ้งซ่อม</li>
                <li>รายการอุปกร์แจ้งซ่อม</li>
            </ul>


            <li>
                <a href="../Treasury/profile/profile_insert.php">
                    <i class="fa fa-user fa-lg"></i>
                    ข้อมูลส่วนตัว
                </a>
            </li>
        </ul>
    </div>
</div>
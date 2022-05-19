<?php
if (!isset($_SESSION['users_id'])) {
    header("location:../index.php");
}
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">แจ้งซ่อม</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="<?php if($page=='list_users'){echo 'active';}?>"><a class="nav-link"  href="list_users.php"><b>รายชื่อพนักงาน</b></a></li>
        </ul>
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link nav-item nav-link disabled" href="#" id="navbar" role="button"  aria-haspopup="true" aria-expanded="false">
                    <div class="far fa-user text-white"><?php echo $_SESSION['users_username'] ?> </div>
                </a>
            </li>
            <form class="form-inline" action="out.php">
                <button class="btn btn-danger col-sm-12 btn-sm" type="submit">ออกจากระบบ</button>
            </form>
        </ul>
    </div>
</nav>


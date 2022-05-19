
<div class="col-12 m-bot">
    <?php {
        include '../conn.php';
        $result = mysqli_query($conn, "SELECT COUNT(*) AS `users_position` FROM `users` where `users_position`=1");
        $row = mysqli_fetch_array($result);
        $count = $row['users_position'];
        ?>
        <div class="input-group input-group-lg shadow">
            <div class="input-group-prepend">
                <span class="input-group-text bg-success text-white border border-success" id="inputGroup-sizing-lg" ><i class="fas fa-users"></i>
                </span>
            </div> 
            <input class="form-control " type="text" placeholder="แผนกบัญชี" readonly disabled>
            <div class="input-group-append">
                <span class="input-group-text bg-success text-white border border-success"><?php echo $count;?></span>
            </div>
        </div>
    <?php } ?>
</div>
<div class="col-12 m-bot">
      <?php {
        include '../conn.php';
        $result = mysqli_query($conn, "SELECT COUNT(*) AS `users_position` FROM `users` where `users_position`=4");
        $row = mysqli_fetch_array($result);
        $count = $row['users_position'];
        ?>
    <div class="input-group input-group-lg shadow">
        <div class="input-group-prepend">
            <span class="input-group-text bg-dark text-white border border-dark" id="inputGroup-sizing-lg" ><i class="fas fa-users"></i>
            </span>
        </div> 
        <input class="form-control " type="text" placeholder="ช่างซ่อม" readonly disabled>
        <div class="input-group-append">
            <span class="input-group-text bg-dark text-white border border-dark"><?php echo $count;?></span>
        </div>
    </div>
       <?php } ?>
</div>
<div class="col-12 m-bot">
       <?php {
        include '../conn.php';
        $result = mysqli_query($conn, "SELECT COUNT(*) AS `users_position` FROM `users` where `users_position`=3");
        $row = mysqli_fetch_array($result);
        $count = $row['users_position'];
        ?>
    <div class="input-group input-group-lg shadow">
        <div class="input-group-prepend">
            <span class="input-group-text bg-success text-white border border-success" id="inputGroup-sizing-lg" ><i class="fas fa-users"></i>
            </span>
        </div> 
        <input class="form-control " type="text" placeholder="คลังสินค้า" readonly disabled>
        <div class="input-group-append">
            <span class="input-group-text bg-success text-white border border-success"><?php echo $count;?></span>
        </div>
    </div>
        <?php } ?>
</div>
<div class="col-12 m-bot">
          <?php {
        include '../conn.php';
        $result = mysqli_query($conn, "SELECT COUNT(*) AS `users_position` FROM `users` where `users_position`=2");
        $row = mysqli_fetch_array($result);
        $count = $row['users_position'];
        ?>
    <div class="input-group input-group-lg shadow">
        <div class="input-group-prepend">
            <span class="input-group-text bg-dark text-white border border-dark" id="inputGroup-sizing-lg" ><i class="fas fa-users"></i>
            </span>
        </div> 
        <input class="form-control " type="text" placeholder="ฝ่ายบุคคล" readonly disabled>
        <div class="input-group-append">
            <span class="input-group-text bg-dark text-white border border-dark"><?php echo $count;?></span>
        </div>
    </div>
    <?php } ?>
</div>

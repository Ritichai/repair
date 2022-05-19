        <div class="row">
            <div class="card col-4">
                <h5 class="card-header">อุปกรณ์ที่มีอยู่ในระบบ</h5>
                <div class="card-body">
                    <div>
                        <div class="list-group">
                            <div class="list-group-item bg-success text-white border border-white">
                                <?php {
                                    include '../conn.php';
                                    $result = mysqli_query($conn, "SELECT COUNT(*) AS oe_position FROM oe where oe_position=4");
                                    $row = mysqli_fetch_array($result);
                                    $count = $row['oe_position'];
                                    ?>
                                    <h3 class="pull-right"><i class="fas fa-cog"></i></h3>
                                    <h4 class="list-group-item-heading count"><?php echo $count; ?></h4>
                                    <p class="list-group-item-text">แผนกช่างซ่อม</p>
                                <?php } ?>
                            </div>
                            <div class="list-group-item facebook-like bg-success text-white border border-white">
                                <?php {
                                    include '../conn.php';
                                    $result = mysqli_query($conn, "SELECT COUNT(*) AS oe_position FROM oe where oe_position=3");
                                    $row = mysqli_fetch_array($result);
                                    $count = $row['oe_position'];
                                    ?>
                                    <h3 class="pull-right"><i class="fas fa-box-open"></i></h3>
                                    <h4 class="list-group-item-heading count"><?php echo $count; ?></h4>
                                    <p class="list-group-item-text">แผนกคลัง</p>
                                <?php } ?>
                            </div>
                            <div class="list-group-item google-plus bg-success text-white border border-white">
                                <?php {
                                    include '../conn.php';
                                    $result = mysqli_query($conn, "SELECT COUNT(*) AS oe_position FROM oe where oe_position=1");
                                    $row = mysqli_fetch_array($result);
                                    $count = $row['oe_position'];
                                    ?>
                                    <h3 class="pull-right"><i class="fas fa-calculator"></i></h3>
                                    <h4 class="list-group-item-heading count"><?php echo $count; ?></h4>
                                    <p class="list-group-item-text">แผนกบัญชี</p>
                                <?php } ?>
                            </div>
                            <div  class="list-group-item twitter bg-success text-white border border-white">
                                <?php {
                                    include '../conn.php';
                                    $result = mysqli_query($conn, "SELECT COUNT(*) AS oe_position FROM oe where oe_position=2");
                                    $row = mysqli_fetch_array($result);
                                    $count = $row['oe_position'];
                                    ?>
                                    <h3 class="pull-right"><i class="fas fa-chalkboard-teacher"></i></h3>
                                    <h4 class="list-group-item-heading count"><?php echo $count; ?></h4>
                                    <p class="list-group-item-text">แผนกบุคคล</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
            <div class="card col-4">
                <h5 class="card-header">อุปกรณ์ที่ส่งซ่อม</h5>
                <div class="card-body"><div>
                <div class="list-group">
                    <div class="list-group-item visitor bg-danger text-white border border-white">
                        <?php {
                            include '../conn.php';
                            $result = mysqli_query($conn, "SELECT COUNT(oe.oe_position) AS oe FROM oe "
                                    . "INNER JOIN repair_detail ON repair_detail.repair_detail_oe_id = oe.oe_id "
                                    . "WHERE oe.oe_position = 4 "
                                    . "and repair_detail.repair_detail_status_id = 1");
                            $row = mysqli_fetch_array($result);
                            $count = $row['oe'];
                            ?>
                            <h3 class="pull-right"><i class="fas fa-cog"></i></h3>
                            <h4 class="list-group-item-heading count"><?php echo $count; ?></h4>
                            <p class="list-group-item-text">แผนกช่างซ่อม</p>
                        <?php } ?>
                    </div>
                    <div class="list-group-item facebook-like bg-danger text-white border border-white">
                        <?php {
                            include '../conn.php';
                            $result = mysqli_query($conn, "SELECT COUNT(oe.oe_position) AS oe FROM oe "
                                    . "INNER JOIN repair_detail ON repair_detail.repair_detail_oe_id = oe.oe_id "
                                    . "WHERE oe.oe_position = 3 "
                                    . "and repair_detail.repair_detail_status_id = 1");
                            $row = mysqli_fetch_array($result);
                            $count = $row['oe'];
                            ?>
                            <h3 class="pull-right"><i class="fas fa-box-open"></i></h3>
                            <h4 class="list-group-item-heading count"><?php echo $count; ?></h4>
                            <p class="list-group-item-text">แผนกคลัง</p>
                        <?php } ?>
                    </div>
                    <div class="list-group-item google-plus bg-danger text-white border border-white">
                        <?php {
                            include '../conn.php';
                            $result = mysqli_query($conn, "SELECT COUNT(oe.oe_position) AS oe FROM oe "
                                    . "INNER JOIN repair_detail ON repair_detail.repair_detail_oe_id = oe.oe_id "
                                    . "WHERE oe.oe_position = 1 "
                                    . "and repair_detail.repair_detail_status_id = 1");
                            $row = mysqli_fetch_array($result);
                            $count = $row['oe'];
                            ?>
                            <h3 class="pull-right"><i class="fas fa-calculator"></i></h3>
                            <h4 class="list-group-item-heading count"><?php echo $count; ?></h4>
                            <p class="list-group-item-text">แผนกบัญชี</p>
                        <?php } ?>
                    </div>
                    <div  class="list-group-item twitter bg-danger text-white border border-white">
                        <?php {
                            include '../conn.php';
                            $result = mysqli_query($conn, "SELECT COUNT(oe.oe_position) AS oe FROM oe "
                                    . "INNER JOIN repair_detail ON repair_detail.repair_detail_oe_id = oe.oe_id "
                                    . "WHERE oe.oe_position = 2 "
                                    . "and repair_detail.repair_detail_status_id = 1");
                            $row = mysqli_fetch_array($result);
                            $count = $row['oe'];
                            ?>
                            <h3 class="pull-right"><i class="fas fa-chalkboard-teacher"></i></h3>
                            <h4 class="list-group-item-heading count"><?php echo $count; ?></h4>
                            <p class="list-group-item-text">แผนกบุคคล</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
                </div>
            </div>
            <div class="card col-4">
  <h5 class="card-header">ของซ่อมเสร็จรอรับ</h5>
  <div class="card-body">
            <div>
                <div class="list-group">
                    <div class="list-group-item visitor bg-info text-white border border-white">
                        <?php {
                            include '../conn.php';
                            $result = mysqli_query($conn, "SELECT COUNT(repair_detail.repair_detail_status_id) AS repair_detail,
                                                           repair_detail.repair_detail_status_id,
                                                           oe.oe_position FROM(( repair_detail
                                                           INNER JOIN oe ON repair_detail.repair_detail_oe_id = oe.oe_id
                                                           INNER JOIN position ON position.position_id = oe.oe_position)
                                                           INNER JOIN profile ON repair_detail.repair_detail_users_id = profile.profile_users_id) 
                                                           WHERE repair_detail.repair_detail_status_id = 2 and oe.oe_position=4;");
                            $row = mysqli_fetch_array($result);
                            $count = $row['repair_detail'];
                            ?>
                            <h3 class="pull-right"><i class="fas fa-cog"></i></h3>
                            <h4 class="list-group-item-heading count"><?php echo $count; ?></h4>
                            <p class="list-group-item-text">แผนกช่างซ่อม</p>
                        <?php } ?>
                    </div>
                    <div class="list-group-item facebook-like bg-info text-white border border-white">
                        <?php {
                            include '../conn.php';
                            $result = mysqli_query($conn, "SELECT COUNT(repair_detail.repair_detail_status_id) AS repair_detail,
                                                           repair_detail.repair_detail_status_id,
                                                           oe.oe_position FROM(( repair_detail
                                                           INNER JOIN oe ON repair_detail.repair_detail_oe_id = oe.oe_id
                                                           INNER JOIN position ON position.position_id = oe.oe_position)
                                                           INNER JOIN profile ON repair_detail.repair_detail_users_id = profile.profile_users_id) 
                                                           WHERE repair_detail.repair_detail_status_id = 2 and oe.oe_position=3;");
                            $row = mysqli_fetch_array($result);
                            $count = $row['repair_detail'];
                            ?>
                            <h3 class="pull-right"><i class="fas fa-box-open"></i></h3>
                            <h4 class="list-group-item-heading count"><?php echo $count; ?></h4>
                            <p class="list-group-item-text">แผนกคลัง</p>
                        <?php } ?>
                    </div>
                    <div class="list-group-item google-plus bg-info text-white border border-white">
                        <?php {
                            include '../conn.php';
                            $result = mysqli_query($conn, "SELECT COUNT(repair_detail.repair_detail_status_id) AS repair_detail,
                                                           repair_detail.repair_detail_status_id,
                                                           oe.oe_position FROM(( repair_detail
                                                           INNER JOIN oe ON repair_detail.repair_detail_oe_id = oe.oe_id
                                                           INNER JOIN position ON position.position_id = oe.oe_position)
                                                           INNER JOIN profile ON repair_detail.repair_detail_users_id = profile.profile_users_id) 
                                                           WHERE repair_detail.repair_detail_status_id = 2 and oe.oe_position=1;");
                            $row = mysqli_fetch_array($result);
                            $count = $row['repair_detail'];
                            ?>
                            <h3 class="pull-right"><i class="fas fa-calculator"></i></h3>
                            <h4 class="list-group-item-heading count"><?php echo $count; ?></h4>
                            <p class="list-group-item-text">แผนกบัญชี</p>
                        <?php } ?>
                    </div>
                    <div  class="list-group-item twitter bg-info text-white border border-white">
                        <?php {
                            include '../conn.php';
                            $result = mysqli_query($conn, "SELECT COUNT(repair_detail.repair_detail_status_id) AS repair_detail,
                                                           repair_detail.repair_detail_status_id,
                                                           oe.oe_position FROM(( repair_detail
                                                           INNER JOIN oe ON repair_detail.repair_detail_oe_id = oe.oe_id
                                                           INNER JOIN position ON position.position_id = oe.oe_position)
                                                           INNER JOIN profile ON repair_detail.repair_detail_users_id = profile.profile_users_id) 
                                                           WHERE repair_detail.repair_detail_status_id = 2 and oe.oe_position=2;");
                            $row = mysqli_fetch_array($result);
                            $count = $row['repair_detail'];
                            ?>
                            <h3 class="pull-right"><i class="fas fa-chalkboard-teacher"></i></h3>
                            <h4 class="list-group-item-heading count"><?php echo $count; ?></h4>
                            <p class="list-group-item-text">แผนกบุคคล</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
  </div>
</div>
        </div>  
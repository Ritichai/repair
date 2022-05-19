<!doctype html>
<html lang="en">
    <head>
        <?php include './herder.php'; ?>

    </head>
    <body style="background-color: #eff2f4">
        <div class="container">
            <div class="row" style="margin-top: 30px;">
                <div class="col-sm-12 col-md-4 col-lg-4">
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="card shadow">
                        <form action="check_login.php" method="post" id="login_form">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col"></div>
                                    <div class="col text-center rounded mx-auto d-block mt-3">
                                        <img src="icon/icon.png" style="width: 150px; height: 150px;">
                                    </div>
                                    <div class="col"></div>
                                </div>
                                <br>

                                <div class="col-12 pb-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"> <i class="fas fa-user"></i></div>
                                        </div>
                                        <input type="text" name="users_username" id="users_username" class="form-control"  placeholder="Username" >
                                    </div>
                                </div>

                                <div class="col-12 pb-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-unlock"></i></div>
                                        </div>
                                        <input type="password" name="users_password" id="users_password" class="form-control" placeholder="password" >

                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit"   class="btn btn-primary col-12"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
                                </div>
                            </div>
                        </form> 
                    </div>     
                </div>



                <div class="col-sm-12 col-md-4 col-lg-4" id="ack">

                </div>

            </div>
        </div>

        <?php include './script.php'; ?>  
        <script>
            $(document).ready(function () {

                $("#login_form").on("submit", function (e) {
                    if ($("#users_username").val() === '' || $("#users_password").val() === '') {
                        $.smkAlert({
                            text: 'กรุณากรอกข้อมูลให้ครบ',
                            type: 'warning'
                        });
                        $('#login_form').smkClear();
                        e.preventDefault();
                    }
                });

            });
        </script>
    </body>
</html>
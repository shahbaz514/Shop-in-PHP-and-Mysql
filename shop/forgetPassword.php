<?php
@ob_start();
@session_start();
include "db/db.php";
include "inc/top.php";
if (isset($_SESSION['email']))
{
    header("location:checkout_page.php");
}
?>
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row ">
            <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 ">
                <?php
                include "inc/sidebar_shop.php";
                ?>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-9 mtb_30">
                <!-- contact  -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel-login">
                            <div class="panel-heading">
                                <div class="row mb_20">
                                    <div class="col-xs-12" style="text-align: center;">
                                        <a href="#" class="active" id="login-form-link">Forget Password</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form id="login-form" action="#" method="post">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" required placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" minlength="6" class="form-control" required placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="submit" name="login-submit" id="forget-submit" tabindex="4" class="form-control btn btn-login" value="Forget Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <a href="login.php" tabindex="5" class="forgot-password">Login Now?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <?php
                                        if (isset($_POST['login-submit'])) {
                                            $email = mysqli_real_escape_string($db, $_POST['email']);
                                            $pass = mysqli_real_escape_string($db, $_POST['password']);
                                            $sql = mysqli_query($db, "UPDATE customers SET password = '$pass' WHERE email = '$email'");
                                            if ($sql)
                                            {
                                                header("location:login.php");
                                            }
                                            else
                                            {
                                                echo "<script>alert('Take An Error!')</script>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Single Blog  -->
    <!-- End Blog   -->
    <!-- =====  CONTAINER END  ===== -->
<?php
include "inc/footer.php";
?>
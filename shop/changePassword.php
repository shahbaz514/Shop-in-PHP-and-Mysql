<?php
@ob_start();
@session_start();
include "db/db.php";
include "inc/top.php";
if (!isset($_SESSION['email']))
{
    header("location:login.php");
}
?>
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row ">
            <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 hidden-xs">
                <?php
                include 'inc/sidebar_user.php';
                ?>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-9 mtb_30">
                <div class="row">
                    <div class="breadcrumb ptb_20">
                        <h1>Change Password</h1>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Change Password</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel-login">
                                <div class="panel-heading">
                                    <div class="row mb_20">
                                        <div class="col-xs-12" style="text-align: center;">
                                            <a href="#" class="active" id="login-form-link">Change Password</a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form id="login-form" action="#" method="post">
                                                <div class="form-group">
                                                    <input type="password" name="password" minlength="6" class="form-control" required placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="cpassword" minlength="6" class="form-control" required placeholder="Confirm Password">
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-sm-offset-3">
                                                            <input type="submit" name="login-submit" id="forget-submit" tabindex="4" class="form-control btn btn-login" value="Change Password">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <?php
                                            if (isset($_POST['login-submit'])) {
                                                $email = $_SESSION['email'];
                                                $pass = mysqli_real_escape_string($db, $_POST['password']);
                                                $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);
                                                if ($pass == $cpassword)
                                                {
                                                    $sql = mysqli_query($db, "UPDATE customers SET password = '$pass' WHERE email = '$email'");
                                                    if ($sql)
                                                    {
                                                        header("location:userAccount.php");
                                                    }
                                                    else
                                                    {
                                                        echo "<script>alert('Take An Error!')</script>";
                                                    }
                                                }
                                                else
                                                {
                                                    echo "<script>alert('Password And Confirm Password Not Same. Try Again!')</script>";
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
    </div>
    <!-- Single Blog  -->
    <!-- End Blog   -->
    <!-- =====  CONTAINER END  ===== -->
<?php
include "inc/footer.php";
?>
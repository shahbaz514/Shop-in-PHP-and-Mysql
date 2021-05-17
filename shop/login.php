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
                                    <div class="col-xs-6">
                                        <a href="#" class="active" id="login-form-link">Login</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="#" id="register-form-link">Register</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form id="login-form" action="#" method="post">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <a href="forgetPassword.php" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                        if (isset($_POST['login-submit'])) {
                                            $email = mysqli_real_escape_string($db, $_POST['email']);
                                            $pass = mysqli_real_escape_string($db, $_POST['password']);
                                            $sql = mysqli_query($db, "SELECT * FROM customers WHERE email = '$email' AND password = '$pass'");
                                            $count = 0;
                                            $count = mysqli_num_rows($sql);
                                            $row = mysqli_fetch_array($sql);
                                            if ($count > 0)
                                            {
                                                $_SESSION['email'] = $email;
                                                header("location:checkout_page.php");
                                            }
                                            else
                                            {
                                                echo "<script>alert('Your Credentials Does Not Match!')</script>";
                                            }
                                        }
                                        ?>
                                        <form id="register-form" action="" enctype="multipart/form-data" method="post">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" minlength="6" placeholder="Full Name (Required)" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Email Address (Required)" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control" minlength="6" placeholder="Password (Required)" autocomplete required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="address" class="form-control" minlength="10" placeholder="Address (Required)" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="country" class="form-control" minlength="3" placeholder="Country (Required)" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="number" name="phone" class="form-control" minlength="8" placeholder="Phone (Required)" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="file" name="img" class="form-control" accept="image/*" title="Select Your Profile Photo (Optional)">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="submit" name="register" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                        if (isset($_POST['register']))
                                        {
                                            $name = mysqli_real_escape_string($db, $_POST['name']);
                                            $email = mysqli_real_escape_string($db, $_POST['email']);
                                            $password = mysqli_real_escape_string($db, $_POST['password']);
                                            $address = mysqli_real_escape_string($db, $_POST['address']);
                                            $country = mysqli_real_escape_string($db, $_POST['country']);
                                            $phone = mysqli_real_escape_string($db, $_POST['phone']);
                                            $temp = explode(".", $_FILES["img"]["name"]);
                                            $newfilename = rand() * microtime() . '.' . end($temp);
                                            if ($_FILES["img"]["name"] == null)
                                            {
                                                $sqlAdd = mysqli_query($db, "INSERT INTO `customers`(`name`, `email`, `password`, `address`, `country`, `phone`) VALUES ('$name', '$email', '$password', '$address', '$country', '$phone')");
                                                if ($sqlAdd)
                                                {
                                                    header("location:login.php");
                                                }
                                            }
                                            else
                                            {
                                                $sqlAdd = mysqli_query($db, "INSERT INTO `customers`(`name`, `email`, `password`, `img`, `address`, `country`, `phone`) VALUES ('$name', '$email', '$password', '$newfilename', '$address', '$country', '$phone')");
                                                if ($sqlAdd)
                                                {
                                                	$move = move_uploaded_file($_FILES["img"]["tmp_name"], "images/" . $newfilename);
                                                    header("location:login.php");
                                                }
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
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
                <div class="breadcrumb ptb_20">
                    <h1>Edit Profile</h1>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Edit Profile</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <?php
                        $sqlUserInfo = mysqli_query($db, "SELECT * FROM customers WHERE email = '".$_SESSION['email']."'");
                        $rowUserInfo = mysqli_fetch_array($sqlUserInfo);
                        ?>
                        <form action="" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" value="<?php echo $rowUserInfo['name']; ?>" minlength="6" placeholder="Full Name (Required)" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" value="<?php echo $rowUserInfo['address']; ?>" minlength="10" placeholder="Address (Required)" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="country" class="form-control" value="<?php echo $rowUserInfo['country']; ?>" minlength="3" placeholder="Country (Required)" required>
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" class="form-control" value="<?php echo $rowUserInfo['phone']; ?>" minlength="8" placeholder="Phone (Required)" required>
                            </div>
                            <div class="form-group">
                                <input type="file" name="img" class="form-control" accept="image/*" title="Select Your Profile Photo (Optional)">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="register" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Update">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['register']))
                        {
                            $name = mysqli_real_escape_string($db, $_POST['name']);
                            $address = mysqli_real_escape_string($db, $_POST['address']);
                            $country = mysqli_real_escape_string($db, $_POST['country']);
                            $phone = mysqli_real_escape_string($db, $_POST['phone']);
                            $temp = explode(".", $_FILES["img"]["name"]);
                            $newfilename = rand() * microtime() . '.' . end($temp);
                            if ($_FILES["img"]["name"] == null)
                            {
                                $sqlAdd = mysqli_query($db, "UPDATE `customers` SET `name`='$name',`address`='$address',`country`='$country',`phone`='$phone' WHERE email = '".$_SESSION['email']."'");
                                if ($sqlAdd)
                                {
                                    header("location:userAccount.php");
                                }
                            }
                            else
                            {
                                $sqlAdd = mysqli_query($db, "UPDATE `customers` SET `name`='$name',`img`='$newfilename',`address`='$address',`country`='$country',`phone`='$phone' WHERE email = '".$_SESSION['email']."'");
                                if ($sqlAdd)
                                {
                                    $move = move_uploaded_file($_FILES["img"]["tmp_name"], "images/" . $newfilename);
                                    header("location:userAccount.php");
                                }
                            }
                        }
                        ?>
                    </div>
                    <div class="col-sm-4"></div>
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
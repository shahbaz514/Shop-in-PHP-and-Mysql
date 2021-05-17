<?php
ob_start();
session_start();
include "../db/db.php";
if (!isset($_SESSION['username']))
{
    echo "<script>window.open('login.php','_self')</script>";
}
include "inc/head.php";
?>
<!-- Page Loader -->
<?php
include "inc/pageLoader.php";
?>
<!-- #END# Page Loader -->
<!-- Top Bar -->
<?php
include "inc/topBar.php";
?>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <?php
        include "sideBar.php";
        ?>
        <!-- #User Info -->
        <!-- Menu -->
        <?php
        include "inc/menu.php";
        ?>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2021 <a href="javascript:void(0);">Binary Digital Media Pvt LTD</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>
<?php
$user = $_SESSION['username'];
$sql = mysqli_query($db, "SELECT * FROM `admins` WHERE username = '$user'");
$row = mysqli_fetch_array($sql);
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-3">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">
                            <?php
                            if ($row['img'] == "")
                            {
                                echo '<img src="images/user-lg.jpg" alt="AdminBSB - Profile Image" />';
                            }
                            else
                            {
                                ?>
                                <img style="width: 128px; height: 128px;" src="images/<?php echo $row['img']; ?>" alt="AdminBSB - Profile Image" />
                                <?php
                            }
                            ?>

                        </div>
                        <div class="content-area">
                            <h3><?php echo $row['name']; ?></h3>
                            <p><?php echo $row['role']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="card card-about-me">
                    <div class="header">
                        <h2>ABOUT ME</h2>
                    </div>
                    <div class="body">
                        <ul>
                            <li>
                                <div class="title">
                                    <i class="material-icons">library_books</i>
                                    Education
                                </div>
                                <div class="content">
                                    <?php echo $row['education']; ?>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <i class="material-icons">location_on</i>
                                    Location
                                </div>
                                <div class="content">
                                    <?php echo $row['location']; ?>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <i class="material-icons">notes</i>
                                    Description
                                </div>
                                <div class="content">
                                    <?php echo $row['description']; ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                    <form class="form-horizontal" action="settings.php" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label for="NameSurname" class="col-sm-2 control-label">Full Name</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="fullName" placeholder="Full Name" value="<?php echo $row['name']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NameSurname" class="col-sm-2 control-label">Education</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="education" placeholder="Education" value="<?php echo $row['education']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NameSurname" class="col-sm-2 control-label">Location</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="location" placeholder="Location" value="<?php echo $row['location']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NameSurname" class="col-sm-2 control-label">Image</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="file" class="form-control" name="img" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputExperience" class="col-sm-2 control-label">Description</label>

                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <textarea class="form-control" id="InputExperience" name="description" rows="3" placeholder="Description"><?php echo $row['description']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger" name="changeSettings">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['changeSettings']))
                                    {
                                        $name = mysqli_real_escape_string($db, $_POST['fullName']);
                                        $education = mysqli_real_escape_string($db, $_POST['education']);
                                        $location = mysqli_real_escape_string($db, $_POST['location']);
                                        $description = mysqli_real_escape_string($db, $_POST['description']);
                                        $img = $_FILES["img"]["name"];
                                        $tempe = $_FILES["img"]["tmp_name"];
                                        if ($img != null)
                                        {
                                            $temp = explode(".", $_FILES["img"]["name"]);
                                            $newfilename = round(microtime(true)) . '.' . end($temp);
                                            $sqlUp = mysqli_query($db, "UPDATE `admins` SET `name`='$name', `img`='$newfilename',`education`='$education',`location`='$location',`description`= '$description' WHERE username = '".$_SESSION['username']."'");
                                            if ($sqlUp)
                                            {
                                                move_uploaded_file($_FILES["img"]["tmp_name"], "images/" . $newfilename);
                                                echo "<script>window.open('settings.php','_self')</script>";
                                            }
                                        }
                                        else
                                        {
                                            $sqlUp = mysqli_query($db, "UPDATE `admins` SET `name`='$name', `img`='".$row['img']."',`education`='$education',`location`='$location',`description`= '$description' WHERE username = '".$_SESSION['username']."'");
                                            if ($sqlUp)
                                            {
                                                echo "<script>window.open('settings.php','_self')</script>";
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="settings.php">
                                        <div class="form-group">
                                            <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="NewPassword" name="NewPassword" minlength="6" placeholder="New Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" minlength="6" placeholder="New Password (Confirm)" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-danger" name="changePassword">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>

                                    <?php
                                    if (isset($_POST['changePassword']))
                                    {
                                        $NewPassword = mysqli_real_escape_string($db, $_POST['NewPassword']);
                                        $NewPasswordConfirm = mysqli_real_escape_string($db, $_POST['NewPasswordConfirm']);

                                        if ($NewPassword == $NewPasswordConfirm)
                                        {
                                            $sqlUpPass = mysqli_query($db, "UPDATE `admins` SET `pass` = '$NewPassword' WHERE username = '".$_SESSION['username']."'");
                                            if ($sqlUpPass)
                                            {
                                                echo "<script>window.open('settings.php','_self')</script>";
                                            }
                                            else
                                            {
                                                echo "<script>window.open('settings.php','_self')</script>";
                                            }
                                        }
                                        else
                                        {
                                            echo "<script>alert('Password Does Not Match!')</script>";
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
</section>

<?php
include "inc/footer.php";
?>
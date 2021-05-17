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
        <?php
            include 'sideBar.php';
        ?>
    </aside>
    <!-- #END# Left Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        <!-- Image Gallery -->
        <div class="block-header">
            <h2>
                IMAGE GALLERY
            </h2>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            GALLERY
                        </h2>
                    </div>
                    <div class="body">
                        <form action="media.php" method="post" enctype="multipart/form-data">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">file_present</i>
                                </span>
                                <div class="form-line">
                                    <input type="file" class="form-control" name="img" required>
                                </div>
                            </div>
                            <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name="addMedia" style="width: 130px;">Add Media</button>
                        </form>
                        <?php
                        if (isset($_POST['addMedia']))
                        {
                            $temp = explode(".", $_FILES["img"]["name"]);
                            $newfilename = round(microtime(true)) . '.' . end($temp);
                            $sqlInsert = mysqli_query($db, "INSERT INTO `media`(`img`) VALUES ('$newfilename')");
                            if ($sqlInsert)
                            {
                                move_uploaded_file($_FILES["img"]["tmp_name"], "images/" . $newfilename);
                                echo "<script>window.open('media.php','_self')</script>";
                            }
                            else
                            {
                                echo "<script>alert('Take An Error!')</script>";
                            }
                        }
                        ?>
                        <div id="aniimated-thumbnials" class="list-unstyled row clearfix" style="margin-top: 20px;">

                            <?php
                            $sqlMedia = mysqli_query($db, "SELECT * FROM `media` ORDER BY id DESC");
                            while ($row = mysqli_fetch_array($sqlMedia))
                            {
                                ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/<?php echo $row['img']; ?>" data-sub-html="Demo Description">
                                        <img style="height: 250px; width: 100%;" class="img-responsive thumbnail" src="images/<?php echo $row['img']; ?>">
                                    </a>
                                </div>
                                <?php
                            }
                            ?>

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
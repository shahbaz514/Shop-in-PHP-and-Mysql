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
        <div class="block-header">
            <h2>Edit Category</h2>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-sm-6">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit Category
                        </h2>
                    </div>
                    <div class="body">
                        <?php
                        if (isset($_GET['edit'])) {
                        $sqlP = mysqli_query($db, "SELECT * FROM `category` WHERE id = '".$_GET['edit']."'");
                        $rowP = mysqli_fetch_array($sqlP);
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <label for="email_address">Category Name:*</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" value="<?php echo $rowP['name']; ?>" name="name" required>
                                </div>
                            </div>
                            <label for="email_address">Category Image:</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" class="form-control" name="img" accept="image/*">
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-danger m-t-15 waves-effect" name="editCategory">Edit Category</button>
                        </form>
                        <?php
                            if (isset($_POST['editCategory']))
                            {

                                $name = mysqli_real_escape_string($db, $_POST['name']);
                                $temp = explode(".", $_FILES["img"]["name"]);
                                $newfilename = rand() . '.' . end($temp);
                                if ($_FILES["img"]["name"] != null)
                                {
                                    $sqlAdd = mysqli_query($db, "UPDATE `category` SET `name`='$name',`img`='$newfilename' WHERE id = '".$_GET['edit']."'");
                                    if ($sqlAdd)
                                    {
                                        $move = move_uploaded_file($_FILES["img"]["tmp_name"], "images/" . $newfilename);
                                        echo "<script>window.open('allCategories.php', '_self')</script>";
                                    }
                                    else
                                    {
                                        echo "<script>alert('Take An Error! Try Again')</script>";
                                        echo "<script>window.open('allCategories.php', '_self')</script>";
                                    }
                                }
                                else {
                                    $sqlAdd = mysqli_query($db, "UPDATE `category` SET `name`='$name' WHERE id = '".$_GET['edit']."'");
                                    if ($sqlAdd)
                                    {
                                        echo "<script>window.open('allCategories.php', '_self')</script>";
                                    }
                                    else
                                    {
                                        echo "<script>alert('Take An Error! Try Again')</script>";
                                        echo "<script>window.open('allCategories.php', '_self')</script>";
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>

<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/tables/jquery-datatable.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>
</body>

</html>

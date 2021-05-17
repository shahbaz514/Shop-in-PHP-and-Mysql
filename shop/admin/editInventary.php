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
    </aside>
    <!-- #END# Left Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>EDIT INVENTORY</h2>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            EDIT INVENTORY
                        </h2>
                    </div>
                    <div class="body">
                        <?php
                        if (isset($_GET['edit'])) {
                            $sqlP = mysqli_query($db, "SELECT * FROM `products` WHERE id = '".$_GET['edit']."'");
                            $rowP = mysqli_fetch_array($sqlP);
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <label for="email_address">Price:*</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="price" placeholder="Product Price" value="<?php echo $rowP['price']; ?>" required>
                                    </div>
                                </div>
                                <label for="email_address">Sale (Give in %):*</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="sale" placeholder="Sale" value="<?php echo $rowP['discount']; ?>" required>
                                    </div>
                                </div>
                                <label for="email_address">Product Qty:*</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="qty" placeholder="Product Qty" value="<?php echo $rowP['qty']; ?>" required>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-danger m-t-15 waves-effect" name="addProduct">Edit Inventory</button>
                            </form>
                            <?php

                            ?>
                            <?php

                        }
                        if (isset($_POST['addProduct']))
                        {
                            $price = mysqli_real_escape_string($db, $_POST['price']);
                            $qty = mysqli_real_escape_string($db, $_POST['qty']);
                            $sale = mysqli_real_escape_string($db, $_POST['sale']);
                            $sqlAdd1 = mysqli_query($db, "UPDATE `products` SET `price`='$price', `discount`='$sale',`qty`='$qty'  WHERE id = '".$_GET['edit']."'");
                            if ($sqlAdd1)
                            {
                                echo "<script>window.open('inventaryManagement.php', '_self')</script>";
                            }
                            else
                            {
                                echo '
                                    <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4">
                                            <div class="alert alert-warning alert-dismissible" role="alert">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              Take An Error! Try Again
                                            </div>
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                ';
                                echo "<script>window.open('inventaryManagement.php', '_self')</script>";
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

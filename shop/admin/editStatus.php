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
            <h2>Edit Status</h2>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-sm-6">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit Status
                        </h2>
                    </div>
                    <div class="body">
                        <?php
                        if (isset($_GET['invoice'])) {
                        $sqlP = mysqli_query($db, "SELECT * FROM `orders_customers` WHERE orderid = '".$_GET['invoice']."'");
                        $rowP = mysqli_fetch_array($sqlP);
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <label for="email_address">Select Status:*</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="status" class="form-control">
                                        <option value="">--Select Status--</option>
                                        <option>Paid</option>
                                        <option>Pending</option>
                                        <option>Cancel</option>
                                        <option>Delivered</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-danger m-t-15 waves-effect" name="editCategory">Edit Status</button>
                        </form>
                        <?php
                            if (isset($_POST['editCategory']))
                            {

                                $status = mysqli_real_escape_string($db, $_POST['status']);
                                $sqlAdd = mysqli_query($db, "UPDATE `orders_customers` SET `status`='$status' WHERE orderid = '".$_GET['invoice']."'");
                                if ($sqlAdd)
                                {
                                    echo "<script>window.open('allCustomersOrders.php', '_self')</script>";
                                }
                                else
                                {
                                    echo "<script>alert('Take An Error! Try Again')</script>";
                                    echo "<script>window.open('allCustomersOrders.php', '_self')</script>";
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

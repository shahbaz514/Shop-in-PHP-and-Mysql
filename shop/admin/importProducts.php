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
                IMPORT PRODUCTS
            </h2>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            IMPORT PRODUCTS
                        </h2>
                    </div>
                    <div class="body">
                        <form action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">file_present</i>
                                </span>
                                <div class="form-line">
                                    <input type="file" class="form-control" name="file"  id="file" accept=".csv" title="Select .CSV File Only" required>
                                </div>
                            </div>
                            <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name="Import" style="width: 160px;">IMPORT PRODUCTS</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ALL PRODUCTS
                    </h2>
                    <ul class="header-dropdown m-r--5">
                    </ul>
                </div>
                <div class="body">
                    <center>
                        <p>
                            Download the CSV file And Insert Data According to It. And Upload that .CSV File For Importing Products
                        </p>
                    </center>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image 01</th>
                                <th>Image 02</th>
                                <th>Image 03</th>
                                <th>Category ID</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Sale</th>
                                <th>Shape</th>
                                <th>Description</th>
                                <th>Tags</th>
                                <th>Keywords</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

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

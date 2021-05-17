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
            <h2>ALL INVENTORY</h2>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ALL INVENTORY
                        </h2>
                        <ul class="header-dropdown m-r--5">
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Sale</th>
                                    <th>Qty</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Sale</th>
                                    <th>Qty</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $count = 0;
                                $sqlPro = mysqli_query($db, "SELECT * FROM `products` ORDER BY id DESC");
                                while ($rowPro = mysqli_fetch_array($sqlPro))
                                {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $rowPro['name']; ?></td>
                                        <td><?php echo $rowPro['price']; ?></td>
                                        <td><?php echo $rowPro['discount']; ?> %</td>
                                        <td><?php echo $rowPro['qty']; ?></td>
                                        <td>
                                            <?php
                                            if ($rowPro['status'] == 'Publish')
                                            {
                                                echo '<center><a style="width:150px;" class="btn btn-block bg-pink waves-effect" href="#">Published</a></center>';
                                            }
                                            if ($rowPro['status'] == 'Private')
                                            {
                                                echo '<center><a style="width:150px;" class="btn btn-block bg-pink waves-effect" href="#">Private</a></center>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <center><a style="width:80px;" class="btn btn-block bg-pink waves-effect" href="editInventary.php?edit=<?php echo $rowPro['id']; ?>"><i class="material-icons">edit</i></a></center>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
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

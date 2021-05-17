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
            <h2>All Customers Orders</h2>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All Customers Orders
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Invoice No</th>
                                    <th>Discount Price</th>
                                    <th>Total Price</th>
                                    <th>Price Received</th>
                                    <th>Payment Option</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Invoice No</th>
                                    <th>Discount Price</th>
                                    <th>Total Price</th>
                                    <th>Price Received</th>
                                    <th>Payment Option</th>
                                    <th>Status</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $count = 0;
                                $get_orders = "SELECT * FROM orders_customers ORDER BY id DESC";
                                $run_orders = mysqli_query($db,$get_orders);
                                if (mysqli_num_rows($run_orders) > 0) {
                                    while ($row = mysqli_fetch_array($run_orders)) {
                                        $count++;
                                        ?>
                                        <tr>
                                            <td style="vertical-align: middle;">
                                                <?php echo $count; ?>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a class="btn btn-block btn-danger btn-sm" style="border-radius: 5px;" href="orderDetail.php?invoice=<?php echo $row['orderid']; ?>">
                                                    <?php echo $row['orderid']; ?>
                                                </a>
                                            </td>
                                            <td style="vertical-align: middle;">$<?php echo $row['discountprice']; ?></td>
                                            <td style="vertical-align: middle;">$<?php echo $row['totalPrice']; ?></td>
                                            <td style="vertical-align: middle;">$<?php echo $row['pricereceived']; ?></td>
                                            <td style="vertical-align: middle;"><?php echo $row['paymenttype']; ?></td>
                                            <td style="vertical-align: middle;">
                                                <a class="btn btn-block btn-danger btn-sm" style="border-radius: 5px;"  href="editStatus.php?invoice=<?php echo $row['orderid']; ?>">
                                                    <?php echo ucfirst($row['status']);; ?>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
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

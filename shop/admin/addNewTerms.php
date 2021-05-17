<?php
ob_start();
session_start();
include "../db/db.php";
if (!isset($_SESSION['username']))
{
    echo "<script>window.open('login.php','_self')</script>";
}
if ($_SESSION['role'] == 'accounts')
{
    echo "<script>window.open('index.php','_self')</script>";
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
        include "inc/userInfo.php";
        ?>
        <!-- #User Info -->
        <!-- Menu -->
        <?php include "inc/menu.php"; ?>
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

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                ADD NEW TERMS
            </h2>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ADD NEW TERMS
                        </h2>
                    </div>
                    <div class="body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <label for="email_address">Description:*</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea type="text" class="form-control" name="description" placeholder="Description" rows="5" required ></textarea>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-danger m-t-15 waves-effect" name="addCategory">Add New Terms</button>
                        </form>
                        <?php
                        if (isset($_POST['addCategory']))
                        {
                            $description = mysqli_real_escape_string($db, $_POST['description']);
                            $sqlAdd = mysqli_query($db, "INSERT INTO `terms`(`description`) VALUES ('$description')");
                            if ($sqlAdd)
                            {
                                echo "<script>window.open('allTerms.php', '_self')</script>";
                            }
                            else
                            {
                                echo "<script>alert('Take An Error! Try Again')</script>";
                                echo "<script>window.open('allTerms.php', '_self')</script>";
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

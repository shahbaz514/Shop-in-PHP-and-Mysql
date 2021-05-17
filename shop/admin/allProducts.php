<?php
ob_start();
session_start();
include "../db/db.php";
if (!isset($_SESSION['username']))
{
    echo "<script>window.open('login.php','_self')</script>";
}
if (isset($_GET['del']))
{
    $sqlProDel = mysqli_query($db, "DELETE FROM `products` WHERE id = '".$_GET['del']."'");
    if ($sqlProDel)
    {
        echo "<script>window.open('allProducts.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('Take An Erro! Try Again.')</script>";
        echo "<script>window.open('allProducts.php','_self')</script>";
    }
}
if (isset($_GET['editStatus']))
{
    $proSql = mysqli_query($db, "SELECT * FROM products WHERE id = '".$_GET['editStatus']."'");
    $proRow = mysqli_fetch_array($proSql);
    if ($proRow['status'] == 'Publish')
    {
        $upSql = mysqli_query($db, "UPDATE `products` SET `status` = 'Private' WHERE id = '".$_GET['editStatus']."'");
        if ($upSql)
        {
            echo "<script>window.open('allProducts.php','_self')</script>";
        }
        else
        {
            echo "<script>alert('Take An Erro! Try Again.')</script>";
            echo "<script>window.open('allProducts.php','_self')</script>";
        }
    }
    else
    {
        $upSql = mysqli_query($db, "UPDATE `products` SET `status` = 'Publish' WHERE id = '".$_GET['editStatus']."'");
        if ($upSql)
        {
            echo "<script>window.open('allProducts.php','_self')</script>";
        }
        else
        {
            echo "<script>alert('Take An Erro! Try Again.')</script>";
            echo "<script>window.open('allProducts.php','_self')</script>";
        }
    }
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
            <h2>ALL PRODUCTS</h2>
        </div>

        <!-- Exportable Table -->
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Main Image</th>
                                    <th>Image 01</th>
                                    <th>Image 02</th>
                                    <th>Price</th>
                                    <th>Sale</th>
                                    <th>Qty</th>
                                    <th>Tags</th>
                                    <th>Status</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Main Image</th>
                                    <th>Image 01</th>
                                    <th>Image 02</th>
                                    <th>Price</th>
                                    <th>Sale</th>
                                    <th>Qty</th>
                                    <th>Tags</th>
                                    <th>Status</th>
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $count = 0;
                                $sqlPro = mysqli_query($db, "SELECT * FROM `products`  WHERE username = '".$_SESSION['username']."' ORDER BY id DESC");
                                while ($rowPro = mysqli_fetch_array($sqlPro))
                                {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $rowPro['name']; ?></td>
                                        <td>
                                            <?php
                                            $sqlCat = mysqli_query($db, "SELECT * FROM `category` WHERE id = '".$rowPro['category']."'");
                                            $rowCat = mysqli_fetch_array($sqlCat);
                                            ?>
                                            <?php echo $rowCat['name']; ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($rowPro['img'] != null)
                                            {
                                                ?>
                                                <img src="images/<?php echo $rowPro['img']; ?>" style="width: 100px; height: 100px;" class="img-thumbnail">
                                                <?php
                                            }
                                            else
                                            {
                                                echo "";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($rowPro['img1'] != null)
                                            {
                                                ?>
                                                <img src="images/<?php echo $rowPro['img1']; ?>" style="width: 100px; height: 100px;" class="img-thumbnail">
                                                <?php
                                            }
                                            else
                                            {
                                                echo "";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($rowPro['img2'] != null)
                                            {
                                                ?>
                                                <img src="images/<?php echo $rowPro['img2']; ?>" style="width: 100px; height: 100px;" class="img-thumbnail">
                                                <?php
                                            }
                                            else
                                            {
                                                echo "";
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $rowPro['price']; ?></td>
                                        <td><?php echo $rowPro['discount']; ?> %</td>
                                        <td><?php echo $rowPro['qty']; ?></td>
                                        <td><?php echo $rowPro['tags']; ?></td>
                                        <td>
                                            <?php
                                            if ($rowPro['status'] == 'Publish')
                                            {
                                                echo '<a class="btn btn-block bg-pink waves-effect" href="allProducts.php?editStatus='.$rowPro['id'].'">Published</a>';
                                            }
                                            if ($rowPro['status'] == 'Private')
                                            {
                                                echo '<a class="btn btn-block bg-pink waves-effect" href="allProducts.php?editStatus='.$rowPro['id'].'">Private</a>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-block bg-pink waves-effect" href="allProducts.php?del=<?php echo $rowPro['id']; ?>"><i class="material-icons">delete</i></a>
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

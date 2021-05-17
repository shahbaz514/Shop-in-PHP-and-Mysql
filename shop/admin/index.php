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
    <?php
        include "inc/pageLoader.php";
    ?>
    <?php
        include "inc/topBar.php";
    ?>
    <section>
        <aside id="leftsidebar" class="sidebar">
            <?php
                include 'sideBar.php';
            ?>
        </aside>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <?php
            $sqlOrders = mysqli_query($db, "SELECT * FROM orders_admins WHERE status = 'Paid'");
            $countOrders = 0;
            while ($roi = mysqli_fetch_array($sqlOrders))
            {
                $countOrders = $countOrders + $roi['totalPrice'];
            }
            $sqlTotalProducts = mysqli_query($db, "SELECT * FROM products");
            $countTotalProducts = mysqli_num_rows($sqlTotalProducts);
            $sqlCat = mysqli_query($db, "SELECT * FROM category");
            $countCat = mysqli_num_rows($sqlCat);
            $sqlUse = mysqli_query($db, "SELECT * FROM admins");
            $countUse = mysqli_num_rows($sqlUse);
            ?>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-sm-3">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_balance</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Sales</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $countOrders; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">production_quantity_limits</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Products</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $countTotalProducts; ?>" data-speed="1000" data-fresh-interval="1000"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">category</i>
                        </div>
                        <div class="content">
                            <div class="text">Product Categories</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $countCat; ?>" data-speed="1000" data-fresh-interval="1000"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="info-box bg-deep-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">group_work</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Users</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $countUse; ?>" data-speed="1000" data-fresh-interval="1000"></div>
                        </div>
                    </div>
                </div>
            </div>
<?php
if ($_SESSION['role'] == 'Admin') {
?>
            <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        ALL USERS
                                    </h2>
                                    <ul class="header-dropdown m-r--5">
                                    </ul>
                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover ">
                                            <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>UserName</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>UserName</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php
                                            $count = 0;
                                            $sqlPro = mysqli_query($db, "SELECT * FROM `admins` ORDER BY name ASC");
                                            while ($rowPro = mysqli_fetch_array($sqlPro))
                                            {
                                                $count++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $rowPro['username']; ?></td>
                                                    <td><?php echo $rowPro['email']; ?></td>
                                                    <td><?php echo $rowPro['role']; ?></td>
                                                    <td>
                                                        <center><a style="width:80px;" class="btn btn-block bg-pink waves-effect" href="editUsers.php?edit=<?php echo $rowPro['id']; ?>"><i class="material-icons">edit</i></a></center>
                                                    </td>
                                                    <td>
                                                        <center><a style="width:80px;" class="btn btn-block bg-pink waves-effect" href="allUsers.php?del=<?php echo $rowPro['id']; ?>"><i class="material-icons">delete</i></a></center>
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
<?php
}
?>
        </div>
    </section>
<?php
include "inc/footer.php";
?>

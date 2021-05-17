<?php
@ob_start();
@session_start();
include "db/db.php";
include "inc/top.php";
if (!isset($_SESSION['email']))
{
    header("location:login.php");
}
?>
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row ">
            <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 hidden-xs">
                <?php
                include 'inc/sidebar_user.php';
                ?>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-9 mtb_30">
                <div class="breadcrumb ptb_20">
                    <h1>All Orders</h1>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">All Orders</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Invoice No</th>
                                <th>Discount Price</th>
                                <th>Total Price</th>
                                <th>Price Received</th>
                                <th>Payment Option</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $c = $_SESSION['email'];
                            $get_orders = "SELECT * FROM orders_customers WHERE email='".$_SESSION['email']."'";
                            $run_orders = mysqli_query($db,$get_orders);
                            if (mysqli_num_rows($run_orders) > 0) {
                                while ($row = mysqli_fetch_array($run_orders)) {
                                    ?>
                                    <tr>
                                        <td style="vertical-align: middle;">
                                            <a class="btn btn-block btn-sm" style="border-radius: 5px;" href="orderDetail.php?invoice=<?php echo $row['orderid']; ?>">
                                                <?php echo $row['orderid']; ?>
                                            </a>
                                        </td>
                                        <td style="vertical-align: middle;">$<?php echo $row['discountprice']; ?></td>
                                        <td style="vertical-align: middle;">$<?php echo $row['totalPrice']; ?></td>
                                        <td style="vertical-align: middle;">$<?php echo $row['pricereceived']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['paymenttype']; ?></td>
                                        <td style="vertical-align: middle;">
                                            <a class="btn btn-block btn-sm" style="border-radius: 5px;">
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
    </div>
    <!-- Single Blog  -->
    <!-- End Blog   -->
    <!-- =====  CONTAINER END  ===== -->
<?php
include "inc/footer.php";
?>
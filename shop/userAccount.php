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
                <div class="row">
                    <style>
                        .add_cart_btn {
                            background: #262121;
                            color: #fff;
                            line-height: 38px;
                            border: 1px solid #262121;
                            display: inline-block;
                            font-size: 14px;
                            text-transform: uppercase;
                            font-weight: 600;
                            letter-spacing: .70px;
                            padding: 0px 15px;
                            -webkit-transition: all 400ms linear 0s;
                            -o-transition: all 400ms linear 0s;
                            transition: all 400ms linear 0s;
                            font-family: "Poppins", sans-serif;
                        }
                        .add_cart_btn:hover {
                            color: #fff;
                            background: transparent;
                            color: #262121;
                        }
                    </style>
                    <?php
                    $c = $_SESSION['email'];
                    $get_orders = "SELECT * FROM orders_customers WHERE email='$c' AND status='pending'";
                    $run_orders = mysqli_query($db,$get_orders);
                    $count_orders = mysqli_num_rows($run_orders);
                    if ($count_orders > 0) {
                        ?>
                        <h2 class="add_cart_btn" >You Have ( <?php echo "$count_orders"; ?> ) Pending Order</h2>
                        <h3><a class="add_cart_btn" href="PendingOrders.php">Please See Your Order Details By Clicking This Link</a></h3>
                        <?php
                    }
                    else{
                        ?>
                        <h2>You Have No Pending Orders</h2>
                        <h4>Please See Your Paid Orders By Clicking This Link <a class="btn btn-warning" href="PaidOrders.php">Link</a></h4>
                        <h4>Please See Your Delivered Orders By Clicking This Link <a class="btn btn-warning" href="DeliveredOrders.php">Link</a></h4>
                        <?php
                    }
                    ?>
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
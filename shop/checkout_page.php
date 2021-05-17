<?php
@ob_start();
@session_start();
include "db/db.php";
include "inc/top.php";
if (!isset($_SESSION['email']))
{
    header("location:login.php");
}

if (isset($_SESSION['email'])) {
    if ($countCart==0) {
        header("location:userAccount.php");
    }
}
?>

    <style>
        .media:first-child {
            margin-top: 20;
        }
    </style>
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row ">
            <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 ">
                <?php
                include "inc/sidebar_shop.php";
                ?>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-9 mtb_30">
                <!-- =====  BANNER STRAT  ===== -->
                <div class="breadcrumb ptb_20">
                    <h1>Shopping Cart</h1>
                    <ul>
                        <li><a href="index-2.html">Home</a></li>
                        <li class="active">Shopping Cart</li>
                    </ul>
                </div>

                <!-- =====  BREADCRUMB END===== -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td class="text-center">Image</td>
                            <td class="text-left">Product Name</td>
                            <td class="text-left">Model</td>
                            <td class="text-left">Quantity</td>
                            <td class="text-right">Unit Price</td>
                            <td class="text-right">Total</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $ip = getIPAddress();
                        $sqlCart = mysqli_query($db, "SELECT * FROM cart WHERE ip = '$ip'");
                        $count = mysqli_num_rows($sqlCart);
                        $totalCart = 0;
                        $totalPriceOriginal = 0;
                        if ($count>0) {
                            while ($rowCart = mysqli_fetch_array($sqlCart)) {
                                $sqlProducts = mysqli_query($db, "SELECT * FROM products WHERE id = '".$rowCart['pid']."'");
                                $rowProducts = mysqli_fetch_array($sqlProducts);
                                $totalCart = $totalCart + $rowCart['totalPrice'];
                                $qtyPri = $rowProducts['price'] * $rowCart['qty'];
                                $totalPriceOriginal = $totalPriceOriginal + $qtyPri;
                        ?>
                            <tr>
                                <td class="text-center">
                                    <a href="product_detail_page.php?view=<?php echo $rowProducts['id']; ?>">
                                        <img src="admin/images/<?php echo $rowProducts['img']; ?>" style="width: 70px;">
                                    </a>
                                </td>
                                <td class="text-left" style="vertical-align: middle">
                                    <a href="product_detail_page.php?view=<?php echo $rowProducts['id']; ?>"><?php echo $rowProducts['name']; ?></a>
                                </td>
                                <td class="text-left" style="vertical-align: middle">
                                    product <?php echo $rowProducts['id']; ?>
                                </td>
                                <td class="text-left" style="vertical-align: middle">
                                    <?php echo $rowCart['qty']; ?>
                                </td>
                                <td class="text-right" style="vertical-align: middle">$<?php echo $rowCart['price']; ?></td>
                                <td class="text-right" style="vertical-align: middle">$<?php echo $rowCart['totalPrice']; ?></td>
                            </tr>
                        <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td class="text-right"><strong>Total:</strong></td>
                                <td class="text-right">$<?php echo $totalPriceOriginal; ?></td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Discount:</strong></td>
                                <td class="text-right">$<?php
                                    $discount = $totalPriceOriginal - $totalCart;
                                    echo $discount; ?></td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Sub Total:</strong></td>
                                <td class="text-right">$<?php echo $totalCart; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <form action="index.php" method="post" enctype="multipart/form-data">
                            <input class="btn pull-left" type="submit" value="Continue Shopping" />
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default  ">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"> 
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                    Pay with a Credit/Debit Card
                                                    <small>VISA, MC, AMEX, JCB, DISCOVER</small>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <span class="payment-errors"></span>
                                                    <?php

                                                    $sqlGetCus = mysqli_query($db, "SELECT * FROM customers WHERE email = '".$_SESSION['email']."'");
                                                    $rowGetCus = mysqli_fetch_array($sqlGetCus);
                                                    ?>
                                                    <!-- stripe payment form -->
                                                    <form action="" method="POST" id="paymentFrm">
                                                        <p>
                                                            <label>Card Number</label>
                                                            <input type="text" maxlength="20" class="form-control" name="card_num" size="20" 
                                                                   class="card-number" value="<?php echo $rowGetCus['cardnumber']; ?>" required/>
                                                        </p>
                                                        <p>
                                                            <label>CVC</label>
                                                            <input type="text" name="cvc" value="<?php echo $rowGetCus['securitycode']; ?>" class="form-control" size="4" maxlength="4" class="card-cvc" required/>
                                                        </p>
                                                        <p>
                                                            <label>Expiration (MM/YYYY)</label>
                                                            <div class="row">
                                                                <div class="col-sm-5">
                                                                    <input type="text" name="exp_month" value="<?php echo $rowGetCus['vmounth']; ?>" class="form-control" size="2" maxlength="2" class="card-expiry-month" required/>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <span> / </span>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <input type="text" name="exp_year" value="<?php echo $rowGetCus['vyear']; ?>" class="form-control" maxlength="4" size="4" class="card-expiry-year" required/>
                                                                </div>
                                                            </div>
                                                        </p>
                                                    <div class="col-sm-12">
                                                        <label style="font-weight: bold;">
                                                            Billing Address
                                                        </label>

                                                        <?php
                                                        echo "<br>";
                                                        echo $rowGetCus['name'];
                                                        echo "<br>";
                                                        echo $rowGetCus['address'];
                                                        echo "<br>";
                                                        echo $rowGetCus['country'];
                                                        ?>
                                                        <br>
                                                        <button type="submit" class="btn" name="submit" id="payBtn">Place Order</button>
                                                    </div>
                                                    </form>
                                                    <?php
                                                    if (isset($_POST['submit'])) {
                                                        $card_num = mysqli_real_escape_string($db, $_POST['card_num']);
                                                        $cvc = mysqli_real_escape_string($db, $_POST['cvc']);
                                                        $exp_month = mysqli_real_escape_string($db, $_POST['exp_month']);
                                                        $exp_year = mysqli_real_escape_string($db, $_POST['exp_year']);

                                                        $sqlCustomerOrderId = mysqli_query($db, "SELECT orderid FROM orders_customers");
                                                        $max = 0;
                                                        while ($rowCOI = mysqli_fetch_array($sqlCustomerOrderId))
                                                        {
                                                            if ($rowCOI['orderid'] > $max)
                                                            {
                                                                $max = $rowCOI['orderid'];
                                                            }
                                                        }
                                                        $max++;

                                                        $sqlCustomerUp = mysqli_query($db, "UPDATE `customers` SET `cardnumber`='$card_num',`vmounth`='$exp_month',`vyear`='$exp_year',`securitycode`='$cvc' WHERE email = '".$_SESSION['email']."'");
                                                        if ($sqlCustomerUp)
                                                        {

                                                            $insert_c = mysqli_query($db, "INSERT INTO `orders_customers`(`orderid`, `email`, `discountprice`, `totalPrice`, `pricereceived`, `paymenttype`, `status`) 
                                                                                                                        VALUES ('$max', '".$_SESSION['email']."', '$discount', '$totalPriceOriginal', '$totalCart', 'Card', 'Pending')");
                                                            if ($insert_c)
                                                            {
                                                                $insert_a = mysqli_query($db, "INSERT INTO `orders_admins`(`orderid`, `email`, `discountprice`, `totalPrice`, `pricereceived`, `paymenttype`, `status`) 
                                                                                                                        VALUES ('$max', '".$_SESSION['email']."', '$discount', '$totalPriceOriginal', '$totalCart', 'Card', 'Pending')");
                                                                $sqlCartS = mysqli_query($db, "SELECT * FROM cart WHERE ip = '$ip'");
                                                                while ($rowCartS = mysqli_fetch_array($sqlCartS))
                                                                {
                                                                    $sqlInsert = mysqli_query($db, "INSERT INTO `orderitems`(`pid`, `qty`, `color`, `size`, `price`, `totalPrice`, `orderid`) 
                                                                                                                        VALUES ('".$rowCartS['pid']."','".$rowCartS['qty']."','".$rowCartS['color']."','".$rowCartS['size']."','".$rowCartS['price']."','".$rowCartS['totalPrice']."','$max')");
                                                                }
                                                                $sqlDel = mysqli_query($db, "DELETE FROM cart WHERE ip = '$ip'");
                                                                if ($sqlDel)
                                                                {
                                                                    echo "<script>window.open('payment/index.php?orderid=".$max."', '_self')</script>";
                                                                }
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<!-- 
                                    <div class="panel panel-default ">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Paypal Payment</a> </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <input class="btn pull-right mt_30" type="submit" value="Place Order" />
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =====  CONTAINER END  ===== -->

<?php
include "inc/footer.php";
?>

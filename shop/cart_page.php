<?php
@ob_start();
@session_start();
include "db/db.php";
include "inc/top.php";

if (isset($_SESSION['email'])) {
    if ($countCart==0) {
        header("location:userAccount.php");
    }
}
if ($countCart==0) {
    header("location:category_page.php");
}
if (isset($_GET['del']))
{
    $sqlDel = mysqli_query($db, "DELETE FROM cart WHERE id = '".$_GET['del']."'");
    if ($sqlDel)
    {
        header("location:cart_page.php");
    }
}

?>
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
                        <li><a href="index.php">Home</a></li>
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
                            if ($count>0) {
                                while ($rowCart = mysqli_fetch_array($sqlCart)) {
                                    $sqlProducts = mysqli_query($db, "SELECT * FROM products WHERE id = '".$rowCart['pid']."'");
                                    $rowProducts = mysqli_fetch_array($sqlProducts);
                                    $totalCart = $totalCart + $rowCart['totalPrice'];
                            ?>

                            <form enctype="multipart/form-data" method="post" action="">
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
                                        <div style="max-width: 200px;" class="input-group btn-block">
                                            <input type="number" class="form-control quantity" min="1" value="<?php echo $rowCart['qty']; ?>" name="quantity<?php echo $rowCart['id']; ?>">
                                            <span class="input-group-btn">
                                                <button class="btn" type="submit" name="update<?php echo $rowCart['id']; ?>">
                                                    <i class="fa fa-refresh"></i>
                                                </button>
                                                <a  class="btn btn-danger" href="cart_page.php?del=<?php echo $rowCart['id']; ?>">
                                                    <i class="fa fa-times-circle"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="text-right" style="vertical-align: middle">$<?php echo $rowCart['price']; ?></td>
                                    <td class="text-right" style="vertical-align: middle">$<?php echo $rowCart['totalPrice']; ?></td>
                                </tr>
                            </form>
                            <?php
                                    $cartId = "update".$rowCart['id'];
                                    if (isset($_POST["$cartId"]))
                                    {
                                        $qtyValue = "quantity".$rowCart['id'];
                                        $qty = mysqli_real_escape_string($db, $_POST["$qtyValue"]);
                                        $pid = $rowProducts['id'];
                                        $totalC = $rowCart['price'];
                                        $totalPricrC = $totalC*$qty;
                                        $sqlUpdate = mysqli_query($db, "UPDATE cart SET totalPrice = '$totalPricrC', qty = '$qty' WHERE pid = '$pid' AND ip = '$ip'");
                                        if ($sqlUpdate)
                                        {
                                            header("location:cart_page.php");
                                        }
                                    }
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
                                <td class="text-right"><strong>Sub-Total:</strong></td>
                                <td class="text-right">$<?php echo $totalCart; ?></td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>GST (18%):</strong></td>
                                <td class="text-right">
                                    $
                                    <?php
                                        $totalTax = $totalCart/100;
                                        $totalTax = $totalTax*18;
                                        echo $totalTax;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Total:</strong></td>
                                <td class="text-right">
                                    $<?php
                                        $subTotal = $totalTax + $totalCart;
                                        echo $subTotal;
                                    ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input class="btn pull-left mt_30" type="submit" value="Continue Shopping" />
                </form>
                <form action="checkout_page.php" enctype="multipart/form-data" method="post">
                    <input class="btn pull-right mt_30" type="submit" value="Checkout" />
                </form>
            </div>
        </div>
    </div>
    <!-- =====  CONTAINER END  ===== -->

<?php
include "inc/footer.php";
?>
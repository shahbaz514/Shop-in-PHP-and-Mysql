<?php
@ob_start();
@session_start();
include "db/db.php";
include "inc/top.php";
if (!isset($_SESSION['email']))
{
    header("location:login.php");
}
if (isset($_GET['add']))
{
    $sqlSelectWish = mysqli_query($db, "SELECT * FROM wishlist WHERE email = '".$_SESSION['email']."' AND pid = '".$_GET['add']."'");
    $countWish = mysqli_num_rows($sqlSelectWish);
    if ($countWish>0)
    {
        header("location:wishlist.php");
    }
    else
    {
        $sqlInsert = mysqli_query($db, "INSERT INTO `wishlist`(`email`, `pid`) VALUES ('".$_SESSION['email']."', '".$_GET['add']."')");
        if ($sqlInsert)
        {
            header("location:wishlist.php");
        }
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
                    <h1>Wishlist</h1>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Wishlist</li>
                    </ul>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td class="text-center">Image</td>
                            <td class="text-center">Product Name</td>
                            <td class="text-center">Availability</td>
                            <td class="text-center">Unit Price</td>
                            <td class="text-center">Sale</td>
                            <td class="text-center">Add To Cart</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sqlSelectWish = mysqli_query($db, "SELECT * FROM wishlist WHERE email = '".$_SESSION['email']."' ");
                            while ($rowSelectWish = mysqli_fetch_array($sqlSelectWish)){
                                $sqlP = mysqli_query($db, "SELECT * FROM products WHERE id = '".$rowSelectWish['pid']."'");
                                $rowP = mysqli_fetch_array($sqlP);
                        ?>
                            <tr>
                                <td class="text-center">
                                    <a href="product_detail_page.php?view=<?php echo $rowP['id']; ?>">
                                        <img src="admin/images/<?php echo $rowP['img']; ?>" style="width: 70px;">
                                    </a>
                                </td>
                                <td style="vertical-align: middle!important;" class="text-center">
                                    <a href="product_detail_page.php?view=<?php echo $rowP['id']; ?>">
                                        <?php echo $rowP['name']; ?>
                                    </a>
                                </td>
                                <td style="vertical-align: middle!important;" class="text-center">
                                    <?php
                                    if ($rowP['qty']>0)
                                    {
                                        echo "In Stock";
                                    }
                                    else
                                    {
                                        echo "Out of Stock";
                                    }
                                    ?>
                                </td>
                                <td style="vertical-align: middle!important;" class="text-center">$<?php echo $rowP['price']; ?></td>
                                <td style="vertical-align: middle!important;" class="text-center"><?php echo $rowP['discount']; ?>%</td>
                                <td style="vertical-align: middle!important;" class="text-center">
                                    <a  class="btn btn-danger">
                                        <i class="fa fa-cut"></i>
                                    </a>
                                    <a  class="btn btn-danger" href="product_detail_page.php?view=<?php echo $rowP['id']; ?>">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <form action="index.php">
                    <input class="btn pull-left mt_30" type="submit" value="Continue Shopping" />
                </form>
                <form action="cart_page.php">
                    <input class="btn pull-right mt_30" type="submit" value="Go To Cart" />
                </form>
            </div>
        </div>
    </div>
    <!-- =====  CONTAINER END  ===== -->

<?php
include "inc/footer.php";
?>
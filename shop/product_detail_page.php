<?php
@ob_start();
@session_start();
include "db/db.php";
include "inc/top.php";
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
                <?php
                $sqlPro = mysqli_query($db, "SELECT * FROM products WHERE id = '".$_GET['view']."'");
                $rowPro = mysqli_fetch_array($sqlPro);
                $sqlReviews = mysqli_query($db, "SELECT * FROM reviews WHERE pid = '".$_GET['view']."' ORDER BY id DESC");
                $reviews_count = mysqli_num_rows($sqlReviews);
                $views = 0;
                $views = $rowPro['views'] + 1;
                $upSql = mysqli_query($db, "UPDATE products SET views = '$views' WHERE id = '".$_GET['view']."'")
                ?>
                <!-- =====  BANNER STRAT  ===== -->
                <div class="breadcrumb ptb_20">
                    <h1>
                        <?php
                        echo substr($rowPro['name'], 0, 15);
                        ?>...
                    </h1>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="category_page.php">Products</a></li>
                        <li class="active">
                            <?php
                            echo substr($rowPro['name'], 0, 15);
                            ?>...
                        </li>
                    </ul>
                </div>
                <!-- =====  BREADCRUMB END===== -->
                <div class="row mt_10 ">
                    <div class="col-md-6">
                        <div>
                            <a class="thumbnails">
                                <img data-name="product_image" src="admin/images/<?php echo $rowPro['img']; ?>" alt="" />
                            </a>
                        </div>
                        <div id="product-thumbnail" class="owl-carousel">
                            <div class="item">
                                <div class="image-additional">
                                    <a class="thumbnail" href="admin/images/<?php echo $rowPro['img']; ?>" data-fancybox="group1">
                                        <img src="admin/images/<?php echo $rowPro['img']; ?>" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="image-additional">
                                    <a class="thumbnail" href="admin/images/<?php echo $rowPro['img1']; ?>" data-fancybox="group1">
                                        <img src="admin/images/<?php echo $rowPro['img1']; ?>" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="image-additional">
                                    <a class="thumbnail" href="admin/images/<?php echo $rowPro['img2']; ?>" data-fancybox="group1">
                                        <img src="admin/images/<?php echo $rowPro['img2']; ?>" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 prodetail caption product-thumb">
                        <h4 data-name="product_name" class="product-name">
                            <a>
                                <?php
                                echo $rowPro['name'];
                                ?>
                            </a>
                        </h4>
                        <span class="price mb_20">
                            <span class="amount">
                                <span class="currencySymbol">$</span>
                                <?php
                                $total = 0;
                                $total = $rowPro['price'] / 100;
                                $total = $total * $rowPro['discount'];
                                $total = $rowPro['price'] - $total;
                                echo $total;

                                ?>
                            </span>
                        </span>
                        <hr>
                        <ul class="list-unstyled product_info mtb_20">
                            <li>
                                <label>Brand:</label>
                                <?php
                                $sqlBrand = mysqli_query($db, "SELECT * FROM `brands` WHERE id = '".$rowPro['brand']."'");
                                $rowBrand = mysqli_fetch_array($sqlBrand);

                                ?>
                                <span>
                                    <a href="">
                                        <?php
                                        echo $rowBrand['name'];
                                        ?>
                                    </a>
                                </span>
                            </li>
                            <li>
                                <label>Product Code:</label>
                                <span> product <?php echo $_GET['view']; ?></span></li>
                            <li>
                                <label>Availability:</label>
                                <span>
                                    <?php
                                    if ($rowPro['qty']>0)
                                    {
                                        echo "In Stock";
                                    }
                                    else
                                    {
                                        echo "Out of Stock";
                                    }
                                    ?>
                                </span>
                            </li>
                        </ul>
                        <hr>
                        <p class="product-desc mtb_30" style="text-align: justify">
                            <?php
                            echo $rowPro['description'];
                            ?>
                        </p>
                        <div id="product">
                            <form action="" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="Sort-by col-md-6">
                                            <label>Sort by</label>
                                            <select name="product_size" id="select-by-size" class="selectpicker form-control">
                                                <option>Small</option>
                                                <option>Medium</option>
                                                <option>Large</option>
                                            </select>
                                        </div>
                                        <div class="Color col-md-6">
                                            <label>Color</label>
                                            <select name="product_color" id="select-by-color" class="selectpicker form-control">
                                                <option>Blue</option>
                                                <option>Green</option>
                                                <option>Orange</option>
                                                <option>White</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="qty mt_30 form-group2">
                                    <label>Qty</label>
                                    <input name="product_quantity" min="1" value="1" type="number">
                                    <button type="submit" class="btn btn-warning" name="addToCart">
                                        <i class="fa fa-shopping-cart"></i> &nbsp; &nbsp; Add To Cart
                                    </button>
                                    <a href="wishlist.php?add=<?php echo $rowPro['id']; ?>" style="width: 60px;" class="btn btn-warning">
                                        <i class="fa fa-heart"></i> &nbsp; &nbsp;
                                    </a>
                                </div>
                            </form>


                            <?php
                            if (isset($_POST['addToCart']))
                            {
                                $qty = mysqli_real_escape_string($db, $_POST['product_quantity']);
                                $color = mysqli_real_escape_string($db, $_POST['product_color']);
                                $size = mysqli_real_escape_string($db, $_POST['product_size']);
                                $ip = getIPAddress();
                                $totalPrice = 0;
                                $totalPrice = $total * $qty;
                                $sqlSelect = mysqli_query($db, "SELECT * FROM cart WHERE pid = '".$_GET['view']."' AND ip = '$ip'");
                                $countSelect = mysqli_num_rows($sqlSelect);
                                if ($countSelect>0)
                                {
                                    $sqlInsert = mysqli_query($db,"UPDATE cart SET qty = '$qty', color = '$color', size = '$size', totalPrice = '$totalPrice'  WHERE pid = '".$_GET['view']."' AND ip = '$ip'");
                                    if ($sqlInsert)
                                    {
                                        ?>
                                        <div class="alert alert-info alert-dismissible fade in" style="margin-top: 20px;">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            Product is Successfully Updated in the Cart!
                                        </div>
                                        <?php
                                    }
                                }
                                else
                                {
                                    $sqlInsert = mysqli_query($db,"INSERT INTO `cart`(`pid`, `qty`, `color`, `size`, `price`, `totalPrice`, `ip`) 
                                                                            VALUES ('".$_GET['view']."', '$qty', '$color', '$size', '$total', '$totalPrice', '$ip')");
                                    if ($sqlInsert)
                                    {
                                        ?>
                                        <div class="alert alert-info alert-dismissible fade in" style="margin-top: 20px;">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            Product is Successfully Add to Cart!
                                        </div>

                                        <?php
                                        echo "<script>window.open('product_detail_page.php?view=".$_GET['view']."','_self')</script>";
                                    }
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="exTab5" class="mtb_30">
                            <ul class="nav nav-tabs">
                                <li class="active"> <a href="#1c" data-toggle="tab">Overview</a> </li>
                                <li><a href="#2c" data-toggle="tab">Reviews (
                                        <?php
                                            echo $reviews_count;
                                        ?>
                                        )</a> </li>
                                <li><a href="#3c" data-toggle="tab">Solution</a> </li>
                            </ul>
                            <div class="tab-content mt_20">
                                <div class="tab-pane active" id="1c">
                                    <p>
                                        <?php
                                        echo $rowPro['description'];
                                        ?>
                                    </p>
                                </div>
                                <div class="tab-pane" id="2c">
                                    <div class="row">
                                        <?php
                                        while ($rowReviews = mysqli_fetch_array($sqlReviews)){
                                            $sqlCustomers = mysqli_query($db, "SELECT * FROM customers WHERE email = '".$rowReviews['c_email']."'");
                                            $rowCustomers = mysqli_fetch_array($sqlCustomers);
                                            ?>
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <?php
                                                    if ($rowCustomers['img'] == null)
                                                    {
                                                        echo '
                                                            <img class="img-circle img-responsive img-rounded img-thumbnail" src="admin/images/user.jpg">
                                                        ';
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <img class="img-circle img-responsive img-rounded img-thumbnail" src="images/<?php echo $rowCustomers['img']; ?>">
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-sm-11" style="vertical-align: middle!important;">
                                                    <h4>
                                                        <?php
                                                        echo $rowCustomers['name'];
                                                        ?>
                                                    </h4>
                                                    <div class="rating">
                                                        <?php
                                                        if ($rowReviews['rating_value'] == 1)
                                                        {
                                                            echo '
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                                        ';
                                                        }
                                                        if ($rowReviews['rating_value'] == 2)
                                                        {
                                                            echo '
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                                        ';
                                                        }
                                                        if ($rowReviews['rating_value'] == 3)
                                                        {
                                                            echo '
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                                        ';
                                                        }
                                                        if ($rowReviews['rating_value'] == 4)
                                                        {
                                                            echo '
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                                        ';
                                                        }
                                                        if ($rowReviews['rating_value'] == 5)
                                                        {
                                                            echo '
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                        ';
                                                        }
                                                        ?>
                                                        <p style="display: inline">
                                                            <?php
                                                            echo $rowReviews['date'];
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <p>
                                                        <?php
                                                        echo $rowReviews['description'];
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="tab-pane" id="3c">
                                    <p>
                                        <?php
                                            echo $rowPro['description'];
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading-part text-center">
                            <h2 class="main_title mt_50">Related Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product-layout  product-grid related-pro  owl-carousel mb_50">
<?php
$sqlLeftPro = mysqli_query($db, "SELECT * FROM products WHERE category = '".$rowPro['category']."' ORDER BY id DESC LIMIT 0, 8");
while ($rowLeftPro = mysqli_fetch_array($sqlLeftPro))
{
    ?>
                        <div class="item">
                            <div class="product-thumb">
                                <div class="image product-imageblock">
                                    <a href="product_detail_page.php?view=<?php echo $rowLeftPro['id']; ?>">
                                        <img class="img-responsive" title="<?php echo $rowLeftPro['name']; ?>" alt="<?php echo $rowLeftPro['name']; ?>" src="admin/images/<?php echo $rowLeftPro['img']; ?>">
                                        <img class="img-responsive" title="<?php echo $rowLeftPro['name']; ?>" alt="<?php echo $rowLeftPro['name']; ?>" src="admin/images/<?php echo $rowLeftPro['img1']; ?>">
                                    </a>
                                </div>
                                <div class="caption product-detail text-left">
                                    <h6 data-name="product_name" class="product-name mt_20">
                                        <a href="product_detail_page.php?view=<?php echo $rowLeftPro['id']; ?>">
                                            <?php echo $rowLeftPro['name']; ?>
                                        </a>
                                    </h6>
                                    <span class="price">
                                        <span class="amount">
                                            <span class="currencySymbol">$</span>
                                            <?php
                                            $total = 0;
                                            $total = $rowLeftPro['price']/100;
                                            $total = $total * $rowLeftPro['discount'];
                                            $total = $rowLeftPro['price'] - $total;
                                            echo $total;
                                            ?>
                                        </span>
                                    </span>
                                    <div class="button-group text-center">
                                        <div class="wishlist"><a href="wishlist.php?add=<?php echo $rowLeftPro['id']; ?>"><span>wishlist</span></a></div>
                                        <div class="quickview"><a href="product_detail_page.php?view=<?php echo $rowLeftPro['id']; ?>"><span>Quick View</span></a></div>
                                        <div class="add-to-cart"><a href="product_detail_page.php?view=<?php echo $rowLeftPro['id']; ?>"><span>Add to cart</span></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php
}
?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =====  CONTAINER END  ===== -->

<?php
include "inc/footer.php";
?>
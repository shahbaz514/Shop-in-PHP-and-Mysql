<?php
@ob_start();
@session_start();
include "db/db.php";
include "inc/top.php";
?>
<!-- =====  CONTAINER START  ===== -->
<div class="container">
    <div class="row ">
        <div id="column-right" class="col-sm-12 mtb_30">

            <!-- =====  SUB BANNER  STRAT ===== -->
            <div class="row">
                <div class="cms_banner">
                    <div class="col-xs-12">
                        <a href="">
                            <img src="images/header.gif" />
                        </a>
                    </div>
                </div>
            </div>
            <!-- =====  SUB BANNER END  ===== -->

            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="">
                            <img style="max-height: 550px; width: 100%;" src="https://is4.revolveassets.com/images/up/2021/March/040121_f_na_bg_2x.jpg" class="img-responsive">
                        </a>
                        <center>
                            <a class="btn btn-warning btn514">
                                Shop Now
                            </a>
                        </center>
                    </div>
                    <div class="col-sm-6">
                        <a href="">
                            <img style="max-height: 550px; width: 100%;" src="https://is4.revolveassets.com/images/up/2021/April/040721_f_dresscode_02.jpg" class="img-responsive">
                        </a>
                        <center>
                            <a class="btn btn-warning btn514">
                                Shop Now
                            </a>
                        </center>
                    </div>
                </div>
            </div>

            <div class="container">
                <center>
                    <a href="" class="link514" style="display: block">
                        <h2>FEATURED SHOPS</h2>
                    </a>
                    <p style="text-decoration: none;">
                        Our one-stop destination for every style, trend, occasion you’re shopping for + more | <a href="" class="link514" style="display: inline;"> SHOP NOW </a>
                    </p>
                </center>
                <div class="row">
                    <div class="product-layout  product-grid related-pro  owl-carousel mb_50">
<?php
$sqlLeftPro = mysqli_query($db, "SELECT * FROM products ORDER BY views DESC LIMIT 0, 8");
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
                                            <span style="text-decoration: line-through; color: lightgrey;">
                                                <span class="currencySymbol">
                                                $
                                            </span>
                                                <?php echo $rowLeftPro['price']; ?>
                                            </span>
                                            <span class="currencySymbol">
                                                $
                                            </span>
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

            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <a class="link514" href="">
                            <h2>Pretty Perfect</h2>
                        </a>
                        <a href="">
                            <img style="max-height: 550px; width: 100%;" src="https://is4.revolveassets.com/images/up/2021/April/040621_f_aprilsitlist_spotlight.jpg" class="img-responsive">
                        </a>
                        <center>
                            <a class="btn btn-warning btn514">
                                Shop Now
                            </a>
                        </center>
                    </div>
                    <div class="col-sm-6">
                        <a class="link514" href="">
                            <h2>Pretty Perfect</h2>
                        </a>
                        <a href="">
                            <img style="max-height: 550px; width: 100%;" src="https://is4.revolveassets.com/images/up/2021/April/040321_f_prettyperfect_spotlight.jpg" class="img-responsive">
                        </a>
                        <center>
                            <a class="btn btn-warning btn514">
                                Shop Now
                            </a>
                        </center>
                    </div>
                    <div class="col-sm-6">
                        <a class="link514" href="">
                            <h2>Pretty Perfect</h2>
                        </a>
                        <a href="">
                            <img style="max-height: 550px; width: 100%;" src="https://is4.revolveassets.com/images/up/2021/April/040421_f_backinstock_spotlight.jpg" class="img-responsive">
                        </a>
                        <center>
                            <a class="btn btn-warning btn514">
                                Shop Now
                            </a>
                        </center>
                    </div>
                    <div class="col-sm-6">
                        <a class="link514" href="">
                            <h2>Pretty Perfect</h2>
                        </a>
                        <a href="">
                            <img style="max-height: 550px; width: 100%;" src="https://is4.revolveassets.com/images/up/2021/April/040721_f_midweekmusthave_spotlight.jpg" class="img-responsive">
                        </a>
                        <center>
                            <a class="btn btn-warning btn514">
                                Shop Now
                            </a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <a href="">
                    <img style="max-height: 550px; width: 100%;" src="https://is4.revolveassets.com/images/up/2021/March/032121_f_sale_banner.jpg" class="img-responsive">
                </a>
                <center>
                    <a class="btn btn-warning btn514">
                        Shop The Sale
                    </a>
                </center>
            </div>
            <a href="">
                <div class="container">
                    <img src="https://is4.revolveassets.com/images/up/2020/December/121620_FWxPromo_RWhpbanner_1960x680.jpg" class="img-responsive">
                </div>
            </a>

            <!-- =====  PRODUCT TAB  ===== -->
            <div id="product-tab" class="mt_40">
                <div class="heading-part mb_20 ">
                    <h2 class="main_title">Top Products</h2>
                </div>
                <ul class="nav text-right">
                    <li class="active"> <a href="#nArrivals" data-toggle="tab">New Arrivals</a> </li>
                    <li><a href="#Bestsellers" data-toggle="tab">Bestsellers</a> </li>
                    <li><a href="#Featured" data-toggle="tab">Featured</a> </li>
                </ul>
                <div class="tab-content clearfix box">
                    <div class="tab-pane active" id="nArrivals">
                        <div class="nArrivals owl-carousel">
                            <?php
                            $sqlLeftPro = mysqli_query($db, "SELECT * FROM products ORDER BY id DESC LIMIT 0, 8");
                            while ($rowLeftPro = mysqli_fetch_array($sqlLeftPro))
                            {
                                ?>
                                <div class="product-grid">
                                    <div class="item">
                                        <div class="product-thumb">
                                            <div class="image product-imageblock">
                                                <a href="product_detail_page.php?view=<?php echo $rowLeftPro['id']; ?>">
                                                    <img data-name="product_image" src="admin/images/<?php echo $rowLeftPro['img']; ?>" alt="<?php echo $rowLeftPro['name']; ?>" title="<?php echo $rowLeftPro['name']; ?>" class="img-responsive">
                                                    <img src="admin/images/<?php echo $rowLeftPro['img1']; ?>" alt="<?php echo $rowLeftPro['name']; ?>" title="<?php echo $rowLeftPro['name']; ?>" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="caption product-detail text-left">
                                                <h6 data-name="product_name" class="product-name mt_20">
                                                    <a href="product_detail_page.php?view=<?php echo $rowLeftPro['id']; ?>" title="<?php echo $rowLeftPro['name']; ?>">
                                                        <?php echo $rowLeftPro['name']; ?>
                                                    </a>
                                                </h6>

                                                <span class="price">
                                                <span class="amount">
                                                    <span class="currencySymbol">
                                                        $
                                                    </span>
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
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="Bestsellers">
                        <div class="Bestsellers owl-carousel">

                            <?php
                            $sqlLeftPro = mysqli_query($db, "SELECT * FROM products ORDER BY views DESC LIMIT 0, 8");
                            while ($rowLeftPro = mysqli_fetch_array($sqlLeftPro))
                            {
                                ?>
                                <div class="product-grid">
                                    <div class="item">
                                        <div class="product-thumb">
                                            <div class="image product-imageblock">
                                                <a href="product_detail_page.php?view=<?php echo $rowLeftPro['id']; ?>">
                                                    <img data-name="product_image" src="admin/images/<?php echo $rowLeftPro['img']; ?>" alt="<?php echo $rowLeftPro['name']; ?>" title="<?php echo $rowLeftPro['name']; ?>" class="img-responsive">
                                                    <img src="admin/images/<?php echo $rowLeftPro['img1']; ?>" alt="<?php echo $rowLeftPro['name']; ?>" title="<?php echo $rowLeftPro['name']; ?>" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="caption product-detail text-left">
                                                <h6 data-name="product_name" class="product-name mt_20">
                                                    <a href="product_detail_page.php?view=<?php echo $rowLeftPro['id']; ?>" title="<?php echo $rowLeftPro['name']; ?>">
                                                        <?php echo $rowLeftPro['name']; ?>
                                                    </a>
                                                </h6>

                                                <span class="price">
                                                <span class="amount">
                                                    <span class="currencySymbol">
                                                        $
                                                    </span>
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
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                    <div class="tab-pane" id="Featured">
                        <div class="Featured owl-carousel">
                            <?php
                            $sqlLeftPro = mysqli_query($db, "SELECT * FROM products ORDER BY id ASC LIMIT 0, 8");
                            while ($rowLeftPro = mysqli_fetch_array($sqlLeftPro))
                            {
                                ?>
                                <div class="product-grid">
                                    <div class="item">
                                        <div class="product-thumb">
                                            <div class="image product-imageblock">
                                                <a href="product_detail_page.php?view=<?php echo $rowLeftPro['id']; ?>">
                                                    <img data-name="product_image" src="admin/images/<?php echo $rowLeftPro['img']; ?>" alt="<?php echo $rowLeftPro['name']; ?>" title="<?php echo $rowLeftPro['name']; ?>" class="img-responsive">
                                                    <img src="admin/images/<?php echo $rowLeftPro['img1']; ?>" alt="<?php echo $rowLeftPro['name']; ?>" title="<?php echo $rowLeftPro['name']; ?>" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="caption product-detail text-left">
                                                <h6 data-name="product_name" class="product-name mt_20">
                                                    <a href="product_detail_page.php?view=<?php echo $rowLeftPro['id']; ?>" title="<?php echo $rowLeftPro['name']; ?>">
                                                        <?php echo $rowLeftPro['name']; ?>
                                                    </a>
                                                </h6>

                                                <span class="price">
                                                <span class="amount">
                                                    <span class="currencySymbol">
                                                        $
                                                    </span>
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
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- =====  PRODUCT TAB  END ===== -->
            <!-- =====  Blog ===== -->
            <div id="Blog" class="mt_40" oncontextmenu="return false;">
                <div class="heading-part mb_20 ">
                    <h2 class="main_title">Latest from the Blog</h2>
                </div>
                <div class="blog-contain box">
                    <div class="blog owl-carousel ">

                        <?php
                        $sqlBlogsHome = mysqli_query($db, "SELECT * FROM `blogs`  ORDER BY id DESC LIMIT 0, 5");
                        while ($rowBlogsHome = mysqli_fetch_array($sqlBlogsHome))
                        {
                        ?>
                        <div class="item">
                            <div class="box-holder">
                                <div class="thumb post-img">
                                    <center>
                                        <video style="height: 300px; margin: 10px; padding: 10px;" src="admin/videos/<?php echo $rowBlogsHome['video']; ?>"></video>
                                    </center>
                                </div>
                                <div class="post-info mtb_20 ">
                                    <h6 class="mb_10 text-uppercase">
                                        <a href="single_blog.php?view=<?php echo $rowBlogsHome['id']; ?>">
                                            <?php echo $rowBlogsHome['name']; ?>
                                        </a>
                                    </h6>
                                    <p>
                                        <?php echo substr($rowBlogsHome['description'], 0, 200); ?>
                                    </p>
                                    <div class="date-time">
                                        <div class="day">
                                            <?php
                                                $month = date('jS');
                                                $day = date('F');
                                                echo $day;
                                            ?>
                                        </div>
                                        <div class="month">
                                            <?php
                                            echo $month;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- =====  Blog end ===== -->
            </div>
        </div>
    </div>
</div>
<!-- =====  CONTAINER END  ===== -->

<?php
include "inc/footer.php";
?>
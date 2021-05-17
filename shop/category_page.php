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
                include "inc/left_sidebar_category_page.php";
                ?>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-9 mtb_30">
                <div class="breadcrumb ptb_20">
                    <h1>Products</h1>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Products</li>
                    </ul>
                </div>
                <!-- =====  BANNER STRAT  ===== --><!-- 
                <div class="row category-page-wrapper mb_30">
                    <div class="product-layout product-grid related-pro  owl-carousel mb_50">
                        <?php
                        /*$sqlCat = mysqli_query($db, "SELECT * FROM `category` LIMIT 0, 12");
                        while ($rowCat = mysqli_fetch_array($sqlCat))
                        {*/
                            ?>
                            <div class="item">
                                <div class="product-thumb">
                                    <div class="media highlight">
                                        <a href="category_page.php?cat=<?php //echo $rowCat['id']; ?>">
                                            <div class="container514">
                                                <img src="admin/images/<?php //echo $rowCat['img']?>" alt="Snow" style="width:100%; height: 150px;">
                                                <img src="admin/images/<?php //echo $rowCat['img']?>" alt="Snow" style="width:100%; height: 150px;">
                                                <p class="link514 centered" >
                                                    <?php //echo substr($rowCat['name'], 0 , 40); ?>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        //}
                        ?>
                    </div>
                </div> -->
                <!-- =====  BREADCRUMB END===== -->
                <div class="category-page-wrapper mb_30">
                    <div class="col-xs-6 sort-wrapper">
                        <form action="category_page.php" method="post" enctype="multipart/form-data">
                            <label class="control-label" for="input-sort">Sort By :</label>
                            <div class="sort-inner">
                                    <select id="input-sort" class="form-control" name="sortName">
                                        <option value="default" selected="selected">Default</option>
                                        <option value="nameASC">Name (A - Z)</option>
                                        <option value="nameDESC">Name (Z - A)</option>
                                        <option value="priceASC">Price (Low &gt; High)</option>
                                        <option value="priceDESC">Price (High &gt; Low)</option>
                                    </select>
                            </div>
                            <span>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </span>
                            <button type="submit" name="sortBy" class="btn btn-danger"><i class="fa fa-eye"></i></button>
                        </form>
                    </div>
                    <div class="col-xs-4 page-wrapper">
                    </div>
                    <div class="col-xs-2 text-right list-grid-wrapper">
                        <div class="btn-group btn-list-grid">
                            <button type="button" id="list-view" class="btn btn-default list-view"></button>
                            <button type="button" id="grid-view" class="btn btn-default grid-view active"></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    if (isset($_POST['searchPrice']))
                    {
                        $start = mysqli_real_escape_string($db, $_POST['starPrice']);
                        $end = mysqli_real_escape_string($db, $_POST['endPrice']);
                        $sqlPosts = mysqli_query($db, "SELECT * FROM `products` WHERE price BETWEEN $start AND $end");
                        $count = mysqli_num_rows($sqlPosts);
                        if ($count > 0) {
                            while ($rowPosts = mysqli_fetch_array($sqlPosts)) {
                                ?>

                                <div class="product-layout  product-grid  col-md-4 col-sm-6 col-xs-12 ">
                                    <div class="item">
                                        <div class="product-thumb clearfix mb_30">
                                            <div class="image product-imageblock">
                                                <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                    <img data-name="product_image" src="admin/images/<?php echo $rowPosts['img']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                                    <img src="admin/images/<?php echo $rowPosts['img1']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="caption product-detail text-left">
                                                <h6 data-name="product_name" class="product-name mt_20">
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>" title="<?php echo $rowPosts['name']; ?>">
                                                        <?php echo $rowPosts['name']; ?>
                                                    </a>
                                                </h6>
                                        <span class="price">
                                            <span class="amount">
                                                <span style="text-decoration: line-through; color: lightgrey;">
                                                    <span class="currencySymbol">
                                                    $
                                                </span>
                                                    <?php echo $rowPosts['price']; ?>
                                                </span>
                                                <span class="currencySymbol">
                                                    $
                                                </span>
                                                <?php
                                                $total = 0;
                                                $total = $rowPosts['price']/100;
                                                $total = $total * $rowPosts['discount'];
                                                $total = $rowPosts['price'] - $total;
                                                echo $total;
                                                ?>
                                            </span>
                                        </span>
                                                <p class="product-desc mt_20 mb_60">
                                                    <?php
                                                    echo substr($rowPosts['description'], 0, 200);
                                                    ?>
                                                </p>
                                                <div class="button-group text-center">
                                                    <a href="wishlist.php?add=<?php echo $rowPosts['id']; ?>">
                                                        <div class="wishlist">
                                                            <span>wishlist</span>
                                                        </div>
                                                    </a>
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <div class="quickview">
                                                            <span>Quick View</span>
                                                        </div>
                                                    </a>
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <div class="add-to-cart">
                                                            <span>Add to cart</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<h2>No Product Available</h2>";
                        }
                    }
                    else if (isset($_POST['sortBy']))
                    {
                        $sortName = mysqli_real_escape_string($db, $_POST['sortName']);
                        if ($sortName == 'default')
                        {
                            echo "<script>window.open('category_page.php','_self')</script>";
                        }
                        else if ($sortName == 'nameASC')
                        {

                            $sqlPosts = mysqli_query($db, "SELECT * FROM `products` ORDER BY name ASC");

                        }
                        else if ($sortName == 'nameDESC')
                        {

                            $sqlPosts = mysqli_query($db, "SELECT * FROM `products` ORDER BY name DESC");
                        }
                        else if ($sortName == 'priceASC')
                        {

                            $sqlPosts = mysqli_query($db, "SELECT * FROM `products` ORDER BY price ASC");
                        }
                        else if ($sortName == 'priceDESC')
                        {

                            $sqlPosts = mysqli_query($db, "SELECT * FROM `products` ORDER BY price DESC");
                        }
                        $count = mysqli_num_rows($sqlPosts);
                        if ($count > 0) {
                            while ($rowPosts = mysqli_fetch_array($sqlPosts)) {
                                ?>

                                <div class="product-layout  product-grid  col-md-4 col-sm-6 col-xs-12 ">
                                    <div class="item">
                                        <div class="product-thumb clearfix mb_30">
                                            <div class="image product-imageblock">
                                                <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                    <img data-name="product_image" src="admin/images/<?php echo $rowPosts['img']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                                    <img src="admin/images/<?php echo $rowPosts['img1']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="caption product-detail text-left">
                                                <h6 data-name="product_name" class="product-name mt_20">
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>" title="<?php echo $rowPosts['name']; ?>">
                                                        <?php echo $rowPosts['name']; ?>
                                                    </a>
                                                </h6>
                                        <span class="price">
                                            <span class="amount">
                                                <span style="text-decoration: line-through; color: lightgrey;">
                                                    <span class="currencySymbol">
                                                    $
                                                </span>
                                                    <?php echo $rowPosts['price']; ?>
                                                </span>
                                                <span class="currencySymbol">
                                                    $
                                                </span>
                                                <?php
                                                $total = 0;
                                                $total = $rowPosts['price']/100;
                                                $total = $total * $rowPosts['discount'];
                                                $total = $rowPosts['price'] - $total;
                                                echo $total;
                                                ?>
                                            </span>
                                        </span>
                                                <p class="product-desc mt_20 mb_60">
                                                    <?php
                                                    echo substr($rowPosts['description'], 0, 200);
                                                    ?>
                                                </p>
                                                <div class="button-group text-center">
                                                    <a href="wishlist.php?add=<?php echo $rowPosts['id']; ?>">
                                                        <div class="wishlist">
                                                            <span>wishlist</span>
                                                        </div>
                                                    </a>
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <div class="quickview">
                                                            <span>Quick View</span>
                                                        </div>
                                                    </a>
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <div class="add-to-cart">
                                                            <span>Add to cart</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<h2>No Product Available</h2>";
                        }
                    }
                    else if (isset($_POST['searchBtn']))
                    {
                        $searchTxt = mysqli_real_escape_string($db, $_POST['searchTxt']);
                        $sqlPosts = mysqli_query($db, "SELECT * FROM `products` WHERE name LIKE '%$searchTxt%' OR description LIKE '%$searchTxt%'");
                        $count = mysqli_num_rows($sqlPosts);
                        if ($count > 0) {
                            while ($rowPosts = mysqli_fetch_array($sqlPosts)) {
                                ?>

                                <div class="product-layout  product-grid  col-md-4 col-sm-6 col-xs-12 ">
                                    <div class="item">
                                        <div class="product-thumb clearfix mb_30">
                                            <div class="image product-imageblock">
                                                <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                    <img data-name="product_image" src="admin/images/<?php echo $rowPosts['img']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                                    <img src="admin/images/<?php echo $rowPosts['img1']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="caption product-detail text-left">
                                                <h6 data-name="product_name" class="product-name mt_20">
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>" title="<?php echo $rowPosts['name']; ?>">
                                                        <?php echo $rowPosts['name']; ?>
                                                    </a>
                                                </h6>
                                        <span class="price">
                                            <span class="amount">
                                                <span style="text-decoration: line-through; color: lightgrey;">
                                                    <span class="currencySymbol">
                                                    $
                                                </span>
                                                    <?php echo $rowPosts['price']; ?>
                                                </span>
                                                <span class="currencySymbol">
                                                    $
                                                </span>
                                                <?php
                                                $total = 0;
                                                $total = $rowPosts['price']/100;
                                                $total = $total * $rowPosts['discount'];
                                                $total = $rowPosts['price'] - $total;
                                                echo $total;
                                                ?>
                                            </span>
                                        </span>
                                                <p class="product-desc mt_20 mb_60">
                                                    <?php
                                                    echo substr($rowPosts['description'], 0, 200);
                                                    ?>
                                                </p>
                                                <div class="button-group text-center">
                                                    <a href="wishlist.php?add=<?php echo $rowPosts['id']; ?>">
                                                        <div class="wishlist">
                                                            <span>wishlist</span>
                                                        </div>
                                                    </a>
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <div class="quickview">
                                                            <span>Quick View</span>
                                                        </div>
                                                    </a>
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <div class="add-to-cart">
                                                            <span>Add to cart</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<h2>No Product Available</h2>";
                        }
                    }
                    else if (isset($_GET['shape']) && isset($_GET['cat']))
                    {
                        $sqlPosts = mysqli_query($db, "SELECT * FROM `products` WHERE category = '".$_GET['cat']."' AND shape = '".$_GET['shape']."'");
                        $count = mysqli_num_rows($sqlPosts);
                        if ($count > 0) {
                            while ($rowPosts = mysqli_fetch_array($sqlPosts)) {
                                ?>

                                <div class="product-layout  product-grid  col-md-4 col-sm-6 col-xs-12 ">
                                    <div class="item">
                                        <div class="product-thumb clearfix mb_30">
                                            <div class="image product-imageblock">
                                                <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                    <img data-name="product_image" src="admin/images/<?php echo $rowPosts['img']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                                    <img src="admin/images/<?php echo $rowPosts['img1']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="caption product-detail text-left">
                                                <h6 data-name="product_name" class="product-name mt_20">
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>" title="<?php echo $rowPosts['name']; ?>">
                                                        <?php echo $rowPosts['name']; ?>
                                                    </a>
                                                </h6>
                                        <span class="price">
                                            <span class="amount">
                                                <span style="text-decoration: line-through; color: lightgrey;">
                                                    <span class="currencySymbol">
                                                    $
                                                </span>
                                                    <?php echo $rowPosts['price']; ?>
                                                </span>
                                                <span class="currencySymbol">
                                                    $
                                                </span>
                                                <?php
                                                $total = 0;
                                                $total = $rowPosts['price']/100;
                                                $total = $total * $rowPosts['discount'];
                                                $total = $rowPosts['price'] - $total;
                                                echo $total;
                                                ?>
                                            </span>
                                        </span>
                                                <p class="product-desc mt_20 mb_60">
                                                    <?php
                                                    echo substr($rowPosts['description'], 0, 200);
                                                    ?>
                                                </p>
                                                <div class="button-group text-center">
                                                    <a href="wishlist.php?add=<?php echo $rowPosts['id']; ?>">
                                                        <div class="wishlist">
                                                            <span>wishlist</span>
                                                        </div>
                                                    </a>
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <div class="quickview">
                                                            <span>Quick View</span>
                                                        </div>
                                                    </a>
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <div class="add-to-cart">
                                                            <span>Add to cart</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<h2>No Product Available</h2>";
                        }
                    }
                    else if (isset($_GET['cat']))
                    {
                        $sqlPosts = mysqli_query($db, "SELECT * FROM `products` WHERE category = '".$_GET['cat']."'");
                        $count = mysqli_num_rows($sqlPosts);
                        if ($count > 0) {
                            while ($rowPosts = mysqli_fetch_array($sqlPosts)) {
                                ?>
                                <div class="product-layout  product-grid  col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
                                    <div class="item">
                                        <div class="product-thumb clearfix mb_30">
                                            <div class="image product-imageblock">
                                                <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                    <img data-name="product_image" src="admin/images/<?php echo $rowPosts['img']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                                    <img src="admin/images/<?php echo $rowPosts['img1']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="caption product-detail text-left">
                                                <h6 data-name="product_name" class="product-name mt_20">
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>" title="<?php echo $rowPosts['name']; ?>">
                                                        <?php echo $rowPosts['name']; ?>
                                                    </a>
                                                </h6>
                                        <span class="price">
                                            <span class="amount">
                                                <span style="text-decoration: line-through; color: lightgrey;">
                                                    <span class="currencySymbol">
                                                    $
                                                </span>
                                                    <?php echo $rowPosts['price']; ?>
                                                </span>
                                                <span class="currencySymbol">
                                                    $
                                                </span>
                                                <?php
                                                $total = 0;
                                                $total = $rowPosts['price']/100;
                                                $total = $total * $rowPosts['discount'];
                                                $total = $rowPosts['price'] - $total;
                                                echo $total;
                                                ?>
                                            </span>
                                        </span>
                                                <p class="product-desc mt_20 mb_60">
                                                    <?php
                                                    echo substr($rowPosts['description'], 0, 200);
                                                    ?>
                                                </p>
                                                <div class="button-group text-center">
                                                    <a href="wishlist.php?add=<?php echo $rowPosts['id']; ?>">
                                                        <div class="wishlist">
                                                            <span>wishlist</span>
                                                        </div>
                                                    </a>
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <div class="quickview">
                                                            <span>Quick View</span>
                                                        </div>
                                                    </a>
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <div class="add-to-cart">
                                                            <span>Add to cart</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<h2>No Product Available</h2>";
                        }
                    }
                    else if (isset($_GET['shape']))
                    {
                        $sqlPosts = mysqli_query($db, "SELECT * FROM `products` WHERE shape = '".$_GET['shape']."'");
                        $count = mysqli_num_rows($sqlPosts);
                        if ($count > 0) {
                            while ($rowPosts = mysqli_fetch_array($sqlPosts)) {
                                ?>

                                <div class="product-layout  product-grid  col-md-4 col-sm-6 col-xs-12 ">
                                    <div class="item">
                                        <div class="product-thumb clearfix mb_30">
                                            <div class="image product-imageblock">
                                                <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                    <img data-name="product_image" src="admin/images/<?php echo $rowPosts['img']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                                    <img src="admin/images/<?php echo $rowPosts['img1']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="caption product-detail text-left">
                                                <h6 data-name="product_name" class="product-name mt_20">
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>" title="<?php echo $rowPosts['name']; ?>">
                                                        <?php echo $rowPosts['name']; ?>
                                                    </a>
                                                </h6>
                                        <span class="price">
                                            <span class="amount">
                                                <span style="text-decoration: line-through; color: lightgrey;">
                                                    <span class="currencySymbol">
                                                    $
                                                </span>
                                                    <?php echo $rowPosts['price']; ?>
                                                </span>
                                                <span class="currencySymbol">
                                                    $
                                                </span>
                                                <?php
                                                $total = 0;
                                                $total = $rowPosts['price']/100;
                                                $total = $total * $rowPosts['discount'];
                                                $total = $rowPosts['price'] - $total;
                                                echo $total;
                                                ?>
                                            </span>
                                        </span>
                                                <p class="product-desc mt_20 mb_60">
                                                    <?php
                                                    echo substr($rowPosts['description'], 0, 200);
                                                    ?>
                                                </p>
                                                <div class="button-group text-center">
                                                    <a href="wishlist.php?add=<?php echo $rowPosts['id']; ?>">
                                                        <div class="wishlist">
                                                            <span>wishlist</span>
                                                        </div>
                                                    </a>
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <div class="quickview">
                                                            <span>Quick View</span>
                                                        </div>
                                                    </a>
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <div class="add-to-cart">
                                                            <span>Add to cart</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<h2>No Product Available</h2>";
                        }
                    }
                    else if (isset($_GET['brand']))
                    {
                        $sqlPosts = mysqli_query($db, "SELECT * FROM `products` WHERE brand = '".$_GET['brand']."'");
                        $count = mysqli_num_rows($sqlPosts);
                        if ($count > 0) {
                            while ($rowPosts = mysqli_fetch_array($sqlPosts)) {
                                ?>

                                <div class="product-layout  product-grid  col-md-4 col-sm-6 col-xs-12 ">
                                    <div class="item">
                                        <div class="product-thumb clearfix mb_30">
                                            <div class="image product-imageblock">
                                                <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                    <img data-name="product_image" src="admin/images/<?php echo $rowPosts['img']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                                    <img src="admin/images/<?php echo $rowPosts['img1']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="caption product-detail text-left">
                                                <h6 data-name="product_name" class="product-name mt_20">
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>" title="<?php echo $rowPosts['name']; ?>">
                                                        <?php echo $rowPosts['name']; ?>
                                                    </a>
                                                </h6>
                                        <span class="price">
                                            <span class="amount">
                                                <span style="text-decoration: line-through; color: lightgrey;">
                                                    <span class="currencySymbol">
                                                    $
                                                </span>
                                                    <?php echo $rowPosts['price']; ?>
                                                </span>
                                                <span class="currencySymbol">
                                                    $
                                                </span>
                                                <?php
                                                $total = 0;
                                                $total = $rowPosts['price']/100;
                                                $total = $total * $rowPosts['discount'];
                                                $total = $rowPosts['price'] - $total;
                                                echo $total;
                                                ?>
                                            </span>
                                        </span>
                                                <p class="product-desc mt_20 mb_60">
                                                    <?php
                                                    echo substr($rowPosts['description'], 0, 200);
                                                    ?>
                                                </p>
                                                <div class="button-group text-center">
                                                    <a href="wishlist.php?add=<?php echo $rowPosts['id']; ?>">
                                                        <div class="wishlist">
                                                            <span>wishlist</span>
                                                        </div>
                                                    </a>
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <div class="quickview">
                                                            <span>Quick View</span>
                                                        </div>
                                                    </a>
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <div class="add-to-cart">
                                                            <span>Add to cart</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<h2>No Product Available</h2>";
                        }
                    }
                    else if (isset($_GET['tag']))
                    {
                        $tag = $_GET['tag'];
                        $sqlPosts = mysqli_query($db, "SELECT * FROM `products` WHERE tags LIKE '%$tag%'");
                        $count = mysqli_num_rows($sqlPosts);
                        if ($count > 0) {
                            while ($rowPosts = mysqli_fetch_array($sqlPosts)) {
                                ?>

                                <div class="product-layout  product-grid  col-md-4 col-sm-6 col-xs-12 ">
                                    <div class="item">
                                        <div class="product-thumb clearfix mb_30">
                                            <div class="image product-imageblock">
                                                <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                    <img data-name="product_image" src="admin/images/<?php echo $rowPosts['img']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                                    <img src="admin/images/<?php echo $rowPosts['img1']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="caption product-detail text-left">
                                                <h6 data-name="product_name" class="product-name mt_20">
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>" title="<?php echo $rowPosts['name']; ?>">
                                                        <?php echo $rowPosts['name']; ?>
                                                    </a>
                                                </h6>
                                        <span class="price">
                                            <span class="amount">
                                                <span style="text-decoration: line-through; color: lightgrey;">
                                                    <span class="currencySymbol">
                                                    $
                                                </span>
                                                    <?php echo $rowPosts['price']; ?>
                                                </span>
                                                <span class="currencySymbol">
                                                    $
                                                </span>
                                                <?php
                                                $total = 0;
                                                $total = $rowPosts['price']/100;
                                                $total = $total * $rowPosts['discount'];
                                                $total = $rowPosts['price'] - $total;
                                                echo $total;
                                                ?>
                                            </span>
                                        </span>
                                                <p class="product-desc mt_20 mb_60">
                                                    <?php
                                                    echo substr($rowPosts['description'], 0, 200);
                                                    ?>
                                                </p>
                                                <div class="button-group text-center">
                                                    <a href="wishlist.php?add=<?php echo $rowPosts['id']; ?>">
                                                        <div class="wishlist">
                                                            <span>wishlist</span>
                                                        </div>
                                                    </a>
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <div class="quickview">
                                                            <span>Quick View</span>
                                                        </div>
                                                    </a>
                                                    <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <div class="add-to-cart">
                                                            <span>Add to cart</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<h2>No Product Available</h2>";
                        }
                    }
                    else
                    {
                        if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                        } else {
                            $pageno = 1;
                        }

                        $no_of_records_per_page = 6;
                        $offset = ($pageno-1) * $no_of_records_per_page;

                        $total_pages_sql = "SELECT COUNT(*) FROM products";
                        $result = mysqli_query($db,$total_pages_sql);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);
                        $sqlPosts = mysqli_query($db, "SELECT * FROM `products` ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
                        $count = mysqli_num_rows($sqlPosts);
                        if ($count > 0) {
                            while ($rowPosts = mysqli_fetch_array($sqlPosts))
                            {
                        ?>
                        <div class="product-layout  product-grid  col-md-4 col-sm-6 col-xs-12 ">
                            <div class="item">
                                <div class="product-thumb clearfix mb_30">
                                    <div class="image product-imageblock">
                                        <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                            <img data-name="product_image" src="admin/images/<?php echo $rowPosts['img']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                            <img src="admin/images/<?php echo $rowPosts['img1']; ?>" alt="<?php echo $rowPosts['name']; ?>" title="<?php echo $rowPosts['name']; ?>" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="caption product-detail text-left">
                                        <h6 data-name="product_name" class="product-name mt_20">
                                            <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>" title="<?php echo $rowPosts['name']; ?>">
                                                <?php echo $rowPosts['name']; ?>
                                            </a>
                                        </h6>
                                        <span class="price">
                                            <span class="amount">
                                                <span style="text-decoration: line-through; color: lightgrey;">
                                                    <span class="currencySymbol">
                                                    $
                                                </span>
                                                    <?php echo $rowPosts['price']; ?>
                                                </span>
                                                <span class="currencySymbol">
                                                    $
                                                </span>
                                                <?php
                                                $total = 0;
                                                $total = $rowPosts['price']/100;
                                                $total = $total * $rowPosts['discount'];
                                                $total = $rowPosts['price'] - $total;
                                                echo $total;
                                                ?>
                                            </span>
                                        </span>
                                        <p class="product-desc mt_20 mb_60">
                                            <?php
                                            echo substr($rowPosts['description'], 0, 200);
                                            ?>
                                        </p>
                                        <div class="button-group text-center">
                                            <a href="wishlist.php?add=<?php echo $rowPosts['id']; ?>">
                                                <div class="wishlist">
                                                    <span>wishlist</span>
                                                </div>
                                            </a>
                                            <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                <div class="quickview">
                                                    <span>Quick View</span>
                                                </div>
                                            </a>
                                            <a href="product_detail_page.php?view=<?php echo $rowPosts['id']; ?>">
                                                <div class="add-to-cart">
                                                    <span>Add to cart</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        }
                        else
                        {
                            echo "<h2>No Product Available</h2>";
                        }
                        ?>
                    </div>
                    <div class="pagination-nav text-center mt_50">
                        <ul>
                            <li><a href="?pageno=1">First</a></li>
                            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                            </li>
                            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                            </li>
                            <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                        </ul>
                    </div>
                    <?php
                    }
                    ?>
            </div>
        </div>

    </div>
    <!-- =====  CONTAINER END  ===== -->

<?php
include "inc/footer.php";
?>
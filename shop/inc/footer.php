<style>
    .footer-title{
        color: #fff3e0!important;
    }
</style>
<!-- =====  FOOTER START  ===== -->
<div class="footer pt_60" style="background: #0b0b0b;">
    <div class="container">
        <div class="row">
            <div class="col-md-3 footer-block">
                <div class="content_footercms_right">
                    <div class="footer-contact">
                        <div class="footer-logo mb_40">
                            <a href="index.php">
                                <img src="admin/logo.png" style="height: 47px;" alt="NyXie">
                            </a>
                        </div>
                        <ul>
                            <li>B-14 Collins Street West Victoria 2386</li>
                            <li>(+123) 456 789 - (+024) 666 888</li>
                            <li>Contact@yourcompany.com</li>
                        </ul>
                        <div class="social_icon">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 footer-block">
                <h6 class="footer-title ptb_20">Categories</h6>
                <ul>
                    <?php
                    $sqlTopCat = mysqli_query($db, "SELECT * FROM `category` ORDER BY name ASC LIMIT 0, 10");
                    while ($rowTopCat = mysqli_fetch_array($sqlTopCat))
                    {
                        ?>
                        <li><a href="category_page.php?cat=<?php echo $rowTopCat['id']; ?>"><?php echo $rowTopCat['name'];?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-2 footer-block">
                <h6 class="footer-title ptb_20">Brands</h6>
                <ul>
                    <?php
                    $sqlTopCat = mysqli_query($db, "SELECT * FROM `brands` ORDER BY name ASC LIMIT 0, 10");
                    while ($rowTopCat = mysqli_fetch_array($sqlTopCat))
                    {
                        ?>
                        <li><a href="category_page.php?brand=<?php echo $rowTopCat['id']; ?>"><?php echo $rowTopCat['name'];?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-2 footer-block">
                <h6 class="footer-title ptb_20">My Account</h6>
                <ul><li>
                        <a href="userAccount.php">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="allOrders.php">
                            All Orders
                        </a>
                    </li>
                    <li>
                        <a href="PaidOrders.php">
                            Paid Orders
                        </a>
                    </li>
                    <li>
                        <a href="PendingOrders.php">
                            Pending Orders
                        </a>
                    </li>
                    <li>
                        <a href="CancelOrders.php">
                            Cancel Orders
                        </a>
                    </li>
                    <li>
                        <a href="allBlogs.php">
                            All Blogs
                        </a>
                    </li>
                    <li>
                        <a href="AddNewBlog.php">
                            Add New Blog
                        </a>
                    </li>
                    <li>
                        <a href="editUser.php">
                            Edit Personal Details
                        </a>
                    </li>
                    <li>
                        <a href="changePassword.php">
                            Change Password
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="ptb_20" style="color: #fff3e0;">SIGN UP OUR NEWSLETTER</h6>
                <p class="mt_10 mb_20">For get offers from our favorite brands & get 20% off for next </p>

                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <input class="mb_20" type="text" name="email_bottom" placeholder="Enter Your Email Address">
                        <button class="btn" name="sub_bottom">Subscribe</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['sub_bottom']))
                {
                    $email = mysqli_real_escape_string($db, $_POST['email_bottom']);
                    $sqlSubscribe = mysqli_query($db, "INSERT INTO `newsletter`(`email`) VALUES ('$email')");
                    if ($sqlSubscribe)
                    {
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                    else
                    {
                        echo "<script>window.alert('Already Subscribed!')</script>";
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="footer-bottom mt_60 ptb_10">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="copyright-part">@ 2021 All Rights Reserved</div>
                </div>
                <div class="col-sm-6">
                    <div class="payment-icon text-right">
                        <ul>
                            <li><i class="fa fa-cc-paypal "></i></li>
                            <li><i class="fa fa-cc-stripe"></i></li>
                            <li><i class="fa fa-cc-visa"></i></li>
                            <li><i class="fa fa-cc-discover"></i></li>
                            <li><i class="fa fa-cc-mastercard"></i></li>
                            <li><i class="fa fa-cc-amex"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =====  FOOTER END  ===== -->
</div>
<a id="scrollup" class="btn" style="color: #fff3e0"></a>

<!-- Stripe JavaScript library -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<!-- jQuery is used only for this example; it isn't required to use Stripe -->
<script src="js/jQuery_v3.1.1.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="js/jquery.firstVisitPopup.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
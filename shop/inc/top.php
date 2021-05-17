<?php
function getIPAddress() {
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- =====  BASIC PAGE NEEDS  ===== -->
    <meta charset="utf-8">
    <title>NyXie</title>
    <!-- =====  SEO MATE  ===== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="distribution" content="global">
    <meta name="revisit-after" content="2 Days">
    <meta name="robots" content="ALL">
    <meta name="rating" content="8 YEARS">
    <meta name="Language" content="en-us">
    <meta name="GOOGLEBOT" content="NOARCHIVE">
    <!-- =====  MOBILE SPECIFICATION  ===== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width">
    <!-- =====  CSS  ===== -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="shortcut icon" href="admin/logo.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.html">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.html">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.html">

</head>

<body>
<!-- =====  LODER  ===== -->
<div class="loder"></div>
<div class="wrapper">
    <div id="subscribe-me" class="modal animated fade in" role="dialog" data-keyboard="true" tabindex="-1">
        <div class="newsletter-popup">
            <img class="offer" src="images/newsbg.jpg" alt="offer">
            <div class="newsletter-popup-static newsletter-popup-top">
                <div class="popup-text">
                    <div class="popup-title">50% <span>off</span></div>
                    <div class="popup-desc">
                        <div>Sign up and get 50% off your next Order</div>
                    </div>
                </div>
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group required">
                        <input type="email" name="email-popup" id="email-popup" placeholder="Enter Your Email" class="form-control input-lg" required />
                        <button type="submit" class="btn btn-default btn-lg" id="email-popup-submit" name="subscribe">Subscribe</button>
                        <label class="checkme">
                            <input type="checkbox" value="" id="checkme" />Dont show again</label>
                    </div>
                </form>
                <?php
                if (isset($_POST['subscribe']))
                {
                    $email = mysqli_real_escape_string($db, $_POST['email-popup']);
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

<?php
    $ipTop = getIPAddress();
    $sqlCart = mysqli_query($db, "SELECT * FROM cart WHERE ip = '$ipTop'");
    $countCart = mysqli_num_rows($sqlCart);
?>  
    <!-- =====  HEADER START  ===== -->
        <div class="header">
            <div class="container">
                <nav class="navbar">
                    <div class="row" style="padding: 20px;">
                        <div class="col-xs-6">
                            <a class="navbar-brand" href="index.php">
                                <img src="admin/logo.png" style="height: 30px;">
                            </a>
                        </div>
                        <div class="col-xs-6" style="vertical-align: middle; margin-top: 10px;" >
                            <a href="cart_page.php">
                                <div class="shopping-icon">
                                    <div class="cart-item " role="button">
                                        <span class="cart-qty" style="margin-top: 5px;">
                                            <?php echo $countCart; ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <div class="pull-right">
                                <div class="search-overlay">
                                    <a href="javascript:void(0)" class="search-overlay-close"></a>
                                    <div class="container">
                                        <form role="search" id="searchform" action="category_page.php" method="post" enctype="multipart/form-data">
                                            <label class="h5 normal search-input-label">Enter keywords To Search Entire Store</label>
                                            <input value="" name="searchTxt" placeholder="Search here..." type="search">
                                            <button type="submit" name="searchBtn"></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-search">
                                    <a id="search-overlay-btn"></a> 
                                </div>
                            </div> 
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    <style>
        .marquee span a{
            color: #fff0ff;
        }
        .marquee span a:hover{
            color: lightgrey;
        }

    </style>
        <div class="header-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="header-bottom-right offers">
                            <div class="marquee">
                                <span>
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <a href="index.php">
                                        Home
                                    </a>
                                </span>
                                <?php
                                $sqlTopCat = mysqli_query($db, "SELECT * FROM `category` ORDER BY id ASC");
                                while ($rowTopCat = mysqli_fetch_array($sqlTopCat))
                                {
                                    ?>

                                    <span>
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                            <a href="category_page.php?cat=<?php echo $rowTopCat['id']; ?>">
                                                <?php echo $rowTopCat['name'];?>
                                            </a>
                                    </span>
                                    <?php
                                }
                                ?>

                                <span>
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <a href="questions.php">
                                        Shop
                                    </a>
                                </span>
                                <span>
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <a href="blog_page.php">
                                        Blog
                                    </a>
                                </span>
                                <?php
                                if (@isset($_SESSION['email']))
                                {
                                    ?>
                                    <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href="userAccount.php">
                                        Profile
                                    </a>
                                </span>
                                    <span>
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    <a href="logout.php">
                                        Logout
                                    </a>
                                </span>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                <span>
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    <a href="login.php">
                                        Login
                                    </a>
                                </span>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- =====  HEADER END  ===== -->
    <style>
        .link514{
            display: block;
            border-radius: 10px;
            background: #000000;
            color: #fff0ff;
            text-decoration: none;
            text-align: center;
            border-radius: 10px;
            padding: 10px;
        }
        .link514:hover{
            text-decoration: none;
            color: #fff9f9;
        }
        /* Centered text */
        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        /* Container holding the image and the text */
        .container514 {
            position: relative;
            text-align: center;
            color: #fff9f9;
        }
        /* Top right text */
        .top-right {
            position: absolute;
            top: 8px;
            right: 16px;
            background: #0D0A0A;
            color: #fff9f9;
            border-radius: 2px;
            padding: 5px;
        }

        .btn514{
            margin-top: -25px;
            background: #000;
        }
        .btn514:hover{
            background: #000000db;
        }

        .btn-warning{
            background: #000!important;
        }
        .btn-warning:hover{
            background: #000000db!important;
        }
        .btn-danger{
            background: #000!important;
        }
        .btn-danger:hover{
            background: #000000db!important;
        }
        .btn-info{
            background: #000!important;
        }
        .btn-info:hover{
            background: #000000db!important;
        }
        .link514{
            color: #000;
            letter-spacing: .12em;
            text-transform: uppercase;
            text-align: center;
            flex-grow: 1;
            margin-top: 1.60714286rem;
            margin-bottom: 1.07142857rem;
            font-size: 1.71428571rem;
            line-height: 2.14285714rem;
            letter-spacing: .21428571rem;
            font-weight: 700;
        }
        .link514:hover{
            color: #000;
            letter-spacing: .12em;
            text-transform: uppercase;
            text-align: center;
            flex-grow: 1;
            margin-top: 1.60714286rem;
            margin-bottom: 1.07142857rem;
            font-size: 1.71428571rem;
            line-height: 2.14285714rem;
            letter-spacing: .21428571rem;
            font-weight: 700;
        }

        .link514{
            color: #000;
            letter-spacing: .12em;
            text-transform: uppercase;
            text-align: center;
            flex-grow: 1;
            margin-top: 1.60714286rem;
            margin-bottom: 1.07142857rem;
            font-size: 1.71428571rem;
            line-height: 2.14285714rem;
            letter-spacing: .21428571rem;
            font-weight: 700;
            background: #fff9f9;
        }
        .link514:hover{
            color: #000;
            letter-spacing: .12em;
            text-transform: uppercase;
            text-align: center;
            flex-grow: 1;
            margin-top: 1.60714286rem;
            margin-bottom: 1.07142857rem;
            font-size: 1.71428571rem;
            line-height: 2.14285714rem;
            letter-spacing: .21428571rem;
            font-weight: 700;
            background: #fff9f9;
        }

        body{
            background: #fffbf0;
        }
    </style>

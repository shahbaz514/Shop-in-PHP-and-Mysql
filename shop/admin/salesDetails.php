<?php
ob_start();
session_start();
include "db/db.php";
if (!isset($_SESSION['username']))
{
    echo "<script>window.open('login.php','_self')</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sales Report By <?php echo $_SESSION['storeName']; ?></title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <!-- Light Gallery Plugin Css -->
    <link href="plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">



</head>
<body class="theme-grey">
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="index.php">BD | POS</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <?php
                if ($_SESSION['role'] == 'SalesMan')
                {
                    echo '<li><a href="salesManSales.php" class="js-search" data-close="true"><i class="material-icons">add_box</i></a></li>';
                }
                ?>
                <li><a href="allSales.php" class="js-search" data-close="true"><i class="material-icons">border_all</i></a></li>
                <li><a href="logout.php" class="js-search" data-close="true"><i class="material-icons">logout</i></a></li>
                <!-- #END# Call Search -->
            </ul>
        </div>
    </div>
</nav>

<div style="margin-top: 80px;" class="container-fluid">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10" id="print514">
                <center>
                    <img src="images/<?php echo $_SESSION['img']; ?>" style="padding: 10px; margin: 20px; width: 200px; height: 150px;" class="img-rounded img-responsive img-thumbnail">
                </center>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    ORDER DETAILS
                                </h2>
                            </div>
                            <div class="body table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Order Id</th>
                                        <th class="text-center">Total Price</th>
                                        <th class="text-center">Discount</th>
                                        <th class="text-center">Payment Received</th>
                                        <th class="text-center">Payment Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sqlCart = mysqli_query($db, "SELECT * FROM `orders` WHERE orderid = '".$_GET['orderid']."'");
                                    $rowCart = mysqli_fetch_array($sqlCart);
                                    ?>
                                    <tr>
                                        <td><?php echo $rowCart['orderid']; ?></td>
                                        <td><?php echo $_SESSION['currency']; echo " : "; echo $rowCart['totalPrice']; ?></td>
                                        <td><?php echo $_SESSION['currency']; echo " : "; echo $rowCart['discountprice']; ?></td>
                                        <td><?php echo $_SESSION['currency']; echo " : "; echo $rowCart['pricereceived']; ?></td>
                                        <td><?php echo $rowCart['paymenttype']; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    ORDER Items Details
                                </h2>
                            </div>
                            <div class="body table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Order Id</th>
                                        <th class="text-center">Product</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sqlCart = mysqli_query($db, "SELECT * FROM `orderitems` WHERE orderid = '".$_GET['orderid']."'");
                                    while ($rowCart = mysqli_fetch_array($sqlCart))
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $rowCart['orderid']; ?></td>
                                            <td>
                                                <?php
                                                $sqlPro = mysqli_query($db, "SELECT * FROM `products` WHERE id = '".$rowCart['pid']."'");
                                                $rowPro = mysqli_fetch_array($sqlPro);
                                                echo $rowPro['name'];
                                                ?>
                                            </td>
                                            <td><?php echo $rowCart['qty']; ?></td>
                                            <td><?php echo $_SESSION['currency']; echo " : "; echo $rowCart['price']; ?></td>
                                            <td><?php echo $_SESSION['currency']; echo " : "; echo $rowCart['totalPrice']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="footer">
                                <div class="row">
                                    <div class="col-sm-6 text-center">
                                        <h3>Sales Man :
                                            <span>
                                        <?php
                                        $sqlCart = mysqli_query($db, "SELECT * FROM `orders` WHERE orderid = '".$_GET['orderid']."'");
                                        $rowCart = mysqli_fetch_array($sqlCart);
                                        echo $rowCart['username'];
                                        ?>
                                    </span></h3>
                                    </div>
                                    <div class="col-sm-6 text-center">
                                        <h3>Store Name : <span><?php echo $_SESSION['storeName']; ?></span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="card"  style="margin-top: 65%;">
                    <div class="body table-responsive">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Total Price:</label>
                                <input type="number" class="form-control btn" placeholder="Total Price:" id="total" value="<?php echo $rowCart['totalPrice'] ?>" disabled>
                            </div>
                            <div class="col-sm-12">
                                <label>Given Amount:</label>
                                <input type="number" class="form-control btn" placeholder="Given Amount" id="given" min="0">
                            </div>
                            <div class="col-sm-12">
                                <label>Balance:</label>
                                <input type="number" class="form-control btn" placeholder="Total" id="balance" disabled>
                            </div>
                            <div class="col-sm-12">
                                <center>
                                    <button value="Calculate" class="btn btn-danger" onclick="calculate()">
                                        Calculate
                                    </button>
                                </center>
                            </div>
                            <script>
                                function calculate()
                                {
                                    var x = document.getElementById('total').value;
                                    var y = document.getElementById('given').value;

                                    var z = y - x;

                                    document.getElementById('balance').value = z;
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container-fluid">
    <div class="block-header">
        <center>
            <a style="width: 80px; margin: auto;" class="btn btn-block bg-pink waves-effect print514" onclick="printDiv('print514')"><i class="material-icons">print</i></a>
            <a style="width: 40px; margin: auto;" class="btn btn-block bg-pink waves-effect print514" href="salesManSales.php"><i class="material-icons">add_plus</i></a>
        </center>
    </div>
</div>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/tables/jquery-datatable.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>
</body>

</html>

<?php
ob_start();
session_start();
include "../db/db.php";
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>
        INVBDM<?php echo $_GET['invoice'] ?>
    </title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <style>
        body {
            margin: 0;
            font-family: Roboto, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: .8125rem;
            font-weight: 400;
            line-height: 1.5385;
            color: #333;
            text-align: left;
        }

        .mt-50 {
            margin-top: 50px
        }

        .mb-50 {
            margin-bottom: 50px
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: .1875rem
        }

        .card-img-actions {
            position: relative
        }

        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem;
            text-align: center
        }

        .card-title {
            margin-top: 10px;
            font-size: 17px
        }

        .invoice-color {
            color: red !important
        }

        .card-header {
            padding: .9375rem 1.25rem;
            margin-bottom: 0;
            border-bottom: 1px solid rgba(0, 0, 0, .125)
        }

        a {
            text-decoration: none !important
        }

        .btn-light {
            color: #333;
            border-color: #ddd
        }

        .header-elements-inline {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap
        }

        @media (min-width: 768px) {
            .wmin-md-400 {
                min-width: 400px !important
            }
        }

        .btn-primary {
            color: #fff;
        }

        .btn-labeled>b {
            position: absolute;
            top: -1px;
            background-color: blue;
            display: block;
            line-height: 1;
            padding: .62503rem
        }</style>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'></script>
</head>
<body oncontextmenu='return false' class='snippet-body'>
<?php
$sqlQuotation = mysqli_query($db, "SELECT * FROM `orders_customers` WHERE orderid = '".$_GET['invoice']."'");
$rowQuations = mysqli_fetch_array($sqlQuotation);
$sqlCustomer = mysqli_query($db, "SELECT * FROM `customers` WHERE email = '".$rowQuations['email']."'");
$rowCustomer = mysqli_fetch_array($sqlCustomer);
$sqlQServices = mysqli_query($db, "SELECT * FROM `orderitems` WHERE orderid = '".$_GET['invoice']."'");

?>
<div class="container d-flex justify-content-center mt-50 mb-50">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <h6 class="card-title">Sale invoice</h6>
                    <div class="header-elements">
                        <a type="button" href="allCustomersOrders.php" class="btn btn-light btn-sm ml-3"><i class="fa fa-backward mr-2"></i></a>
                        <button type="button" onclick="printdiv('div_print');" class="btn btn-light btn-sm ml-3"><i class="fa fa-print mr-2"></i></button>
                    </div>
                </div>
                <script language="javascript">
                    function printdiv(printpage) {
                        var headstr = "<html><head><title></title></head><body>";
                        var footstr = "</body>";
                        var newstr = document.all.item(printpage).innerHTML;
                        var oldstr = document.body.innerHTML;
                        document.body.innerHTML = headstr + newstr + footstr;
                        window.print();
                        document.body.innerHTML = oldstr;
                        return false;
                    }
                </script>


                <div id="div_print">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <img src="logo.png" style="text-align: left; float: left; width: 160px; vertical-align: middle;">
                            </div>
                            <div class="col-sm-4">
                                <h6 style="text-align: right; vertical-align: middle;">NyXie Online Store</h6>
                                <ul class="list list-unstyled mb-0 text-right">
                                    <li>M-130, Jeff Height, 77/E-1 Main Boulevard Gulberg</li>
                                    <li>Lahore, Pakistan</li>
                                    <li>+92 321 4246279</li>
                                    <li>+92 42 3218 3461</li>
                                    <li>info@NyXie.pk</li>
                                    <li><a href="https://nyxie.com/">www.nyxie.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <hr/>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="d-md-flex flex-md-wrap">
                                    <div class="mb-4 mb-md-2 text-left">
                                        <p style="font-weight: bold; font-size: 14px;">Invoice To:</p>
                                        <ul class="list list-unstyled mb-0">
                                            <li><p style="font-weight: bold">Contact Person : <?php echo $rowCustomer['name']; ?></p></li>
                                            <li>Mobile : <?php echo $rowCustomer['phone']; ?></li>
                                            <li>Address : <?php echo $rowCustomer['address']; ?></li>
                                            <li>Country : <?php echo $rowCustomer['country']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4 ">
                                    <div class="text-sm-right">
                                        <h4 class="invoice-color mb-2 mt-md-2">INVBDM<?php echo $_GET['invoice']?></h4>
                                        <ul class="list list-unstyled mb-0">
                                            <li>Date: <span class="font-weight-semibold"><?php echo date("d m Y"); ?></span></li>
                                            <li>Status: <span class="font-weight-semibold"><?php echo $rowQuations['status']?></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-md-flex flex-md-wrap">
                            <div class="table-responsive">
                                <table class="table table-lg"style="font-size: 14px;">
                                    <thead>
                                    <tr>
                                        <th colspan="2" style="text-align: left; font-weight: bold;">
                                            Description
                                        </th>
                                        <th style="text-align: right; font-weight: bold;">
                                            Amount
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $total = 0;
                                    $count = 0;
                                    while ($rowQServices = mysqli_fetch_array($sqlQServices))
                                    {
                                        $count++;
                                        $sqlProd = mysqli_query($db, "SELECT * FROM `products` WHERE id = '".$rowQServices['pid']."'");
                                        $rowProd = mysqli_fetch_array($sqlProd);
                                        ?>
                                        <tr style="font-size: 14px">
                                            <td style="vertical-align: middle;">
                                                <?php echo $count; ?>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                    <span style="font-size: 14px; font-weight: bold">
                                                        <?php echo $rowProd['name']; ?>
                                                    </span>
                                            </td>
                                            <td style="vertical-align: middle; text-align: right">
                                                $<?php echo $rowProd['price']; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-md-flex flex-md-wrap">
                            <div class="pt-2 mb-3 wmin-md-400 ml-auto">
                                <div class="table-responsive">
                                    <table class="table" style="font-size: 14px !important; text-align: right">
                                        <tbody>
                                        <tr>
                                            <th class="text-left">Total:</th>
                                            <td>
                                                $<?php echo $rowQuations['totalPrice'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-left">Discount:</th>
                                            <td>
                                                $<?php echo $rowQuations['discountprice'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-left">Payment Received:</th>
                                            <td>
                                                $<?php echo $rowQuations['pricereceived'];?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                        include "../numbertowordconvertsconver.php";
                        ?>
                        <p style="text-align: left; font-weight: bold; font-size: 12px;">Amount (In Words) : <?php echo convert_number_to_words($rowQuations['pricereceived']); ?></p>
                    </div>

                    <div class="card-body">
                        <div class="d-md-flex flex-md-wrap">
                            <p style="font-weight: bold; font-size: 12px;">Terms And Conditions</p>
                            <hr>
                            <div class="row  table-responsive">
                                <div class="col-sm-12">
                                    <ol>

                                        <?php
                                        $sqlPro = mysqli_query($db, "SELECT * FROM `terms` ORDER BY id ASC");
                                        while ($rowPro = mysqli_fetch_array($sqlPro))
                                        {
                                            ?>
                                            <li style="text-align: left"><?php echo $rowPro['description']; ?></li>
                                            <?php
                                        }
                                        ?>


                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="d-md-flex flex-md-wrap">
                            <p style="font-weight: bold; font-size: 12px;">Account Information</p>
                            <div class="table-responsive">
                                <table class="table" style="font-size: 12px !important;">
                                    <tr>
                                        <td style="font-weight: 600">
                                            Bank
                                        </td>
                                        <td style="font-weight: 600">
                                            Account Title
                                        </td>
                                        <td style="font-weight: 600">
                                            Account Number
                                        </td>
                                    </tr>
                                    <?php
                                    $sqlAccount = mysqli_query($db, "SELECT * FROM `accounts` ORDER BY bank ASC");
                                    while ($rowAccount = mysqli_fetch_array($sqlAccount))
                                    {
                                        echo '
                                                <tr>
                                                    <td style="font-weight: 600">
                                                        '.$rowAccount['bank'].'
                                                    </td>
                                                    
                                                    <td>
                                                        '.$rowAccount['title'].'
                                                    </td>
                                                    
                                                    <td>
                                                        '.$rowAccount['ac_num'].'
                                                    </td>
                                                    
                                                </tr>
                                            ';
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"style="text-align: center !important;">
                        <span >
                            All Rights Reserved. By <a href="https://nyxie.com/" target="_blank">NyXie Online Store</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
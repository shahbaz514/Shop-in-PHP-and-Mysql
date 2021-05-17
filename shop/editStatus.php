<?php
@ob_start();
@session_start();
include "db/db.php";
if (!isset($_SESSION['email']))
{
    header("location:login.php");
}

if (isset($_GET['invoice'])) 
{
    $sql = mysqli_query($db, "SELECT * FROM orders_customers WHERE orderid = '".$_GET['invoice']."'");
    $row = mysqli_fetch_array($sql);
    if ($row['status'] == 'Pending') {
        $sqlUpdate = mysqli_query($db, "UPDATE orders_customers SET status = 'Paid' WHERE orderid = '".$_GET['invoice']."'");
        if ($sqlUpdate) 
        {
            echo "<script>
                window.open('PaidOrders.php', '_self')
            </script>";
        }
    }
    else
    {
        $sqlUpdate = mysqli_query($db, "UPDATE orders_customers SET status = 'Pending' WHERE orderid = '".$_GET['invoice']."'");
        if ($sqlUpdate) 
        {
            echo "<script>
                window.open('PendingOrders.php', '_self')
            </script>";
        }   
    }
}
?>
<?php
ob_start();
session_start();
include "../db/db.php";
if (!isset($_SESSION['username']))
{
    echo "<script>window.open('login.php','_self')</script>";
}
if(isset($_POST["Import"])){
    echo $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            $sql = "INSERT INTO `products`(`name`, `img`, `img1`, `img2`, `category`, `price` , `qty`, `discount`, `shape`, `description`, `tags`, `keywords`, `status`) 
                                VALUES ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]'
                                        ,'$emapData[7]','$emapData[8]','$emapData[9]','$emapData[10]','$emapData[11]','$emapData[12]', 'Publish')";
            $result = mysqli_query( $db, $sql);
            if(!$result )
            {
                echo "
                    <script>window.open('allProducts.php', '_self')</script>
                    ";

            }
        }
        fclose($file);
        echo "<script>window.open('allProducts.php', '_self')</script>";
    }
}
?>
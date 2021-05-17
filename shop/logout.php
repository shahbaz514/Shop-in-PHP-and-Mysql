<?php
ob_start();
session_start();
include "db/db.php";
session_destroy();
echo "<script>window.open('index.php','_self')</script>";
?>
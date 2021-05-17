<?php
ob_start();
session_start();
include "../db/db.php";
if (isset($_SESSION['username']))
{
    echo "<script>window.open('index.php','_self')</script>";
}
?>

<html>
<head>
    <title>Login Now | POS | Binary Digital Media Pvt LTD</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/style514.css">

</head>
<body>
<div class="wrapper" style="background-image: url('images/loginback.jpg'); background-size: cover;">
    <div class="inner" >
        <div class="image-holder">
            <img src="images/form-wizard.png"/>
        </div>
        <form method="POST" action="login.php" enctype="multipart/form-data">
            <h3>
                <a class="btn" href="http://shahbaz514.com/" target="_blank">
                    <img src="logo.png" >
                </a>
            </h3>
            <h3>Admin Panel</h3>
            <div class="form-wrapper">
                <input type="text" name="username" placeholder="User Name" class="form-control">
                <i class="zmdi zmdi zmdi-account-box"></i>
            </div>
            <div class="form-wrapper">
                <input name="password" type="password" placeholder="Password" class="form-control">
                <i class="zmdi zmdi zmdi-lock"></i>
            </div>
            <div class="form-group container-login100-form-btn">
                <button id="btn-login" type="submit" name="login">
                    Login
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<?php
if(isset($_POST['login']))
{
    $userName = mysqli_real_escape_string($db, $_POST['username']);
    $pass = mysqli_real_escape_string($db, $_POST['password']);
    $sql = mysqli_query($db, "SELECT * FROM admins WHERE username = '$userName' AND pass = '$pass'");
    $count = 0;
    $count = mysqli_num_rows($sql);
    $row = mysqli_fetch_array($sql);
    if ($count > 0)
    {
        $_SESSION['username'] = $userName;
        $_SESSION['role'] = $row['role'];
        echo "<script>window.open('index.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('Your Credentials Does Not Match!')</script>";
    }
}
?>
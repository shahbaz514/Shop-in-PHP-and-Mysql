<?php
$user = $_SESSION['username'];
$sql = mysqli_query($db, "SELECT * FROM `admins` WHERE username = '$user'");
$row = mysqli_fetch_array($sql);
?>
<div class="user-info">
    <div class="image">
        <?php
        if ($row['img'] != null)
        {
            ?>
            <img src="images/<?php echo $row['img'];?>" width="48" height="48" alt="User" />
            <?php
        }
        else
        {
            ?>
            <img src="images/user-lg.jpg" width="48" height="48" alt="User" />
            <?php
        }
        ?>
    </div>
    <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $row['name'];?></div>
        <div class="email"><?php echo $row['email'];?></div>
        <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
                <li><a href="settings.php"><i class="material-icons">person</i>Profile</a></li>
                <li role="separator" class="divider"></li>
                <li role="separator" class="divider"></li>
                <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
            </ul>
        </div>
    </div>
</div>
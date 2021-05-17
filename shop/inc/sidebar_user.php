<div class="navbar collapse mb_40 hidden-sm-down in">
    <div class="nav-responsive">
        <div class="heading-part mb_20 ">
            <h2 class="main_title">Dashboard</h2>
        </div>
        <ul class="nav main-navigation collapse in">
            <li>
                <a href="userAccount.php">
                    Home
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
                <a href="DeliveredOrders.php">
                    Delivered Orders
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
</div>
<div class="navbar collapse mb_40 hidden-sm-down in">
    <div class="nav-responsive">
        <div class="heading-part mb_20 ">
            <h2 class="main_title">All Categories</h2>
        </div>
        <ul class="nav  main-navigation collapse in">
            <?php
            $sqlTopCat = mysqli_query($db, "SELECT * FROM `category` ORDER BY id ASC");
            while ($rowTopCat = mysqli_fetch_array($sqlTopCat))
            {
                ?>
                <li><a href="category_page.php?cat=<?php echo $rowTopCat['id']; ?>"><?php echo $rowTopCat['name'];?></a></li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>

<div class="left_banner left-sidebar-widget mt_30 mb_50">
    <a href="category_page.php">
        <img src="https://is4.revolveassets.com/images/up/2020/December/121620_FWxPromo_RWshoeaccnav_592x988.gif" class="img-responsive">
    </a>
</div>
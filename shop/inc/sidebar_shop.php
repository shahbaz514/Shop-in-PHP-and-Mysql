<div class="navbar collapse mb_40 hidden-sm-down in">
    <div class="nav-responsive">
        <div class="heading-part mb_20 ">
            <h2 class="main_title">All Categories</h2>
        </div>
        <ul class="nav  main-navigation collapse in ">
            <?php
            $sqlTopCat = mysqli_query($db, "SELECT * FROM `category` ORDER BY name ASC");
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

<div class="filter left-sidebar-widget mb_50">
    <div class="heading-part mtb_20 ">
        <h2 class="main_title">All Brands</h2>
    </div>
    <div class="filter-block">
        <ul class="nav  main-navigation collapse in">
            <?php
            $sqlTopCat = mysqli_query($db, "SELECT * FROM `brands` ORDER BY name ASC");
            while ($rowTopCat = mysqli_fetch_array($sqlTopCat))
            {
                ?>
                <li>
                    <a href="category_page.php?brand=<?php echo $rowTopCat['id']; ?>">
                        <?php echo $rowTopCat['name'];?>
                    </a>
                </li>
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
<div class="Tags left-sidebar-widget mb_50">
    <div class="heading-part mb_20 ">
        <h2 class="main_title">Tags</h2>
    </div>
    <ul>
        <?php
        $sqlLeftTag = mysqli_query($db, "SELECT * FROM `tags` ORDER BY tag ASC LIMIT 0, 20");
        while ($rowLeftTag = mysqli_fetch_array($sqlLeftTag))
        {
            ?>
            <li><a href="category_page.php?tag=<?php echo $rowLeftTag['tag']; ?>"><?php echo $rowLeftTag['tag'];?></a></li>
            <?php
        }
        ?>
    </ul>
</div>
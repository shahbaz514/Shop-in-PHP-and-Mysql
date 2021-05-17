
<div id="category-menu" class="navbar collapse in  mb_40" aria-expanded="true" style="" role="button">
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
<div class="blog-category left-sidebar-widget mb_50">
    <div class="heading-part mb_20 ">
        <h2 class="main_title">Blog Category</h2>
    </div>
    <ul><?php
        $sqlTopCat = mysqli_query($db, "SELECT * FROM `cat_blog` ORDER BY name ASC");
        while ($rowTopCat = mysqli_fetch_array($sqlTopCat))
        {
            ?>
            <li><a href="blog_page.php?cat=<?php echo $rowTopCat['id']; ?>"><?php echo $rowTopCat['name'];?></a></li>
            <?php
        }
        ?>
    </ul>
</div>
<div class="left-blog left-sidebar-widget mb_50">
    <div class="heading-part mb_20 ">
        <h2 class="main_title">Latest Post</h2>
    </div>
    <div id="left-blog">
        <div class="row ">
            <?php
            $sqlBlogsHome = mysqli_query($db, "SELECT * FROM `blogs`  ORDER BY id DESC LIMIT 0, 5");
            while ($rowBlogsHome = mysqli_fetch_array($sqlBlogsHome))
            {
                ?>
                <div class="blog-item mb_20"  oncontextmenu="return false">
                    <div class="post-format col-xs-4">
                        <div class="thumb post-img">
                            <video style="width: 100%; margin: 10px; padding: 10px;" src="admin/videos/<?php echo $rowBlogsHome['video']; ?>"></video>
                        </div>
                    </div>
                    <div class="post-info col-xs-8 ">
                        <h5>

                            <a href="single_blog.php?view=<?php echo $rowBlogsHome['id']; ?>">
                                <?php echo $rowBlogsHome['name']; ?>
                            </a>
                        </h5>
                        <div class="date pull-left">
                            <i class="fa fa-calendar" aria-hidden="true"></i>

                            <?php
                            $month = date('jS');
                            $day = date('F');
                            echo $day ." ". $month;
                            ?>

                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<div class="left-blog left-sidebar-widget mb_50">
    <div class="heading-part mb_20 ">
        <h2 class="main_title">Popular Post</h2>
    </div>
    <div id="left-blog">
        <div class="row ">
            <?php
            $sqlBlogsHome = mysqli_query($db, "SELECT * FROM `blogs`  ORDER BY views DESC LIMIT 0, 5");
            while ($rowBlogsHome = mysqli_fetch_array($sqlBlogsHome))
            {
                ?>
                <div class="blog-item mb_20"  oncontextmenu="return false">
                    <div class="post-format col-xs-4">
                        <div class="thumb post-img">
                            <video style="width: 100%; margin: 10px; padding: 10px;" src="admin/videos/<?php echo $rowBlogsHome['video']; ?>"></video>
                        </div>
                    </div>
                    <div class="post-info col-xs-8 ">
                        <h5>

                            <a href="single_blog.php?view=<?php echo $rowBlogsHome['id']; ?>">
                                <?php echo $rowBlogsHome['name']; ?>
                            </a>
                        </h5>
                        <div class="date pull-left">
                            <i class="fa fa-calendar" aria-hidden="true"></i>

                            <?php
                            $month = date('jS');
                            $day = date('F');
                            echo $day ." ". $month;
                            ?>

                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
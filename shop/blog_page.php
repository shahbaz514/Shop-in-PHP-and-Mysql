<?php
@ob_start();
@session_start();
include "db/db.php";
include "inc/top.php";
?>
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row ">
            <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 hidden-xs">
                <?php
                include 'inc/sidebar_blog.php';
                ?>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-9 mtb_30">
                <!-- =====  BANNER STRAT  ===== -->
                <div class="breadcrumb ptb_20">
                    <h1>Blog</h1>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Blog</li>
                    </ul>
                </div>
                <!-- =====  BREADCRUMB END===== -->
                <div class="row">
                    <div class="three-col-blog text-left">
                        <?php
                        if (isset($_GET['cat']))
                        {
                            $sqlPosts = mysqli_query($db, "SELECT * FROM `blogs` WHERE category = '".$_GET['cat']."' ORDER BY id DESC");
                            $count = mysqli_num_rows($sqlPosts);
                            if ($count > 0) {
                                while ($rowPosts = mysqli_fetch_array($sqlPosts)) {
                                ?>

                                    <div class="blog-item col-md-6 mb_30" oncontextmenu="return false">
                                        <div class="post-format">
                                            <div class="thumb post-img">
                                                <center>
                                                    <video style="height: 300px; max-width: 100%; margin: 10px; padding: 10px;" src="admin/videos/<?php echo $rowPosts['video']; ?>"></video>
                                                </center>
                                            </div>
                                            <div class="post-type">
                                                <i class="fa fa-video-camera" aria-hidden="true">
                                                </i>
                                            </div>
                                        </div>
                                        <center>
                                        <div class="post-info">
                                            <h3 style="text-align: center!important;">
                                                
                                                    <a href="single_blog.php?view=<?php echo $rowPosts['id']; ?>">
                                                        <?php echo substr($rowPosts['name'], 0, 25); ?>...
                                                    </a>
                                                
                                            </h3>                                
                                            <div class="details mtb_20">
                                                <div class="date pull-left">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <?php
                                                    $time = $rowPosts['date'];
                                                    $month = date('jS');
                                                    $day = date('F');
                                                    echo $day ." ". $month;
                                                    ?>
                                                </div>
                                                <div class="more pull-right">
                                                    <a href="single_blog.php?view=<?php echo $rowPosts['id']; ?>">Read more
                                                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        </center>
                                    </div>
                                <?php
                                }
                            }
                        }
                        else
                        {
                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }

                            $no_of_records_per_page = 6;
                            $offset = ($pageno-1) * $no_of_records_per_page;

                            $total_pages_sql = "SELECT COUNT(*) FROM blogs";
                            $result = mysqli_query($db,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);
                            $sqlPosts = mysqli_query($db, "SELECT * FROM `blogs` ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
                            $count = mysqli_num_rows($sqlPosts);
                            if ($count > 0) {
                                while ($rowPosts = mysqli_fetch_array($sqlPosts)) {

                        ?>
                        <div class="blog-item col-md-6 mb_30" oncontextmenu="return false">
                            <div class="post-format">
                                <div class="thumb post-img">
                                    <center>
                                        <video style="height: 300px; max-width: 100%; margin: 10px; padding: 10px;" src="admin/videos/<?php echo $rowPosts['video']; ?>"></video>
                                    </center>
                                </div>
                                <div class="post-type">
                                    <i class="fa fa-video-camera" aria-hidden="true">
                                    </i>
                                </div>
                            </div>
                            <center>
                            <div class="post-info">
                                <h3 style="text-align: center!important;">
                                    
                                        <a href="single_blog.php?view=<?php echo $rowPosts['id']; ?>">
                                            <?php echo substr($rowPosts['name'], 0, 25); ?>...
                                        </a>
                                    
                                </h3>                                
                                <div class="details mtb_20">
                                    <div class="date pull-left">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <?php
                                        $time = $rowPosts['date'];
                                        $month = date('jS');
                                        $day = date('F');
                                        echo $day ." ". $month;
                                        ?>
                                    </div>
                                    <div class="more pull-right">
                                        <a href="single_blog.php?view=<?php echo $rowPosts['id']; ?>">Read more
                                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </center>
                        </div>
                            <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
                    if (!isset($_GET['cat']))
                    {
                ?>
                <div class="pagination-nav text-center mtb_20">
                    <ul>
                        <li><a href="?pageno=1">First</a></li>
                        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                        </li>
                        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                        </li>
                        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                    </ul>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    </div>
    <!-- =====  CONTAINER END  ===== -->

<?php
include "inc/footer.php";
?>
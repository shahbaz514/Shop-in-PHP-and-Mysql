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
                <?php
                $sqlBlog = mysqli_query($db, "SELECT * FROM blogs WHERE id = '".$_GET['view']."'");
                $rowBlog = mysqli_fetch_array($sqlBlog);
                $views = 0;
                $views = $rowBlog['views'] + 1;
                $upSql = mysqli_query($db, "UPDATE blogs SET views = '$views' WHERE id = '".$_GET['view']."'")
                ?>
                <!-- =====  BANNER STRAT  ===== -->
                <div class="breadcrumb ptb_20">
                    <h1>
                        <?php
                            echo substr($rowBlog['name'], 0, 30);
                        ?>
                    </h1>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="blog_page.php">Blog</a></li>
                        <li class="active">
                            <?php
                            echo substr($rowBlog['name'], 0, 30);
                            ?>
                        </li>
                    </ul>
                </div>
                <!-- =====  BREADCRUMB END===== -->
                <div class="row">
                    <div class="blog-item listing-effect col-md-12 mb_50">
                        <div class="post-format">
                            <div class="thumb post-img">
                                <video oncontextmenu="return false;" style="width: 100%; margin: 10px; padding: 10px; border: 2px groove lightcoral;" controls src="admin/videos/<?php echo $rowBlog['video']; ?>"></video>
                            </div>
                        </div>
                        <div class="post-info mtb_20 ">
                            <h2 class="mb_10">
                                <?php
                                echo $rowBlog['name'];
                                ?>
                            </h2>
                            <p>
                                <?php
                                echo $rowBlog['description'];
                                ?>
                            </p>
                        </div>
                        <div class="details mtb_20">
                            <div class="date"> <i class="fa fa-calendar" aria-hidden="true"></i>
                                <?php
                                echo $rowBlog['date'];
                                ?>
                            </div>
                        </div>
                        <?php
                        $sqlComment = mysqli_query($db, "SELECT * FROM `comments` WHERE postid = '".$_GET['view']."'");
                        $count = mysqli_num_rows($sqlComment);
                        ?>
                        <div id="comments" class="comments-area mt_50">
                            <h3 class="comment-title"><?php echo $count; ?> comments</h3>
                            <ul class="comment-list mt_30">
                                <?php
                                while ($rowComment = mysqli_fetch_array($sqlComment))
                                {
                                ?>
                                <li class="comment">
                                    <hr>
                                    <article class="comment-body mtb_30">
                                        <div class="comment-avatar">
                                            <img src="images/user1.jpg">
                                        </div>
                                        <div class="comment-main">
                                            <h5 class="author-name">
                                                <a class="comment-name"><?php echo $rowComment['name']; ?></a>
                                                <small class="comment-date"><?php echo $rowComment['date']; ?></small>
                                            </h5>
                                            <div class="comment-content mt_10" style="text-align: justify">
                                                <?php echo $rowComment['message']; ?>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <div class="leave-form">
                                <h3 class="comment-title mt_50 mb_30" id="reply-title">Leave A Comment</h3>
                                <!-- Comment Form -->
                                <div class="form-style" id="contact_form">
                                    <div id="contact_results"></div>
                                    <div class="row">
                                        <form id="contact_body" method="post" action="" enctype="multipart/form-data">
                                            <div class="col-sm-6">
                                                <input class="full-with-form" type="text" name="name" placeholder="Name" data-required="true" />
                                            </div>
                                            <div class="col-sm-6">
                                                <input class="full-with-form" type="email" name="email" placeholder="Email Address" data-required="true" />
                                            </div>
                                            <div class="col-sm-12 mt_30">
                                                <textarea class="full-with-form" name="message" placeholder="Message" data-required="true"></textarea>
                                            </div>
                                            <div class="col-sm-6">
                                                <button class="btn mt_30" type="submit" name="comment">Leave Comment</button>
                                            </div>
                                        </form>
                                        <?php
                                        if (isset($_POST['comment']))
                                        {
                                            $name = mysqli_real_escape_string($db, $_POST['name']);
                                            $email = mysqli_real_escape_string($db, $_POST['email']);
                                            $message = mysqli_real_escape_string($db, $_POST['message']);
                                            $sql = mysqli_query($db, "INSERT INTO `comments`(`name`, `email`, `message`, `postid`) VALUES ('$name', '$email', '$message', '".$_GET['view']."')");
                                            if ($sql)
                                            {
                                                echo "<script>window.open('single_blog.php?view=".$_GET['view']."','_self')</script>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- End Comment Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Single Blog  -->
    <!-- End Blog   -->
    <!-- =====  CONTAINER END  ===== -->
<?php
include "inc/footer.php";
?>
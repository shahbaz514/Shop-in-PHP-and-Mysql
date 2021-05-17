<?php
@ob_start();
@session_start();
include "db/db.php";
include "inc/top.php";
if (!isset($_SESSION['email']))
{
    header("location:login.php");
}
?>
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row ">
            <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 hidden-xs">
                <?php
                include 'inc/sidebar_user.php';
                ?>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-9 mtb_30">
                <div class="row">

                    <div class="breadcrumb ptb_20">
                        <h1>Add New Blog</h1>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Add New Blog</li>
                        </ul>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data">
                        <label for="email_address">Post Name:*</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Post Name" name="name" required>
                            </div>
                        </div>
                        <label for="email_address">Post Description:*</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea class="form-control" placeholder="Post Description" name="description" required rows="5"></textarea>
                            </div>
                        </div>
                        <label for="email_address">Post Category:*</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="category" class="form-control  show-tick" required>
                                    <option value="">-- Please select --</option>
                                    <?php
                                    $sqlCat = mysqli_query($db, "SELECT * FROM `cat_blog` ORDER BY name ASC");
                                    while ($rowCat = mysqli_fetch_array($sqlCat))
                                    {
                                        echo '<option value="'.$rowCat['id'].'">'.$rowCat['name'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <label for="email_address">Post Tags:*</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Post Tags" name="tags" required>
                            </div>
                        </div>
                        <label for="email_address">Post Keywords:*</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Post Keywords" name="keywords" required>
                            </div>
                        </div>
                        <label for="email_address">Post Video*:</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" class="form-control" name="video" accept=".mp4" required>
                            </div>
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-danger m-t-15 waves-effect" name="addPost">Add Post</button>
                    </form>


                    <?php
                    if (isset($_POST['addPost']))
                    {
                        $name = mysqli_real_escape_string($db, $_POST['name']);
                        $description = mysqli_real_escape_string($db, $_POST['description']);
                        $category = mysqli_real_escape_string($db, $_POST['category']);
                        $tags = mysqli_real_escape_string($db, $_POST['tags']);
                        $keywords = mysqli_real_escape_string($db, $_POST['keywords']);
                        $temp = explode(".", $_FILES["video"]["name"]);
                        $newfilename = rand() . microtime() . '.' . end($temp);
                        $sqlAdd = mysqli_query($db, "INSERT INTO `blogs`(`name`, `category`, `video`, `description`, `username`, `tags`, `keywords`, `status`) VALUES ('$name', '$category', '$newfilename', '$description', '".$_SESSION['email']."', '$tags', '$keywords', 'Publish')");
                        if ($sqlAdd)
                        {
                            $move = move_uploaded_file($_FILES["video"]["tmp_name"], "admin/videos/" . $newfilename);
                            echo "<script>window.open('allBlogs.php', '_self')</script>";
                        }
                        else
                        {
                            echo "<script>alert('Take An Error! Try Again')</script>";
                            echo "<script>window.open('allBlogs.php', '_self')</script>";
                        }

                    }
                    ?>
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
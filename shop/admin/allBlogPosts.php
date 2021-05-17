<?php
ob_start();
session_start();
include "../db/db.php";
if (!isset($_SESSION['username']))
{
    echo "<script>window.open('login.php','_self')</script>";
}
if (isset($_GET['del']))
{
    $sqlProDel = mysqli_query($db, "DELETE FROM `blogs` WHERE id = '".$_GET['del']."'");
    if ($sqlProDel)
    {
        echo "<script>window.open('allBlogPosts.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('Take An Erro! Try Again.')</script>";
        echo "<script>window.open('allBlogPosts.php','_self')</script>";
    }
}
if (isset($_GET['editStatus']))
{
    $proSql = mysqli_query($db, "SELECT * FROM blogs WHERE id = '".$_GET['editStatus']."'");
    $proRow = mysqli_fetch_array($proSql);
    if ($proRow['status'] == 'Publish')
    {
        $upSql = mysqli_query($db, "UPDATE `blogs` SET `status` = 'Private' WHERE id = '".$_GET['editStatus']."'");
        if ($upSql)
        {
            echo "<script>window.open('allBlogPosts.php','_self')</script>";
        }
        else
        {
            echo "<script>alert('Take An Erro! Try Again.')</script>";
            echo "<script>window.open('allBlogPosts.php','_self')</script>";
        }
    }
    else
    {
        $upSql = mysqli_query($db, "UPDATE `blogs` SET `status` = 'Publish' WHERE id = '".$_GET['editStatus']."'");
        if ($upSql)
        {
            echo "<script>window.open('allBlogPosts.php','_self')</script>";
        }
        else
        {
            echo "<script>alert('Take An Erro! Try Again.')</script>";
            echo "<script>window.open('allBlogPosts.php','_self')</script>";
        }
    }
}
include "inc/head.php";
?>
<!-- Page Loader -->
<?php
include "inc/pageLoader.php";
?>
<!-- #END# Page Loader -->
<!-- Top Bar -->
<?php
include "inc/topBar.php";
?>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <?php
        include "sideBar.php";
        ?>
    </aside>
    <!-- #END# Left Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>ALL POSTS</h2>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ALL POSTS
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
                                    <i class="material-icons" style="color: #fff0ff">add_circle</i>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="body">

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Add New Post</h4>
                                    </div>
                                    <div class="modal-body">
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
                                            $newfilename = rand() . '.' . end($temp);
                                            $sqlAdd = mysqli_query($db, "INSERT INTO `blogs`(`name`, `category`, `video`, `description`, `username`, `tags`, `keywords`, `status`) VALUES ('$name', '$category', '$newfilename', '$description', '".$_SESSION['username']."', '$tags', '$keywords', 'Publish')");
                                            if ($sqlAdd)
                                            {
                                                $move = move_uploaded_file($_FILES["video"]["tmp_name"], "videos/" . $newfilename);
                                                echo "<script>window.open('allBlogPosts.php', '_self')</script>";
                                            }
                                            else
                                            {
                                                echo "<script>alert('Take An Error! Try Again')</script>";
                                                echo "<script>window.open('allBlogPosts.php', '_self')</script>";
                                            }

                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>User Name</th>
                                    <th>Views</th>
                                    <th>Status</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>User Name</th>
                                    <th>Views</th>
                                    <th>Status</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $count = 0;
                                $sqlPro = mysqli_query($db, "SELECT * FROM `blogs`  ORDER BY id DESC");
                                while ($rowPro = mysqli_fetch_array($sqlPro))
                                {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $rowPro['name']; ?></td>
                                        <td>
                                            <?php
                                            $sqlCat = mysqli_query($db, "SELECT * FROM `cat_blog` WHERE id = '".$rowPro['category']."'");
                                            $rowCat = mysqli_fetch_array($sqlCat);
                                            ?>
                                            <?php echo $rowCat['name']; ?>
                                        </td>
                                        <td><?php echo $rowPro['username']; ?></td>
                                        <td><?php echo $rowPro['views']; ?></td>
                                        <td>
                                            <?php
                                            if ($rowPro['status'] == 'Publish')
                                            {
                                                echo '<a class="btn btn-warning" href="allBlogPosts.php?editStatus='.$rowPro['id'].'">Published</a>';
                                            }
                                            if ($rowPro['status'] == 'Private')
                                            {
                                                echo '<a class="btn btn-warning" href="allBlogPosts.php?editStatus='.$rowPro['id'].'">Private</a>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-warning" target="_blank" href="../single_blog.php?view=<?php echo $rowPro['id']; ?>"><i class="material-icons">preview</i></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-warning" href="allBlogPosts.php?del=<?php echo $rowPro['id']; ?>"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>

<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/tables/jquery-datatable.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>
</body>

</html>

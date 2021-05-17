<?php
@ob_start();
@session_start();
include "db/db.php";
include "inc/top.php";
if (!isset($_SESSION['email']))
{
    header("location:login.php");
}
if (isset($_GET['del']))
{
    $sqlProDel = mysqli_query($db, "DELETE FROM `blogs` WHERE id = '".$_GET['del']."' AND username = '".$_SESSION['email']."'");
    if ($sqlProDel)
    {
        echo "<script>window.open('allBlogs.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('Take An Erro! Try Again.')</script>";
        echo "<script>window.open('allBlogs.php','_self')</script>";
    }
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
                        <h1>All Blogs</h1>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li class="active">All Blogs</li>
                        </ul>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Views</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 0;
                            $sqlPro = mysqli_query($db, "SELECT * FROM `blogs` WHERE username = '".$_SESSION['email']."'  ORDER BY id DESC");
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
                                    <td><?php echo $rowPro['views']; ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="single_blog.php?view=<?php echo $rowPro['id']; ?>">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="allBlogs.php?del=<?php echo $rowPro['id']; ?>">
                                            <i class="fa fa-cut"></i>
                                        </a>
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
    </div>
    <!-- Single Blog  -->
    <!-- End Blog   -->
    <!-- =====  CONTAINER END  ===== -->
<?php
include "inc/footer.php";
?>
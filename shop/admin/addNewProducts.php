<?php
ob_start();
session_start();
include "../db/db.php";
if (!isset($_SESSION['username']))
{
    echo "<script>window.open('login.php','_self')</script>";
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
            <h2>Add New Products</h2>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-sm-4">
                <div class="card">
                    <div class="header">
                        <h2>
                            Select Category
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row" style="max-height: 65vh; min-height: 65vh; overflow: auto; position: relative">
                            <style>
                                .link514{
                                    display: block;
                                    border-radius: 10px;
                                    background: #000000;
                                    color: #fff0ff;
                                    text-decoration: none;
                                    text-align: center;
                                    border-radius: 10px;
                                    padding: 10px;
                                }
                                .link514:hover{
                                    text-decoration: none;
                                    color: #fff3e0;
                                }
                                /* Centered text */
                                .centered {
                                    position: absolute;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                }
                                /* Container holding the image and the text */
                                .container514 {
                                    position: relative;
                                    text-align: center;
                                    color: white;
                                }
                                /* Top right text */
                                .top-right {
                                    position: absolute;
                                    top: 8px;
                                    right: 16px;
                                    background: #0D0A0A;
                                    color: #fff0ff;
                                    border-radius: 2px;
                                    padding: 5px;
                                }
                            </style>
                        <?php
                            $sqlCat = mysqli_query($db, "SELECT * FROM `category`");
                            while ($rowCat = mysqli_fetch_array($sqlCat))
                            {
                                ?>

                                <div class="col-sm-6 media highlight">
                                    <a href="addNewProducts.php?add=<?php echo $rowCat['id']; ?>">
                                        <div class="container514">
                                            <img src="images/<?php echo $rowCat['img']?>" alt="Snow" style="width:100%; height: 90px;">
                                            <p class="link514 centered" >
                                                <?php echo substr($rowCat['name'], 0 , 40); ?>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <?php
                if (isset($_GET['add'])) {
                ?>
                <div class="card">
                    <div class="header">
                        <h2>
                            Add New Products
                        </h2>
                    </div>
                    <div class="body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <label for="email_address">Product Name:*</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control p_name" placeholder="Product Name" name="name" required>
                                </div>
                            </div>
                            <label for="email_address">Product Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea type="text" class="form-control" name="description" placeholder="Product Description" rows="5" maxlength="500" style="resize: vertical;"></textarea>
                                </div>
                            </div>
                            <label for="email_address">Price:*</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="price" placeholder="Product Price" required>
                                </div>
                            </div>
                            <label for="email_address">Sale (White in %):*</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="sale" placeholder="Sale" required>
                                </div>
                            </div>
                            <label for="email_address">Qty:*</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="qty" placeholder="Product Qty" required>
                                </div>
                            </div>
                            <label for="email_address">Tags:*</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="tags" placeholder="Product Tags" required>
                                </div>
                            </div>
                            <label for="email_address">Keywords:*</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="keywords" placeholder="Product Keywords" required>
                                </div>
                            </div>
                            <label for="email_address">Product Main Image:*</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" class="form-control" name="img" required>
                                </div>
                            </div>
                            <label for="email_address">Gallery Image 01:*</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" class="form-control" name="img1" required>
                                </div>
                            </div>
                            <label for="email_address">Gallery Image 02:*</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" class="form-control" name="img2" required>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-danger m-t-15 waves-effect" name="addProduct">Add Product</button>
                        </form>
                        <?php
                        if (isset($_POST['addProduct']))
                        {
                            $name = mysqli_real_escape_string($db, $_POST['name']);
                            $description = mysqli_real_escape_string($db, $_POST['description']);
                            $price = mysqli_real_escape_string($db, $_POST['price']);
                            $category = $_GET['add'];
                            $shape = mysqli_real_escape_string($db, $_POST['shape']);
                            $qty = mysqli_real_escape_string($db, $_POST['qty']);
                            $tags = mysqli_real_escape_string($db, $_POST['tags']);
                            $discount = mysqli_real_escape_string($db, $_POST['sale']);
                            $keywords = mysqli_real_escape_string($db, $_POST['keywords']);
                            $temp = explode(".", $_FILES["img"]["name"]);
                            $newfilename = rand() * microtime() . '.' . end($temp);
                            $temp1 = explode(".", $_FILES["img1"]["name"]);
                            $newfilename1 = rand() * microtime() . '.' . end($temp1);
                            $temp2 = explode(".", $_FILES["img2"]["name"]);
                            $newfilename2 = rand() * microtime() . '.' . end($temp2);
                            $sqlAdd1 = mysqli_query($db, "INSERT INTO `products`(`name`, `username`, `img`, `img1`, `img2`, `category`, `price`, `qty`, `discount`, `description`, `tags`, `keywords`, `status`) VALUES ('$name', '".$_SESSION['username']."', '$newfilename', '$newfilename1', '$newfilename2', '$category', '$price', '$qty', '$discount', '$description', '$tags', '$keywords', 'Publish')");
                            if ($sqlAdd1)
                            {
                                $move = move_uploaded_file($_FILES["img"]["tmp_name"], "images/" . $newfilename);
                                $move1 = move_uploaded_file($_FILES["img1"]["tmp_name"], "images/" . $newfilename1);
                                $move2 = move_uploaded_file($_FILES["img2"]["tmp_name"], "images/" . $newfilename2);
                                if ($move && $move1 && $move2)
                                {
                                    echo "<script>window.open('allProducts.php', '_self')</script>";
                                }
                            }
                            else
                            {
                                echo "<script>alert('Take An Error! Try Again')</script>";
                                echo "<script>window.open('addNewProducts.php', '_self')</script>";
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>

        <!-- #END# Exportable Table -->
    </div>
</section>

<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
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

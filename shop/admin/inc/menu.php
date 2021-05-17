<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <?php
        if ($_SESSION['role'] == 'Author')
        {
            ?>
            <li class="active">
                <a href="index.php">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="allBlogCategories.php">
                    <i class="material-icons">category</i>
                    <span>Blog Category Management</span>
                </a>
            </li>
            <li>
                <a href="allBlogPosts.php">
                    <span class="material-icons">reorder</span>
                    <span>Blog Post Management</span>
                </a>
            </li>
            <li>
                <a href="allCategories.php">
                    <i class="material-icons">category</i>
                    <span>Products Category Management</span>
                </a>
            </li>
            <li>
                <a href="allShapes.php">
                    <i class="material-icons">format_shapes</i>
                    <span>Products Shapes Management</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">list</i>
                    <span>Products Management</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="allProducts.php">All Products</a>
                    </li>
                    <li>
                        <a href="addNewProducts.php">Add New Product</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="media.php">
                    <i class="material-icons">perm_media</i>
                    <span>Medias</span>
                </a>
            </li>
            <?php
        }
        if ($_SESSION['role'] == 'Admin')
        {
            ?>
            <li class="active">
                <a href="index.php">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="inventaryManagement.php">
                    <i class="material-icons">window</i>
                    <span>Inventory Management</span>
                </a>
            </li>
            <li>
                <a href="allBlogCategories.php">
                    <i class="material-icons">category</i>
                    <span>Blog Category Management</span>
                </a>
            </li>
            <li>
                <a href="allBlogPosts.php">
                    <span class="material-icons">reorder</span>
                    <span>Blog Post Management</span>
                </a>
            </li>
            <li>
                <a href="allCategories.php">
                    <i class="material-icons">category</i>
                    <span>Products Category Management</span>
                </a>
            </li>
            <li>
                <a href="allBrands.php">
                    <i class="material-icons">category</i>
                    <span>Products Brands Management</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">list</i>
                    <span>Products Management</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="allProducts.php">All Products</a>
                    </li>
                    <li>
                        <a href="addNewProducts.php">Add New Product</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">list</i>
                    <span>Orders Management</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="allCustomersOrders.php">Customer Orders</a>
                    </li>
                    <li>
                        <a href="allAdminOrders.php">Admin Orders</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">credit_card</i>
                    <span>Bank Accounts Management</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="allAccounts.php">All Accounts</a>
                    </li>
                    <li>
                        <a href="addNewAccount.php">Add New Account</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">indeterminate_check_box</i>
                    <span>Terms And Conditions</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="allTerms.php">All Terms And Conditions</a>
                    </li>
                    <li>
                        <a href="addNewTerms.php">Add New Term And Condition</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">groups</i>
                    <span>Users Management</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="allUsers.php">All Users</a>
                    </li>
                    <li>
                        <a href="addNewUser.php">Add New User</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="importProducts.php">
                    <i class="material-icons">import_export</i>
                    <span>Import Products</span>
                </a>
            </li>
            <li>
                <a href="media.php">
                    <i class="material-icons">perm_media</i>
                    <span>Medias</span>
                </a>
            </li>
            <?php
        }
        ?>


    </ul>
</div>
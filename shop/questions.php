<?php
@ob_start();
@session_start();
include "db/db.php";
include "inc/top.php";
?>
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row ">
            <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 ">
                <?php
                include "inc/left_sidebar_category_page.php";
                ?>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-9 mtb_30">

                <style type="text/css">
                    .btn-info{
                        margin-top: 20px;
                    }
                </style>

                <?php
                if (isset($_GET['option']) && isset($_GET['id'])) {
                    if ($_GET['option'] == 'A') {
                        $sqlShapes = mysqli_query($db, "SELECT * FROM questions WHERE op1 = '".$_GET['id']."'");
                    }
                    else if ($_GET['option'] == 'B') {
                        $sqlShapes = mysqli_query($db, "SELECT * FROM questions WHERE op2 = '".$_GET['id']."'");
                    }
                    else
                    {
                        $sqlShapes = mysqli_query($db, "SELECT * FROM questions WHERE op3 = '".$_GET['id']."'");
                    }
                    while ($rowShapes = mysqli_fetch_array($sqlShapes)) 
                    {
                        if ($rowShapes['o3'] == 'NAN') {

                        ?>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img style="width: 100%;" src="images/Q/<?php echo($rowShapes['img']) ?>">
                                </div>
                                <div class="col-xs-6">
                                    <center>
                                        <?php
                                            if ($rowShapes['o1'] == '') {
                                                ?>
                                                <a class="btn btn-info" href="questions.php?option=A&&id=<?php echo($rowShapes['id']) ?>">A</a>
                                                <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <a class="btn btn-info" href="category_page.php?tag=<?php echo($rowShapes['o1']) ?>">A</a>
                                            <?php
                                            }
                                        ?>
                                    </center>
                                </div>
                                <div class="col-xs-6">
                                    <center>
                                        <?php
                                            if ($rowShapes['o2'] == '') {
                                                ?>
                                                <a class="btn btn-info" href="questions.php?option=B&&id=<?php echo($rowShapes['id']) ?>">B</a>
                                                <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <a class="btn btn-info" href="category_page.php?tag=<?php echo($rowShapes['o2']) ?>">B</a>
                                            <?php
                                            }
                                        ?>
                                    </center>
                                </div>
                            </div>
                        <?php
                        }
                        else
                        {
                        ?>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img style="width: 100%;" src="images/Q/<?php echo($rowShapes['img']) ?>">
                                </div>
                                <div class="col-xs-4">
                                    <center>
                                        <?php
                                            if ($rowShapes['o1'] == '') {
                                                ?>
                                                <a class="btn btn-info" href="questions.php?option=A&&id=<?php echo($rowShapes['id']) ?>">A</a>
                                                <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <a class="btn btn-info" href="category_page.php?tag=<?php echo($rowShapes['o1']) ?>">A</a>
                                            <?php
                                            }
                                        ?>
                                    </center>
                                </div>
                                <div class="col-xs-4">
                                    <center>
                                        <?php
                                            if ($rowShapes['o2'] == '') {
                                                ?>
                                                <a class="btn btn-info" href="questions.php?option=B&&id=<?php echo($rowShapes['id']) ?>">B</a>
                                                <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <a class="btn btn-info" href="category_page.php?tag=<?php echo($rowShapes['o2']) ?>">B</a>
                                            <?php
                                            }
                                        ?>
                                    </center>
                                </div>
                                <div class="col-xs-4">
                                    <center>
                                        <?php
                                        if ($rowShapes['o3'] == '') {
                                                ?>
                                                <a class="btn btn-info" href="questions.php?option=C&&id=<?php echo($rowShapes['id']) ?>">C</a>
                                                <?php
                                            } 
                                            else
                                            {
                                            ?>
                                            <a class="btn btn-info" href="category_page.php?tag=<?php echo($rowShapes['o3']) ?>">C</a>
                                            <?php
                                            }
                                        ?>
                                    </center>
                                </div>
                            </div>
                        <?php
                        }
                    }
                }
                else
                {
                $sqlShapes = mysqli_query($db, "SELECT * FROM questions WHERE op1 = '' AND op2 = '' AND op3 = ''");
                $row = mysqli_fetch_array($sqlShapes);
                ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <img style="width: 100%;" src="images/Q/<?php echo($row['img']) ?>">
                        </div>
                        <div class="col-xs-4">
                            <center>
                                <a class="btn btn-info" href="questions.php?option=A&&id=<?php echo($row['id']) ?>">A</a>
                            </center>
                        </div>
                        <div class="col-xs-4">
                            <center>
                                <a class="btn btn-info" href="questions.php?option=B&&id=<?php echo($row['id']) ?>">B</a>
                            </center>
                        </div>
                        <div class="col-xs-4">
                            <center>
                                <a class="btn btn-info" href="questions.php?option=C&&id=<?php echo($row['id']) ?>">C</a>
                            </center>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>

    </div>
    <!-- =====  CONTAINER END  ===== -->

<?php
include "inc/footer.php";
?>
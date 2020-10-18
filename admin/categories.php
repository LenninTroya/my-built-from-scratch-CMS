<?php
include "includes/admin_header.php";
?>


<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php
    include "includes/admin_navigation.php";
    ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome,
                        <small>Author Name</small>
                    </h1>

                    <div class="col-xs-6">
                        <?php
                        if(isset($_POST["submit"])){
                            $cat_title = $_POST["cat_title"];

                            if($cat_title == "" || empty($cat_title)){
                                echo "This field should not be empty";
                            }else{

                                $query = "INSERT INTO category(cat_title)";
                                $query .= "VALUE('$cat_title')";

                                $create_category_query = mysqli_query($connection, $query);

                                if(!$create_category_query){
                                    die('QUERY FAILED' . mysqli_error($connection));
                                }
                            }


                        }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Category Name</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>

                        </form>
                    </div>

                    <div class="col-xs-6">

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM category";
                                $select_categories_sidebar = mysqli_query($connection, $query);

                                while ($result = mysqli_fetch_assoc($select_categories_sidebar)) {
                                    $cat_title = $result["cat_title"];
                                    $cat_id = $result["cat_id"];
                                    echo "<tr>"."<td>{$cat_id}</td>
                                          <td>{$cat_title}</td>"."</tr>";

                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php
    include "includes/admin_footer.php";
    ?>

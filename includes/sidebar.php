<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <form action="search.php" method="post">
        <div class="well">
            <h4>Blog Search</h4>
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
            </div>
    </form>
    <!-- /.input-group -->
</div>


<div class='well'>
    <h4>Blog Categories</h4>
    <div class='row'>
        <div class='col-lg-12'>
            <ul class='list-unstyled'>
                <!-- Blog Categories Well -->
                <?php
                $query = "SELECT * FROM category";
                $select_categories_sidebar = mysqli_query($connection, $query);

                while ($result = mysqli_fetch_assoc($select_categories_sidebar)) {
                    $cat_title = $result["cat_title"];
                    echo "<li><a href='#'>{$cat_title}</a></li>";

                }
                ?>
            </ul>
        </div>
    </div>


    <!-- Side Widget Well -->
    <?php
    include "widget.php";
    ?>

</div>

</div>

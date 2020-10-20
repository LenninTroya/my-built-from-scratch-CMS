<?php

function create_category()
{
    global $connection;
    if (isset($_POST["submit"])) {
        $cat_title = $_POST["cat_title"];

        if ($cat_title == "" || empty($cat_title)) {
            echo "This field should not be empty";
        } else {

            $query = "INSERT INTO category(cat_title)";
            $query .= "VALUE('$cat_title')";

            $create_category_query = mysqli_query($connection, $query);

            if (!$create_category_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
        }


    }
}

function update_category()
{
    global $connection;
    if (isset($_GET["edit"])) {
        $edit_cat_id = $_GET["edit"];

        if (isset($_POST["update"])) {
            $cat_title = $_POST["cat_title"];
            if ($cat_title == "" || empty($cat_title)) {
                echo "<div> This field should not be empty </div>";
            } else {
                $edit_cat_query = "UPDATE category SET cat_title = '{$cat_title}' WHERE cat_id LIKE '{$edit_cat_id}'";
                $edit_cat_db = mysqli_query($connection, $edit_cat_query);
                header("Location: categories.php");
            }
        }

        $display_cat_query = "SELECT * FROM category WHERE cat_id LIKE '{$edit_cat_id}'";
        $select_categories_update = mysqli_query($connection, $display_cat_query);


        while ($result = mysqli_fetch_assoc($select_categories_update)) {
            $cat_title = $result["cat_title"];


            echo "<input class='form-control' type='text' name='cat_title' value='{$cat_title}'>";
        }
    }

}

?>

<?php

function delete_category()
{
    global $connection;

    $query = "SELECT * FROM category";
    $select_categories_sidebar = mysqli_query($connection, $query);

    while ($result = mysqli_fetch_assoc($select_categories_sidebar)) {
        $cat_title = $result["cat_title"];
        $cat_id = $result["cat_id"];
        echo "<tr>";
        echo "<td>{$cat_id}</td>
                                          <td>{$cat_title}</td>
                                          <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
                                          <td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";

    }
    ?>

    <?php
    if (isset($_GET["delete"])) {
        $delete_cat_id = $_GET["delete"];
        $delete_cat_query = "DELETE FROM category WHERE cat_id LIKE {$delete_cat_id}";
        $delete_cat_query_db = mysqli_query($connection, $delete_cat_query);
        header("Location: categories.php");
    }
}

?>



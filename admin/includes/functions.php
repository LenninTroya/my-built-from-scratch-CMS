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

    if (isset($_GET["delete"])) {
        $delete_cat_id = $_GET["delete"];
        $delete_cat_query = "DELETE FROM category WHERE cat_id LIKE {$delete_cat_id}";
        $delete_cat_query_db = mysqli_query($connection, $delete_cat_query);
        header("Location: categories.php");
    }
}

?>

<?php
function display_categories()
{
    global $connection;

    $query = "SELECT * FROM category";
    $select_categories_admin = mysqli_query($connection, $query);

    while ($result = mysqli_fetch_assoc($select_categories_admin)) {
        $cat_title = $result["cat_title"];
        $cat_id = $result["cat_id"];
        echo "<tr>";
        echo "<td>{$cat_id}</td>
                                          <td>{$cat_title}</td>
                                          <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
                                          <td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";

    }
}

?>


<?php
function display_posts()
{
    global $connection;

    $query = "SELECT * FROM post";
    $select_posts_admin = mysqli_query($connection, $query);

    while ($result = mysqli_fetch_assoc($select_posts_admin)) {
        $post_title = $result["post_title"];
        $post_id = $result["post_id"];
        $post_author = $result["post_author"];
        $post_date = $result["post_date"];
        $post_image = $result["post_image"];
        $post_tags = $result["post_tags"];
        $post_status = $result["post_status"];
        $post_category = $result["post_cat_id"];
        $post_comments = $result["post_comment_count"];

        echo "<tr>";
        echo "<td>{$post_id}</td>
              <td>{$post_author}</td>
              <td>{$post_title}</td>
              <td>{$post_category}</td>
              <td>{$post_status}</td>
              <td><img width='100' src='../images/{$post_image}'></td>
              <td>{$post_tags}</td>
              <td>{$post_comments}</td>
              <td>{$post_date}</td>
              <td><a href='categories.php?delete={$post_id}'>Delete</a></td>
              <td><a href='categories.php?edit={$post_id}'>Edit</a></td>";
        echo "</tr>";

    }
}

?>



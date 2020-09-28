<?php
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";
?>

    <!-- Page Content -->
    <div class="container">

    <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
    <h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
    </h1>
    <!-- Blog Posts -->
    <?php
    $query = "SELECT * FROM post";
    $select_all_posts_query = mysqli_query($connection, $query);

    while ($result = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_title = $result["post_title"];
        $post_author = $result["post_author"];
        $post_date = $result["post_date"];
        $post_image = $result["post_image"];
        $post_content = $result["post_content"];

        echo "<h2>
            <a href='#'>{$post_title}</a>
        </h2>
        <p class='lead'>
            by <a href='index.php'>{$post_author}</a>
        </p>
        <p><span class='glyphicon glyphicon-time'></span>{$post_date}</p>
        <hr>
        <img class='img-responsive' src='images/{$post_image}' alt=''>
        <hr>
        <p>{$post_content}</p>
        <a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>

        <hr>

    ";

    }
    ?>
    </div>





    <?php include "includes/sidebar.php"; ?>
    <!-- /.row -->

    <hr>
<?php include "includes/footer.php"; ?>
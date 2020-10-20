<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Category Name</label>

        <?php
        update_category();
        ?>

    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="Update Category Name">
    </div>

</form>
<?php
    $obj_adminback = new adminback();
    if(isset($_POST["ctg_btn"])){
     $masret = $obj_adminback->add_category($_POST);
    }
?>
<form action="" method="post">
    <h2>ADD CATEGORY</h2>
    <div class="mt-4 mb-3">
        <label for="ctg_name" class="form-label">Category Name</label>
        <input type="text" class="form-control" name="ctg_name">
    </div>
    <div class="mb-3">
        <label for="ctg_dis" class="form-label">Category Discription</label>
        <input type="text" class="form-control" name="ctg_dis">
    </div>
    <div class="mb-3">
        <label for="ctg_status" class="form-label">Category Status</label>
        <select class="form-control" name="ctg_status">
        <option value="1">Published</option>
        <option value="0">Unpublished</option>
    </select>
    </div>
    <input type="submit" value="Add Cetagory" name="ctg_btn" class="btn btn-primary mt-4">
</form>
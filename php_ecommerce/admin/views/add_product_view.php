<?php
    $obj_adminback = new adminback();
    $ctg_ingo = $obj_adminback-> display_category();
    if(isset($_POST["ptd_btn"])){
        $return_mass = $obj_adminback->add_product($_POST,$_FILES);
    }
?>
<h2>ADD Product</h2>
<?php
    if(isset($return_mass)){
        echo $return_mass;
    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mt-4 mb-3">
        <label for="ptd_name" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="ptd_name">
    </div>
    <div class="mt-4 mb-3">
        <label for="ptd_price" class="form-label">Product price</label>
        <input type="number" class="form-control" name="ptd_price">
    </div>
    <div class="mt-4 mb-3">
        <label for="ptd_des" class="form-label">Product Description</label>
        <textarea name="ptd_des" class="form-control" rows="3" id=""></textarea>
    </div>
    <div class="mt-4 mb-3">
        <label for="pdt_ctg" class="form-label">Product Catagory</label>
        <select name="pdt_ctg" class="form-control">
            <option>Select Catagory</option>
            <?php
                while($ctg=mysqli_fetch_assoc($ctg_ingo)){
                    if($ctg["ctg_status"]==1){
            ?>
                <option value="<?= $ctg["ctg_name"]?>"><?= $ctg["ctg_name"]?></option>
            <?php }}?>
        </select>
    </div>
    <div class="mt-4 mb-3">
        <label for="ptd_img" class="form-label">Product Image</label>
        <input type="file" class="form-control" name="ptd_img">
    </div>
    <div class="mb-3">
        <label for="ptd_status" class="form-label">Product Status</label>
        <select class="form-control" name="ptd_status">
        <option value="1">Published</option>
        <option value="0">Unpublished</option>
    </select>
    </div>
    <input type="submit" value="Add product" class="btn btn-primary btn-block" name="ptd_btn">
</form>
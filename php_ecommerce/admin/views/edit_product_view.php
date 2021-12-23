<?php
    $obj_adminback = new adminback();
    $ctg_ingo = $obj_adminback-> display_category();
    if(isset($_GET["update"])){
        $fatch_data = $obj_adminback->updateproduct($_GET);
     }
     if(isset($_POST["uptd_btn"])&&isset($_FILES["uptd_img"])){
       $returnmass = $obj_adminback-> update_form_data($_POST,$_FILES);
     }
     if(isset($returnmass)){
        echo $returnmass;
     }
?>
<h2>Update Product</h2>
<form action="" method="post" enctype="multipart/form-data">
     <input type="hidden" name="upid" value="<?= $fatch_data["pdt_id"]?>">
    <div class="mt-4 mb-3">
        <label for="uptd_name" class="form-label">Product Name</label>
        <input type="text" value="<?= $fatch_data["pdt_name"]?>" class="form-control" name="uptd_name">
    </div>
    <div class="mt-4 mb-3">
        <label for="uptd_price" class="form-label">Product price</label>
        <input type="number" class="form-control" value="<?= $fatch_data["pdt_price"]?>" name="uptd_price">
    </div>
    <div class="mt-4 mb-3">
        <label for="uptd_des" class="form-label">Product Description</label>
        <input type="text" name="uptd_des" class="form-control" value="<?= $fatch_data["pdt_des"]?>" rows="3" id="">
    </div>
    <div class="mt-4 mb-3">
        <label for="updt_ctg" class="form-label">Product Catagory</label>
        <select name="updt_ctg" class="form-control">
            <option>Select Catagory</option>
            <?php
                while($ctg=mysqli_fetch_assoc($ctg_ingo)){
            ?>
                <option value="<?= $ctg["ctg_name"]?>"><?= $ctg["ctg_name"]?></option>
            <?php }?>
        </select>
    </div>
    <div class="mt-4 mb-3">
        <label for="uptd_img" class="form-label">Product Image</label>
        <input type="file" class="form-control" name="uptd_img">
    </div>
    <input type="submit" value="Update product" class="btn btn-primary btn-block" name="uptd_btn">
</form>
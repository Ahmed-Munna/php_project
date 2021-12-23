<?php
    $obj_adminback = new adminback();
    if(isset($_GET["update"])){
        $reback = $obj_adminback->edit_ctg_display($_GET);
    }
?>
<form action="" method="post">
    <h2>EDIT CATEGORY</h2>
    <input type="hidden" value="<?= $_GET["update"]?>" name="uid" id="">
    <div class="mt-4 mb-3">
        <label for="uctg_name" class="form-label">Category Name</label>
        <input type="text" class="form-control" value="<?= $reback["ctg_name"]?>" name="uctg_name">
    </div>
    <div class="mb-3">
        <label for="uctg_dis" class="form-label">Category Discription</label>
        <input type="text" class="form-control" value="<?= $reback["ctg_dis"]?>" name="uctg_dis">
    </div>
    <input type="submit" value="Update Cetagory" name="uctg_btn" class="btn btn-primary mt-4">
</form>
<?php
    if(isset($_POST["uctg_btn"])){
       echo $obj_adminback->ctg_update($_POST);
    }
?>
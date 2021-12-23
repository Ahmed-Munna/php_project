<?php
    $obj_adminback = new adminback();
    $return_product = $obj_adminback->show_product();
    if(isset($_GET["delete"])){
        $obj_adminback->delete_product($_GET);
    }
    if(isset($_GET["setun"])){
        $obj_adminback->setunpublic($_GET);
    }
    if(isset($_GET["setpub"])){
        $obj_adminback->setpublic($_GET);
    }
?>
<h2>Manage Category</h2>
<table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">Sl NO</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Description</th>
      <th scope="col">Product Category</th>
      <th scope="col">Product Status</th>
      <th scope="col">Product Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
        $x=1;
        while($fac = mysqli_fetch_assoc($return_product)){

      ?>
        <tr>
        <td><?= $x?></td>
        <td><?= $fac["pdt_name"]?></td>
        <td><?= $fac["pdt_price"]?></td>
        <td><?= $fac["pdt_des"]?></td>
        <td><?= $fac["pdt_cat"]?></td>
        <td><?php 
            if($fac["pdt_status"]==1){
                echo "Published"; ?>
                <a href="?setun=<?= $fac["pdt_id"]?>" class="btn btn-sm btn-danger">Set Unpublished</a>
            <?php
                }else{
                    echo "Unpublished";
                    ?>
                <a href="?setpub=<?= $fac["pdt_id"]?>" class="btn btn-sm btn-success">Set Published</a>
            <?php
                }
        ?></td>
        <td><img src="upload/<?= $fac["pdt_img"]?>" alt="" style="height: 100px;width: 100px;"></td>
        <td>
            <a href="edit_product.php?update=<?= $fac["pdt_id"]?>" class="btn btn-sm btn-primary">Update</a>
            <a href="?delete=<?= $fac["pdt_id"]?>" class="btn btn-sm btn-danger">Delete</a>
        </td>
        </tr>
    <?php $x++; }?>
  </tbody>
</table>
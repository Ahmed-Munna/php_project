<?php
    $obj_adminback = new adminback();
    $ctg_data = $obj_adminback->display_category();
    if(isset($_GET["pub_ctg"])){
        $obj_adminback->publish_ctg($_GET);
    }
    if(isset($_GET["unpub_ctg"])){
        $obj_adminback->unpublish_ctg($_GET);
    }
?>
<h2>Manege Category</h2>
    <table class="table table-striped mt-5">
        <thead>
            <tr>
            <th scope="col">SL NO</th>
            <th scope="col">Category Name</th>
            <th scope="col">Discription</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i=1;
                while($data = mysqli_fetch_assoc($ctg_data)){
            ?>
                <tr>
                    <td><?= $i?></td>
                    <td><?= $data["ctg_name"]?></td>
                    <td><?= $data["ctg_dis"]?></td>
                    <td><?php if($data["ctg_status"]==0){
                        echo "Unpublished";?>
                        <a href="?pub_ctg=<?= $data['ctg_id']?>" class="btn btn-sm btn-success">Set Published</a>
                <?php
                    }else{
                        echo "Published";?>
                        <a href="?unpub_ctg=<?= $data['ctg_id']?>" class="btn btn-sm btn-danger">Set Unpblished</a>
                <?php   
                    }?></td>
                    <td>
                        <a class="btn btn-small btn-primary" href="edit_category.php?update=<?php echo $data['ctg_id']?>">update</a>
                        <a class="btn btn-small btn-danger" href="?delete=<?php echo $data['ctg_id']?>">Delete</a>
                    </td>
                </tr>
            <?php $i++; } ?>
            <?php
                if(isset($_GET["delete"])){
                    $obj_adminback->ctg_delete($_GET);
                }
            ?>
        </tbody>
    </table>
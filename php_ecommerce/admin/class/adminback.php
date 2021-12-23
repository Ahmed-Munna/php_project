<?php
    ob_start();
    class adminback{
        private $conn;
        public function __construct(){
            $dbhost = "localhost";
            $bduser = "root";
            $dbpass = "";
            $dbname = "ecommerce";
            $this->conn = mysqli_connect($dbhost,$bduser,$dbpass,$dbname);
            if(!$this->conn){
                die("Database Connect error!");
            }
        }
        public function admin_login($data){
            $admin_email = $data["email"];
            $admin_pass  = $data["pass"];
            $query = "SELECT * FROM `adminlog` WHERE `email`='$admin_email' AND `pass`='$admin_pass'";
            $addQuery = mysqli_query($this->conn,$query);
            if($addQuery){
                $admin_info = mysqli_fetch_assoc($addQuery);
                if($admin_info){
                    header("location:dashboard.php");
                    session_start();
                    $_SESSION["id"] = $admin_info["id"];
                    $_SESSION["email"] = $admin_info["email"];
                    $_SESSION["pass"] = $admin_info["pass"];
                }else {
                    $errmass = "Your username and password is not incorrect";
                    return $errmass;
                }
            }
        }
        public function admin_logout(){
            unset($_SESSION["id"]);
            unset($_SESSION["email"]);
            unset($_SESSION["pass"]);
            header("location:index.php");
        }
        public function add_category($data){
            $ctg_name = $data["ctg_name"];
            $ctg_dis = $data["ctg_dis"];
            $ctg_status = $data["ctg_status"];
            $query = "INSERT INTO `category`(`ctg_name`, `ctg_dis`, `ctg_status`) VALUES ('$ctg_name','$ctg_dis',$ctg_status)";
            if(mysqli_query($this->conn,$query)){
                echo "Category Added Successfully.";
            }else {
                    echo "Category Added Unsuccessfully";           
            }
        }
        public function display_category(){
            $query = "SELECT * FROM `category`";
            if(mysqli_query($this->conn,$query)){
                $return_ctg = mysqli_query($this->conn,$query);
                return $return_ctg;
            }
        }
        public function publish_ctg($data){
            $data = $data["pub_ctg"];
            $query = "UPDATE `category` SET `ctg_status`=1 WHERE `ctg_id`=$data";
            if(mysqli_query($this->conn,$query)){
                header('location:manage_catagory.php');
                $mass = "Unpublished Successfully";
                return $mass;
            }
        }
        public function unpublish_ctg($data){
            $data = $data["unpub_ctg"];
            $query = "UPDATE `category` SET `ctg_status`=0 WHERE `ctg_id`=$data";
            if(mysqli_query($this->conn,$query)){
                header('location:manage_catagory.php');
                $mass = "Unpublished Successfully";
                return $mass;
            }
        }
        public function ctg_delete($id){
            $id = $id["delete"];
            $query = "DELETE FROM `category` WHERE `ctg_id`=$id";
            mysqli_query($this->conn,$query);
            header("location:manage_catagory.php");
        }
        public function edit_ctg_display($id){
            $id = $id["update"];
            $query = "SELECT * FROM `category` WHERE `ctg_id`=$id";
            $ctg_con = mysqli_query($this->conn,$query);
            $return_ctg = mysqli_fetch_assoc($ctg_con);
            return $return_ctg;
        }
        public function ctg_update($data){
            $data_id        =       $data["uid"];
            $data_name      =       $data["uctg_name"];
            $data_dis       =       $data["uctg_dis"];
            $query = "UPDATE `category` SET `ctg_name`='$data_name',`ctg_dis`='$data_dis' WHERE `ctg_id`=$data_id";
            mysqli_query($this->conn,$query);
            header('location:manage_catagory.php');
        }
        public function add_product($data,$imgd){
            $pdt_name = $data["ptd_name"];
            $pdt_price = $data["ptd_price"];
            $pdt_des = $data["ptd_des"];
            $pdt_cat = $data["pdt_ctg"];
            $pdt_status = $data["ptd_status"];
            $pdt_img_name = date("Y-m-d-j-i-s").rand(999,999999999).$imgd["ptd_img"]["name"];
            $pdt_img_tmp_name = $imgd["ptd_img"]["tmp_name"];
            $pdt_img_size = $imgd["ptd_img"]["size"];
            $pdt_ext = pathinfo($pdt_img_name,PATHINFO_EXTENSION);
            if($pdt_ext=='jpg' or $pdt_ext=='jpeg' or $pdt_ext=='png'){
                if($pdt_img_size<=2097152){
                    $query = "INSERT INTO `product`(`pdt_name`, `pdt_price`, `pdt_des`, `pdt_cat`, `pdt_status`,`pdt_img`) VALUES ('$pdt_name',$pdt_price,'$pdt_des','$pdt_cat',$pdt_status,'$pdt_img_name')";
                    if(mysqli_query($this->conn,$query)){
                        move_uploaded_file($pdt_img_tmp_name,'upload/'.$pdt_img_name);
                        $mass = "Product uploaded successfully";
                        return $mass;
                    }
                }else{
                    $mass = "Your image size must be 2mb or less then 2mb";
                    return $mass;
                }
            }else{
                $mass = "This file are not supported";
                return $mass;
            }
        }
        public function show_product(){
            $query = "SELECT * FROM `product`";
            if(mysqli_query($this->conn,$query)){
                $product_con = mysqli_query($this->conn,$query);
                return $product_con;
            }
        }
        public function delete_product($data){
            $delete = $data["delete"];
            $query = "DELETE FROM `product` WHERE `pdt_id`=$delete";
            if(mysqli_query($this->conn,$query)){
                header('location:manage_prouct.php');
                $mass = "Delete Successfully";
                return $mass;
            }
        }
        public function setunpublic($data){
            $data = $data["setun"];
            $query = "UPDATE `product` SET `pdt_status`=0 WHERE `pdt_id`=$data";
            if(mysqli_query($this->conn,$query)){
                header('location:manage_prouct.php');
                $mass = "Unpublished Successfully";
                return $mass;
            }
        }
        public function setpublic($data){
            $data = $data["setpub"];
            $query = "UPDATE `product` SET `pdt_status`=1 WHERE `pdt_id`=$data";
            if(mysqli_query($this->conn,$query)){
                header('location:manage_prouct.php');
                $mass = "Unpublished Successfully";
                return $mass;
            }
        }
        public function updateproduct($data){
            $data = $data["update"];
            $query = "SELECT * FROM `product` WHERE `pdt_id`=$data";
            $productinfo = mysqli_query($this->conn,$query);
            $pdt_data = mysqli_fetch_assoc($productinfo);
            return $pdt_data;
        }
        public function update_form_data($data,$imgd){
            $pdt_id = $data["upid"];
            $pdt_name = $data["uptd_name"];
            $pdt_price = $data["uptd_price"];
            $pdt_des = $data["uptd_des"];
            $pdt_cat = $data["updt_ctg"];
            $pdt_img_name = date("Y-m-d-j-i-s").rand(999,999999999).$imgd["uptd_img"]["name"];
            $pdt_img_tmp_name = $imgd["uptd_img"]["tmp_name"];
            $pdt_img_size = $imgd["uptd_img"]["size"];
            $pdt_ext = pathinfo($pdt_img_name,PATHINFO_EXTENSION);
            if($pdt_ext=='jpg' or $pdt_ext=='jpeg' or $pdt_ext=='png'){
                if($pdt_img_size<=2097152){
                    $query = "UPDATE `product` SET `pdt_name`='$pdt_name',`pdt_price`=$pdt_price,`pdt_des`='$pdt_des',`pdt_cat`='$pdt_cat',`pdt_img`='$pdt_img_name' WHERE `pdt_id`=$pdt_id";
                    if(mysqli_query($this->conn,$query)){
                        move_uploaded_file($pdt_img_tmp_name,'upload/'.$pdt_img_name);
                        header('location:manage_prouct.php');
                        $mass = "Product uploaded successfully";
                        return $mass;
                    }
                }else{
                    $mass = "Your image size must be 2mb or less then 2mb";
                    return $mass;
                }
            }else{
                $mass = "This file are not supported";
                return $mass;
            }
        }
        public function product_by_ctg($ctg_name){
            $ctg_name=$ctg_name["catView"];
            $query = "SELECT * FROM `product` WHERE `pdt_cat`='$ctg_name'";
            if(mysqli_query($this->conn,$query)){
                $proinfo = mysqli_query($this->conn,$query);
                return $proinfo;
            }
        }
        public function product_by_id($pdt_id){
            $pdt_id=$pdt_id["single_product"];
            $query = "SELECT * FROM `product` WHERE `pdt_id`=$pdt_id";
            if(mysqli_query($this->conn,$query)){
                $proinfo = mysqli_query($this->conn,$query);
                return $proinfo;
            }
        }
        public function related_pro($data){
            $query = "SELECT * FROM `product` WHERE  `pdt_cat`='$data'";
            if(mysqli_query($this->conn,$query)){
                $related_info = mysqli_query($this->conn,$query);
                return $related_info;
            }
        }
    }
?>
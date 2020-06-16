<?php
    require_once("./entities/product.class.php");
    require_once("./entities/category.class.php");
    require_once("./config/db.class.php");

    if(isset($_POST["btnsubmit"])){
        $productName = $_POST["txtName"];
        $cateID = $_POST["txtID"];
        $price = $_POST["txtprice"];
        $quantity = $_POST["txtquantity"];
        $description = $_POST["txtdesc"];
        $picture = $_FILES["txtpic"];

        $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture);
        $result = $newProduct->delete();
        if(!$result){
            header("Location: delete_product.php?failture");
        }else{
            header("Location: delete_product.php?inserted");
        }
    }

    $db = new Db();
    $sql = "SELECT * FROM category";
    $categories = $db->select_to_array($sql);
?>

<?php include_once("header.php");?>



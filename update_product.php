<?php
    require_once("./entities/product.class.php");
    require_once("./entities/category.class.php");
    require_once("./config/db.class.php");

    // if(isset($_GET["id"])){
    //     header('Location: not_found.php');
    // }
    // else{
    //     $id = $_GET["id"];
    //     $prods = Product::get_product($id);
    //     $prods = $prod[0];
    // }

    if(isset($_POST["btnsubmit"])){
        $productName = $_POST["txtName"];
        $cateID = $_POST["txtID"];
        $price = $_POST["txtprice"];
        $quantity = $_POST["txtquantity"];
        $description = $_POST["txtdesc"];
        $picture = $_FILES["txtpic"];

        $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture);
        $result = $newProduct->update();
        if(!$result){
            header("Location: add_product.php?failture");
        }else{
            header("Location: add_product.php?updated");
        }
    }

    $db = new Db();
    $sql = "SELECT * FROM category";
    $categories = $db->select_to_array($sql);
?>

<?php $url = $_SERVER['HTTP_HOST']?>
<?php include_once("header.php");?>

<center>
    <form action="" method="POST" enctype="multipart/form-data" style="width:800px">
        <?php
            if(isset($_GET["updated"])){
        ?>
            <div class="alert alert-success" style="margin-top:10px">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Cập nhật sản phẩm thành công!
            </div>
        <?php } ?>

        <?php
            if(isset($_GET["failture"])){
        ?>
            <div class="alert alert-danger" style="margin-top:10px">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Cập nhật sản phẩm thất bại!
            </div>
        <?php } ?>
        
        <div class="lbltitle">
            <h3 style="text-align:center; font-weight:bold; padding-bottom:20px; padding-top:10px">CẬP NHẬT SẢN PHẨM</h3>
        </div>

        <div class="row">
            <div style="padding-top:5px; text-align:left" class="col-sm-3 lbltitle">
                <label>Tên sản phẩm</label>
            </div>
            <div style="padding-bottom:10px" class="col-sm-9 lblinput">
                <input class="form-control" type="text" name="txtName" value="<?php echo isset($_POST["txtName"])? $_POST["txtName"] :"" ?>">
            </div>
        </div>

        <div class="row">
            <div style="padding-top:5px; text-align:left" class="col-sm-3 lbltitle">
                <label>Danh mục sản phẩm</label>
            </div>
            <div style="padding-bottom:10px" class="col-sm-9 lblinput">
                <select class="form-control"  name="txtID">
                    <option values = "" selected>----Chọn loại----</option>
                    <?php
                    foreach($categories as $category){
                    ?>
                        <option value="<?php echo $category["CateID"]?>"><?php echo $category["CategoryName"]?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div style="padding-top:5px; text-align:left" class="col-sm-3 lbltitle">
                <label>Mô tả sản phẩm</label>
            </div>
            <div style="padding-bottom:10px" class="col-sm-9 lblinput">
                <textarea class="form-control"  name="txtdesc" rows="5" ><?php echo isset($_POST["txtdesc"])? $_POST["txtdesc"] :"" ?></textarea>
            </div>
        </div>

        <div class="row">
            <div style="padding-top:5px; text-align:left" class="col-sm-3 lbltitle">
                <label>Giá sản phẩm</label>
            </div>
            <div style="padding-bottom:10px" class="col-sm-9 lblinput">
                <input class="form-control"  type="number" name="txtprice" value="<?php echo isset($_POST["txtprice"])? $_POST["txtprice"] :"" ?>">
            </div>
        </div>

        <div class="row">
            <div style="padding-top:5px; text-align:left" class="col-sm-3 lbltitle">
                <label>Số lượng sản phẩm</label>
            </div>
            <div style="padding-bottom:10px" class="col-sm-9 lblinput">
                <input class="form-control"  type="number" name="txtquantity" value="<?php echo isset($_POST["txtquantity"])? $_POST["txtquantity"] :"" ?>">
            </div>
        </div>

        <div class="row">
            <div style="padding-top:5px; text-align:left" class="col-sm-3 lbltitle">
                <label>Hình ảnh sản phẩm</label>
            </div>
            <div style="padding-bottom:10px" class="col-sm-9 lblinput">
                <input class="form-control" id="txtpic"  type="file" name="txtpic" accept=".PNG,.GIF,.JPG">
            </div>
        </div>
       
        <div class="submit" style="margin-top:10px; margin-bottom: 10px">
            <button class="btn btn-danger" type="submit" name="btnsubmit">Cập nhật</button>
        </div>
    </form>
</center>

<?php include_once("footer.php");?>
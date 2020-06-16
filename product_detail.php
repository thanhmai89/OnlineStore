<?php
 require_once("./entities/product.class.php");
 require_once("./entities/category.class.php");
?>

<?php
    include_once("header.php");

    if(!isset($_GET["id"])){
        header('Location: not_found.php');
    }else{
        $id =  $_GET["id"];
        $prod = Product::get_product($id);
        $prod = $prod[0];
        $prods_relate = Product::list_product_relate($prod["CateID"], $id);
    }
    $cates = Category::list_category();
?>

<?php $url = $_SERVER['HTTP_HOST']?>

<center>
    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <h3>Danh mục</h3>
        <ul class="list-group">
            <?php
                foreach($cates as $item){
                    ?>
                <li style="width:30%" class="list-group-item">
                    <a href="<?php echo "list_product.php?category=".$item["CategoryName"]."&cateid=".$item["CateID"]?>"><?php echo $item["CategoryName"]?></a>
                </li>
            <?php }?>
        </ul>
    </div>
</center>

<center>
    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <h3>Chi tiết sản phẩm</h3>
        <div class="card">
            <div class="card-body">
                <img class="card-img-top" style="width:300px; height:300px; margin: 10px" src="<?php echo $prod["Picture"]?>" alt="<?php echo $prod["ProductName"]?>">
                <div style="display:inline-block">
                    <h5 sty class="card-title">Tên sản phẩm: <?php echo $prod["ProductName"]?></h5>
                        <p class="card-text">Mô tả: <?php echo $prod["Description"]?></p>
                        <p class="card-text">Giá: <?php echo $prod["Price"]?></p>
                        <button type="button" class="btn btn-primary">Mua ngay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>

<?php
    foreach($prods_relate as $item){
    ?>
    <center>
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            <h3>Sản phẩm liên quan</h3>
            <div class="card">
                <div class="card-body">
                    <img class="card-img-top" style="width:300px; height:300px; margin: 10px" src="<?php echo $item["Picture"]?>" alt="<?php echo $item["ProductName"]?>">
                    <div style="display:inline-block">
                        <h5 sty class="card-title">Tên sản phẩm: <?php echo $item["ProductName"]?></h5>
                            <p class="card-text">Mô tả: <?php echo $item["Description"]?></p>
                            <p class="card-text">Giá: <?php echo $item["Price"]?></p>
                            <button type="button" class="btn btn-primary">Mua ngay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
<?php }?>

<?php include_once("footer.php");?>

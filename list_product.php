<?php
    require_once("./entities/product.class.php");
?>

<?php 
    include_once("header.php");
    $prods = Product::list_product();
?>

<div class="container">
    <div class="lbltitle">
        <h3 style="text-align:center; font-weight:bold; padding-bottom:20px; padding-top:10px">SẢN PHẨM MỚI</h3>
    </div>

    <div class="row">
        <?php
            foreach($prods as $item){
        ?>
            <center>            
                <div style="height:390px" class="col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" style="width:200px; height:200px" src="<?php echo $item["Picture"]?>" alt="<?php echo $item["ProductName"]?>">
                        <div class="card-body">
                            <h5 style="font-weight:bold;" class="card-title"><?php echo $item["ProductName"]?></h5>
                            <p class="card-text"><?php echo $item["Description"]?></p>
                            <p class="card-text">Giá: <?php echo $item["Price"]?> đồng</p>
                        </div>
                    </div>                   
                </div>               
            </center>
        <?php }?>
    </div>
</div>
<?php include_once("footer.php");?>
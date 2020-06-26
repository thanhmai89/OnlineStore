<?php
    session_start();
    $cart=$_SESSION['cart_items'];
    if(isset($_GET['pro_id']) && isset($_SESSION['cart_items'])){      
        $pro_id=$_GET['pro_id'];
        if($pro_id == 0)
        {
            unset($_SESSION['cart_items']);
        }
        else
        {
            unset($_SESSION['cart_items'][$pro_id]);
        }

        header("location: shopping_cart.php");
        exit();
               
        // if(isset($_GET["delete"])){
        //     if($id == 0)
        //     {
        //         unset($_SESSION["cart_items"]);
        //     }
        //     else
        //     {
        //         unset($_SESSION["cart_items"][$id]);
        //     }
        // }           
        // header("location: shopping_cart.php");
        // exit();
    }
?>
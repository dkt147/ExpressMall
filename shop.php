<?php

$page = "shop";
//require header file
require('header.php');
// require functions file
require_once('functions.php');
?>
<?php
//request method for cart button 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['shop_submit'])){
    //call method addToCart
    $cart->addToCart($_POST['u_Id'], $_POST['p_Id']);
    }
}
?>

    <section id="page-header">
        <h2>All Categories</h2>
        <p>All Products of different categories</p>
        <a href="#" class="to-top">
            <i class="fas fa-chevron-up"></i>
        </a>
    </section>

    <section id="product1" class="section-p1">
        <div class="pro-container">
            <?php foreach($product->getData() as $item) { ?>
            <div class="pro" onclick="window.location.href='sproduct.html'" style="height: 430px;">
                <img src="<?php echo $item['p_Image'] ?? "img/products/f1.jpg"; ?>" alt="" height="200px">
                <div class="des">
                    <span><?php echo $item['p_Title'] ?? "Unknown"; ?></span>
                    <h5 style="height:50px"><?php echo $item['p_Description'] ?? "Cotton shirts pure cotton"; ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4><?php echo "Rs/- ".$item['p_Price'] ?? '0'; ?></h4>
                    <span><?php echo $item['p_Status'] ?? "Unknown"; ?></span>
                </div>
                <form method="post">
                    <input type="hidden" value="<?php echo $item['p_Id'] ?? '1';?>" name="p_Id">
                    <input type="hidden" value="<?php echo '1';?>" name="u_Id">
                        <?php
                            if(in_array($item['p_Id'], $cart1->getCartId($product->getData('cart')) ?? [])){
                            echo '<button type="submit" name="shop_submit" disabled style="background-color: grey; border: none; padding: 10px; color:white ; border-radius:20px;">In The Cart</button>';
                            }else{
                            echo '<button type="submit" name="shop_submit" style="background-color: #0fc5b9; border: none; padding: 10px; color:white ; border-radius:20px;">Add to Cart</button>';
                            }
                        ?>  
                </form>  
              </div>
       
                <?php } ?>
    </section>

   
    <?php include 'footer.php';?>
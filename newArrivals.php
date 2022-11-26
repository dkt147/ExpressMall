<?php

$products_shuffle = $product->getNewArrivals('p_Id');
//request method for cart button 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['newArrival_submit'])){
    //call method addToCart
    $cart->addToCart($_POST['u_Id'], $_POST['p_Id']);
    }
}
?>

<section id="product1" class="section-p1">
        <h2>New Arrivals</h2>
        <p>New Arrivals of the Season</p>
        <div class="pro-container">
                <?php foreach($products_shuffle as $item) { ?>
                <div class="pro" style="height:430px">
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
                            echo '<button type="submit" name="newArrival_submit" style="background-color: #FFA500; border: none; padding: 10px; color:white ; border-radius:20px;">In The Cart</button>';
                            }else{
                            echo '<button type="submit" name="newArrival_submit" style="background-color: #0fc5b9; border: none; padding: 10px; color:white ; border-radius:20px;">Add to Cart</button>';
                            }
                        ?>   
                    </form>
                    </div>
                    <?php 
                        }
                    ?>
            </div>
        </div>

    </section>

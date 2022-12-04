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
        <?php
                   
                   //Stablishing Connection...
                   include 'db.php';      
                              //Getting Data From Databse...
                                  $query = "SELECT * FROM `products` order by p_Id asc limit 4";
                                  $res = mysqli_query($con, $query);
        
            
                                  if (mysqli_num_rows($res) > 0) {
                                    $c = 0;
                                    while ($item = mysqli_fetch_assoc($res)) {
                                      $c = $c + 1;
                                  ?>
                <div class="pro" style="height:430px" onclick="location.href = 'sproduct.php?id=<?php echo $item['p_Id']?>'">
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
                        <span><?php if($item['quantity'] == 0){echo '<span style="color:red">Out Of Stock</span>';}else{echo '<span style="color:green">Available</span>';} ?></span>
                 </div>
                    <form method="post">
                        <input type="hidden" value="<?php echo $item['p_Id'] ?? '1';?>" name="p_Id">
                        <input type="hidden" value="<?php echo '1';?>" name="u_Id">
                        <button type="submit" <?php if($item['quantity'] == 0){echo 'disabled';}else{echo '';} ?> name="product_submit" style="background-color: #0fc5b9; border: none; padding: 10px; color:white ; border-radius:20px;">Add to Cart</button>
                                        
                    </form>
                    </div>
           
<?php 
                                    }
                                }
                                ?>
                                </div>
    </section>
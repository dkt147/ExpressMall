<?php

$page = "shop";
//require header file
require('header.php');

if(isset($_GET['product'])){
$product = $_GET['product'];
}else{
   $product = 'all';
}

if(isset($_GET['category'])){
    $category = $_GET['category'];
}else{
    $category = 'all';
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
        <?php
                   include 'db.php';      

                   if($category == 'all'){

                    if($product == 'all'){
                        $query = "SELECT * FROM `product`";
                    }else{
                        $query = "SELECT * FROM `product` where name like '%$product%'";
                    }
                }else{
                    $query = "SELECT * FROM `product` where category_id = '$category'";
                }
                                  $res = mysqli_query($con, $query);
                                  if (mysqli_num_rows($res) > 0) {
                                    while ($item = mysqli_fetch_assoc($res)) {
                                  ?>

            <div class="pro" onclick="window.location.href='sproduct.php?id=<?php echo $item['id']?>'" style="height: 450px;">
                <img src="<?php echo "img/products/".$item['product_image'] ?? "img/products/f1.jpg"; ?>" alt="" height="200px">
                <div class="des">
                    <span><?php echo $item['name'] ?? "Unknown"; ?></span>
                    <h5 style="height:50px"><?php echo $item['detail'] ?? ""; ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4><?php echo "Rs/- ".$item['price'] ?? '0'; ?></h4>
                    <span><?php if($item['quantity'] == 0){echo '<span style="color:red">Out Of Stock</span>';}else{echo '<span style="color:green">Available</span>';} ?></span>
               </div>
                <form method="post">
                    <input type="hidden" value="<?php echo $item['id'] ?? '1';?>" name="p_Id">
                    <input type="hidden" value="<?php echo '1';?>" name="u_Id">
                    <button type="submit" <?php if($item['quantity'] == 0){echo 'disabled';}else{echo '';} ?> name="product_submit" style="background-color: #0fc5b9; border: none; padding: 10px; color:white ; border-radius:20px;">Add to Cart</button>
                </form>  
              </div>
              &nbsp;&nbsp;
                <?php }}else{ ?>

                <h4 style="text-align:center">No Similar Product Found</h4>
                    <?php 
                }
                    ?>
    </section>

   
    <?php include 'footer.php';?>
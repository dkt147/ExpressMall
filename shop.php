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
                <form method="post" action="shop.php">

            <div class="pro"  style="height: 470px;">
                <img src="<?php echo "Panel/Admin/uploads/".$item['product_image'] ?? "img/products/f1.jpg"; ?>" alt="" height="200px" onclick="window.location.href='sproduct.php?id=<?php echo $item['id']?>'">
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
                    <span style="display:block;"><b>Qty: <input type="number" value="1" min="1" max="<?php echo $item['quantity'] ?>" name="quantity" style="border: 2px solid white;width:100px;height:20px"></b></span>
                    <span><?php if($item['quantity'] == 0){echo '<span style="color:red">Out Of Stock</span>';}else{echo '<span style="color:green">Available</span>';} ?></span>
               </div>
                    <input type="hidden" value="<?php echo $item['id'] ?? '1';?>" name="id">
                    <input type="hidden" value="<?php echo $item['name'] ?? '1';?>" name="name">
                    <input type="hidden" value="<?php echo $item['price'] ?? '1';?>" name="price">
                    <input type="hidden" value="<?php echo $item['detail'] ?? '1';?>" name="detail">
                    <input type="hidden" value="<?php echo $item['product_image'] ?? '1';?>" name="product_image">
                    <input type="hidden" value="<?php if(isset($_SESSION['email']));?>" name="user_id">
                    <button type="submit" id="product_btn" <?php if($item['quantity'] == 0){echo 'disabled';}else{echo '';} ?> name="product_submit" style="background-color: #0fc5b9; border: none; padding: 10px; color:white ; border-radius:20px;">Add to Cart</button>
                </form>  
              </div>
              &nbsp;&nbsp;
                <?php }}else{ ?>

                <h4 style="text-align:center">No Similar Product Found</h4>
                    <?php 
                }
                    ?>
    </section>

    <?php
    if(isset($_POST['product_submit'])){
        $data['id'] =  $_POST['id'];
        $data['name'] =  $_POST['name'];
        $data['price'] =  $_POST['price'] * $_POST['quantity'];
        $data['detail'] =  $_POST['detail'];
        $data['product_image'] =  $_POST['product_image'];
        $data['quantity'] =  $_POST['quantity'];
        $data['user_id'] =  $_POST['user_id'];

        $_SESSION['cart'][] = $data;

        echo "<script>window.location.href='shop.php'</script>";
    }
    ?>
    <script>
        $(document).ready(function(){
            var button_id = document.getElementById("product_btn");
            console.log(button_id);
}

        </script>
   
    <?php include 'footer.php';?>
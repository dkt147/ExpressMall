


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/dfba0bb4d8.js"></script>
</head>
<body>
    
 <?php
 
$page = "product_detail";
require('header.php');

//Stablishing Connection...
                   include 'db.php';      
                   $id = $_GET['id'];
                              //Getting Data From Databse...
                                  $query = "SELECT * FROM `product` where id = '$id'";
                                  $res = mysqli_query($con, $query);
                                  if (mysqli_num_rows($res) > 0) {
                                    while ($item = mysqli_fetch_assoc($res)) {
                                
 ?>

    <section id="prodetails" class="sectio-p1">
        <div class="single-pro-image">
            <img src="<?php echo "Panel/Admin/uploads/".$item['product_image'];?>" width="100%" id="MainImg" alt="">

            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="<?php echo "Panel/Admin/uploads/".$item['product_image'];?>" width="100%" class="small-img" alt="">
                </div>
                    
            </div>
        </div>

        <div class="single-pro-details">
            <h4><?php echo $item['name'];?></h4>
            <h2><?php echo "Rs/- ".$item['price'];?></h2>
        <form method="POST" action="sproduct.php">
            <input type="number" value="1" name="quantity" min="1" max="<?php echo $item['quantity'] ?>">
                    <input type="hidden" value="<?php echo $item['id'] ?? '1';?>" name="id">
                    <input type="hidden" value="<?php echo $item['name'] ?? '1';?>" name="name">
                    <input type="hidden" value="<?php echo $item['price'] ?? '1';?>" name="price">
                    <input type="hidden" value="<?php echo $item['detail'] ?? '1';?>" name="detail">
                    <input type="hidden" value="<?php echo $item['product_image'] ?? '1';?>" name="product_image">
                    <input type="hidden" value="<?php if(isset($_SESSION['email']));?>" name="user_id">
            <button class="normal" type="submit" name="product_submit">Add to cart</button>
            <h4>Product Details</h4>
            <span><?php echo $item['detail'];?></span>
        </div>
                                    </form>
    </section>

    <?php 
                                    }
                                }


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

<br><br><br>
<hr><br><br>
    <?php
    // products section
        include_once('f_products.php');
    ?>


   <script>
    var MainImg = document.getElementById("MainImg");
    var smallimg = document.getElementsByClassName("small-img");


    smallimg[0].onclick = function(){
        MainImg.src = smallimg[0].src
    }
    smallimg[1].onclick = function(){
        MainImg.src = smallimg[1].src
    }
    smallimg[2].onclick = function(){
        MainImg.src = smallimg[2].src
    }
    smallimg[3].onclick = function(){
        MainImg.src = smallimg[3].src
    }
   </script>

    
   <?php include 'footer.php';?>







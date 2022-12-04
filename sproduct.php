


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
                                  $query = "SELECT * FROM `products` where p_Id = '$id'";
                                  $res = mysqli_query($con, $query);
                                  if (mysqli_num_rows($res) > 0) {
                                    while ($item = mysqli_fetch_assoc($res)) {
                                
 ?>

    <section id="prodetails" class="sectio-p1">
        <div class="single-pro-image">
            <img src="<?php echo $item['p_Image'];?>" width="100%" id="MainImg" alt="">

            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="<?php echo $item['p_Image'];?>" width="100%" class="small-img" alt="">
                </div>
                <!-- <div class="small-img-col">
                    <img src="img/products/f2.jpg" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/f3.jpg" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/f4.jpg" width="100%" class="small-img" alt="">
                </div> -->
            </div>
        </div>

        <div class="single-pro-details">
            <h4><?php echo $item['p_Title'];?></h4>
            <h2><?php echo "Rs/- ".$item['p_Price'];?></h2>
            <input type="number" value="1">
            <button class="normal">Add to cart</button>
            <h4>Product Details</h4>
            <span><?php echo $item['p_Detail'];?></span>
        </div>
    </section>

    <?php 
                                    }
                                }
                                ?>

    <?php
    // products section
        include_once('products.php');
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







<?php
$page = "index";
require('header.php');
// require functions file
require_once('functions.php');

?>
    <section id="hero">
        <h4>Express Mall</h4>
        <h4>On Discounted Price</h4>
        <h1>All Premium Products</h1>
        <p>Order now, Cash on delivery easy process</p>
        <button><a href="shop.php" style="text-decoration: none;color:white">Shop Now</a></button>
        <a href="#" class="to-top">
        <i class="fas fa-chevron-up"></i>
        </a>
    </section>

    <?php
    //service section
    include 'service.php';

    // products section
        include_once('products.php');
    ?>

    <section id="banner" class="section-m1">
        <h4>Seasonal Offers</h4>
        <h2>Upto <span>70% Off</span>- All Grocery & Crockery</h2>
        <button class="normal"><a href="shop.php" style="text-decoration:none;color:black">More</a></button>
    </section>

    <?php
    // new arrivals
        include_once('newArrivals.php');
    ?>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box ">
            <h4>Crazy Deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>Lorem ipsum dolor sit amet consectetur.</span>
            <button class="white">Learn more</button>
        </div>

        <div class="banner-box banner-box2">
            <h4>Spring Summer</h4>
            <h2>buy 1 get 1 free</h2>
            <span>Lorem ipsum asdasdasdasd.</span>
            <button class="white">Learn more</button>
        </div>
        
       
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>SEASONAL</h2>
            <h3>Winter Collection</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2> SALE</h2>
            <h3>Winter Collection</h3>
        </div>
    </section>

   <?php include 'footer.php';?>
<?php
$page = "index";
require('header.php');
// require functions file
require_once('functions.php');

?>

    <section class="carousel">
  <ul class="slides">
    <li class="slide" data-active-slide>
      <img src="banner/1.jpg" alt="Nature Image #1" />
    </li>
    <li class="slide">
      <img src="banner/2.jpg" alt="Nature Image #2" />
    </li>
    <li class="slide">
      <img src="banner/3.jpg" alt="Nature Image #3" />
    </li>
  </ul>
  <div class="slides-circles">
    <div data-active-slide></div>
    <div></div>
    <div></div>
  </div>
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

    <section id="sm-banner" class="section-p1">
        <div class="banner-box ">
          
        </div>

    </section>

    <section id="banner3">
        <div class="banner-box">
           
        </div>
        <div class="banner-box banner-box2">
           
        </div>
        <div class="banner-box banner-box3">
          
        </div>
    </section>

   <?php include 'footer.php';?>
<?php
$page = "about";
//require header file
require('header.php');
// require functions file
require_once('functions.php');
?>

<section id="page-header" class="about-header">
        <h2>#Know Us</h2>
        <p>KNOW US Lorem ipsum dolor sit amet consectetu</p>
        <a href="#" class="to-top">
            <i class="fas fa-chevron-up"></i>
        </a>
    </section>
  
    <section id="about-head" class="section-p1">
        <img src="img/about/a6.jpg" alt="">
        <div>
            <h2>Who we are</h2>
            <p>We are <h3><i>CARA</i></h3>the place to find the best quality <b>Cloths and Accessories</b> for every taste and occasion. We thoroughly check the quality of our goods, working only with reliable suppliers so that you only receive the best quality product. <br>
            We at <i>CARA</i> believe in high quality and exceptional customer service. But most importantly, we believe shopping is a right, not a luxury, so we strive to deliver the best products at the most <b>affordable prices</b>, and ship them to you regardless of where you are located.
            </p>
            <abbr title="">Lorem ipsum dolor sit amet consectetur adipisicing eli</abbr>

            <br><br>

            <marquee bgcolor="#ccc" loop="-5"  scrollamount="10" width="100%">Upto 70% Off- All T-shirts & Accessories</marquee>
        </div>
    </section>
    
    <section id="about-app" class="section-padding">
        <h2>Download Our <a href="#">app</a> </h2>
        <div class="video">
            <video autoplay muted loop src="img/about/1.mp4"></video>
        </div>
    </section>

    <?php
    //service section
    include 'service.php';
    ?>


    <?php include 'footer.php';?>
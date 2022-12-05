

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="slider.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="logo.jpeg">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Sans-serif !important;
        }
    </style>
    <script src="slider.js"></script>
    <script src="https://use.fontawesome.com/dfba0bb4d8.js"></script>
<?php
    //require functions file
    require('functions.php');
?>
<style>
   #search {
    border: 2px solid white;
    background-color: white;
    border-radius: 15px;
    height: 44px;
    width: 300px;
    padding: 24px;
}

    </style>
</head>
<body>
    
    <section id="header">
        <a href="#"><img src="logo.jpeg" class="logo" alt="" height="50px"></a>

        <div>
            <ul id="navbar">
                <a href="#" id="close"><i class='fa fa-close'></i></a>
                <li><i class='fa fa-search fa-lg' ></i>&nbsp;<input type="text" name="product" id="search" placeholder="Search Any Product"/></li>
                <li><a <?php if($page=='index') { echo "class='active'";}else{} ; ?> href="index.php">Home</a></li>
                <li><a <?php if($page=='shop') { echo "class='active'";}else{} ; ?> href="shop.php">Shop</a></li>
                <li><a <?php if($page=='about') { echo "class='active'";}else{} ; ?> href="about.php">About</a></li>
                <li><a <?php if($page=='contact') { echo "class='active'";}else{} ; ?> href="contact.php">Contact</a></li>
                <li id="lg-bag">
                    <a href="cart.php">
                        <span><i class="fa fa-shopping-bag" aria-hidden="true"></i><sup>5</sup></span>
                        
                    </a>
                </li>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.html">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </a>
            <i id="bar" class="fa fa-bars" aria-hidden="true"></i>      
                 
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <Script>

        var input = document.getElementById("search");
        
        
        input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            console.log('shop.php?product='+input.value)
            window.location.href = 'shop.php?product='+input.value;

        }
        });
    </Script>
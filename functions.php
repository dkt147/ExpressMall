<?php
// require dbController
require('Database/dbController.php');

// require Fetch Product Class
require('Database/fetchProducts.php');

// require Cart Class
require('Database/cartClass.php');

// require controller object
$db = new dbController();

// require controller object
$product = new Product($db);

//require cart object
$cart = new Cart($db);
$cart1 = new Cart($db);
?>
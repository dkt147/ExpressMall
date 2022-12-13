<?php
$page = "cart";
//require header file
require('header.php');

// require functions file
require_once('functions.php');
?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['delete-cart-submit'])){
        $deletedrecord = $cart1->deleteCart($_POST['p_Id']);
    }
  }

  if (isset($_POST['checkout'])) {


    //Stablishing Connection...
    include 'db.php';

    //Getting Values From Form Tag...
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $zip = $_POST['zip'];


    //Insert Query For Mysql..
    $query = "INSERT INTO `order_tbl`(`customer_name`, `customer_email`, `customer_phone`, `customer_address`, `customer_zip`) VALUES ('$name','$email','$phone','$address','$zip')";
    $res = mysqli_query($con, $query);

    
    //Redirection to testing_batch.php page..
    // header("Location: http://localhost/LAB/Views/testing_batch.php");

    //Connection Close...
    mysqli_close($con);
}

if(isset($_POST['delete-cart-submit'])){
    echo $count = $_POST['counter'];
    unset($_SESSION['cart'][0]);
  
    echo "<script>window.location.href='cart.php'</script>";
}

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

<section id="page-header" class="about-header">
      <h2>Your Cart Items</h2>
      <p>Confirm Your Order</p>
      <a href="#" class="to-top">
        <i class="fas fa-chevron-up"></i>
      </a>
    </section>

    <!-- <section id="contact-details" class="section-p1">
        <div class="details">
            <h2>Your Cart is Empty</h2>
    </section> -->

    <!-- cart items details-->
    
    <div class="small-container">
    <table class="table table-striped" style="padding: 20px;">
                        <thead>
                            <tr style="background-color: grey;">
                                <th scope="col">Item #</th>
                                <th scope="col">Name</th>
                                <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;Image</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                           
        <?php 
          $counter = 0;
          $sum = 0;
          foreach($_SESSION['cart'] as $item){

        ?>
        <tr>
                                <th scope="row" style="color:black"><?php echo $counter+1;?></th>
                                <td><?php echo $item['name'];?></td>
                                <td><img src="<?php echo "Panel/Admin/uploads/".$item['product_image'];?>" style="border-radius:50%"></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $item['quantity'];?></td>
                                <td><?php echo "Rs/- ".$item['price'];?></td>
                            </tr>

        <?php 
                       $counter = $counter + 1;
                       $sum = $sum + $item['price'];
                      }
            ?>
      </table>
      <div class="total-price">
        <table>
          <tr>
            <td>Total Amount Payable</td>
            <td><?php echo "Rs/- ".$sum ?></td>
          </tr>
        </table>
      </div>
    </div>

    <section id="form-details" style="width: 50%">
      <form action="cart.php" method="post">
        <span>Confirm your order</span>
        <h2>Checkout Form</h2>
        <input type="text" placeholder="Enter your name" name="name"/>
        <input type="email" placeholder="Enter your Email" name="email"/>
        <input type="number" placeholder="Enter your Phone" min="11" name="phone"/>
        <textarea
          name="address"
          id=""
          cols="30"
          rows="10"
          placeholder="Enter your Address"
        ></textarea>
        <input type="number" placeholder="Enter your Zip" min="0" name="zip"/>

        <input type="submit" value="Checkout" class="normal" name="checkout"/>
      </form>

    </section>

   
    <?php include 'footer.php';?>
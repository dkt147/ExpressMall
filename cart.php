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

?>


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
      <table>
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
        <?php 
          foreach($_SESSION['cart'] as $item){

        ?>
        <tr>
        
          <td>
          
            <div class="cart-info">
              <img src="<?php echo "Panel/Admin/uploads/".$item['product_image']?>" alt="image" />
              <div>
                <p style="color:alice"><b><?php echo $item['name'] ?? "Unknown"; ?></b></p>
                <small style="margin:5px;color:green"><b><?php echo $item['price'] ?? '0'; ?></b></small>
                <br />
                <form method="post">
                   <input type="hidden" value="<?php echo $item['id'] ?? 0; ?> " name="p_Id">
                   <button type="submit" name="delete-cart-submit" style="border: none; background:red; color:white;border:2px solid red;border-radius:25px;padding:5px;margin-top:5px">Remove</button> 
                </form>
              </div>
            </div>
            
          </td>
          <td id="qty">
          <input type="number" value="<?php echo $item['quantity'] ?? 0; ?>">
         </td>
          <td><?php echo $item['price']; ?></td>
          
        </tr>
        <?php 
             }
            ?>
      </table>

      <div class="total-price">
        <table>
          <tr>
            <td>Total Amount Payable</td>
            <td><?php echo isset($subTotal) ? $cart1->getSum($subTotal) : 0; ?></td>
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
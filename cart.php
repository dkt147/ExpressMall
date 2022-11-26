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
?>
<section id="page-header" class="about-header">
      <h2>#CART</h2>
      <p>Enter your coupon code...</p>
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
          foreach($product->getCart() as $item):
          $cart = $product->getProduct($item['p_Id']);
          $subTotal[] = array_map(function($item){
        ?>
        <tr>
        
          <td>
          
            <div class="cart-info">
              <img src="<?php echo $item['p_Image'] ?? "img/products/f1.jpg"; ?>" alt="Tshirt" />
              <div>
                <p style="color:alice"><b><?php echo $item['p_Title'] ?? "Unknown"; ?></b></p>
                <small style="margin:5px;color:green"><b><?php echo $item['p_Price'] ?? '0'; ?></b></small>
                <br />
                <form method="post">
                   <input type="hidden" value="<?php echo $item['p_Id'] ?? 0; ?> " name="p_Id">
                   <button type="submit" name="delete-cart-submit" style="border: none; background:red; color:white;border:2px solid red;border-radius:25px;padding:5px;margin-top:5px">Remove</button> 
                </form>
              </div>
            </div>
            
          </td>
          <td id="qty">
            <button id="qty-up border bg-light" data-id="<?php echo $item['p_Id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
            <input type="text" data-id="<?php echo $item['p_Id'] ?? '0'; ?>" id="qty_input" disabled value="1" placeholder="1">
            <button id="qty-down border bg-light" data-id="<?php echo $item['p_Id'] ?? '0'; ?>"><i class="fas fa-angle-down"></i></button>
          </td>
          <td><?php echo $item['p_Price']; ?></td>
          
        </tr>
        <?php 
              return $item['p_Price'];
              },$cart); //closing array map function
              endforeach;
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

    <section id="form-details">
      <form action="">
        <span>Leave a Message</span>
        <h2>We love to hear from you</h2>
        <input type="text" placeholder="Enter your name" />
        <input type="text" placeholder="Enter your Email" />
        <input type="text" placeholder="Enter your Subjext" />
        <textarea
          name=""
          id=""
          cols="30"
          rows="10"
          placeholder="Your Message"
        ></textarea>
        <button class="normal">Submit</button>
      </form>

      <div class="people">
        <div>
          <img src="img/people/1.png" alt="" />
          <p>
            <span>John Doe</span> Senior Marketing Manager <br />
            Phone: +91 1234567890 <br />
            Email: contact@example.com
          </p>
        </div>
        <div>
          <img src="img/people/2.png" alt="" />
          <p>
            <span>John Doe</span> Senior Marketing Manager <br />
            Phone: +91 1234567890 <br />
            Email: contact@example.com
          </p>
        </div>
        <div>
          <img src="img/people/3.png" alt="" />
          <p>
            <span>Jean Doe</span> Senior Marketing Manager <br />
            Phone: +91 1234567890 <br />
            Email: contact@example.com
          </p>
        </div>
      </div>
    </section>

   
    <?php include 'footer.php';?>
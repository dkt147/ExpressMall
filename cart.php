<?php

$page = "cart";
//require header file
require('header.php');
if(!isset($_SESSION['email'])){
  echo "<script>window.location.href='login.php'</script>";
}
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

    include 'db.php';

    //Getting Values From Form Tag...
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $tracking_id = $_POST['name']."-".rand(10,100);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $price = $_POST['price'];

    //Insert Query For Mysql..
    $query = "INSERT INTO `orders`(`user_id`, `product_id`, `tracking_id`, `quantity`,`price`,`address`)
    VALUES ('$user_id',1,'$tracking_id',0,'$price','$address')";
    $res = mysqli_query($con, $query);

    if($res){

      
      $query = "SELECT * FROM `orders` where tracking_id = '$tracking_id'";
      $res = mysqli_query($con, $query);
      $row = mysqli_fetch_assoc($res);
      $order_id = $row['id'];

      foreach($_SESSION['cart'] as $item){
        
        $id1 = $item['id'];
        $name1 = $item['name'];
        $product_image1 = $item['product_image'];
        $detail1 = $item['detail'];
        $quantity1 = $item['quantity'];
        $price1 = $item['price'];

        //Insert Query For Mysql..
        $query = "INSERT INTO `order_detail`(`order_id`, `name`, `image`, `detail`, `quantity`, `price`) 
        VALUES ('$order_id','$name1','$product_image1','$detail1','$quantity1','$price1')";
        $res = mysqli_query($con, $query);

        //Insert Query For Mysql..
        $query2 = "UPDATE `product` SET quantity = quantity - $quantity1 where id =  $id1";
        $res2 = mysqli_query($con, $query2);

      }

include 'test.php';

      unset($_SESSION['cart']);
      echo "<script>window.location.href='dashboard.php?is_success=1'</script>";


    }
    
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
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
        <?php 
          $counter = 0;
          $sum = 0;
          if(isset($_SESSION['cart']) && count($_SESSION['cart']) != 0){
          foreach($_SESSION['cart'] as $item){

        ?>
        <tr>
                                <th scope="row" style="color:black"><?php echo $counter+1;?></th>
                                <td><?php echo $item['name'];?></td>
                                <td><img src="<?php echo "Panel/Admin/uploads/".$item['product_image'];?>" style="border-radius:50%"></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $item['quantity'];?></td>
                                <td><?php echo "Rs/- ".$item['price'];?></td>
                                <td><button class="btn btn-danger" value="<?php echo $counter?>"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                            </tr>

        <?php 
                       $counter = $counter + 1;
                       $sum = $sum + $item['price'];
                      }
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

    <section id="form-details">

    <?php 
    
    //Stablishing Connection...
    include 'db.php';

                    $email = $_SESSION['email'];
                    $query = "SELECT * FROM `users` where email = '$email'";
                    $res = mysqli_query($con, $query);
                    $user_data = mysqli_fetch_assoc($res);
                    ?>
                    
    
      <form action="cart.php" method="post">
        <span>Confirm your order</span>
        <h2>Checkout Form</h2>
        <input type="text" placeholder="Enter Receiver name" name="name" required value="<?php echo $user_data['name']?>"/>
        <input type="email" placeholder="Enter Receiver Email" name="email" required value="<?php echo $user_data['email']?>"/>
        <input type="number" placeholder="Enter Receiver Phone" min="11" name="phone" required value="<?php echo $user_data['phone']?>"/>
        <textarea
          name="address"
          id=""
          cols="30"
          rows="10"
          placeholder="Enter Receiver Address"
          required
        ></textarea>
        <input type="hidden" name="user_id" value="<?php echo $user_data['id']?>">
        <input type="hidden" name="price" value="<?php echo $sum?>">
        <input type="submit" value="Checkout <?php echo "(Rs/- ".$sum.")"?>" class="normal" name="checkout"/>
      </form>


    </section>

    
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
     <script>
        $('.btn-danger').click(function(){
            var data1 = this.value
          window.location.href=`remove_item.php?id=${data1}`;
          
        });
        </script>
   
 

    <?php include 'footer.php';?>
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

    include('smtp/PHPMailerAutoload.php');
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
        
        $name1 = $item['name'];
        $product_image1 = $item['product_image'];
        $detail1 = $item['detail'];
        $quantity1 = $item['quantity'];
        $price1 = $item['price'];

        //Insert Query For Mysql..
        $query = "INSERT INTO `order_detail`(`order_id`, `name`, `image`, `detail`, `quantity`, `price`) 
        VALUES ('$order_id','$name1','$product_image1','$detail1','$quantity1','$price1')";
        $res = mysqli_query($con, $query);
      }


$html='<html>
<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
  <table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px red;">
    <thead>
      <tr>
        <th style="text-align:left;"><img style="max-width: 150px;" src="https://expressmall.store/icon.jpeg" alt="Express Mall Store"></th>
        <th style="text-align:right;font-weight:400;">';

        $date = date("Y-m-d");
        $newDate = date('F', strtotime($date));
  
        $time = '19:24:15'; 
        $time = date('h:i:s', strtotime($date));

$html .= date("d")." ".$newDate[0].$newDate[1].$newDate[2]." ".date("y")."<br>".$time;

$html .= '</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Order status</span><b style="color:green;font-weight:normal;margin:0">Success</b></p>
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Tracking ID</span>'; 
          $html .= $tracking_id; 
          $html .='</p>
          <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Order amount</span>'; 
          $html .= $price; 
          $html .='</p>
        </td>
      </tr>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Name</span>';
          $html .= $name; 
          $html .='</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email</span> '; 
          $html .= $email; 
          $html .='</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Phone</span> '; 
          $html .= $phone; 
          $html .='</p>
        </td>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Address</span>'; 
          $html .= $address; 
          $html .='</p>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Items</td>
      </tr>
      <tr>
        <td colspan="2" style="padding:15px;">
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
            <span style="display:block;font-size:13px;font-weight:normal;">Homestay with fooding & lodging</span> Rs. 3500 <b style="font-size:12px;font-weight:300;"> /person/day</b>
          </p>
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">Pickup & Drop</span> Rs. 2000 <b style="font-size:12px;font-weight:300;"> /person/day</b></p>
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">Local site seeing with guide</span> Rs. 800 <b style="font-size:12px;font-weight:300;"> /person/day</b></p>
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">Tea tourism with guide</span> Rs. 500 <b style="font-size:12px;font-weight:300;"> /person/day</b></p>
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">River side camping with guide</span> Rs. 1500 <b style="font-size:12px;font-weight:300;"> /person/day</b></p>
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">Trackking and hiking with guide</span> Rs. 1000 <b style="font-size:12px;font-weight:300;"> /person/day</b></p>
        </td>
      </tr>
    </tbody>
    <tfooter>
      <tr>
        <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
          <strong style="display:block;margin:0 0 10px 0;">Regards</strong> Express Mall Store<br> Karachi, Pakistan<br><br>
          <b>Phone:</b> 03552-222011<br>
          <b>Email:</b> support@expressmall.store
        </td>
      </tr>
    </tfooter>
  </table>
</body>

</html>';

smtp_mailer('daniyalreavtech@gmail.com','Express Mall Store | Purchase Invoice',$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "daniyalreavtech@gmail.com";
	$mail->Password = "jswairgfcbxpomhw";
	$mail->SetFrom("daniyalreavtech@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}

      unset($_SESSION['cart']);
      echo "<script>alert('Your order has been confirmed!')</script>";


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

    <section id="form-details" style="width: 50%">

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

   
    <?php include 'footer.php';?>
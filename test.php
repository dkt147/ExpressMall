<?php

include('smtp/PHPMailerAutoload.php');

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
          $html .= "Rs/- ".$price; 
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
      </tr><tr>
      <td colspan="2" style="padding:15px;">';

      foreach($_SESSION['cart'] as $item){

      $html .= '
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
            <span style="display:block;font-size:13px;font-weight:normal;">';$html .= $item['name']; 
            $html .='</span> Rs.';$html .= $item['price']; 
            $html .='<b style="font-size:12px;font-weight:300;"></b>
          </p>';
   
    }

    $html .= '
    </td>
</tr></tbody>
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
		return 0;
	}else{
		return 1;
	}
}
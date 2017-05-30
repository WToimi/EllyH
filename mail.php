<?php
echo "success 1";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

echo ": sucess 2: ";
  $name = $_POST['name'];
  $message = $_POST['message'];
  $email = $_POST['email'];
  $foretag = $_POST['foretag'];
  $number = $_POST['contact'];

  //$arr_ = array("name"=>$name,"message"=>$message,"email"=>$email,"foretag"=>$foretag,"number"=>$number);

  //echo json_encode($arr_);die();

  $sendemail = new_email("Elly Hahne Art - $name", "wilhelmtoimi@gmail.com" ,"$number <br/> $email <br/>$foretag"," yes");
  if($sendemail)  {
    echo " : success 4 ;";
    echo "Name: "+$name;
    echo "Number: "+$number;
    echo "Email: "+$email2;
    echo "Företag: "+$foretag;
    echo $email;
  echo 1;
  }

}

//new_email('22','22','22');

echo "yes"; die();
function new_email($subject, $email, $bodytext, $alt_bodytext){
  //email
echo "success 3: ";
  require('PHPMailer/PHPMailerAutoload.php');

//  $mail = new PHPMailer();
//  $mail->IsSMTP();
//  $mail->Host = 'smtp.gmail.com';
//  $mail->SMTPAuth = true;
//  $mail->Username = 'toimisspambox@gmail.com';
//  $mail->Password = 'JQUERY321';
//  $mail->SMTPSecure ='tls';
//  $mail->Port = 587;

//  $mail->setFrom('toimisspambox@gmail.com',$subject);
//    $mail->addAdress($email);
//      $mail->addReplyTo('toimisspambox@gmail.com');
//        $mail->isHTML(true);
//          $mail->Subject = 'Welcome aboard!';
//            $mail->body = $bodytext;
//              $mail->AltBody = $alt_bodytext;
//return true;
//              if(!$mail->send()){
//                echo 'hej';
//                $mail->ErrorInfo;

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp@gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = false;                               // Enable SMTP authentication
$mail->Username = 'toimisspambox@gmail.com';                 // SMTP username
$mail->Password = 'JQUERY321';                           // SMTP password
$mail->SMTPSecure = 'tsl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('toimisspambox@gmail.com', $subject);
$mail->addAddress('wilhelmtoimi@gmail.com');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Elly Hahne Art';
$mail->Body    = $bodytext;
$mail->AltBody = $alt_bodytext;
$mail->SMTPDebug = 1;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
else {
    echo 'Message has been sent';
}





}

  ?>

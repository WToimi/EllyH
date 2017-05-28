<?php
// Fetching Values from URL.
$name = $_POST['name1'];
$email = $_POST['email1'];
$message = $_POST['message1'];
$contact = $_POST['contact1'];
$foretag = $_POST['foretag1'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing E-mail.
// After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
if (!preg_match("/^[0-9]{10}$/", $contact)) {
echo "<span>* Var snäll och fyll i ett giltigt nummer *</span>";
} else {
$subject = $name;
// To send HTML mail, the Content-type header must be set.''
$fortagsend='';
if ($foretag!=null) {
	$fortagsend= 'Företag:' . $foretag . '<br/>';
}
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:' . $email. "\r\n"; // Sender's Email
$headers .= 'Cc:' . $email. "\r\n"; // Carbon copy to Sender
$template = '<div style="padding:50px; color:white;">Hej ' . $name . ',<br/>'
. '<br/>Tack! För du kontaktar oss.<br/><br/>'
. 'Namn:' . $name . '<br/>'
. 'Mail:' . $email . '<br/>'
. 'Nummer:' . $contact . '<br/>'
.$fortagsend
. 'Meddelande:' . $message . '<br/><br/>'
. 'Detta är ett automatsvar för att visa att vi mottagit ditt meddelande.'
. '<br/>'
. 'Vi kommer kontakta dig så snart som möjligt.</div>';
$sendmessage = "<div style=\"background-color:#7E7E7E; color:white;\">" . $template . "</div>";
// Message lines should not exceed 70 characters (PHP rule), so wrap it.
$sendmessage = wordwrap($sendmessage, 70);
$mymail = 'wisa@etuna.ntig.se';
// Send mail by PHP Mail Function.
mail($mymail, $subject, $sendmessage, $headers);
echo "Ditt meddelande har mottagits, Vi kommer kontakta dig snarast.";
}
} else {
echo "<span>* ogiltig epostadress *</span>";
}
?>

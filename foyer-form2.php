<?php
require 'PHPMailer-master/PHPMailerAutoload.php';

$uname=$_POST["fullName"];
$umail=$_POST["email"];
$uphone=$_POST["phone"];
$uloc=$_POST["country"];
//$umsg=$_POST["msg"];


/*======Email from user=======*/
$mail = new PHPMailer;


$mail->setFrom($umail); //  user name mail
$mail->addAddress('tushar.warghade@gmail.com', 'My Friend'); //brand email name
$mail->Subject  = 'Contact Enquiry From '.$uname ; // Message Subject

/* message body html supported */

$mail->Body     = '<p style="text-align: center"> Hello, a new contact enquiry has been made.</p> <br><br><br>
					
	<div>
		<table style="display: block; margin: 0 auto;">
			<tbody style="display: block; width: 90%">
			<tr style="display: block; border: 1px solid #e2e2e2; border-bottom: 0px solid; padding: 10px; margin: 2px auto; background: white; width: 100%;"><td style="width: 40%;display:inline-block">Name: </td><td style="width: 50%;display:inline-block;word-wrap: break-word;"><strong>'.$uname.'</strong></td></tr>
			<tr style="display: block; border: 1px solid #e2e2e2; border-bottom: 0px solid; padding: 10px; margin: 2px auto; background: white; width: 100%;"><td style="width: 40%;display:inline-block">Email:</td><td style="width: 50%;display:inline-block;word-wrap: break-word;"><strong>'.$umail.'</strong></td></tr>
			<tr style="display: block; border: 1px solid #e2e2e2; border-bottom: 0px solid; padding: 10px; margin: 2px auto; background: white; box-shadow: 0px 0px 1px #aaa; width: 100%;"><td style="width: 40%;display:inline-block">Contact:</td><td style="width: 50%;display:inline-block;word-wrap: break-word;"><strong>'.$uphone.'</strong></td></tr>
			<tr style="display: block; border: 1px solid #e2e2e2; border-bottom: 0px solid; padding: 10px; margin: 2px auto; background: white; box-shadow: 0px 0px 1px #aaa; width: 100%;"><td style="width: 40%;display:inline-block">Country:</td><td style="width: 50%;display:inline-block;word-wrap: break-word;"><strong>'.$uloc.'</strong></td></tr>
			</tbody>
		</table>
	</div>  ';



$mail->isHTML(true);
if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error occured in user mail: ' . $mail->ErrorInfo;
}else{

/*======Email from user=======*/
$mail1 = new PHPMailer;


$mail1->setFrom('info@mail.com', $uname); //  brand name mail
$mail1->addAddress($umail); //user email name
$mail1->Subject  = 'Regarding you enquiry @ brand'; // Message Subject

/* message body html supported */

$mail1->Body     = '
	<div>
		<h3 style="text-align:center">THANK YOU ! <span style="text-transform: uppercase;">'.$uname.' </span></h3>
		<p style="text-align:center">Thank you so much for showing your interest. Our team will contact you soon.</p>
	</div>
';
$mail1->isHTML(true);
if(!$mail1->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error in thank-you mail: ' . $mail->ErrorInfo;
} else {
	 header("location:thankyou.php");
}

}
?>
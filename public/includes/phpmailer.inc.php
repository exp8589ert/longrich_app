<?php		
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	require_once 'includes/PHPMailer/vendor/autoload.php';
	$mail = new PHPMailer;
// 	$mail->isSMTP(true);
	$mail->CharSet='iso-8859-1';
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPSecure = 'ssl'; 
	$mail->Port = 465; 
	$mail->isHTML(true);                     
	$mail->SMTPDebug = 0;   
	$mail->SMTPAuth = true;  
	$mail->Username = 'grandhustle19@gmail.com';   
	$mail->Password = 'ubabillion8589wddpagg'; 
	$mail->Priority = 1;        
	$mail->WordWrap = 40;                   
	$mail->FromName = 'Longrich Gtriune';
?>
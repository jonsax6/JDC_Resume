<?php 
error_reporting(E_ALL);
require 'PHPMailer/PHPMailerAutoload.php';

if(isset($_REQUEST['action']) && $_REQUEST['action']=='send_email'){

	$user_name = substr($_REQUEST['name'], 0, 20);
	$user_email = substr($_REQUEST['email'], 0, 40);
	$user_msg = $_REQUEST['message'];
	
	$mail = new PHPMailer;
	$mail->isSMTP();
    $mail->Host       = 'server299.web-hosting.com';
    $mail->Port       = 465;     
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'ssl';    
    $mail->Username   = 'contact@jonathancoledev.com';
    $mail->Password   = '7iGZO7BrzT7%';
    
	$mail->setFrom('contact@jonathancoledev.com');
	$mail->AddReplyTo($user_email, $user_name);

      $mail->addAddress('jdc.saxjunky@gmail.com');     
      $mail->addAddress('jonathan@jc3dinc.com');  
      $mail->addAddress('thecryptochampion@gmail.com');     

    $mail->isHTML(true);
    $mail->Subject = 'CONTACT EMAIL: jonathancoledev.com';
	$mail->Body    = '<b>Message from JDC resume contact form:</b> 
	<br><br>"'.$user_msg.'"
	<br>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()){
    	$response['error'] = 'Error in Sending Email';
    	echo json_encode($response);
    	die();
	}else{
    	$response['message'] = 'Email sent successfully';
    	echo json_encode($response);
    	die();

	}

}
?>

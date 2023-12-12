<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

function sendOrderDetails() {
	try {
		//Server settings
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp-relay.brevo.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'romnoel02@gmail.com';                     //SMTP username
		$mail->Password   = 'U9nMS2O63IzWHTPv';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	
		//Recipients
		$mail->setFrom('Uniformcdm@Gmail.Com', 'Order Confirmation');
		$mail->addAddress('romnoel02@gmail.com', 'Joe User');     //Add a recipient

	
		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Order confirmation details';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
		$mail->send();
		echo 'Message has been sent';
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}

function check1_login($con) {
    if (isset($_SESSION['user_id'])) {
        // Fetch and return user data from the database
        // Replace this with your actual database query
        $user_id = $_SESSION['user_id'];
        $result = mysqli_query($con, "SELECT * FROM users WHERE id = $user_id");
        $user_data = mysqli_fetch_assoc($result);
        return $user_data;
    } else {
        // User is not logged in
        return null;
    }
}
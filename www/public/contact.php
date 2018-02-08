<?php

	require("../includes/config.php");
	require("../mailgun-php/vendor/autoload.php");
	require("../phpmailer/_lib/class.phpmailer.php");
	use Mailgun\Mailgun;

	if($_SERVER["REQUEST_METHOD"] === "GET")
	{
		render("contact-form.php", ["title" => "Contact us"]);
	}

	if($_SERVER["REQUEST_METHOD"] === "POST")
	{	  

		$mail = new PHPMailer;
		$mail->SMTPDebug  = '1';

		$mail->isSMTP();  // Set mailer to use SMTP
		$mail->Host = 'smtp.mailgun.org';  // Specify mailgun SMTP servers
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = 'gabrielghiuzan@sandboxb9cc446d8b7240efa59917c68fae6e50.mailgun.org'; // SMTP username from https://mailgun.com/cp/domains !!! NEW CREDENTIALS !!!
		$mail->Password = '8srnd984qq'; // SMTP password from https://mailgun.com/cp/domains !!! NEW CREDENTIALS !!!
		$mail->SMTPSecure = 'ssl';   // Enable encryption, 'ssl'
		$mail-> Port = '465'; 

		$mail->From = 'sandboxb9cc446d8b7240efa59917c68fae6e50.mailgun.org'; // The FROM field, the address sending the email 
		$mail->FromName = 'Enquiry bot'; // The NAME field which will be displayed on arrival by the email client
		$mail->addAddress('ghiuzangabriel2@gmail.com');     // Recipient's email address and optionally a name to identify him
		$mail->isHTML(true);   // Set email to be sent as HTML, if you are planning on sending plain text email just set it to false

		// The following is self explanatory
		$mail->Subject = 'Client enquiry';
		$mail->Body    = $_POST["message"];

		if(!$mail->send())
		{  
			echo "Message hasn't been sent.";
			echo 'Mailer Error: ' . $mail->ErrorInfo . "\n";
		} 
		else 
		{
			redirect("confirmation.html");
		}
	}
?>

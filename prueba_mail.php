<?php
	$to_email = "israeltrigofernandez0489@gmail.com";
	$subject = "Simple Email Test via PHP";
	$body = "Hi,nn This is test email send by PHP Script";
	$headers = "From: yo email";

	if (mail($to_email, $subject, $body)) {
    	echo "Email successfully sent to $to_email...";
	} else {
    	echo "Error de envio...";
	}
?>
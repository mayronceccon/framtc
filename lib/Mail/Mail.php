<?php

namespace Mail;

class Mail extends \PHPMailer
{
	public function __construct()
	{
		$mail = FindMail::getInstancia()->getMail();
				
		//Username to use for SMTP authentication - use full email address for gmail
		$this->Username = $mail['Username'];
		
		//Password to use for SMTP authentication
		$this->Password = $mail['Password'];
		
		if ($mail['isSMTP']) {
			//Tell PHPMailer to use SMTP
			$this->isSMTP();
		}		
		
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$this->SMTPDebug = $mail['SMTPDebug'];
		
		//Ask for HTML-friendly debug output
		//$mail->Debugoutput = 'html';
		
		//Set the hostname of the mail server
		$this->Host = $mail['Host'];
		
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$this->Port = $mail['Port'];
		
		//Set the encryption system to use - ssl (deprecated) or tls
		$this->SMTPSecure = $mail['SMTPSecure'];
		
		//Whether to use SMTP authentication
		$this->SMTPAuth = $mail['SMTPAuth'];
	}
}
<?php

use \ControllersLib\Controllers;
use \Views\Views;
use \Models\Pessoas;
use \Mail\Mail;

class IndexController extends Controllers
{	
	public function produtoAction()
	{		
		$pessoas = new Pessoas();		
		$this->view->pessoas = $pessoas->getPessoas();
		$this->view->titulo = "Pessoas";
		$this->view->aaa = "AAAAA";
		
		$this->view->show();
	}
	
	public function indexAction()
	{	
		$resultado = array(1,2,3,4,5);

		$this->view->eventos = $resultado;
		//$this->view->setView("index/produto");
		$this->view->show();		
	}
	
	public function popularAction()
	{
		$pessoas = new Pessoas();
		$pessoas->populaPessoas();
	}
	
	public function contatoAction()
	{
		var_dump($_POST);
		
		if (!empty($_POST['email'])) {
			$mail = new Mail();
									
			//Set who the message is to be sent from
			#$mail->setFrom('mayron.ceccon@gmail.com', 'First Last');
			
			//Set an alternative reply-to address
			#$mail->addReplyTo('replyto@example.com', 'First Last');
			
			//Set who the message is to be sent to
			$mail->addAddress('mayron.ceccon@gmail.com', 'Mayron Ceccon');
			
			//Set the subject line
			$mail->Subject = $_POST['assunto'];
			
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$mail->msgHTML($_POST['mensagem']);
			
			//Replace the plain text body with one created manually
			//$mail->AltBody = 'This is a plain-text message body';
			
			//Attach an image file
			#$mail->addAttachment('images/phpmailer_mini.png');
			
			//send the message, check for errors
			if (!$mail->send()) {
			    echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			    echo "Message sent!";
			}
		}
				
		$this->view->show();
	}
}
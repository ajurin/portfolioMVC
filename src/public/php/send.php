<?php

/////////// Add your own email below //////////////// 
	
	error_reporting (E_ALL ^ E_NOTICE);

//////////////////////////////////////////////////////

	function ValidateEmail($email)
	{
		$regex = '/([a-z0-9_.-]+)'. # name
		'@'. # at
		'([a-z0-9.-]+){2,255}'. # domain & possibly subdomains
		'.'. # period
		'([a-z]+){2,10}/i'; # domain extension 
		
		if($email == '') 
			return false;
		else
			$eregi = preg_replace($regex, '', $email);
		return empty($eregi) ? true : false;
	}

//////////////////////////////////////////////////////

	$post = (!empty($_POST)) ? true : false;
	
	if($post)
	{
		$name 	 = stripslashes($_POST['name']);
		$email 	 = trim($_POST['email']);
		$subject = trim($_POST['subject']);
		$message = stripslashes($_POST['message']);
	
		$errors = array();
	
		// Check name
		if(!$name)
		{
			$errors[] = 'Name required! ';
		}
	
		// Check email
		if(!$email)
		{
			$errors[] = 'E-mail required! ';
		}
	
		if($email && !ValidateEmail($email))
		{
			$errors[] = 'E-mail address is not valid! ';
			$email = "";
		}
	
		// Check message
		if(!$message) 
		{
			$errors[] = "Please enter your message!";
		}
	
		if(!$errors)
		{
			$name = strip_tags($name);
			$message = strip_tags($message);
			$subject = strip_tags($subject);
			
			$sendMsg = "Message de ".$name."<br>".$message;
			
			$mail = mail(WEBMASTER_EMAIL, $subject, $sendMsg,
				 "From: ".$name." <".$email.">\r\n"
				."Reply-To: ".$email."\r\n"
				."Return-Path: " .$email. "\r\n"
				."MIME-Version: 1.0\r\n"	
				."Content-type: text/html; charset=UTF-8\r\n"
			);
			
			
			if(!$mail)
			{
				$errors[] = 'Could not send email!';
			} else {
				unset($name);
				unset($email);
				unset($subject);
				unset($message);
				unset($sendMsg);
			}
		}
	}

?>
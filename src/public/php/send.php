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
			/*$sendMsg = '<!DOCTYPE html>
						<html style="height:100%; margin:0px; padding:0px;">
							<head>
								<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
        						<meta content="MSHTML 6.00.6000.17092" name=GENERATOR>
							</head>
							<body style="height:100%; margin:0px; padding:0px; backgound-color=#EEEEEE;">
								<header style="width:100%; padding:10px; background-color:#20638C; color:#FFF; border-radius:5px;text-align:center;">
									<h1>Axelle JURIN</h1>
									<h3>Conceptrice - Développeuse informatique</h3>
								</header>
								<section style="margin:10px;">
									Message de '.$name.'<br/>
									<p>'. $message .'<p>
								</section>
								<section style="width:100%; margin:10px; background-color:#FFF; text-align:center;">
									<h3>Contact</h3>
									<div style="margin:10px;">Mail : jurin.axelle@gmail.com</div>
									<div style="margin:10px;">Tel : 06.04.51.51.67</div>
								</section>
								<footer style="width:100%; max-height:60px; padding:10px; text-align:center; position:relative; bottom:0px; border-radius:5px; background-color:#20638C; color:#FFF;">
									<a href="https://twitter.com/axellejurin" target="_blank" style="padding:5px;color=#FFF;text-decoration:none;">Twitter</a>
									<a href="https://fr.linkedin.com/in/ajurin" target="_blank" style="padding:5px;color=#FFF;text-decoration:none;">Linkdin</a>
									<a href="https://github.com/ajurin" target="_blank" style="padding:5px;color=#FFF;text-decoration:none;">GitHub</a>
									<a href="" target="_blank" style="padding:5px;color=#FFF;text-decoration:none;">Viadeo</a>
								</footer>
							</body>
						</html>';*/
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
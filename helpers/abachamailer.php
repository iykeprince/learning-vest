<?php
class AbachaMailer{
    
    private $host;
    private $username;
    private $password;
    private $from_address;
    private $from_label;
    private $to_address;
    private $to_label;
    private $subject;
    private $body;
    
    public function __construct($host, $username, $password){
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }
    
    public function setSubject($subject= ""){
        $this->subject = $subject;
    }
    public function setTo($to_address, $to_label = ''){
        $this->to_address = $to_address;
        $this->to_label = $to_label;
    }
    public function setFrom($from_address, $from_label=''){
        $this->from_address = $from_address;
        $this->from_label = $from_label;
    }
    
	public function sendMail(){
		//send mail to the newly registered contestant
		$mail = new PHPMailer;

		$mail->SMTPDebug = 2;
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = $this->host;  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = $this->username;// SMTP username
		$mail->Password = $this->password;// SMTP password
		$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted (if you have ssl use ssl else use false)
		$mail->Port = 465; // TCP port to connect to

		$mail->setFrom($this->from_address, $this->from_label);
		$mail->addAddress($this->to_address, $this->to_label);     // Add a recipient
		//$mail->addReplyTo($email, $name);

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $this->subject;
		$mail->Body    = '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>Bitterio Trading</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
			<style>
				.bg_body {
					font-family: \'Barlow\', sans-serif;
					padding: 20px 15px; 
					font-size: 13px;
				}
				.bg_a {
					background-color:#41b3f9; 
					border: 1px solid #41b3f9; 
					padding: 10px 16px;
					border-radius: 4px;
					font-family: \'Barlow\', sans-serif; 
					font-size: 18px;
					color: #FFF;
				}
			</style>
			</head>
			<body>
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
				<tr>
				<td align="center" bgcolor="#fff" style="padding: 40px 0 30px 0; border-radius: 10px 10px 0px 0px;">
				 <img src="https://bitterio.com/public/assets/img/bit-logo.png" alt="Bitterio Logo" width="300" style="display: block;" />
				</td>
				</tr>
				<tr>
				<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
					<td align="center" class="bg_body">
					<p>Hello ' . $this->to_label . ', Welcome to a world of hourly crypto earnings; <br>where you get up to 20% profit of your Investment without stress.</p><p>Your Crypto Investment has been successfully confirmed and your tokens successfully purchased.<br>Now you can begin on your hourly earning adventure.</p>
					</td>
					</tr>
					<tr>
					<td align="center" style="padding: 10px 5px; ">
					<a width="120" style="text-decoration:none; color: #FFF;" href="https://www.bitterio.com/dashboard" height="40" class="bg_a">Dashboard</a>
					</td>
					</tr>

					</table>
				</td>
				</tr>
				<tr>
				<td bgcolor="#41b3f9" align="center" style="padding: 10px 5px; border-radius: 0px 0px 10px 10px; color: #FFF;">
				 2018 &copy; Bitterio 
				</td>
				</tr>
				</table>
			</body>
			</html>
		';
		//$mail->AltBody = $message."<br>".' Phone number: '.$phone;

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: <br>' . $mail->ErrorInfo;
		} else {
		    echo 'Message has been sent';
		}
	}
}
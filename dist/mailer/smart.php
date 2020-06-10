<?php

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.ukr.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'bloodfalka@ukr.net';                 // Наш логин
$mail->Password = 'Kq4Ac94H658Ra9b3';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 2525;                                    // TCP port to connect to

$mail->setFrom('bloodfalka@ukr.net', 'Pulse');   // От кого письмо
//$mail->addAddress('');     // Add a recipient
$mail->addAddress('bloodfallka@gmail.com');               // Name is optional
//$mail->addReplyTo('', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Данные';
$mail->Body    = '
		<h2 style="text-align: center;">Пользователь оставил данные</h2>
	<div style="text-align: center; color: blue;"> Имя: <span style= "color: black;">' . $name . '</span> </div>
	<div style="text-align: center; color: red;"> Номер телефона: <span style = "color: black;">' . $phone . '</span></div>
	<div style="text-align: center; color: red;">E-mail: <span style= "color: black;">' . $email . '</span></div>';

if(!$mail->send() || $email="" || $name="" || $phone="") {
    return false;
} else {
    return true;
}

?>
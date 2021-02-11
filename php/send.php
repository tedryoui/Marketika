<?php
// Файлы phpmailer
require 'PHPMailer.php';
require 'SMTP.php';
// Переменные
$name = $_POST['name'];
$email = $_POST['email'];
// Настройки
$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->Host = 'smtp.yandex.ru'; 
$mail->SMTPAuth = true; 
$mail->Username = 'ted.ryoui'; // Ваш логин в Яндексе. Именно логин, без @yandex.ru
$mail->Password = 'SUPERTED1'; // Ваш пароль
$mail->SMTPSecure = 'ssl'; 
$mail->Port = 465;
$mail->setFrom('ted.ryoui@yandex.by'); // Ваш Email
$mail->addAddress('kimigonumberone@gmail.com'); // Еще один email, если нужно.
// Прикрепление файлов
 for ($ct = 0; $ct < count($_FILES['userfile']['tmp_name']); $ct++) {
 $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['userfile']['name'][$ct]));
 $filename = $_FILES['userfile']['name'][$ct];
 if (move_uploaded_file($_FILES['userfile']['tmp_name'][$ct], $uploadfile)) {
 $mail->addAttachment($uploadfile, $filename);
 } else {
 $msg .= 'Failed to move file to ' . $uploadfile;
 }
 } 
 
// Письмо
$mail->isHTML(true); 
$mail->Subject = "Заголовок"; // Заголовок письма
$mail->Body = "Имя $name . Почта $email"; // Текст письма
// Результат
if(!$mail->send()) {
 echo 'Message could not be sent.';
 echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
 echo 'ok';
}
?>
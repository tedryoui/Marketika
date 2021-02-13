<?php 
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	if (isset($_POST['name']) && isset($_POST['email'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];

		require_once 'PHPMailer.php';
		require_once 'SMTP.php';
		require_once 'Exception.php';

		$mail = new PHPMailer();

		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Username = "yauheni.tushinskiy@gmail.com";
		$mail->Password = "Yy@29102002@yY";
		$mail->Port = 465;
		$mail->SMTPSecure = "ssl";

		$mail->isHTML(true);
		$mail->setFrom("yauheni.tushinskiy@gmail.com");
		$mail->addAddress($email);

		$mail->Subject = ("$email ($subject)");
		$mail->Body = "<h1>Hello mr. $name. You`ve been listed for the web translation, which will be for the whole next week</h1>";

		if($mail->send()) {
			$status = "success";
			$response = "Email is sent!";
		} else {
			$status = "failed";
			"Something is wrong";
		}

		exit(json_encode(array("status" => $status, "response" => $response)));
	}	
?>
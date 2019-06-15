<!-- gsuite form -->
<?php
include "conn.php";
if (isset($_POST["name"], $_POST["nameOrganization"], $_POST["phone"], $_POST["email"], $_POST["existingAssociate"], $_POST["description"])) {
	$send_call_query = 'INSERT INTO contact(name, nameOrganization,phone,email,existingAssociate,description) 
VALUES 
("' . $_POST['name'] . '","' . $_POST['nameOrganization'] . '","' . $_POST['phone'] . '","' . $_POST['email'] . '","' . $_POST['existingAssociate'] . '","' . $_POST['description'] . '")';
	$conn->query($send_call_query);
	$NA = $_POST['name'];
	$NO = $_POST['nameOrganization'];
	$PH = $_POST['phone'];
	$EA = $_POST['email'];
	$EXA = $_POST['existingAssociate'];
	$DES = $_POST['description'];

	$Message = 'name = ' . $NA . '<br /> nameOrganization = ' . $NO . '<br /> phone = ' . $PH . '<br /> Email = ' . $EA . '<br /> existingAssociate = ' . $EXA . '<br /> description = ' . $DES;
	include("class.phpmailer.php");

	date_default_timezone_set('Asia/Calcutta');
	define('SMTP_HOST', 'aspmx.l.google.com');
	define('SMTP_PORT', 25);
	define('SMTP_USERNAME', 'support@makemelive.in');
	define('SMTP_PASSWORD', 'newbeginning@1234');
	define('SMTP_AUTH', true);

	$mail  = new PHPMailer();
	$from  = 'support@makemelive.in';
	$mail->isSMTP();
	$mail->Host = SMTP_HOST;
	$mail->SMTPAuth = SMTP_AUTH;
	$mail->Username = SMTP_USERNAME;
	$mail->Password = SMTP_PASSWORD;
	$mail->Port = 25;
	$mail->SetFrom($from, $NA);
	$mail->AddReplyTo($from, $NA);
	$mail->Subject = ' Queries';
	$mail->MsgHTML($Message);
	$mail->AddAddress('support@makemelive.in', 'Makeme Live');


	$mail->IsHTML(true);
	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	}
}
// gsuite form end

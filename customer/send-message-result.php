<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<?php
header("Content-Type:text/html; charset=UTF-8");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';


$ComingName		=	Security($_POST["name"]);
$ComingEmail		=	Security($_POST["email"]);
$ComingSubject		=	Security($_POST["subject"]);
$ComingMessage		=	Security($_POST["message"]);

$MailGonder		=	new PHPMailer(true);
try{
    $SendMail->SMTPDebug			=	0;
    $SendMail->isSMTP();
    $SendMail->Host				=	'smtp.gmail.com';
    $SendMail->SMTPAuth			=	true;
    $SendMail->CharSet			=	'UTF-8';
    $SendMail->Username			=	'boutiquehotelantalya@gmail.com';
    $SendMail->Password			=	'b123456789.';
    $SendMail->SMTPSecure		=	'tls';
    $SendMail->Port				=	587;
    $SendMail->SMTPOptions		=	array(
											'ssl' => [
												'verify_peer' => false,
												'verify_peer_name' => false,
												'allow_self_signed' => true
											],
										);
    $SendMail->setFrom('boutiquehotelantalya@gmail.com', 'Boutique Hotel');
    $SendMail->addAddress('boutiquehotelantalya@gmail.com', 'Boutique Hotel');
    $SendMail->addReplyTo($ComingEmail, $ComingName);
    $SendMail->isHTML(true);
    $SendMail->Subject	=	$ComingSubject;
	$SendMail->MsgHTML($ComingMessage);
    //$SendMail->Body    = 'Mail's Body';
    //$SendMail->AltBody = 'Mail's Body (HTML mail kabul etmeyen sunucular için)';
    $SendMail->send();
    echo 'Mail Sended';
}catch(Exception $e) {
    echo 'Mail Send Error<br />Error Description : ', $SendMail->ErrorInfo;
}
?>
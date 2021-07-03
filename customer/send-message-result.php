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

$SendMail		=	new PHPMailer(true);
$condition = false;

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
    echo 'Mail Sended <br />';
    $condition = true;
}catch(Exception $e) {
    echo 'Mail Send Error<br />Error Description : ', $SendMail->ErrorInfo;
}

if($condition == true){

    $newMessageDate = date("Y-m-d H:i:s");

    $AddMessage			=	$DatabaseConnection->prepare("INSERT INTO message 
    (text, date, user_id) 
    values (?, ?, ?)");

    $AddMessage->execute([$ComingMessage, $newMessageDate, $Userid]);
    $RecordControl		=	$AddMessage->rowCount();

    if ($RecordControl>0) {
        echo "Message added to database";
    } else {
        echo "Error<br />";
        echo "An unexpected error occurred during the message process.<br />";
        echo "Please try again later.<br />";
    }

}
?>
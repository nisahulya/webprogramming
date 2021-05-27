<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>  

<?php
require_once("../connect.php");

if(isset($_POST["username"])){
	$ComingUsername		=	Filter($_POST["username"]);
}else{
	$ComingUsername		=	"";
}

if(isset($_POST["password"])){
	$ComingPassword				=	Filter($_POST["password"]);
}else{
	$ComingPassword				=	"";
}

if(isset($_POST["first_name"])){
	$ComingFirstName		=	Filter($_POST["first_name"]);
}else{
	$ComingFirstName		=	"";
}

if(isset($_POST["last_name"])){
	$ComingLastName		=	Filter($_POST["last_name"]);
}else{
	$ComingLastName		=	"";
}

if(isset($_POST["email"])){
	$ComingEmail		=	Filter($_POST["email"]);
}else{
	$ComingEmail		=	"";
}

if(isset($_POST["tel_no"])){
	$ComingTelNo		=	Filter($_POST["tel_no"]);
}else{
	$ComingTelNo		=	"";
}

if(isset($_POST["tc_no"])){
	$ComingTcNo		=	Filter($_POST["tc_no"]);
}else{
	$ComingTcNo		=	"";
}

// if(isset($_POST["reservation_id"])){
// 	$ComingReservationId		=	Filter($_POST["reservation_id"]);
// }else{
// 	$ComingReservationId		=	"";
// }

$ControlQuery			=	$DatabaseConnection->prepare("SELECT * FROM user WHERE username=? OR email=?");
$ControlQuery->execute([$ComingUsername, $ComingEmail]);
$ComingNumber			=	$ControlQuery->rowCount();

if($ComingNumber>0){
	echo "HATA<br />";
	echo "Kullanıcı Adı veya E-Mail Adresi Başka Bir Üye Tarafından Kullanılmaktadır.<br />";
}else{
	$AddRecord			=	$DatabaseConnection->prepare("INSERT INTO user (username, password, first_name, last_name,
    email, tel_no, tc_no) values (?, ?, ?, ?, ?, ?, ?)");
    $AddRecord->execute([$ComingUsername, $ComingPassword, $ComingFirstName, $ComingLastName,
    $ComingEmail, $ComingTelNo, $ComingTcNo]);
	$ControlRecord		=	$AddRecord->rowCount();
	
	if($ControlRecord>0){
		
	}else{
		echo "HATA<br />";
		echo "Kullanıcı Kaydı İşlemi Sırasında Beklenmeyen Bir Hata Oluştu.<br />";
		echo "Lütfen Daha Sonra Tekrar Deneyiniz.<br />";
		echo "Ana Sayafaya Dönmek İçin Lütfen Buraya .";
	}
}
?>
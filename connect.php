<?php

session_start(); ob_start();

try{
  $DatabaseConnection	=	new PDO("mysql:host=localhost;dbname=webprogramming;charset=UTF8", "root", "");
//   echo "Succesfully connected";
}catch(PDOException $Exception){
	echo "Connection failed:<br />" . $Exception->GetMessage();
	die();
}

function Security($Value){
	$One	=	trim($Value);
	$Two	=	strip_tags($One);
	$Three		=	htmlspecialchars($Two, ENT_QUOTES);
	$Result	=	$Three;
	return $Result;
}
if(isset($_SESSION["User"])){
	$UsersQuery			=	$DatabaseConnection->prepare("SELECT * FROM user WHERE username=?");
	$UsersQuery->execute([$_SESSION["User"]]);
	$UsersRecordNumber		=	$UsersQuery->rowCount();
	$UsersRecord			=	$UsersQuery->fetch(PDO::FETCH_ASSOC);
	
	if($UsersRecordNumber>0){
		$UserFirstName	=	$UsersRecord["first_name"];
		$UserLastName = $UsersRecord["last_name"];
		$Userid = $UsersRecord["user_id"];
	}else{
		$UserFirstName	=	"";
		$UserLastName	=	"";
		$Userid	=	"";
	}
}
?>
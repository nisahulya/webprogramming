<?php

session_start(); ob_start();

$servername = "localhost";
$username = "username";


// Create connection
$DatabaseConnection = mysqli_connect($servername, $username);

// Check connection
if (!$DatabaseConnection) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

function Filter($Value){
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
	}else{
		$UserFirstName	=	"";
		$UserLastName	=	"";
	}
}
?>
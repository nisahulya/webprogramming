<?php

session_start(); ob_start();

try{
  $DatabaseConnection	=	new PDO("mysql:host=localhost;dbname=webprogramming;charset=UTF8", "root", "");
  echo "Succesfully connected";
}catch(PDOException $Exception){
	echo "Connection failed:<br />" . $Exception->GetMessage();
	die();
}

function Filter($Value){
	$One	=	trim($Value);
	$Two	=	strip_tags($One);
	$Three		=	htmlspecialchars($Two, ENT_QUOTES);
	$Result	=	$Three;
	return $Result;
}
?>
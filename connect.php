<?php
try{
  $DatabaseConnection	=	new PDO("mysql:host=localhost;dbname=webprogramming;charset=UTF8", "root", "");
  echo "Succesfully connected";
}catch(PDOException $Exception){
	echo "Connection failed:<br />" . $Exception->GetMessage();
	die();
}
?>
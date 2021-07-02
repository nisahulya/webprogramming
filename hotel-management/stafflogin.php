<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>  
<?php
  require_once("../connect.php");
  if(isset($_POST["username"])){
    $ComingUserName		=	Security($_POST["username"]);
  }else{
    $ComingUserName		=	"";
  }
  
  if(isset($_POST["password"])){
    $ComingPassword				=	Security($_POST["password"]);
  }else{
    $ComingPassword				=	"";
  }

  $ControlQuery			=	$DatabaseConnection->prepare("SELECT * FROM staff WHERE staff_name=? AND staff_password=?");
  $ControlQuery->execute([$ComingUserName, $ComingPassword]);

  $ControlNumber			=	$ControlQuery->rowCount();


  if(($ControlNumber>0)){
    $_SESSION["User"]	=	$ComingUserName;
    header("Location:successlogin.php" );
    exit(); 
  }else{
    echo "ERROR<br />";
    echo "Girilen Bilgiler İle Eşleşen Personel Kaydı Bulunmamaktadır.<br />";
  }
?>
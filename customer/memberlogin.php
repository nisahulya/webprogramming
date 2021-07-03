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

  $ComingPasswordWithMd5 = md5($ComingPassword);

  $ControlQuery			=	$DatabaseConnection->prepare("SELECT * FROM user WHERE username=? AND password=?");
  $ControlQuery->execute([$ComingUserName, $ComingPasswordWithMd5]);


  $ControlNumber			=	$ControlQuery->rowCount();


  if(($ControlNumber>0) && ($_SERVER['HTTP_REFERER']=="https://localhost/webprogramming/customer/customer-reservation-result.php")){
    $_SESSION["User"]	=	$ComingUserName;
    header("Location:customer-reservation.php" );
    exit();
  }elseif($ControlNumber>0){
    $_SESSION["User"]	=	$ComingUserName;
    echo "Hello $ComingUserName. You have successfully logged in.";
    header("Location:successlogin.php" );
    exit();
  }else{
    echo "HATA<br />";
    echo "Girilen Bilgiler İle Eşleşen Kullanıcı Kaydı Bulunmamaktadır.<br />";
  }
?>
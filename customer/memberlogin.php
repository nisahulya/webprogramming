<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>  

<?php
  require_once("../connect.php");

  if(isset($_POST["username"])){
    $ComingUserName		=	Filter($_POST["username"]);
  }else{
    $ComingUserName		=	"";
  }
  
  if(isset($_POST["password"])){
    $ComingPassword				=	Filter($_POST["password"]);
  }else{
    $ComingPassword				=	"";
  }

  $ControlQuery			=	$DatabaseConnection->prepare("SELECT * FROM user WHERE username=? AND password=?");
  $ControlQuery->execute([$ComingUserName, $ComingPassword]);

  $ControlNumber			=	$ControlQuery->rowCount();

  if($ControlNumber>0){
    $_SESSION["User"]	=	$ComingUserName;
    header("Location:home.php");
    exit();
  }else{
    echo "HATA<br />";
    echo "Girilen Bilgiler İle Eşleşen Kullanıcı Kaydı Bulunmamaktadır.<br />";
  }
?>
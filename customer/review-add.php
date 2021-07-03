<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<?php 
    if(isset($_POST["comment"])){
        $ComingComment		=	Security($_POST["comment"]);
    }else{
        $ComingComment		=	"";
    }
    
    if(isset($_POST["point"])){
        $ComingPoint				=	Security($_POST["point"]);
    }else{
        $ComingPoint				=	"";
    }

    if(!isset($_COOKIE["reservationId"])) {
        echo "Cookie is not set!";
    } else {
        $ComingReservationId =$_COOKIE["reservationId"];
        //echo  $ComingReservationId;
    }
    
    // echo $ComingComment;
    // echo $ComingPoint;

    $newReviewDate = date("Y-m-d H:i:s");

    $AddReview		=	$DatabaseConnection->prepare("INSERT INTO review 
    (text, date, point, reservation_id) 
    values (?, ?, ?, ?)");

    $AddReview->execute([$ComingComment, $newReviewDate, $ComingPoint, $ComingReservationId]);
    $RecordControl		=	$AddReview->rowCount();

    if ($RecordControl>0) {
        echo "Review added";
    } else {
        echo "Error<br />";
        echo "An unexpected error occurred during the review process.<br />";
        echo "Please try again later.<br />";
    }
?>

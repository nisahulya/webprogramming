<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<?php 
$postComingCheckInDate = $_POST['ComingCheckInDate'];
$postComingCheckOutDate = $_POST['ComingCheckOutDate']; 
$postComingNumberOfPerson = $_POST['ComingNumberOfPerson']; 
$postselectedRoom = $_POST['selectedRoom']; 
$posttotalPrice = $_POST['totalPrice']; 
$postUserid = $_POST['Userid'];    

$AddReservation			=	$DatabaseConnection->prepare("INSERT INTO reservation 
(checkout_date, room_id, user_id, checkin_date, number_of_person, total_price) 
values (?, ?, ?, ?, ?, ?)");

$AddReservation->execute([$postComingCheckOutDate, $postselectedRoom, $postUserid,
$postComingCheckInDate, $postComingNumberOfPerson, $posttotalPrice]);
$RecordControl		=	$AddReservation->rowCount();


$ForReservationIdQuery =	$DatabaseConnection->prepare("SELECT reservation_id FROM reservation 
WHERE checkout_date='".$postComingCheckOutDate."' AND room_id='".$postselectedRoom."'AND user_id='".$postUserid."'AND 
checkin_date='".$postComingCheckInDate."' AND number_of_person='".$postComingNumberOfPerson."' AND total_price='".$posttotalPrice."'");

$ForReservationIdQuery->execute();
$RecordControl		=	$ForReservationIdQuery->rowCount();
$ThisReservation = $ForReservationIdQuery->fetch(PDO::FETCH_ASSOC);
$ThisReservationId = $ThisReservation["reservation_id"];
// echo $ThisReservationId;

$AddReservationToStatus	=	$DatabaseConnection->prepare("INSERT INTO status (room_id, reservation_id) values (?, ?)");
$AddReservationToStatus->execute([$postselectedRoom, $ThisReservationId]);
$RecordControlToStatus		=	$AddReservationToStatus->rowCount();

if ($RecordControl>0 && $RecordControlToStatus>0) {
    echo "Reservation added";
} else {
    echo "Error<br />";
    echo "An unexpected error occurred during the booking process.<br />";
    echo "Please try again later.<br />";
}
?>

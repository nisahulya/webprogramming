<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<?php 
$postComingCheckInDate = $_POST['ComingCheckInDate'];
$postComingCheckOutDate = $_POST['ComingCheckOutDate']; 
$postComingNumberOfPerson = $_POST['ComingNumberOfPerson']; 
$postselectedRoom = $_POST['selectedRoom']; 
$posttotalPrice = $_POST['totalPrice']; 
$postUserid = $_POST['Userid'];  
$postComingReservationId = $_POST['ComingReservationId'];  

$ChangeReservationQuery		=	$DatabaseConnection->prepare("UPDATE reservation SET checkin_date = ?, room_id = ?, number_of_person = ?,
total_price = ?, checkout_date=? WHERE reservation.reservation_id = ?");

$ChangeReservationQuery->execute([$postComingCheckInDate, $postselectedRoom, $postComingNumberOfPerson, $posttotalPrice, 
$postComingCheckOutDate, $postComingReservationId]);
$RecordControlforChangeReservation	=	$ChangeReservationQuery->rowCount();


$ChangeReservationInStatusQuery =	$DatabaseConnection->prepare("UPDATE status SET room_id = ?
WHERE status.reservation_id = ?");

$ChangeReservationInStatusQuery->execute([$postselectedRoom, $postComingReservationId ]);
$RecordControlforChangeReservationInStatus	=	$ChangeReservationInStatusQuery->rowCount();


if ($RecordControlforChangeReservation>0 && $RecordControlforChangeReservationInStatus>0) {
    echo "Reservation added";
} else {
    echo "Error<br />";
    echo "An unexpected error occurred during the booking process.<br />";
    echo "Please try again later.<br />";
}
?>

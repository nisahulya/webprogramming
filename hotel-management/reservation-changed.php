<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<?php 
$postComingCheckInDate = Security($_POST['ComingCheckInDate']);
$postComingCheckOutDate = Security($_POST['ComingCheckOutDate']); 
$postComingNumberOfPerson = Security($_POST['ComingNumberOfPerson']); 
$postselectedRoom = Security($_POST['selectedRoom']); 
$posttotalPrice = Security($_POST['totalPrice']); 
//$postUserid = Security( $_POST['Userid']);  
$postComingReservationId = Security($_POST['ComingReservationId']) ; 
$newReservationDate = date("Y-m-d H:i:s");

$ChangeReservationQuery		=	$DatabaseConnection->prepare("UPDATE reservation SET checkin_date = ?, room_id = ?, reservation_date = ?,
number_of_person = ?,total_price = ?, checkout_date=? WHERE reservation.reservation_id = ?");

$ChangeReservationQuery->execute([$postComingCheckInDate, $postselectedRoom, $newReservationDate, $postComingNumberOfPerson, $posttotalPrice, 
$postComingCheckOutDate, $postComingReservationId]);
$RecordControlforChangeReservation	=	$ChangeReservationQuery->rowCount();


$ChangeReservationInStatusQuery =	$DatabaseConnection->prepare("UPDATE status SET room_id = ?
WHERE status.reservation_id = ?");

$ChangeReservationInStatusQuery->execute([$postselectedRoom, $postComingReservationId ]);
$RecordControlforChangeReservationInStatus	=	$ChangeReservationInStatusQuery->rowCount();


if ($RecordControlforChangeReservation>0 && $RecordControlforChangeReservationInStatus>0) {
    echo "Reservation updated";
} else {
    echo "Error<br />";
    echo "An unexpected error occurred during the updating process.<br />";
    echo "Please try again later.<br />";
}
?>

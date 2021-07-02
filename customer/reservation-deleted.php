<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<?php 


if(!isset($_COOKIE["reservationId"])) {
    echo "Cookie is not set!";
} else {
    $ComingReservationId =$_COOKIE["reservationId"];
    // echo  $ComingReservationId;
}


$DeleteReservationInStatusQuery =	$DatabaseConnection->prepare("DELETE FROM status WHERE status.reservation_id = ?");

$DeleteReservationInStatusQuery->execute([$ComingReservationId]);
$RecordControlforDeleteReservationInStatus	=	$DeleteReservationInStatusQuery->rowCount();


$DeleteReservationQuery		=	$DatabaseConnection->prepare("DELETE FROM reservation WHERE reservation.reservation_id = ?");

$DeleteReservationQuery->execute([$ComingReservationId]);
$RecordControlforDeleteReservation	=	$DeleteReservationQuery->rowCount();



if ($RecordControlforDeleteReservation>0 && $RecordControlforDeleteReservationInStatus>0) {
    echo "Reservation deleted";
} else {
    echo "Error<br />";
    echo "An unexpected error occurred during the deleting process.<br />";
    echo "Please try again later.<br />";
}
?>

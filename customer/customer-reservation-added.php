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

if ($RecordControl>0) {
    echo "Reservation added";
} else {
    echo "Error<br />";
    echo "An unexpected error occurred during the booking process.<br />";
    echo "Please try again later.<br />";
}
?>

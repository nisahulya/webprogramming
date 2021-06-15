<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>
<?php
    
    if (isset($_POST["checkout_date"])) {
        $ComingCheckOutDate		=	$_POST["checkout_date"];
    } else {
        $ComingCheckOutDate		=	"";
    }
    if (isset($_POST["checkin_date"])) {
        $ComingCheckInDate		=	$_POST["checkin_date"];
    } else {
        $ComingCheckInDate		=	"";
    }
    if (isset($_POST["number_of_person"])) {
        $ComingNumberOfPerson		=	$_POST["number_of_person"];
    } else {
        $ComingNumberOfPerson		=	"";
    }


    $SearchEmptyRoomQuery =	$DatabaseConnection->prepare("SELECT room.room_id 
    FROM room 
    WHERE room.room_id NOT IN 
(
    SELECT R.room_id 
	FROM reservation R 
	JOIN status S ON R.reservation_id = S.reservation_id 
	WHERE R.checkin_date<? AND R.checkout_date>?
) AND room.number_of_person = ?");
    $SearchEmptyRoomQuery->execute([$ComingCheckInDate, $ComingCheckOutDate, $ComingNumberOfPerson]);;
    $RecordControl		=	$SearchEmptyRoomQuery->rowCount();

    if ($RecordControl>0) {
        echo "CONGRUGULATİONS <br />";
    } else {
         echo "ERROR <br />";
    }

    $EmptyRoomsRecord = $SearchEmptyRoomQuery->fetch(PDO::FETCH_ASSOC);
    $selectedRoom = $EmptyRoomsRecord["room_id"];
    echo $selectedRoom."<br />";
    

    
    // if (isset($_POST["checkout_date"])) {
    //     $ComingCheckOutDate		=	$_POST["checkout_date"];
    // } else {
    //     $ComingCheckOutDate		=	"";
    // }
    // if (isset($_POST["checkin_date"])) {
    //     $ComingCheckInDate		=	$_POST["checkin_date"];
    // } else {
    //     $ComingCheckInDate		=	"";
    // }
    // if (isset($_POST["number_of_person"])) {
    //     $ComingNumberOfPerson		=	$_POST["number_of_person"];
    // } else {
    //     $ComingNumberOfPerson		=	"";
    // }

    // $AddReservation			=	$DatabaseConnection->prepare("INSERT INTO reservation (checkout_date, room_id, user_id, checkin_date, number_of_person, total_price) values (?, ?, ?, ?, ?, ?)");
    // $AddReservation->execute([$ComingCheckOutDate, 1, 1, $ComingCheckInDate, $ComingNumberOfPerson, 500]);
    // $RecordControl		=	$AddReservation->rowCount();


    // if ($RecordControl>0) {
    //     echo "TEBRİKLER<br />";
    //     echo "Reservation added";
    // } else {
    //      echo "HATA<br />";
    //     echo "Kullanıcı Kaydı İşlemi Sırasında Beklenmeyen Bir Hata Oluştu.<br />";
    //     echo "Lütfen Daha Sonra Tekrar Deneyiniz.<br />";
    // }
?>

<div class="container">
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <br>
            <p> We have a place for <span id="numberofperson"><?php echo $ComingNumberOfPerson ?></span>
                people in room <span> <?php echo $selectedRoom ?> </span>
                <br> between <span id="check-indate"><?php echo $ComingCheckInDate ?></span> and <span
                    id="check-outdate"><?php echo $ComingCheckOutDate ?></span>.
            </p>
            <p id="p"></p>
            <br>
            <h4>Total Cost:
                <?php 
                $date1_ts = strtotime($ComingCheckInDate);
                $date2_ts = strtotime($ComingCheckOutDate);
                $diff = $date2_ts - $date1_ts;
                $daysNumber = round($diff / 86400);
                if($ComingNumberOfPerson==1){
                    $totalPrice = $daysNumber*500;
                    echo $totalPrice;
                }elseif($ComingNumberOfPerson==2){
                    $totalPrice = $daysNumber*900;
                    echo $totalPrice;
                }else{
                    $totalPrice = $daysNumber*1200;
                    echo $totalPrice;
                }
            ?>
            </h4>
            <br>
            <!-- <button class="btn btn-info" data-toggle="modal" data-target="#myModal">Confirm</button> -->
            <form action="customer-reservation-result.php" method="POST">
                <input type="submit" name="submitbutton" value="Confirm" class="btn btn-info" data-toggle="modal"
                data-target="#myModal" />
            </form>            
        </div>
    </div>
</div>


<?php 
if (isset($_SESSION['User']) && isset($_POST['submitbutton'])) { ?>
<?php
    $AddReservation			=	$DatabaseConnection->prepare("INSERT INTO reservation 
    (checkout_date, room_id, user_id, checkin_date, number_of_person, total_price) values (?, ?, ?, ?, ?, ?)");
    $AddReservation->execute([$ComingCheckOutDate, $selectedRoom, $Userid, $ComingCheckInDate, $ComingNumberOfPerson, $totalPrice]);
    $RecordControl		=	$AddReservation->rowCount();


    if ($RecordControl>0) {
        echo "TEBRİKLER<br />";
        echo "Reservation added";
    } else {
         echo "HATA<br />";
        echo "Kullanıcı Kaydı İşlemi Sırasında Beklenmeyen Bir Hata Oluştu.<br />";
        echo "Lütfen Daha Sonra Tekrar Deneyiniz.<br />";
    }
    ?>
<?php } else { ?>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h4 class="modal-title w-100">Please Login!</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                If you don't have an account please Sign-up
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>
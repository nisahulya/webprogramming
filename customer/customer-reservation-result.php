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

    $EmptyRoomsRecord = $SearchEmptyRoomQuery->fetchAll(PDO::FETCH_ASSOC);
    foreach($EmptyRoomsRecord as $Record){
        $roomid		=	$Record["room_id"];
        echo $roomid."<br />";
    }


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


<div class="col-sm-6">
    <div id="info" style="display:none;">
        <p> We have a place for <span id="numberofperson"></span> people in room 3 between <span
                id="check-indate"></span> and <span id="check-outdate"></span> </p>
        <p id="p"></p>
        <br>
        <h4>Total Cost: 1234 TL</h4>
        <br>
        <button class="btn btn-info" data-toggle="modal" data-target="#myModal">Confirm</button>
        <?php if (isset($_SESSION["User"])) { ?>
        <!-- Rezervasyon veritabanına yazılıp... -->
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
    </div>
</div>
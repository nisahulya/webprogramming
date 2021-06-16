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
    if (isset($_POST["reservation_id"])) {
        $ComingReservationId		=	$_POST["reservation_id"];
    } else {
        $ComingReservationId		=	"";
    }

    // echo $ComingReservationId;
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

    // if ($RecordControl>0) {
    //     echo "CONGRUGULATIONS <br />";
    // } else {
    //      echo "ERROR <br />";
    // }

    $EmptyRoomsRecord = $SearchEmptyRoomQuery->fetch(PDO::FETCH_ASSOC);
    $selectedRoom = $EmptyRoomsRecord["room_id"];
    // echo $selectedRoom."<br />";
    
?>

<div class="container">
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <br>
            <br>
            <br>
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
                TL </h4>
            <br>
        </div>
    </div>
</div>

<form action="reservation-changed.php" method="POST">

    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <input type="submit" name="submitbutton" value="Confirm" class="btn btn-info" />
            </div>
        </div>
    </div>

    <input type="hidden" id="ComingCheckInDate" name="ComingCheckInDate" value="<?php echo $ComingCheckInDate;?>">

    <input type="hidden" id="ComingCheckOutDate" name="ComingCheckOutDate" value="<?php echo $ComingCheckOutDate;?>">

    <input type="hidden" id="ComingCheckOutDate" name="ComingReservationId" value="<?php echo $ComingReservationId;?>">

    <input type="hidden" id="ComingNumberOfPerson" name="ComingNumberOfPerson"
        value="<?php echo $ComingNumberOfPerson;?>">

    <input type="hidden" id="selectedRoom" name="selectedRoom" value="<?php echo $selectedRoom;?>">

    <input type="hidden" id="totalPrice" name="totalPrice" value="<?php echo $totalPrice;?>">

    <input type="hidden" id="Userid" name="Userid" value="<?php echo $Userid;?>">
</form>
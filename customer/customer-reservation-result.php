<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>
<?php
    
    if (isset($_POST["checkout_date"])) {
        $ComingCheckOutDate		=	Security($_POST["checkout_date"]);
    } else {
        $ComingCheckOutDate		=	"";
    }
    if (isset($_POST["checkin_date"])) {
        $ComingCheckInDate		=	Security($_POST["checkin_date"]);
    } else {
        $ComingCheckInDate		=	"";
    }
    if (isset($_POST["number_of_person"])) {
        $ComingNumberOfPerson		=	Security($_POST["number_of_person"]);
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
	WHERE R.checkin_date<=? AND R.checkout_date>=?
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

<?php 
    $currentDate = date("Y-m-d H:i:s");
    
    $comingCheckinDateWithoutSecurity = $_POST['ComingCheckInDate'];
    $comingCheckoutDateWithoutSecurity = $_POST['ComingCheckOutDate'];

    if ($comingCheckinDateWithoutSecurity <= $currentDate && $comingCheckoutDateWithoutSecurity <= $comingCheckinDateWithoutSecurity) {
        echo "Please choose invalid dates";
    }else if(empty($selectedRoom)) {
        header("Location: cannot-found-room.php");
        exit();
    }else{
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
        if ($ComingNumberOfPerson==1) {
            $totalPrice = $daysNumber*500;
            echo $totalPrice;
        } elseif ($ComingNumberOfPerson==2) {
            $totalPrice = $daysNumber*900;
            echo $totalPrice;
        } else {
            $totalPrice = $daysNumber*1200;
            echo $totalPrice;
        } ?>
            TL </h4>
            <br>
        </div>
    </div>
</div>

<?php  } ?>

<?php 
if (isset($_SESSION['User'])) {
?>

<form action="customer-reservation-added.php" method="POST">

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

    <input type="hidden" id="ComingNumberOfPerson" name="ComingNumberOfPerson"
        value="<?php echo $ComingNumberOfPerson;?>">

    <input type="hidden" id="selectedRoom" name="selectedRoom" value="<?php echo $selectedRoom;?>">

    <input type="hidden" id="totalPrice" name="totalPrice" value="<?php echo $totalPrice;?>">

    <input type="hidden" id="Userid" name="Userid" value="<?php echo $Userid;?>">
</form>


<?php } else { ?>
<div class="container">
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <input type="submit" value="Confirm" class="btn btn-info" data-toggle="modal" data-target="#myModal" />
        </div>
    </div>
</div>

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
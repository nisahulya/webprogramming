<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<?php

    if (isset($_POST["name"])) {
        $Comingname		=	Security($_POST["name"]);
    } else {
        $Comingname		=	"";
    }

    if (isset($_POST["surname"])) {
        $Comingsurname		=	Security($_POST["surname"]);
    } else {
        $Comingsurname	=	"";
    }

    if (isset($_POST["email"])) {
        $Comingemail		=	Security($_POST["email"]);
    } else {
        $Comingemail		=	"";
    }

    if (isset($_POST["phonenumber"])) {
        $Comingphonenumber	=	Security($_POST["phonenumber"]);
    } else {
        $Comingphonenumber		=	"";
    }

    if (isset($_POST["totalPrice"])) {
        $ComingtotalPrice	=	Security($_POST["totalPrice"]);
    } else {
        $ComingtotalPrice		=	"";
    }
    // echo var_dump($ComingtotalPrice);
    // echo $ComingtotalPrice;

    if(!isset($_COOKIE["roomId"])) {
        echo "Cookie is not set!";
    } else {
        $ComingroomId =$_COOKIE["roomId"];
        // echo  $ComingroomId;
    }

    if(!isset($_COOKIE["checkoutdate"])) {
        echo "Cookie is not set!";
    } else {
        $Comingcheckoutdate =$_COOKIE["checkoutdate"];
       // echo  $Comingcheckoutdate;
    }

    if(!isset($_COOKIE["checkindate"])) {
        echo "Cookie is not set!";
    } else {
        $Comingcheckindate =$_COOKIE["checkindate"];
        //echo  $Comingcheckindate;
    }
    if(!isset($_COOKIE["number_of_person"])) {
        echo "Cookie is not set!";
    } else {
        $Comingnumber_of_person =$_COOKIE["number_of_person"];
        //echo  $Comingnumber_of_person;
    }

    // echo $Comingemail;

    $IsThereUserQuery =	$DatabaseConnection->prepare("SELECT user.user_id FROM user WHERE email=?");
    $IsThereUserQuery->execute([$Comingemail]);;
    $RecordControl		=	$IsThereUserQuery->rowCount();
    $SelectedUserId = $IsThereUserQuery->fetch(PDO::FETCH_ASSOC);
    $NowUserId = $SelectedUserId["user_id"];
    echo $NowUserId;
    if ($RecordControl>0) {
        $AddReservation			=	$DatabaseConnection->prepare("INSERT INTO reservation 
        (checkout_date, room_id, user_id, checkin_date, number_of_person, total_price) 
        values (?, ?, ?, ?, ?, ?)");

        $AddReservation->execute([$Comingcheckoutdate, $ComingroomId, $NowUserId,
        $Comingcheckindate, $Comingnumber_of_person, 
        $ComingtotalPrice]);
        //echo $ComingtotalPrice;
        $RecordControl6		=	$AddReservation->rowCount();
        //echo $RecordControl6;
        $ForReservationIdQuery =	$DatabaseConnection->prepare("SELECT reservation_id FROM reservation 
        WHERE checkout_date=? AND room_id=? AND user_id=? AND 
        checkin_date=?  AND number_of_person=?  AND total_price=? ");

        $ForReservationIdQuery->execute([$Comingcheckoutdate, $ComingroomId, $NowUserId, $Comingcheckindate, $Comingnumber_of_person,
        $ComingtotalPrice]);
        //echo $ComingtotalPrice;
        $RecordControl2		=	$ForReservationIdQuery->rowCount();
        $ThisReservation = $ForReservationIdQuery->fetch(PDO::FETCH_ASSOC);
        $ThisReservationId = $ThisReservation["reservation_id"];

        $AddReservationToStatus	=	$DatabaseConnection->prepare("INSERT INTO status (room_id, reservation_id) values (?, ?)");
        $AddReservationToStatus->execute([$ComingroomId, $ThisReservationId]);
        $RecordControlToStatus		=	$AddReservationToStatus->rowCount();

        
    } else {
        $AddUser			=	$DatabaseConnection->prepare("INSERT INTO user 
        (username, first_name, last_name, email, password, tel_no, tc_no) 
        values (?, ?, ?, ?, ?, ?, ?)");

        $AddUser->execute(["otomatic", $Comingname, $Comingsurname,
        $Comingemail, "otomatic", $Comingphonenumber, "0000000"]);
        $RecordControl3		=	$AddUser->rowCount();

        $ForUserIdQuery =	$DatabaseConnection->prepare("SELECT user_id FROM user 
        WHERE email=? ");

        $ForUserIdQuery->execute([$Comingemail]);
        $RecordControl4		=	$ForUserIdQuery->rowCount();
        $ThisUser = $ForUserIdQuery->fetch(PDO::FETCH_ASSOC);
        $ThisUserId = $ThisUser["user_id"];

        $AddReservation			=	$DatabaseConnection->prepare("INSERT INTO reservation 
        (checkout_date, room_id, user_id, checkin_date, number_of_person, total_price) 
        values (?, ?, ?, ?, ?, ?)");

        $AddReservation->execute([$Comingcheckoutdate, $ComingroomId, $ThisUserId,
        $Comingcheckindate, $Comingnumber_of_person, $ComingtotalPrice]);
        $RecordControl6		=	$AddReservation->rowCount();

        $ForReservationIdQuery =	$DatabaseConnection->prepare("SELECT reservation_id FROM reservation 
        WHERE checkout_date=? AND room_id=? AND user_id=? AND 
        checkin_date=?  AND number_of_person=?  AND total_price=? ");

        $ForReservationIdQuery->execute([$Comingcheckoutdate, $ComingroomId, $ThisUserId, $Comingcheckindate, $Comingnumber_of_person,
        $ComingtotalPrice]);
        $RecordControl2		=	$ForReservationIdQuery->rowCount();
        $ThisReservation = $ForReservationIdQuery->fetch(PDO::FETCH_ASSOC);
        $ThisReservationId = $ThisReservation["reservation_id"];

        $AddReservationToStatus	=	$DatabaseConnection->prepare("INSERT INTO status (room_id, reservation_id) values (?, ?)");
        $AddReservationToStatus->execute([$ComingroomId, $ThisReservationId]);
        $RecordControlToStatus		=	$AddReservationToStatus->rowCount();
    }

    if ($RecordControl6>0 && $RecordControlToStatus>0) {
        echo "Reservation added";
    } else {
        echo "Error<br />";
        echo "An unexpected error occurred during the booking process.<br />";
        echo "Please try again later.<br />";
    }

?>
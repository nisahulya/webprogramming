<?php include 'navbar.php'; ?>

<head>
    <style>
    .button {
        background-color: #09a3d1;
        border: none;
        color: white;
        padding: 6px 14px;
        text-align: center;
        font-size: 16px;
        margin: 4px 2px;
        opacity: 0.7;
        transition: 0.3s;
        display: inline-block;
        text-decoration: none;
        cursor: pointer;
    }
    </style>
</head>

<body>

    <?php  

$SearchByReservationIdQuery	=	$DatabaseConnection->prepare("SELECT number_of_person, room_id, checkin_date, checkout_date 
FROM reservation WHERE user_id=? ");

$SearchByReservationIdQuery->execute([$Userid]);
$RecordControlForUser	=	$SearchByReservationIdQuery->rowCount();
$ThisReservation = $SearchByReservationIdQuery->fetch(PDO::FETCH_ASSOC);
$ThisNumberOfPerson = $ThisReservation["number_of_person"];
$ThisRoomId = $ThisReservation["room_id"];
$ThisCheckinDate = $ThisReservation["checkin_date"];
$ThisCheckoutDate = $ThisReservation["checkout_date"];
// echo $ThisNumberOfPerson;  
// echo $ThisRoomId;  
// echo $ThisCheckinDate; 
// echo $ThisCheckoutDate;  

?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <br>
                <br>
                <br>
                <br>
                <br>

                <h4>Reservation Details:</h4>
                <br>
                <div id="info">
                    <p>You have a reservation for <span>
                            <?php echo $ThisNumberOfPerson  ?>
                        </span>
                        people in room <span>
                            <?php echo $ThisRoomId  ?>
                        </span>
                        between <br> <span>
                            <?php echo $ThisCheckinDate  ?>
                        </span> and <span>
                            <?php echo $ThisCheckoutDate  ?>
                        </span>.</p>
                    <br>
                    <p>Please update if you want to change.</p>

                </div>
            </div>


            <div class="col-sm-6">
                <form action="update-reservation-information.php" method="post">
                    <br>
                    <h4 for="check-in">Dates:</h4>

                    <label for="check-in">Check-in:</label>
                    <input type="date" value="<?php echo $ThisCheckinDate;?>" class="form-control" id="check-in" name="checkin_date">

                    <br>

                    <label for="check-out">Check-out:</label>
                    <input type="date" value="<?php echo $ThisCheckoutDate;?>" class="form-control" id="check-out" name="checkout_date">

                    <br>
                    <div>
                        <h4 for="check-in">Number of Person:</h4>

                        <label for="numberofguests">Number of Person:</label>
                        <input type="number" value="<?php echo $ThisNumberOfPerson;?>" class="form-control" id="numberofguests" name="number_of_person">
                    </div>
                    <br>

                    <input type="submit" class="btn btn-info" value="Update">
                </form>
            </div>
            <br>
            <br>
            <br>

            <!-- <div class="col-sm-2">

            </div>
            <div class="col-sm-5">
                <br>
                <br>
                <h4 for="check-in">Enter Dates:</h4>
                <form class="form-inline" action="/action_page.php">
                    <label for="check-in">Check-in:</label>
                    <input type="date" value="<?php echo $ThisCheckinDate;?>" class="form-control" placeholder="Enter check-in" id="check-in">
                </form>
                <br>
                <form class="form-inline" action="/action_page.php">
                    <label for="check-out">Check-out:</label>
                    <input type="date" value="<?php echo $ThisCheckoutDate;?>" class="form-control" placeholder="Enter check-out" id="check-out">
                </form>
                <br>
                <br>
                <div>
                    <h4 for="check-in">Enter Number of Person:</h4>
                    <form class="form-inline" action="/action_page.php">
                        <label for="numberofguests">Number of Person:</label>
                        <input type="number" value="<?php echo $ThisNumberOfPerson;?>" class="form-control" id="numberofguests">
                    </form>
                </div>
                <br>
                <br>
                <form>
                    <input class="btn btn-info"  type="submit" value="Update" onclick="msg()" >
                </form>
            </div>
            <br>
            <br>
            <br>
            <br>
        </div> -->
        </div>
</body>

<?php include 'footer.php'; ?>
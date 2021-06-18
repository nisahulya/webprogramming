<?php include 'navbar.php'; ?>

<head>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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

// $SearchByReservationIdQuery	=	$DatabaseConnection->prepare("SELECT reservation_id, number_of_person, room_id, checkin_date, checkout_date 
// FROM reservation WHERE user_id=? ");

// $SearchByReservationIdQuery->execute([$Userid]);
// $RecordControlForUser	=	$SearchByReservationIdQuery->rowCount();
// $ThisReservation = $SearchByReservationIdQuery->fetch(PDO::FETCH_ASSOC);
// $ThisNumberOfPerson = $ThisReservation["number_of_person"];
// $ThisRoomId = $ThisReservation["room_id"];
// $ThisCheckinDate = $ThisReservation["checkin_date"];
// $ThisCheckoutDate = $ThisReservation["checkout_date"];
// $ThisReservationId = $ThisReservation["reservation_id"];
// echo $ThisNumberOfPerson;  
// echo $ThisRoomId;  
// echo $ThisCheckinDate; 
// echo $ThisCheckoutDate; 
 

    ?>
    <div class="container">
        <div class="row">
            <?php
                echo "<table id='myTable 'class='table table-hover' style='border-collapse: collapse; margin-left:auto; margin-right:auto; margin-top:50px;'>";
                echo " <thead class='thead-light'> <tr> <th scope='col'>res</th> <th scope='col'>Check-in Date</th> 
                <th scope='col'>Check-out Date</th> <th scope='col'>Number of Person</th> <th scope='col'>Room Number</th> <th scope='col'>Update/Remove</th>
                </tr> </thead>";

                class TableRows extends RecursiveIteratorIterator {
                    function __construct($it) {
                        parent::__construct($it, self::LEAVES_ONLY);
                    }

                    function current() {
                        return "<td >" . parent::current(). "</td>";
                        
                    }
                    
                    function beginChildren() {
                        echo "<tr>";
                    }

                    function endChildren() {
                        echo "<td style='text-align:center'> <button type='button' class='mybutton btn btn-success btn-xs'  ><i class='fas fa-pencil-alt'></i></button> 
                        <button type='button' class='mybutton btn btn-danger btn-xs'  > <i class='fas fa-times'></i> </button> </td> </tr>" . "\n";
                    }
                }

                try {
                    $DatabaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $DatabaseConnection->prepare("SELECT reservation_id,checkin_date, checkout_date,number_of_person, room_id 
                    FROM reservation WHERE user_id=? ");
                    $stmt->execute([$Userid]);

                    // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                     

                    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                        echo $v;
                    }
                }
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }

                echo "</table>";
                ?>

            <!-- <br>
                <br>
                <br>
                <br>
                <br>

                <h4>Reservation Details:</h4>
                <br>
                <div id="info">
                    <p>You have a reservation for <span>
                            <?php # echo $ThisNumberOfPerson  ?>
                        </span>
                        people in room <span>
                            <?php #echo $ThisRoomId  ?>
                        </span>
                        between <br> <span>
                            <?php #echo $ThisCheckinDate  ?>
                        </span> and <span>
                            <?php #echo $ThisCheckoutDate  ?>
                        </span>.</p>
                    <br>
                    <p>Please update if you want to change.</p>

                </div> -->

            <!-- <div class="col-sm-4"> -->
            <!-- <form action="update-reservation-information.php" method="post">
                    <br>
                    <h4 for="check-in">Dates:</h4>

                    <label for="check-in">Check-in:</label>
                    <input type="date" value="<?php #echo $ThisCheckinDate;?>" class="form-control" id="check-in" name="checkin_date">

                    <br>

                    <label for="check-out">Check-out:</label>
                    <input type="date" value="<?php #echo $ThisCheckoutDate;?>" class="form-control" id="check-out" name="checkout_date">

                    <br>
                    <div>
                        <h4 for="check-in">Number of Person:</h4>

                        <label for="numberofguests">Number of Person:</label>
                        <input type="number" value="<?php #echo $ThisNumberOfPerson;?>" class="form-control" id="numberofguests" name="number_of_person">
                    </div>
                    <br>
                    <input type="hidden" value="<?php #echo $ThisReservationId;?>"  id="reservation_id" name="reservation_id">
                    <input type="submit" class="btn btn-info" value="Update">
                </form>
            </div>
            <br>
            <br>
            <br> -->

            <!-- <div class="col-sm-2">

            </div>
            <div class="col-sm-5">
                <br>
                <br>
                <h4 for="check-in">Enter Dates:</h4>
                <form class="form-inline" action="/action_page.php">
                    <label for="check-in">Check-in:</label>
                    <input type="date" value="<?php #echo $ThisCheckinDate;?>" class="form-control" placeholder="Enter check-in" id="check-in">
                </form>
                <br>
                <form class="form-inline" action="/action_page.php">
                    <label for="check-out">Check-out:</label>
                    <input type="date" value="<?php #echo $ThisCheckoutDate;?>" class="form-control" placeholder="Enter check-out" id="check-out">
                </form>
                <br>
                <br>
                <div>
                    <h4 for="check-in">Enter Number of Person:</h4>
                    <form class="form-inline" action="/action_page.php">
                        <label for="numberofguests">Number of Person:</label>
                        <input type="number" value="<?php #echo $ThisNumberOfPerson;?>" class="form-control" id="numberofguests">
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
    <script>
        $(".mybutton").click(function(){
            var selectedReservationId = $(this).parent().siblings().eq(0).text()
            alert(selectedReservationId);
        });
    </script>
</body>

<?php include 'footer.php'; ?>
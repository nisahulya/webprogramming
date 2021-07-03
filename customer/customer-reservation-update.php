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
                echo "<table id='myTable 'class='table table-hover' style='border-collapse: collapse; margin-left:auto; margin-right:auto; 
                margin-top:50px;'>";
                echo " <thead class='thead-light'> <tr> <th scope='col'>res</th> <th scope='col'>Check-in Date</th> 
                <th scope='col'>Check-out Date</th> <th scope='col'>Number of Person</th> <th scope='col'>Room Number</th> 
                <th scope='col'>Update/Remove</th>
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
                        echo "<td style='text-align:center'> 
                        
                        <button type='button' class='myupdatebutton btn btn-success btn-xs'  ><i class='fas fa-pencil-alt'></i></button>

                        <button type='button' class='mydeletebutton btn btn-danger btn-xs'  > <i class='fas fa-times'></i> </button>

                        <button type='button' class='myreviewbutton btn btn-info btn-xs'  > <i class='fas fa-spell-check'></i> </button>
                        </td> </tr>" . "\n";
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
        </div>

        <div id="sonuc"></div>
    <script type="text/javascript" language="javascript">
        $(".myupdatebutton").click(function(){
            var selectedReservationId = $(this).parent().siblings().eq(0).text()
            console.log(selectedReservationId);
            localStorage.setItem("storageSelectedReservationId",selectedReservationId);

            document.cookie = "reservationId=" + selectedReservationId;
            location.href = "https://localhost/webprogramming/customer/update-reservation-information.php";
        });

        $(".mydeletebutton").click(function(){
            var selectedReservationId = $(this).parent().siblings().eq(0).text()
            
            document.cookie = "reservationId=" + selectedReservationId;
            location.href = "https://localhost/webprogramming/customer/reservation-deleted.php";
        });

        $(".myreviewbutton").click(function(){
            var selectedReservationId = $(this).parent().siblings().eq(0).text()
            
            document.cookie = "reservationId=" + selectedReservationId;
            location.href = "https://localhost/webprogramming/customer/review.php";
        });

    </script>
</body>

<?php include 'footer.php'; ?>
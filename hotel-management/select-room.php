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

    setcookie("checkoutdate", $ComingCheckOutDate,  time() + (86400 * 30), "/");
    setcookie("checkindate", $ComingCheckInDate,  time() + (86400 * 30), "/");
    setcookie("number_of_person", $ComingNumberOfPerson,  time() + (86400 * 30), "/");


    // echo $ComingCheckOutDate;
    // echo $ComingCheckInDate;
    // echo $ComingNumberOfPerson;
?>

<head>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <form action="new-customer.php" method="POST">
        <input type="hidden" id="ComingCheckInDate" name="ComingCheckInDate" value="<?php echo $ComingCheckInDate;?>">

        <input type="hidden" id="ComingCheckOutDate" name="ComingCheckOutDate" value="<?php echo $ComingCheckOutDate;?>">

        <input type="hidden" id="ComingNumberOfPerson" name="ComingNumberOfPerson"
        value="<?php echo $ComingNumberOfPerson;?>">
      
    </form>
    <br>
    <h5  style='text-align:center; color:hotpink'>Please Select a Room number</h5>
    <div class="container">
        <div class="row">
            <?php
                echo "<table id='myTable 'class='table table-hover' style='border-collapse: collapse; 
                margin-left:auto; margin-right:auto; 
                margin-top:50px; width: 50%; height: 50%'>";
                echo " <thead class='thead-light'> <tr> <th scope='col' style='text-align:center'>Room Number</th> 
                <th scope='col' style='text-align:center'>Select</th>
                </tr> </thead>";

                class TableRows extends RecursiveIteratorIterator {
                    function __construct($it) {
                        parent::__construct($it, self::LEAVES_ONLY);
                    }

                    function current() {
                        return "<td style='text-align:center'>" . parent::current(). "</td>";
                        
                    }
                    
                    function beginChildren() {
                        echo "<tr>";
                    }

                    function endChildren() {
                        echo "<td style='text-align:center'> 

                        <button type='button' class='myselectbutton btn btn-success btn-xs'  > 
                        <i class='fas fa-bed'></i> </button>
                        </td> </tr>" . "\n";
                    }
                }

                try {
                    $DatabaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $DatabaseConnection->prepare("SELECT room.room_id 
                    FROM room 
                    WHERE room.room_id NOT IN 
                    (
                    SELECT R.room_id 
                    FROM reservation R 
                    JOIN status S ON R.reservation_id = S.reservation_id 
                    WHERE R.checkin_date<=? AND R.checkout_date>=?
                    ) AND room.number_of_person = ?");
                    $stmt->execute([$ComingCheckInDate, $ComingCheckOutDate, $ComingNumberOfPerson]);

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

    <script type="text/javascript" language="javascript">

        $(".myselectbutton").click(function(){
            var selectedRoomId = $(this).parent().siblings().eq(0).text()
            document.cookie = "roomId=" + selectedRoomId;
            location.href = "https://localhost/webprogramming/hotel-management/new-customer.php";
        });

    </script>
</body>

<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<head>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>    
    <style>
    #nav-cusname {
        margin-top: 50px;
    }
    </style>
</head>

<?php 
    if(isset($_POST["username"])){
        $ComingUserName		=	Security($_POST["username"]);
    }else{
        $ComingUserName		=	"";
    }

    $UserIdQuery =	$DatabaseConnection->prepare("SELECT user.user_id FROM user WHERE username=?");
    $UserIdQuery->execute([$ComingUserName]);;
    $RecordControl		=	$UserIdQuery->rowCount();
    $FoundedUserId = $UserIdQuery->fetch(PDO::FETCH_ASSOC);
    $NowUserId = $FoundedUserId["user_id"];
?>

<body>
    <div class="tab-pane fade show active" id="nav-cusname" role="tabpanel" aria-labelledby="nav-cusname-tab">
        <form id="searchnameform">
            <div class="form-row">
                <div class="form-group col-2">

                </div>
                <div class="form-group col-6">
                    <input type="text" name="username" id="username" placeholder="<?php echo $ComingUserName ?>"
                        class="form-control" required>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-2">
                    <input class="btn btn-info w-100" type="submit" value="Search">
                </div>
                <div class="form-group col-2">

                </div>
            </div>
        </form>
    </div>

    <div class="container">
        <div class="row">
            <?php
                echo "<table id='myTable 'class='table table-hover' style='border-collapse: collapse; margin-left:auto; margin-right:auto; 
                margin-top:20px;'>";
                echo " <thead class='thead-light'> <tr> <th scope='col'>Res</th> <th scope='col'>Check-in Date</th> 
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
                        </td> </tr>" . "\n";
                    }
                }

                try {
                    $DatabaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $DatabaseConnection->prepare("SELECT reservation_id,checkin_date, checkout_date,number_of_person, room_id 
                    FROM reservation WHERE user_id=? ");
                    $stmt->execute([$NowUserId]);

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
        $(".myupdatebutton").click(function() {
            var selectedReservationId = $(this).parent().siblings().eq(0).text()
            console.log(selectedReservationId);
            localStorage.setItem("storageSelectedReservationId", selectedReservationId);

            document.cookie = "reservationId=" + selectedReservationId;
            location.href = "https://localhost/webprogramming/hotel-management/update-reservation-information.php";
        });

        $(".mydeletebutton").click(function() {
            var selectedReservationId = $(this).parent().siblings().eq(0).text()

            document.cookie = "reservationId=" + selectedReservationId;
            location.href = "https://localhost/webprogramming/hotel-management/reservation-deleted.php";
        });
        </script>
</body>
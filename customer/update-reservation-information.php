<?php include 'navbar.php'; ?>

<head>
    <style>
    #info {
        margin-top: 100px;
        margin-left: 90px;
    }

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
        font-weight: bold;
    }

    .modal-body {
        text-align: center;
        font-family: Tahoma;
    }
    </style>
</head>

<body>
<?php

// if(!isset($_COOKIE["reservationId"])) {
//   echo "Cookie named is not set!";
// } else {
//   echo $_COOKIE["reservationId"];
// }

?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form action="update-reservation-result.php" method="post">
                    <br>
                    <h4 for="check-in">Enter New Dates:</h4>

                    <label for="check-in">New Check-in:</label>
                    <input type="date" class="form-control" id="check-in" name="checkin_date">
                    <input type="hidden" value="<?php echo $comingSelectedReservationId; ?>" id="reservation_id" name="reservation_id">
                    <br>

                    <label for="check-out">New Check-out:</label>
                    <input type="date" class="form-control" id="check-out" name="checkout_date">
                
                <br>
                <br>
                <div>
                    <h4 for="check-in">Enter New Number of Person:</h4>

                    <label for="numberofguests">New Number of Person:</label>
                    <input type="number" class="form-control" id="numberofguests" name="number_of_person">
                </div>
                <br>
                <input type="submit" class="btn btn-info"value="Search" >
                </form>
            </div>


            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
    

    <script>
        var comingSelectedReservationId = localStorage.getItem("storageSelectedReservationId");
        window.onload = console.log(comingSelectedReservationId);
    </script>
</body>

<?php include 'footer.php'; ?>
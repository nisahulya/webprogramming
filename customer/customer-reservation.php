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
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form action="customer-reservation-result.php" method="post">
                    <br>
                    <h4 for="check-in">Enter Dates:</h4>

                    <label for="check-in">Check-in:</label>
                    <input type="date" class="form-control" id="check-in" name="checkin_date">

                    <br>

                    <label for="check-out">Check-out:</label>
                    <input type="date" class="form-control" id="check-out" name="checkout_date">
                
                <br>
                <br>
                <div>
                    <h4 for="check-in">Enter Number of Person:</h4>

                    <label for="numberofguests">Number of Person:</label>
                    <input type="number" class="form-control" id="numberofguests" name="number_of_person">
                </div>
                <br>
                <br>
                <!-- <button class="btn btn-info">Search</button> -->

                <input type="submit" class="btn btn-info"value="Search" >
                </form>
            </div>


            <br>
            <br>
            <br>
            <br>
        </div>
    </div>

    <!-- <script>

        function showInfo(){
            document.getElementById('info').style.display = "block";
        }

        function getCheckinDate() {
        var x = document.getElementById("check-in").value;
        document.getElementById("check-indate").innerHTML = x;
        }  

        function getCheckoutDate() {
        var x = document.getElementById("check-out").value;
        document.getElementById("check-outdate").innerHTML = x;
        } 

        function getNumberofPerson() {
        var x = document.getElementById("numberofguests").value;
        document.getElementById("numberofperson").innerHTML = x;
        }
           
    </script> -->

</body>

<?php include 'footer.php'; ?>
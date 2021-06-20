<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<head>
    <style>
        input {
            background-color: #48a4e0;
        }

        .oda{
            padding: 5px;
            margin-top: 20px;
            margin-left: 5px;
            margin-right: 5px;
            border-color: white;
            border-radius: 8px;
            border-style: solid;
        }
       
    </style>   

</head>

<body>

    
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <form action="select-room.php" method="post">
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

                <input type="submit" class="btn btn-info"value="Search" >
                </form>
            </div>
            <div class="col-sm-6">
                <br>
                <br>
                <br>
                <br>
<!-- 
                <div class="row">
                    <div class="col-sm-2">
                        <button id="room1" class="oda">Room1</button>
                        <button id="room4" class="oda"> Room4</button>
                        <button id="room7" class="oda">Room7</button>
                    </div>
                    <div class="col-sm-2"> 
                        <button id="room2" class="oda">Room2</button>
                        <button id="room5" class="oda">Room5</button>
                        <button id="room8" class="oda">Room8</button>
                    </div>
                    <div class="col-sm-2"> 
                        <button id="room3" class="oda">Room3</button>
                        <button id="room6" class="oda">Room6</button>
                        <button id="room9" class="oda">Room9</button>
                    </div>

                </div> -->

            </div>
        </div>

    </div>

    <script>

        function changeColor(){
            document.getElementById("room1").style.backgroundColor= "red";
            document.getElementById("room2").style.backgroundColor= "green";
            document.getElementById("room4").style.backgroundColor= "green";
            document.getElementById("room3").style.backgroundColor= "red";
            document.getElementById("room5").style.backgroundColor= "green";
            document.getElementById("room6").style.backgroundColor= "red";
            document.getElementById("room7").style.backgroundColor= "green";
            document.getElementById("room8").style.backgroundColor= "red";
            document.getElementById("room9").style.backgroundColor= "green";
        }

    </script>
</body>

</html>
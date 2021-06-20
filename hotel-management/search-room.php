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
                <br>
                <br>
                <h4 for="check-in">Enter Dates:</h4>
                <form class="form-inline" action="/action_page.php">
                    <label for="check-in">Check-in:</label>
                    <input type="date" class="form-control" placeholder="Enter check-in" id="check-in">
                </form>
                <br>
                <form class="form-inline" action="/action_page.php">
                    <label for="check-out">Check-out:</label>
                    <input type="date" class="form-control" placeholder="Enter check-out" id="check-out">
                </form>
                <br>
                <br>
                <div>
                    <h4 for="check-in">Enter Number of Guests:</h4>
                    <form class="form-inline" action="/action_page.php">
                        <label for="numberofguests">Number of Guests:</label>
                        <input type="number" class="form-control" id="numberofguests">
                    </form>
                </div>
                <br>
                <h1 id="h1"></h1>
                <form>
                    <input id="searchbutton"class="btn btn-info" type="button" value="Search" onclick="changeColor()">
                </form>
            </div>
            <div class="col-sm-6">
                <br>
                <br>
                <br>
                <br>

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

                </div>

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
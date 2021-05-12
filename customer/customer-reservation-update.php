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
<div class="container">
        <div class="row">
            <div class="col-sm-5">
                <br>
                <br>
                <br>
                <br>
                <br>

               <h4>Reservation Details:</h4>
               <br>
               <div id="info">
                    <p>You have a reservation for 2 people in room 3 between 29/07/2021 and 03/08/2021.</p>
                    <br>
                    <p>Please update if you want to change.</p>
                  
                </div>
            </div>
            <div class="col-sm-2">

            </div>
            <div class="col-sm-5">
                <br>
                <br>
                <h4 for="check-in">Enter Dates:</h4>
                <form class="form-inline" action="/action_page.php">
                    <label for="check-in">Check-in:</label>
                    <input type="date" value="2021-07-29" class="form-control" placeholder="Enter check-in" id="check-in">
                </form>
                <br>
                <form class="form-inline" action="/action_page.php">
                    <label for="check-out">Check-out:</label>
                    <input type="date" value="2021-08-03" class="form-control" placeholder="Enter check-out" id="check-out">
                </form>
                <br>
                <br>
                <div>
                    <h4 for="check-in">Enter Number of Person:</h4>
                    <form class="form-inline" action="/action_page.php">
                        <label for="numberofguests">Number of Person:</label>
                        <input type="number" value="2" class="form-control" id="numberofguests">
                    </form>
                </div>
                <br>
                <br>
                <form>
                    <a href=""><input class="btn btn-info"  type="button" value="Update" onclick="msg()" ></a>
                </form>
            </div>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</body>

<?php include 'footer.php'; ?>       
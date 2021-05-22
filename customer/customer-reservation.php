<?php include 'navbar.php'; ?>

<head>
    <style>
        #info {margin-top: 100px; margin-left: 90px;}

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
            font-family:Tahoma;
        }

        .modal-title {
            text-align: center;
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
                    <input type="date" class="form-control" id="check-in">
                </form>
                <br>
                <form class="form-inline" action="/action_page.php">
                    <label for="check-out">Check-out:</label>
                    <input type="date" class="form-control"  id="check-out">
                </form>
                <br>
                <br>
                <div>
                    <h4 for="check-in">Enter Number of Person:</h4>
                    <form class="form-inline" action="/action_page.php">
                        <label for="numberofguests">Number of Person:</label>
                        <input type="number" class="form-control" id="numberofguests">
                    </form>
                </div>
                <br>
                <br>
                <button class="btn btn-info" onclick="showInfo(); getNumberofPerson(); getCheckinDate(); getCheckoutDate();
                ">Search</button>
            </div>
            
            <div class="col-sm-6">
                <div id="info" style="display:none;">
                    <p> We have a place for <span id="numberofperson"></span> people in room 3 between <span id="check-indate"></span> and <span id="check-outdate"></span> </p>
                    <p id="p"></p>
                    <br>
                    <h4>Total Cost: 1234 TL</h4>
                    <br>
                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal">Confirm</button>
                    <?php if(isset($_SESSION["User"])){ ?>
                        <!-- Rezervasyon veritabanına yazılıp... -->
                    <?php }else{ ?>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">New Message</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        If you have an account please Login <br> <br>
                                        If you don't have an account please Sign-up
                                    </div>
                                    
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
   
    <script>

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
           
    </script>

</body>

<?php include 'footer.php'; ?>     
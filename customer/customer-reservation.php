<?php include 'navbar.php'; ?>

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
                    <button class="btn btn-info">Confirm</button>
                </div>

            </div>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>

<?php include 'footer.php'; ?>     
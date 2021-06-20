<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<?php 

    if(!isset($_COOKIE["roomId"])) {
        echo "Cookie is not set!";
    } else {
        $ComingroomId =$_COOKIE["roomId"];
        // echo  $ComingroomId;
    }

    if(!isset($_COOKIE["checkoutdate"])) {
        echo "Cookie is not set!";
    } else {
        $Comingcheckoutdate =$_COOKIE["checkoutdate"];
       // echo  $Comingcheckoutdate;
    }

    if(!isset($_COOKIE["checkindate"])) {
        echo "Cookie is not set!";
    } else {
        $Comingcheckindate =$_COOKIE["checkindate"];
        //echo  $Comingcheckindate;
    }
    if(!isset($_COOKIE["number_of_person"])) {
        echo "Cookie is not set!";
    } else {
        $Comingnumber_of_person =$_COOKIE["number_of_person"];
        //echo  $Comingnumber_of_person;
    }
   
    
?>

<body>

    <div class="container">
        <br>
        <div class="row">
            
            <div class="col-md-5">
                <br><br><br><br><br><br>
                
                <h3  style='color:hotpink'>Total Cost:
                <?php
                    $date1_ts = strtotime($Comingcheckindate);
                    $date2_ts = strtotime($Comingcheckoutdate);
                    $diff = $date2_ts - $date1_ts;
                    $daysNumber = round($diff / 86400);
                    if ($Comingnumber_of_person==1) {
                        $totalPrice = $daysNumber*500;
                        echo $totalPrice;
                    } elseif ($Comingnumber_of_person==2) {
                        $totalPrice = $daysNumber*900;
                        echo $totalPrice;
                    } else {
                        $totalPrice = $daysNumber*1200;
                        echo $totalPrice;
                    } 
                ?>
                TL </h3>
                <br>
                <p>Do you want to add reservation to room <span><?php echo $ComingroomId ?></span> for 
                <span><?php echo $Comingnumber_of_person ?></span> people?
                </p>
                <br>
            </div>
            <div class="col-md-1">
                
            </div>
            <div class="col-md-6">
                <h2 style=' color:hotpink'>New Customer Info:</h2>
                <form action="new-customer-result.php" method="POST">
                    <div class="form-group">
                        <label for="usr">Name:</label>
                        <input type="text" class="form-control" id="usr" name="name">
                    </div>
                    <div class="form-group">
                        <label for="surname">Surname:</label>
                        <input type="text" class="form-control" id="surname" name="surname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phonenumber">Phone Number:</label>
                        <input type="tel" class="form-control" id="phonenumber" name="phonenumber">
                        <br>
                        <input type="submit" class="btn btn-success"value="Confirm" >
                        <input type="hidden" value="<?php echo  $totalPrice?>" name="totalPrice" >
                    </div>
                </form>
            </div>
        </div>
        <div>
            
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-5">

                </div>
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>


    </div>

</body>

</html>
<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<div class="container">
    <div class="row">
        <?php
                echo "<table id='myTable 'class='table table-hover' style='border-collapse: collapse; margin-left:auto; margin-right:auto; 
                margin-top:40px;'>";
                echo " <thead class='thead-light'> <tr> <th scope='col'>Username </th> <th scope='col'>Text </th> <th scope='col'>Point</th>
                <th scope='col'>Date</th> <th scope='col'>Reservation Id</th> 
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
                    
                        </td> </tr>" . "\n";
                    }
                }

                try {
                    $DatabaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $DatabaseConnection->prepare("SELECT user.username,  review.text, review.point, 
                    review.date, review.reservation_id 
                    FROM review 
                    INNER JOIN reservation ON review.reservation_id = reservation.reservation_id
                    INNER JOIN user ON user.user_id = reservation.user_id ");
                    $stmt->execute();

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
</div>
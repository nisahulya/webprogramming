<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<?php

$currentMounth = date('m');
//echo $currentMounth;

if(06 < $currentMounth){

	$TotalPriceQueryFor6Mounth		=	$DatabaseConnection->prepare("SELECT SUM(total_price) FROM reservation 
	WHERE MONTH(checkout_date) = ? ");
	$TotalPriceQueryFor6Mounth->execute([06]);
	$RecordControl	=	$TotalPriceQueryFor6Mounth        ->rowCount();
	$TotalPriceFor6Mounth = $TotalPriceQueryFor6Mounth->fetch(PDO::FETCH_ASSOC);
	$RevenueFor6Mounth = $TotalPriceFor6Mounth["SUM(total_price)"];
	$ExpenceFor6Mounth = ($RevenueFor6Mounth*30)/100;
	//echo $ExpenceFor6Mounth;

}else{
	$RevenueFor6Mounth = 0;
	$ExpenceFor6Mounth = 0;
}

if(07 < $currentMounth){

	$TotalPriceQueryFor7Mounth		=	$DatabaseConnection->prepare("SELECT SUM(total_price) FROM reservation 
	WHERE MONTH(checkout_date) = ? ");
	$TotalPriceQueryFor7Mounth->execute([07]);
	$RecordControl	=	$TotalPriceQueryFor7Mounth        ->rowCount();
	$TotalPriceFor7Mounth = $TotalPriceQueryFor7Mounth->fetch(PDO::FETCH_ASSOC);
	$RevenueFor7Mounth = $TotalPriceFor7Mounth["SUM(total_price)"];
	$ExpenceFor7Mounth = ($RevenueFor7Mounth*30)/100;
	//echo $ExpenceFor7Mounth;

}else{
	$RevenueFor7Mounth = 0;
	$ExpenceFor7Mounth = 0;
}

if(8 < $currentMounth){

	$TotalPriceQueryFor8Mounth		=	$DatabaseConnection->prepare("SELECT SUM(total_price) FROM reservation 
	WHERE MONTH(checkout_date) = ? ");
	$TotalPriceQueryFor8Mounth->execute([8]);
	$RecordControl	=	$TotalPriceQueryFor8Mounth        ->rowCount();
	$TotalPriceFor8Mounth = $TotalPriceQueryFor8Mounth->fetch(PDO::FETCH_ASSOC);
	$RevenueFor8Mounth = $TotalPriceFor8Mounth["SUM(total_price)"];
	$ExpenceFor8Mounth = ($RevenueFor8Mounth*30)/100;
	//echo $ExpenceFor7Mounth;

}else{
	$RevenueFor8Mounth = 0;
	$ExpenceFor8Mounth = 0;
}

if(9 < $currentMounth){

	$TotalPriceQueryFor9Mounth		=	$DatabaseConnection->prepare("SELECT SUM(total_price) FROM reservation 
	WHERE MONTH(checkout_date) = ? ");
	$TotalPriceQueryFor8Mounth->execute([9]);
	$RecordControl	=	$TotalPriceQueryFor9Mounth        ->rowCount();
	$TotalPriceFor9Mounth = $TotalPriceQueryFor9Mounth->fetch(PDO::FETCH_ASSOC);
	$RevenueFor9Mounth = $TotalPriceFor9Mounth["SUM(total_price)"];
	$ExpenceFor9Mounth = ($RevenueFor9Mounth*30)/100;


}else{
	$RevenueFor9Mounth = 0;
	$ExpenceFor9Mounth = 0;
}

if(10 < $currentMounth){

	$TotalPriceQueryFor10Mounth		=	$DatabaseConnection->prepare("SELECT SUM(total_price) FROM reservation 
	WHERE MONTH(checkout_date) = ? ");
	$TotalPriceQueryFor10Mounth->execute([10]);
	$RecordControl	=	$TotalPriceQueryFor10Mounth        ->rowCount();
	$TotalPriceFor10Mounth = $TotalPriceQueryFor10Mounth->fetch(PDO::FETCH_ASSOC);
	$RevenueFor10Mounth = $TotalPriceFor10Mounth["SUM(total_price)"];
	$ExpenceFor10Mounth = ($RevenueFor10Mounth*30)/100;


}else{
	$RevenueFor10Mounth = 0;
	$ExpenceFor10Mounth = 0;
}

if(11 < $currentMounth){

	$TotalPriceQueryFor11Mounth		=	$DatabaseConnection->prepare("SELECT SUM(total_price) FROM reservation 
	WHERE MONTH(checkout_date) = ? ");
	$TotalPriceQueryFor11Mounth->execute([11]);
	$RecordControl	=	$TotalPriceQueryFor11Mounth        ->rowCount();
	$TotalPriceFor11Mounth = $TotalPriceQueryFor11Mounth->fetch(PDO::FETCH_ASSOC);
	$RevenueFor11Mounth = $TotalPriceFor11Mounth["SUM(total_price)"];
	$ExpenceFor11Mounth = ($RevenueFor11Mounth*30)/100;


}else{
	$RevenueFor11Mounth = 0;
	$ExpenceFor11Mounth = 0;
}

if(12 < $currentMounth){

	$TotalPriceQueryFor12Mounth		=	$DatabaseConnection->prepare("SELECT SUM(total_price) FROM reservation 
	WHERE MONTH(checkout_date) = ? ");
	$TotalPriceQueryFor12Mounth->execute([12]);
	$RecordControl	=	$TotalPriceQueryFor12Mounth        ->rowCount();
	$TotalPriceFor12Mounth = $TotalPriceQueryFor12Mounth->fetch(PDO::FETCH_ASSOC);
	$RevenueFor12Mounth = $TotalPriceFor12Mounth["SUM(total_price)"];
	$ExpenceFor12Mounth = ($RevenueFor12Mounth*30)/100;


}else{
	$RevenueFor12Mounth = 0;
	$ExpenceFor12Mounth = 0;
}
 
$dataPoints1 = array(
	array("label"=> "January", "y"=> 100),
	array("label"=> "February", "y"=> 200),
	array("label"=> "March", "y"=> 300),
	array("label"=> "April", "y"=> 400),
	array("label"=> "May", "y"=> 1050),
	array("label"=> "June", "y"=> $ExpenceFor6Mounth),
	array("label"=> "July", "y"=> $ExpenceFor7Mounth),
	array("label"=> "August", "y"=> $ExpenceFor8Mounth),
	array("label"=> "September", "y"=> $ExpenceFor9Mounth),
	array("label"=> "October", "y"=> $ExpenceFor10Mounth),
	array("label"=> "November", "y"=> $ExpenceFor11Mounth),
	array("label"=> "December", "y"=> $ExpenceFor12Mounth),
);
$dataPoints2 = array(
	array("label"=> "January", "y"=> 400),
	array("label"=> "February", "y"=> 600),
	array("label"=> "March", "y"=> 700 ),
	array("label"=> "April", "y"=> 800),
	array("label"=> "May", "y"=> 2300),
	array("label"=> "June", "y"=> $RevenueFor6Mounth),
	array("label"=> "July", "y"=> $RevenueFor7Mounth),
	array("label"=> "August", "y"=> $RevenueFor8Mounth),
	array("label"=> "September", "y"=> $RevenueFor9Mounth),
	array("label"=> "October", "y"=> $RevenueFor10Mounth),
	array("label"=> "November", "y"=> $RevenueFor11Mounth),
	array("label"=> "December", "y"=> $RevenueFor12Mounth),
);
	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Income and Revenue Graph According to Months "
	},
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Expense",
		indexLabel: "{y}",
		yValueFormatString: "#0.##TL",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Revenue",
		indexLabel: "{y}",
		yValueFormatString: "#0.##TL",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>
</head>
<body>
<div  id="chartContainer" style="height: 370px; width: 90%; margin-left: 5%; margin-top: 5%"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>            
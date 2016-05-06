<?php
	include 'functions.php';
	$c = connect_to_database();
	$inventory = csv_to_array("invdata.CSV");
	
	if(mysqli_query($c, "DELETE FROM inventory")) {
		foreach ($inventory as $key=>$vehicle) {
			if(mysqli_query($c, "INSERT INTO `inventory` (`vin`, `stock_number`, `type`, `year`, `make`, `model`, `body`, `color`, `trim`, `fuel`, `mpg`, `cylinders`, `truck`, `4wd`, `turbo`, `engine`, `transmission`, `odometer`, `date_in_inventory`, `price`, `cost`) 
								 VALUES ('".$vehicle['VIN']."',
								 		 '".$vehicle['Stock Number']."',
								 		 '".($vehicle['Type'] == 'N' ? 'new' : 'used' )."',
								 		 '".$vehicle['Year']."',
								 		 '".$vehicle['Make']."',
								 		 '".$vehicle['Model']."',
								 		 '".$vehicle['Body']."',
								 		 '".$vehicle['Color']."',
								 		 '".$vehicle['Trim']."',
								 		 '".$vehicle['Fuel']."',
								 		 '".$vehicle['MPG']."',
								 		 '".$vehicle['Cylinders']."',
								 		 '".$vehicle['Truck']."',
								 		 '".$vehicle['4WD']."',
								 		 '".$vehicle['Turbo']."',
								 		 '".$vehicle['Engine']."',
								 		 '".$vehicle['Transmission']."',
								 		 '".$vehicle['Odometer']."',
								 		 '".$vehicle['Date In Inventory']."',
								 		 '".$vehicle['Price']."',
								 		 '".$vehicle['Cost']."'
								 		)"))
			{ 
				echo "Inserted VIN: ".$vehicle['VIN']."<br />";
			} else { 
				echo "FAILED to insert VIN: ".$vehicle['VIN']." ERROR: ".mysqli_error($c)."<br />";
			}
	    }
	}
    
    //echo '<pre>';
	//print_r($inventory);
	//echo '</pre>';
?>
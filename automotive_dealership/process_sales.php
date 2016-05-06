<?php
	include 'functions.php';
	$c = connect_to_database();
	$sales = csv_to_array("salesdata.CSV");
	
	foreach ($sales as $key=>$sale) {
		if(mysqli_num_rows(mysqli_query($c, "SELECT stock_number FROM sales WHERE stock_number = '".$sale["Stock Numb"]."'"))) {
			if(mysqli_query($c, "UPDATE `sales` SET 
								`vin` = '".$sale['Vin #']."',
								`type` = '".($sale['N/U'] == 'N' ? 'new' : 'used' )."',
								`year` = '".$sale['Year']."',
								`make` = '".mysqli_real_escape_string($c, $sale['Make'])."',
								`model` = '".mysqli_real_escape_string($c, $sale['Model'])."',
								`color` = '".$sale['Color']."',
								`fuel` = '".$sale['Fuel Type']."',
								`cylinders` = '".$sale['Cylinders']."',
								`odometer` = '".$sale['Miles at D']."',
								`deal_date` = '".$sale['Deal Date']."',
								`price` = '".$sale['Sale Price']."',
								`apr` = '".$sale['APR']."',
								`term` = '".$sale['Term']."',
								`first_name` = '".mysqli_real_escape_string($c, $sale['First Name'])."',
								`middle_name` = '".mysqli_real_escape_string($c, $sale['Middle Int'])."',
								`last_name` = '".mysqli_real_escape_string($c, $sale['Last Name'])."',
								`email` = '".$sale['E-Mail']."',
								`home_phone` = '".$sale['Home Area'].str_replace("-", "", $sale['Home Phone'])."',
								`work_phone` = '".$sale['Work Area'].str_replace("-", "", $sale['Work Phone'])."',
								`address1` = '".mysqli_real_escape_string($c, $sale['Address 1'])."',
								`address2` = '".mysqli_real_escape_string($c, $sale['Address 2'])."',
								`city` = '".mysqli_real_escape_string($c, $sale['City'])."',
								`state` = '".$sale['State']."',
								`zipcode` = '".$sale['Zip Code']."',
								`birth_date` = '".$sale['Birth Date']."'
								WHERE stock_number = '".$sale["Stock Numb"]."'"))
			{ 
				echo "Updated stock number: ".$sale['Stock Numb']."<br />";
			} else { 
				echo "FAILED to update stock number: ".$sale['Stock Numb']." ERROR: ".mysqli_error($c)."<br />";
			}
		}else{
			if(mysqli_query($c, "INSERT INTO `sales` (`vin`, `stock_number`, `type`, `year`, `make`, `model`, `color`, `fuel`, `cylinders`, `odometer`, `deal_date`, `price`, `apr`, `term`, `first_name`, `middle_name`, `last_name`, `email`, `home_phone`, `work_phone`, `address1`, `address2`, `city`, `state`, `zipcode`, `birth_date`) 
								 VALUES ('".$sale['Vin #']."',
										'".$sale['Stock Numb']."',
										'".($sale['N/U'] == 'N' ? 'new' : 'used' )."',
										'".$sale['Year']."',
										'".mysqli_real_escape_string($c, $sale['Make'])."',
										'".mysqli_real_escape_string($c, $sale['Model'])."',
										'".$sale['Color']."',
										'".$sale['Fuel Type']."',
										'".$sale['Cylinders']."',
										'".$sale['Miles at D']."',
										'".$sale['Deal Date']."',
										'".$sale['Sale Price']."',
										'".$sale['APR']."',
										'".$sale['Term']."',
										'".mysqli_real_escape_string ($c, $sale['First Name'])."',
										'".mysqli_real_escape_string($c, $sale['Middle Int'])."',
										'".mysqli_real_escape_string($c, $sale['Last Name'])."',
										'".$sale['E-Mail']."',
										'".$sale['Home Area'].str_replace("-", "", $sale['Home Phone'])."',
										'".$sale['Work Area'].str_replace("-", "", $sale['Work Phone'])."',
										'".mysqli_real_escape_string($c, $sale['Address 1'])."',
										'".mysqli_real_escape_string($c, $sale['Address 2'])."',
										'".mysqli_real_escape_string($c, $sale['City'])."',
										'".$sale['State']."',
										'".$sale['Zip Code']."',
										'".$sale['Birth Date']."'
								 		)"))
			{ 
				echo "Inserted stock number: ".$sale['Stock Numb']."<br />";
			} else { 
				echo "FAILED to insert stock number: ".$sale['Stock Numb']." ERROR: ".mysqli_error($c)."<br />";
			}
		}
    }
    
    //echo '<pre>';
	//print_r($inventory);
	//echo '</pre>';
?>
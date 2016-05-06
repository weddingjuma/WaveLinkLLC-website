<?php
	include 'functions.php';
	$c = connect_to_database();
	$services = csv_to_array("servdata.CSV");
	
	foreach ($services as $key=>$service) {
		if(mysqli_num_rows(mysqli_query($c, "SELECT order_number FROM services WHERE order_number = '".$service["Repair Order"]."'"))) {
			if(mysqli_query($c, "UPDATE `services` SET 
								`vin` = '".$service['Vin #']."',
								`type` = '".($service['N/U'] == 'N' ? 'new' : 'used' )."',
								`year` = '".$service['Year']."',
								`make` = '".mysqli_real_escape_string($c, $service['Make'])."',
								`model` = '".mysqli_real_escape_string($c, $service['Model'])."',
								`color` = '".$service['Color']."',
								`fuel` = '".$service['Fuel Type']."',
								`odometer` = '".$service['Odometer']."',
								`service_date` = '".$service['Service Date']."',
								`open_date` = '".$service['Open Date']."',
								`close_date` = '".$service['Close Date']."',
								`total_cost` = '".$service['Total Repair Order']."',
								`customer_paid` = '".$service['Total Customer Pay']."',
								`warranty_paid` = '".$service['Warranty Total']."',
								`service_writer_name` = '".mysqli_real_escape_string($c, $service['Service Writer Name'])."',
								`description_1` = '".mysqli_real_escape_string($c, $service['Op Desc1'])."',
								`description_2` = '".mysqli_real_escape_string($c, $service['Op Desc2'])."',
								`description_3` = '".mysqli_real_escape_string($c, $service['Op Desc3'])."',
								`description_4` = '".mysqli_real_escape_string($c, $service['Op Desc4'])."',
								`description_5` = '".mysqli_real_escape_string($c, $service['Op Desc5'])."',
								`description_6` = '".mysqli_real_escape_string($c, $service['Op Desc6'])."',
								`description_7` = '".mysqli_real_escape_string($c, $service['Op Desc7'])."',
								`description_8` = '".mysqli_real_escape_string($c, $service['Op Desc8'])."',
								`description_9` = '".mysqli_real_escape_string($c, $service['Op Desc9'])."',
								`description_10` = '".mysqli_real_escape_string($c, $service['Op Desc10'])."',
								`first_name` = '".mysqli_real_escape_string($c, $service['First Name'])."',
								`middle_name` = '".mysqli_real_escape_string($c, $service['Middle Int'])."',
								`last_name` = '".mysqli_real_escape_string($c, $service['Last Name'])."',
								`email` = '".$service['E-Mail Address']."',
								`home_phone` = '".$service['Home Area Code'].str_replace("-", "", $service['Home Phone'])."',
								`work_phone` = '".$service['Work Area Code'].str_replace("-", "", $service['Work Phone'])."',
								`address1` = '".mysqli_real_escape_string($c, $service['Address 1'])."',
								`address2` = '".mysqli_real_escape_string($c, $service['Address 2'])."',
								`city` = '".mysqli_real_escape_string($c, $service['City'])."',
								`state` = '".$service['State']."',
								`zipcode` = '".$service['Zip Code']."',
								`birth_date` = '".$service['Birth Date']."',
								`stock_number` = '".$service['Stock #']."'
								WHERE order_number = '".$service["Repair Order"]."'"))
			{ 
				echo "Updated order number: ".$service['Repair Order']."<br />";
			} else { 
				echo "FAILED to update order number: ".$service['Repair Order']." ERROR: ".mysqli_error($c)."<br />";
			}
		}else{
			if(mysqli_query($c, "INSERT INTO `services` (
										`vin`, 
										`type`, 
										`year`, 
										`make`, 
										`model`, 
										`color`, 
										`fuel`, 
										`odometer`, 
										`service_date`, 
										`open_date`, 
										`close_date`, 
										`total_cost`, 
										`customer_paid`, 
										`warranty_paid`, 
										`service_writer_name`, 
										`description_1`, 
										`description_2`, 
										`description_3`, 
										`description_4`, 
										`description_5`, 
										`description_6`, 
										`description_7`, 
										`description_8`, 
										`description_9`, 
										`description_10`, 
										`first_name`, 
										`middle_name`, 
										`last_name`, 
										`email`, 
										`home_phone`, 
										`work_phone`, 
										`address1`, 
										`address2`, 
										`city`, 
										`state`, 
										`zipcode`, 
										`birth_date`, 
										`stock_number`, 
										`order_number`) 
								 VALUES ('".$service['Vin #']."',
										'".($service['N/U'] == 'N' ? 'new' : 'used' )."',
										'".$service['Year']."',
										'".mysqli_real_escape_string($c, $service['Make'])."',
										'".mysqli_real_escape_string($c, $service['Model'])."',
										'".$service['Color']."',
										'".$service['Fuel Type']."',
										'".$service['Odometer']."',
										'".$service['Service Date']."',
										'".$service['Open Date']."',
										'".$service['Close Date']."',
										'".$service['Total Repair Order']."',
										'".$service['Total Customer Pay']."',
										'".$service['Warranty Total']."',
										'".mysqli_real_escape_string($c, $service['Service Writer Name'])."',
										'".mysqli_real_escape_string($c, $service['Op Desc1'])."',
										'".mysqli_real_escape_string($c, $service['Op Desc2'])."',
										'".mysqli_real_escape_string($c, $service['Op Desc3'])."',
										'".mysqli_real_escape_string($c, $service['Op Desc4'])."',
										'".mysqli_real_escape_string($c, $service['Op Desc5'])."',
										'".mysqli_real_escape_string($c, $service['Op Desc6'])."',
										'".mysqli_real_escape_string($c, $service['Op Desc7'])."',
										'".mysqli_real_escape_string($c, $service['Op Desc8'])."',
										'".mysqli_real_escape_string($c, $service['Op Desc9'])."',
										'".mysqli_real_escape_string($c, $service['Op Desc10'])."',
										'".mysqli_real_escape_string($c, $service['First Name'])."',
										'".mysqli_real_escape_string($c, $service['Middle Int'])."',
										'".mysqli_real_escape_string($c, $service['Last Name'])."',
										'".$service['E-Mail Address']."',
										'".$service['Home Area Code'].str_replace("-", "", $service['Home Phone'])."',
										'".$service['Work Area Code'].str_replace("-", "", $service['Work Phone'])."',
										'".mysqli_real_escape_string($c, $service['Address 1'])."',
										'".mysqli_real_escape_string($c, $service['Address 2'])."',
										'".mysqli_real_escape_string($c, $service['City'])."',
										'".$service['State']."',
										'".$service['Zip Code']."',
										'".$service['Birth Date']."',
										'".$service['Stock #']."',
										'".$service['Repair Order']."'
								 		)"))
			{ 
				echo "Inserted order number: ".$service['Repair Order']."<br />";
			} else { 
				echo "FAILED to insert order number: ".$service['Repair Order']." ERROR: ".mysqli_error($c)."<br />";
			}
		}
    }
    
    //echo '<pre>';
	//print_r($services);
	//echo '</pre>';
?>
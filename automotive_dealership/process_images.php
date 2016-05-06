<?php
	include 'functions.php';
	$c = connect_to_database();
	$images = array();
	$lines = file('Homenet-MBOC.csv', FILE_IGNORE_NEW_LINES);
	foreach ($lines as $key => $value)
	{
	    $images[$key] = str_getcsv($value);
	}
	
	foreach ($images as $key=>$image) {
    	$VIN = $image[2];
    	$URLs = $image[65];
		if(mysqli_num_rows(mysqli_query($c, "SELECT vin FROM images WHERE vin = '$VIN'"))) {
			if(mysqli_query($c, "UPDATE `images` SET `urls` = '$URLs' WHERE vin = '$VIN'")) { 
				echo "Updated VIN: ".$VIN."<br />";
			} else { 
				echo "FAILED to update VIN: ".$VIN." ERROR: ".mysqli_error($c)."<br />";
			}
		}else{
			if(mysqli_query($c, "INSERT INTO `images` (`vin`, `urls`) VALUES ('$VIN', '$URLs')")) { 
				echo "Inserted VIN: ".$VIN."<br />";
			} else { 
				echo "FAILED to insert VIN: ".$VIN." ERROR: ".mysqli_error($c)."<br />";
			}
		}
    }
    
    //echo '<pre>';
	//print_r($images);
	//echo '</pre>';
?>
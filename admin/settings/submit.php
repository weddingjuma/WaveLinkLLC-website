<?php
	include '../authentication.php';
	include '../utility/database.php';
	include '../utility/functions.php';
	
	$invoice_logo = addslashes($_POST['invoice_logo']); if($invoice_logo == "") { $invoice_logo = "none"; }
	$invoice_contact_name = addslashes($_POST['invoice_contact_name']);
	$invoice_contact_title = addslashes($_POST['invoice_contact_title']);
	$invoice_contact_phone = addslashes($_POST['invoice_contact_phone']);
	$invoice_contact_email = addslashes($_POST['invoice_contact_email']);
	$receipt_logo = addslashes($_POST['receipt_logo']); if($receipt_logo == "") { $receipt_logo = "none"; }
	$receipt_contact_name = addslashes($_POST['receipt_contact_name']);
	$receipt_contact_title = addslashes($_POST['receipt_contact_title']);
	$receipt_contact_phone = addslashes($_POST['receipt_contact_phone']);
	$receipt_contact_email = addslashes($_POST['receipt_contact_email']);
	$facebook_link = addslashes($_POST['facebook_link']);
	$twitter_link = addslashes($_POST['twitter_link']);
	$linkedin_link = addslashes($_POST['linkedin_link']);
	$googleplus_link = addslashes($_POST['googleplus_link']);
	$instagram_link = addslashes($_POST['instagram_link']);
	$contactus_phone = addslashes($_POST['contactus_phone']);
	$contactus_email = addslashes($_POST['contactus_email']);
	
	$filenames = array($invoice_logo, $receipt_logo);
	$target_dir = "../../images/application/";
	$i = 0;
	$file_array = reArrayFiles($_FILES['file']);
	foreach($file_array as $file) {
        $extension = getExtension(stripslashes($file['name']));
        $extension = strtolower($extension);
		$filename = $i . date("YmdHis") . "setting." . $extension;
		$target_file = $target_dir . $filename;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		$check = getimagesize($file["tmp_name"]);
		if($check !== false) {
			//echo "File is an image - " . $check["mime"] . ".<br />";
			$uploadOk = 1;
		} else {
			//echo "File is not an image.<br />";
			$uploadOk = 0;
		}

		if ($uploadOk == 0) {
			//echo "There was a problem with the file.";
		} else {
			if (move_uploaded_file($file["tmp_name"], $target_file)) { 
				$filenames[$i] = "/images/application/" . $filename;
				//echo "File uploaded.<br />"; 
			} else { }
		}
		
		$i++;
	}
	
	if(mysql_query(
		"UPDATE settings
    	SET value = CASE code
		WHEN 'invoice_logo' THEN '$filenames[0]'
		WHEN 'invoice_contact_name' THEN '$invoice_contact_name'
		WHEN 'invoice_contact_title' THEN '$invoice_contact_title'
		WHEN 'invoice_contact_phone' THEN '$invoice_contact_phone'
		WHEN 'invoice_contact_email' THEN '$invoice_contact_email'
		WHEN 'receipt_logo' THEN '$filenames[1]'
		WHEN 'receipt_contact_name' THEN '$receipt_contact_name'
		WHEN 'receipt_contact_title' THEN '$receipt_contact_title'
		WHEN 'receipt_contact_phone' THEN '$receipt_contact_phone'
		WHEN 'receipt_contact_email' THEN '$receipt_contact_email'
		WHEN 'facebook_link' THEN '$facebook_link'
		WHEN 'twitter_link' THEN '$twitter_link'
		WHEN 'linkedin_link' THEN '$linkedin_link'
		WHEN 'googleplus_link' THEN '$googleplus_link'
		WHEN 'instagram_link' THEN '$instagram_link'
		WHEN 'contactus_phone' THEN '$contactus_phone'
		WHEN 'contactus_email' THEN '$contactus_email'
		END"
	)){
		header("Location: index.php");
	}else{ 
		//header("Location: error.php");
		echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.';
	}
?>
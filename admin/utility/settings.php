<?php
	while($setting = mysql_fetch_assoc($settings))
	{
		switch($setting['code']) {
			case "invoice_logo" : $invoice_logo = $setting['value']; break;
			case "invoice_contact_name" : $invoice_contact_name = $setting['value']; break;
			case "invoice_contact_title" : $invoice_contact_title = $setting['value']; break;
			case "invoice_contact_phone" : $invoice_contact_phone = $setting['value']; break;
			case "invoice_contact_email" : $invoice_contact_email = $setting['value']; break;
			case "receipt_logo" : $receipt_logo = $setting['value']; break;
			case "receipt_contact_name" : $receipt_contact_name = $setting['value']; break;
			case "receipt_contact_title" : $receipt_contact_title = $setting['value']; break;
			case "receipt_contact_phone" : $receipt_contact_phone = $setting['value']; break;
			case "receipt_contact_email" : $receipt_contact_email = $setting['value']; break;
			case "facebook_link" : $facebook_link = $setting['value']; break;
			case "twitter_link" : $twitter_link = $setting['value']; break;
			case "linkedin_link" : $linkedin_link = $setting['value']; break;
			case "googleplus_link" : $googleplus_link = $setting['value']; break;
			case "instagram_link" : $instagram_link = $setting['value']; break;
			case "contactus_phone" : $contactus_phone = $setting['value']; break;
			case "contactus_email" : $contactus_email = $setting['value']; break;
		}
	}
?>
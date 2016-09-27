<?php
	include $_SERVER['DOCUMENT_ROOT'].'/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/admin/utility/functions.php';
	$c = connect_to_database();

	$query =
		"CREATE TABLE IF NOT EXISTS `accounts` (
		  `id` bigint(30) NOT NULL AUTO_INCREMENT,
		  `business_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `status` set('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
		  `sign_up_date` date NOT NULL,
		  `product_id` bigint(30) NOT NULL,
		  `last_payment_date` date DEFAULT NULL,
		  `file_url` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
		  PRIMARY KEY (`id`),
		  UNIQUE KEY `email` (`email`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

		INSERT INTO `accounts` (`id`, `business_name`, `first_name`, `last_name`, `email`, `password`, `phone`, `status`, `sign_up_date`, `product_id`, `last_payment_date`, `file_url`) VALUES
		(1, 'Wave Link, LLC', 'Kelvin', 'Graddick', 'kgraddick@wavelinkllc.com', 'king12', '706-773-6354', 'active', '2015-02-25', 1, NULL, '/files/020150226030623file.pdf');

		CREATE TABLE IF NOT EXISTS `appointments` (
		  `id` bigint(30) NOT NULL AUTO_INCREMENT,
		  `user_id` bigint(30) NOT NULL,
		  `start` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `end` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `times` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `day` int(2) NOT NULL,
		  `month` int(2) NOT NULL,
		  `year` int(4) NOT NULL,
		  `type` set('none','residential','commercial','repair') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `notes` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

		CREATE TABLE IF NOT EXISTS `appointments_default` (
		  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `number` int(1) NOT NULL,
		  `0000` tinyint(1) NOT NULL DEFAULT '0',
		  `0030` tinyint(1) NOT NULL DEFAULT '0',
		  `0100` tinyint(1) NOT NULL DEFAULT '0',
		  `0130` tinyint(1) NOT NULL DEFAULT '0',
		  `0200` tinyint(1) NOT NULL DEFAULT '0',
		  `0230` tinyint(1) NOT NULL DEFAULT '0',
		  `0300` tinyint(1) NOT NULL DEFAULT '0',
		  `0330` tinyint(1) NOT NULL DEFAULT '0',
		  `0400` tinyint(1) NOT NULL DEFAULT '0',
		  `0430` tinyint(1) NOT NULL DEFAULT '0',
		  `0500` tinyint(1) NOT NULL DEFAULT '0',
		  `0530` tinyint(1) NOT NULL DEFAULT '0',
		  `0600` tinyint(1) NOT NULL DEFAULT '0',
		  `0630` tinyint(1) NOT NULL DEFAULT '0',
		  `0700` tinyint(1) NOT NULL DEFAULT '0',
		  `0730` tinyint(1) NOT NULL DEFAULT '0',
		  `0800` tinyint(1) NOT NULL DEFAULT '1',
		  `0830` tinyint(1) NOT NULL DEFAULT '1',
		  `0900` tinyint(1) NOT NULL DEFAULT '1',
		  `0930` tinyint(1) NOT NULL DEFAULT '1',
		  `1000` tinyint(1) NOT NULL DEFAULT '1',
		  `1030` tinyint(1) NOT NULL DEFAULT '1',
		  `1100` tinyint(1) NOT NULL DEFAULT '1',
		  `1130` tinyint(1) NOT NULL DEFAULT '1',
		  `1200` tinyint(1) NOT NULL DEFAULT '1',
		  `1230` tinyint(1) NOT NULL DEFAULT '1',
		  `1300` tinyint(1) NOT NULL DEFAULT '1',
		  `1330` tinyint(1) NOT NULL DEFAULT '1',
		  `1400` tinyint(1) NOT NULL DEFAULT '1',
		  `1430` tinyint(1) NOT NULL DEFAULT '1',
		  `1500` tinyint(1) NOT NULL DEFAULT '1',
		  `1530` tinyint(1) NOT NULL DEFAULT '1',
		  `1600` tinyint(1) NOT NULL DEFAULT '1',
		  `1630` tinyint(1) NOT NULL DEFAULT '1',
		  `1700` tinyint(1) NOT NULL DEFAULT '1',
		  `1730` tinyint(1) NOT NULL DEFAULT '1',
		  `1800` tinyint(1) NOT NULL DEFAULT '1',
		  `1830` tinyint(1) NOT NULL DEFAULT '1',
		  `1900` tinyint(1) NOT NULL DEFAULT '1',
		  `1930` tinyint(1) NOT NULL DEFAULT '1',
		  `2000` tinyint(1) NOT NULL DEFAULT '1',
		  `2030` tinyint(1) NOT NULL DEFAULT '0',
		  `2100` tinyint(1) NOT NULL DEFAULT '0',
		  `2130` tinyint(1) NOT NULL DEFAULT '0',
		  `2200` tinyint(1) NOT NULL DEFAULT '0',
		  `2230` tinyint(1) NOT NULL DEFAULT '0',
		  `2300` tinyint(1) NOT NULL DEFAULT '0',
		  `2330` tinyint(1) NOT NULL DEFAULT '0',
		  PRIMARY KEY (`name`),
		  UNIQUE KEY `number` (`number`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

		INSERT INTO `appointments_default` (`name`, `number`, `0000`, `0030`, `0100`, `0130`, `0200`, `0230`, `0300`, `0330`, `0400`, `0430`, `0500`, `0530`, `0600`, `0630`, `0700`, `0730`, `0800`, `0830`, `0900`, `0930`, `1000`, `1030`, `1100`, `1130`, `1200`, `1230`, `1300`, `1330`, `1400`, `1430`, `1500`, `1530`, `1600`, `1630`, `1700`, `1730`, `1800`, `1830`, `1900`, `1930`, `2000`, `2030`, `2100`, `2130`, `2200`, `2230`, `2300`, `2330`) VALUES
		('Sunday', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
		('Monday', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
		('Tuesday', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
		('Wednesday', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
		('Thursday', 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
		('Friday', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
		('Saturday', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0);

		CREATE TABLE IF NOT EXISTS `categories` (
		  `id` bigint(30) NOT NULL AUTO_INCREMENT,
		  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `value` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `featured` set('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
		  `description` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `url` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  PRIMARY KEY (`id`),
		  UNIQUE KEY `value` (`value`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

		CREATE TABLE IF NOT EXISTS `contracts` (
		  `id` bigint(30) NOT NULL AUTO_INCREMENT,
		  `user_id` bigint(30) NOT NULL,
		  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
		  `contract_url` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `signature_url` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		  `date_signed` timestamp NULL DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  UNIQUE KEY `code` (`code`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

		CREATE TABLE IF NOT EXISTS `emails` (
		  `id` bigint(30) NOT NULL AUTO_INCREMENT,
		  `to` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `subject` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A message from Wave Link, LLC',
		  `text` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `time` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '20140101000000',
		  `is_sent` tinyint(1) NOT NULL DEFAULT '0',
		  `type` set('none','new_user','contract_signed','new_appointment') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `reference_id` bigint(30) DEFAULT '0',
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

		CREATE TABLE IF NOT EXISTS `issues` (
		  `id` bigint(30) NOT NULL AUTO_INCREMENT,
		  `issue_number` bigint(30) NOT NULL,
		  `month` int(10) NOT NULL,
		  `year` int(10) NOT NULL,
		  `pdf_link` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  PRIMARY KEY (`id`),
		  UNIQUE KEY `issue_number` (`issue_number`),
		  UNIQUE KEY `month` (`month`,`year`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

		INSERT INTO `issues` (`id`, `issue_number`, `month`, `year`, `pdf_link`) VALUES
		(1, 1, 3, 2015, 'none');

		CREATE TABLE IF NOT EXISTS `portfolio` (
		  `id` bigint(30) NOT NULL AUTO_INCREMENT,
		  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `description` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `category1` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `category2` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `category3` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image3` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image4` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image5` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image6` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image7` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image8` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

		CREATE TABLE IF NOT EXISTS `posts` (
		  `id` bigint(30) NOT NULL AUTO_INCREMENT,
		  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `content` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `url` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		  `published` set('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
		  `image1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image3` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image4` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image5` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image6` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image7` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image8` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

		INSERT INTO `posts` (`id`, `title`, `content`, `url`, `author`, `date_added`, `published`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`) VALUES
		(1, 'Blog Post Of The Year', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'http://www.wavelinkllc.com', 'Owner', '2015-04-18 06:39:15', 'yes', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none');

		CREATE TABLE IF NOT EXISTS `products` (
		  `id` bigint(30) NOT NULL AUTO_INCREMENT,
		  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `price` decimal(15,2) NOT NULL,
		  `sale_price` decimal(15,2) NOT NULL,
		  `on_sale` set('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
		  `featured` set('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
		  `description` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `quantity` bigint(30) NOT NULL DEFAULT '-1',
		  `date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `category1` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `category2` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `category3` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image3` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image4` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image5` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image6` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image7` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `image8` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `type1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `type2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `type3` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `type4` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `type5` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `type6` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `type7` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `type8` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

		INSERT INTO `products` (`id`, `title`, `price`, `sale_price`, `on_sale`, `featured`, `description`, `quantity`, `date`, `time`, `category1`, `category2`, `category3`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`, `type1`, `type2`, `type3`, `type4`, `type5`, `type6`, `type7`, `type8`) VALUES
		(1, 'Product Of The Year', '5.00', '4.00', 'no', 'yes', 'This is a great product. Please buy me.', -1, 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none');

		CREATE TABLE IF NOT EXISTS `quantities` (
		  `id` bigint(30) NOT NULL AUTO_INCREMENT,
		  `store_id` bigint(30) NOT NULL,
		  `product_id` bigint(30) NOT NULL,
		  `quantity` bigint(30) NOT NULL DEFAULT '-1',
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

		CREATE TABLE IF NOT EXISTS `seo` (
		  `id` bigint(30) NOT NULL AUTO_INCREMENT,
		  `page` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
		  `display` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
		  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
		  `description` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
		  `keywords` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
		  `header` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
		  PRIMARY KEY (`id`),
		  UNIQUE KEY `page` (`page`),
		  UNIQUE KEY `display` (`display`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

		INSERT INTO `seo` (`id`, `page`, `display`, `title`, `description`, `keywords`, `header`) VALUES
		(1, 'home', 'Home', 'Home', 'Home', 'Home', '');

		CREATE TABLE IF NOT EXISTS `settings` (
		  `id` bigint(30) NOT NULL AUTO_INCREMENT,
		  `code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `value` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=60 ;

		INSERT INTO `settings` (`id`, `code`, `value`) VALUES
		(1, 'invoice_contact_name', 'Debra Porch'),
		(2, 'invoice_contact_title', 'Manager'),
		(3, 'invoice_contact_phone', '(706) 905-8411'),
		(4, 'invoice_contact_email', 'columbusbridemagazine@gmail.com'),
		(5, 'facebook_link', 'https://www.facebook.com/ColumbusBrideMagazine'),
		(6, 'twitter_link', 'https://twitter.com/ColumbusBrideGA'),
		(7, 'linkedin_link', ''),
		(8, 'googleplus_link', 'https://plus.google.com/106684846755199238521/about'),
		(9, 'instagram_link', 'https://instagram.com/columbusbridemagazine'),
		(10, 'invoice_logo', '/images/application/120150223042210setting.png'),
		(11, 'phone', '(706) 905-8411'),
		(12, 'email', 'columbusbridemagazine@gmail.com'),
		(13, 'receipt_contact_name', 'Debra Porch'),
		(14, 'receipt_contact_title', 'Manager'),
		(15, 'receipt_contact_phone', '(706) 905-8411'),
		(16, 'receipt_contact_email', 'columbusbridemagazine@gmail.com'),
		(17, 'receipt_logo', '/images/application/220150223042210setting.png'),
		(18, 'headline', 'Coming in March! '),
		(19, 'logo', '/images/application/020150223042210setting.png'),
		(20, 'home_page_background1', '/images/application/020150213071641setting.jpg'),
		(21, 'slogan', 'Columbus Bride is a bi monthly, free, digest sized resource for weddings and formal events.'),
		(22, 'pitch', 'Columbus Bride Magazine'),
		(23, 'feature1_photo', '/images/application/420150327075650setting.jpg'),
		(24, 'feature1_title', 'Bride of the Month'),
		(25, 'feature1_description', 'Each month a beautiful bride will be featured. This section will give readers inside information and creative tips directly from the bride.'),
		(26, 'feature2_photo', '/images/application/520150327075650setting.jpg'),
		(27, 'feature2_title', 'Vendor Spotlight'),
		(28, 'feature2_description', 'Each issue will spotlight a local vendor. The article will include the vendor’s tips, secrets, and special offerings.'),
		(29, 'feature3_photo', '/images/application/620150327075650setting.jpg'),
		(30, 'feature3_title', 'Announcements'),
		(31, 'feature3_description', 'Couples will have the opportunity to submit engagement and wedding announcements to share with friends and family.'),
		(32, 'testimonial1_photo', '/images/application/720150418050342setting.jpg'),
		(33, 'testimonial1_quote', 'www.columbusbridemagazine.com'),
		(34, 'testimonial1_name', 'Columbus Bride Magazine advertising'),
		(35, 'testimonial2_photo', '/images/application/820150418050342setting.jpg'),
		(36, 'testimonial2_quote', 'www.google.com'),
		(37, 'testimonial2_name', 'Affordable Elegance Event Decor'),
		(38, 'testimonial3_photo', '/images/application/920150418050342setting.jpg'),
		(39, 'testimonial3_quote', 'www.google.com'),
		(40, 'testimonial3_name', 'King Formals'),
		(44, 'appointments_start_time', '08:00'),
		(45, 'appointments_end_time', '23:30'),
		(46, 'appointments_enabled', '1'),
		(47, 'appointments_duration', '0100'),
		(48, 'aboutus', '<div>\r\n			<div>\r\n				<div>\r\n					<p>What is Columbus Bride?\r\n</p>\r\n					<p>Columbus Bride is a bi monthly, free, digest sized resource for weddings and\r\nformal events. It offers tips, creative ideas, promotions as well as local bridal\r\nand formal information.\r\n</p>\r\n					<p>Don’t miss the opportunity to reach the region’s brides and their families as\r\nthey search for top vendors to complement their special day. Showcase your\r\nbusiness or event in our magazine, the area’s one stop shop for weddings and\r\nevents.\r\n</p>\r\n					<p>Each magazine provides the best information for regional resources and cut-\r\nting edge trends to inform every aspect of wedding planning and formal\r\nevents.&nbsp;</p>\r\n				</div>\r\n			</div>\r\n		</div>'),
		(49, 'home_page_background2', '/images/application/120150226024704setting.jpg'),
		(50, 'home_page_background3', '/images/application/220150225144951setting.jpg'),
		(51, 'home_page_background4', '/images/application/320150226023758setting.jpg'),
		(52, 'address1', '123 Main Street'),
		(53, 'address2', ''),
		(54, 'city', 'Columbus'),
		(55, 'state', 'GA'),
		(56, 'zip', '31907'),
		(57, 'hours_weekday', '9:00 AM - 5:00 PM'),
		(58, 'hours_saturday', '9:00 AM - 5:00 PM'),
		(59, 'hours_sunday', '9:00 AM - 5:00 PM');

		CREATE TABLE IF NOT EXISTS `stores` (
		  `id` bigint(30) NOT NULL AUTO_INCREMENT,
		  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `photo` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `address1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `address2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
		  `city` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `state` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `zip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
		  `weekday_hours` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '10am-9pm ',
		  `saturday_hours` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '10am-10pm',
		  `sunday_hours` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '10am-6pm',
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

		CREATE TABLE IF NOT EXISTS `users` (
		  `id` bigint(30) NOT NULL AUTO_INCREMENT,
		  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `business_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'wavelink',
		  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `status` set('hot','cold','paid','unknown','signed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hot',
		  `description` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `url` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  `survey_completed` set('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
		  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		  `date_last_contacted` timestamp NULL DEFAULT NULL,
		  `session` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
		  PRIMARY KEY (`id`),
		  UNIQUE KEY `email` (`email`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

		INSERT INTO `users` (`id`, `first_name`, `last_name`, `business_name`, `email`, `password`, `phone`, `status`, `description`, `url`, `survey_completed`, `date_added`, `date_last_contacted`, `session`) VALUES
		(1, 'Kelvin', 'Graddick', 'Wave Link, LLC', 'kgraddick@wavelinkllc.com', 'wavelink', '7067736354', 'hot', 'CTO of Wave Link, LLC', 'http://www.wavelinkllc.com', 'no', '2014-09-17 14:08:15', NULL, 'kgraddick@wavelinkllc.com108.88.186.108');
		";

	if(mysqli_multi_query($c, $query)) {
		echo "The database is ready.<br />";

	} else { echo 'There was a problem setting up the database. Please try again. ERROR: '.mysqli_error($c).'<br />'; }

?>

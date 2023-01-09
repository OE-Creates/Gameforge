<?php
	//echo "management_logic_script loaded successfully";

	if (!(isset($_SESSION["user_loggedin"])))
	{
		header("Location: home.php");
		exit();
	}

	if ($_SESSION['user_level'] == 0)
	{
		header("Location: dashboard.php");
		exit();
	}
	
	//---- MANAGEMENT OPTIONS ------------------------------------------------
	
	//---- ADD GAME
	
	if (isset($_POST['submit_addgame']))
	{
		require 'dbconnect_account.php';
		
		$addgameinapppurchase = false;
		$addgameafricanmade = false;
		
		$addgamename = $conn->real_escape_string($_POST['addgame_name']);
		
		$addgamedescription = $conn->real_escape_string($_POST['addgame_description']);
		$addgameurl = $conn->real_escape_string($_POST['addgame_url']);
		$addgamegenre = $conn->real_escape_string($_POST['addgame_genre']);
		$addgamemainsubgenre = $conn->real_escape_string($_POST['addgame_mainsubgenre']);
		$addgameaddsubgenre1 = $conn->real_escape_string($_POST['addgame_addsubgenre1']);
		$addgameaddsubgenre2 = $conn->real_escape_string($_POST['addgame_addsubgenre2']);
		$addgamemaingamestyle = $conn->real_escape_string($_POST['addgame_maingamestyle']);
		$addgamesubgamestyle = $conn->real_escape_string($_POST['addgame_subgamestyle']);
		$addgameplatform = $conn->real_escape_string($_POST['addgame_platform']);
		
		if(filter_has_var(INPUT_POST,'addgame_inapppurchase')) {
			$addgameinapppurchase = $conn->real_escape_string($_POST['addgame_inapppurchase']);
		}
		
		if(filter_has_var(INPUT_POST,'addgame_africanmade')) {
			$addgameafricanmade = $conn->real_escape_string($_POST['addgame_africanmade']);
		}
		
		$addgamereleasestatus = $conn->real_escape_string($_POST['addgame_releasestatus']);
		$addgamevideolink = $conn->real_escape_string($_POST['addgame_videolink']);
		
		$addgamebaseprice = $conn->real_escape_string($_POST['addgame_baseprice']);
		$addgamesalepercent = $conn->real_escape_string($_POST['addgame_salepercent']);
		
		$addgamesaleprice = $addgamebaseprice * (1 - ($addgamesalepercent/100));
		
		$insertnewgame = "INSERT INTO games (name, description, url, genre, gameplayone, gameplaytwo, gameplaythree, gameplayfour, gameplayfive, platform, bannerimage,
											imageone, imagetwo, imagethree, imagefour, imagefive, inapppurchases, africanmade, releasestatus, videolink, baseprice, salepercent, saleprice)
							VALUES ('$addgamename', '$addgamedescription', '$addgameurl', '$addgamegenre', '$addgamemainsubgenre', '$addgameaddsubgenre1', '$addgameaddsubgenre2',
									'$addgamemaingamestyle', '$addgamesubgamestyle', '$addgameplatform', '-', '-', '-', '-', '-', '-', '$addgameinapppurchase', '$addgameafricanmade', '$addgamereleasestatus', '$addgamevideolink', '$addgamebaseprice', '$addgamesalepercent', '$addgamesaleprice')";
									
		$insertgame=$conn->query($insertnewgame);
		
		//INSERT IMAGES
		//Get entry id
		$getentryid = "SELECT id FROM games ORDER BY id DESC LIMIT 1";
		$findid = $conn->query($getentryid);
		$row = $findid->fetch_array();
		
		$entryid = $row['id'];
		
		//Create the db image name
		$imagename_banner = $entryid . "-banner.jpg";
		$imagename_profile = $entryid . "-profile.jpg";
		$imagename_adv1 = $entryid . "-adv1.jpg";
		$imagename_adv2 = $entryid . "-adv2.jpg";
		$imagename_adv3 = $entryid . "-adv3.jpg";
		$imagename_adv4 = $entryid . "-adv4.jpg";
		
		//Create db save path for the image
		$filename_banner = "../images/gameimg/" . $imagename_banner;
		$filename_profile = "../images/gameimg/" . $imagename_profile;
		$filename_adv1 = "../images/gameimg/" . $imagename_adv1;
		$filename_adv2 = "../images/gameimg/" . $imagename_adv2;
		$filename_adv3 = "../images/gameimg/" . $imagename_adv3;
		$filename_adv4 = "../images/gameimg/" . $imagename_adv4;
		
		$tempname_banner = $_FILES["addgame_bannerimg"]["tmp_name"];
		$tempname_profile = $_FILES["addgame_profileimg"]["tmp_name"];
		$tempname_adv1 = $_FILES["addgame_adv1img"]["tmp_name"];
		$tempname_adv2 = $_FILES["addgame_adv2img"]["tmp_name"];
		$tempname_adv3 = $_FILES["addgame_adv3img"]["tmp_name"];
		$tempname_adv4 = $_FILES["addgame_adv4img"]["tmp_name"];
		
		//Insert the image into the database
		$insertnewimage = "UPDATE games SET bannerimage = '$filename_banner', imageone = '$filename_profile', imagetwo = '$filename_adv1', imagethree = '$filename_adv2', imagefour = '$filename_adv3', imagefive = '$filename_adv4' WHERE id = '$entryid'";
		$insertimage = $conn->query($insertnewimage);
		
		//Move the uploaded file to the image directory
		if (move_uploaded_file($tempname_banner, $filename_banner))
		{
			//echo "File Uploaded";
		}
		if (move_uploaded_file($tempname_profile, $filename_profile))
		{
			//echo "File Uploaded";
		}
		if (move_uploaded_file($tempname_adv1, $filename_adv1))
		{
			//echo "File Uploaded";
		}
		if (move_uploaded_file($tempname_adv2, $filename_adv2))
		{
			//echo "File Uploaded";
		}
		if (move_uploaded_file($tempname_adv3, $filename_adv3))
		{
			//echo "File Uploaded";
		}
		if (move_uploaded_file($tempname_adv4, $filename_adv4))
		{
			//echo "File Uploaded";
		}
		
		$conn->close();
		
		header("refresh: 0");
		exit;
	}
	
	//---- UPDATE GAME
	
	if (isset($_POST['submit_updategame']))
	{
		require 'dbconnect_account.php';
		
		//Get game data
		$updategameid = $conn->real_escape_string($_POST['updategame_id']);
		
		$getgamedata = "SELECT * FROM games WHERE id = '$updategameid'";
		$getdata = $conn->query($getgamedata);
		
		if (!($getdata->num_rows === 0))
		{
			$row = $getdata->fetch_array();
			
			$updategamename = $row['name'];
			if (!(empty($_POST['updategame_name'])))
			{
				$updategamename = $conn->real_escape_string($_POST['updategame_name']);
			}
			
			$updategamedescription = $row['description'];
			if (!(empty($_POST['updategame_description'])))
			{
				$updategamedescription = $conn->real_escape_string($_POST['updategame_description']);
			}
			
			$updategameurl = $row['url'];
			if (!(empty($_POST['updategame_url'])))
			{
				$updategameurl = $conn->real_escape_string($_POST['updategame_url']);
			}
			
			$updategamegenre = $row['genre'];
			$updategamegenrecheck = $conn->real_escape_string($_POST['updategame_genre']);
			if (!($updategamegenrecheck == "N/A"))
			{
				$updategamegenre = $conn->real_escape_string($_POST['updategame_genre']);
			}
			
			$updategamemainsubgenre = $row['gameplayone'];
			$updategamemainsubgenrecheck = $conn->real_escape_string($_POST['updategame_mainsubgenre']);
			if (!($updategamemainsubgenrecheck == "N/A"))
			{
				$updategamemainsubgenre = $conn->real_escape_string($_POST['updategame_mainsubgenre']);
			}
			
			$updategameaddsubgenre1 = $row['gameplaytwo'];
			$updategameaddsubgenre1check = $conn->real_escape_string($_POST['updategame_addsubgenre1']);
			if (!($updategameaddsubgenre1check == "N/A"))
			{
				$updategameaddsubgenre1 = $conn->real_escape_string($_POST['updategame_addsubgenre1']);
			}
			
			$updategameaddsubgenre2 = $row['gameplaythree'];
			$updategameaddsubgenre2check = $conn->real_escape_string($_POST['updategame_addsubgenre2']);
			if (!($updategameaddsubgenre2check == "N/A"))
			{
				$updategameaddsubgenre2 = $conn->real_escape_string($_POST['updategame_addsubgenre2']);
			}
			
			$updategamemaingamestyle = $row['gameplayfour'];
			$updategamemaingamestylecheck = $conn->real_escape_string($_POST['updategame_maingamestyle']);
			if (!($updategamemaingamestylecheck == "N/A"))
			{
				$updategamemaingamestyle = $conn->real_escape_string($_POST['updategame_maingamestyle']);
			}
			
			$updategamesubgamestyle = $row['gameplayfive'];
			$updategamesubgamestylecheck = $conn->real_escape_string($_POST['updategame_subgamestyle']);
			if (!($updategamesubgamestylecheck == "N/A"))
			{
				$updategamesubgamestyle = $conn->real_escape_string($_POST['updategame_subgamestyle']);
			}
			
			$updategameplatform = $row['platform'];
			$updategameplatformcheck = $conn->real_escape_string($_POST['updategame_platform']);
			if (!($updategameplatformcheck == "N/A"))
			{
				$updategameplatform = $conn->real_escape_string($_POST['updategame_platform']);
			}
			
	//-----------------------------------------------------------------------------------------------------------
			
			$updategamebannerimg = $row['bannerimage'];
			if (!(empty($_POST['updategame_bannerimg'])))
			{			
				//Create the db image name
				$imagename_banner = $updategameid . "-banner.jpg";
				
				//Create db save path for the image
				$filename_banner = "../images/gameimg/" . $imagename_banner;
				
				$tempname_banner = $_FILES["updategame_bannerimg"]["tmp_name"];
				
				$setnewimg = "UPDATE games SET bannerimage='$filename_banner' WHERE id = '$updategameid'";
				$setnew = $conn->query($setnewimg);
				
				//Move the uploaded file to the image directory
				if (move_uploaded_file($tempname_banner, $filename_banner))
				{
					//echo "File Uploaded";
				}
			}
			
			$updategameprofileimg = $row['imageone'];
			if (!(empty($_POST['updategame_profileimg'])))
			{
				$imagename_profile = $updategameid . "-profile.jpg";
				
				$filename_profile = "../images/gameimg/" . $imagename_profile;
				
				$tempname_profile = $_FILES["updategame_profileimg"]["tmp_name"];
				
				$updategameprofileimg = $filename_profile;
				
				if (move_uploaded_file($tempname_profile, $filename_profile))
				{
					//echo "File Uploaded";
				}
			}
			
			$updategameadv1img = $row['imagetwo'];
			if (!(empty($_POST['updategame_adv1img'])))
			{
				$imagename_adv1 = $updategameid . "-adv1.jpg";
				
				$filename_adv1 = "../images/gameimg/" . $imagename_adv1;
				
				$tempname_adv1 = $_FILES["updategame_adv1img"]["tmp_name"];
				
				$updategameadv1img = $filename_adv1;
				
				if (move_uploaded_file($tempname_adv1, $filename_adv1))
				{
					//echo "File Uploaded";
				}
			}
			
			$updategameadv2img = $row['imagethree'];
			if (!(empty($_POST['updategame_adv2img'])))
			{
				$imagename_adv2 = $updategameid . "-adv2.jpg";
				
				$filename_adv2 = "../images/gameimg/" . $imagename_adv2;
				
				$tempname_adv2 = $_FILES["updategame_adv2img"]["tmp_name"];
				
				$updategameadv2img = $filename_adv2;
				
				if (move_uploaded_file($tempname_adv2, $filename_adv2))
				{
					//echo "File Uploaded";
				}
			}
			
			$updategameadv3img = $row['imagefour'];
			if (!(empty($_POST['updategame_adv3img'])))
			{
				$imagename_adv3 = $updategameid . "-adv3.jpg";
				
				$filename_adv3 = "../images/gameimg/" . $imagename_adv3;
				
				$tempname_adv3 = $_FILES["updategame_adv3img"]["tmp_name"];
				
				$updategameadv3img = $filename_adv3;
				
				if (move_uploaded_file($tempname_adv3, $filename_adv3))
				{
					//echo "File Uploaded";
				}
			}
			
			$updategameadv4img = $row['imagefive'];
			if (!(empty($_POST['updategame_adv4img'])))
			{
				$imagename_adv4 = $updategameid . "-adv4.jpg";
				
				$filename_adv4 = "../images/gameimg/" . $imagename_adv4;
				
				$tempname_adv4 = $_FILES["updategame_adv4img"]["tmp_name"];
				
				$updategameadv4img = $filename_adv4;
				
				if (move_uploaded_file($tempname_adv4, $filename_adv4))
				{
					//echo "File Uploaded";
				}
			}
			
	//-----------------------------------------------------------------------------------------------------------
			
			$updategameinapppurchase = $row['inapppurchases'];
			if(filter_has_var(INPUT_POST,'updategame_inapppurchase')) {
				$updategameinapppurchase = $conn->real_escape_string($_POST['updategame_inapppurchase']);
			}
			
			$updategameafricanmade = $row['africanmade'];
			if(filter_has_var(INPUT_POST,'updategame_africanmade')) {
				$updategameafricanmade = $conn->real_escape_string($_POST['updategame_africanmade']);
			}
			
			$updategamereleasestatus = $row['releasestatus'];
			$updategamereleasestatuscheck = $conn->real_escape_string($_POST['updategame_releasestatus']);
			if (!($updategamereleasestatuscheck == "N/A"))
			{
				$updategamereleasestatus = $conn->real_escape_string($_POST['updategame_releasestatus']);
			}
			
			$updategamevideolink = $row['videolink'];
			if (!(empty($_POST['updategame_videolink'])))
			{
				$updategamevideolink = $conn->real_escape_string($_POST['updategame_videolink']);
			}
			
			$updategamebaseprice = $row['baseprice'];
			if (!(empty($_POST['updategame_baseprice'])))
			{
				$updategamebaseprice = $conn->real_escape_string($_POST['updategame_baseprice']);
			}
			
			$updategamesalepercent = $row['salepercent'];
			if (!(empty($_POST['updategame_salepercent'])))
			{
				$updategamesalepercent = $conn->real_escape_string($_POST['updategame_salepercent']);
			}
			
			$updategamesaleprice = $updategamebaseprice * (1 - ($updategamesalepercent/100));
			
			$updategamedata = "UPDATE games SET name = '$updategamename', description = '$updategamedescription', url = '$updategameurl', genre = '$updategamegenre', gameplayone = '$updategamemainsubgenre', gameplaytwo = '$updategameaddsubgenre1', gameplaythree = '$updategameaddsubgenre2', gameplayfour = '$updategamemaingamestyle', gameplayfive = '$updategamesubgamestyle',
							platform = '$updategameplatform', bannerimage = '$updategamebannerimg', imageone = '$updategameprofileimg', imagetwo = '$updategameadv1img', imagethree = '$updategameadv2img', imagefour = '$updategameadv3img', imagefive = '$updategameadv4img', inapppurchases = '$updategameinapppurchase',
							africanmade = '$updategameafricanmade', releasestatus = '$updategamereleasestatus', videolink = '$updategamevideolink', baseprice = '$updategamebaseprice', salepercent = '$updategamesalepercent', saleprice = '$updategamesaleprice' WHERE id = '$updategameid'";
			$updatedata = $conn->query($updategamedata);
		}
	
		$conn->close();
		
		header("refresh: 0");
		exit;
	}
	
	//---- DELETE GAME
	
	if (isset($_POST['submit_deletegame']))
	{
		require 'dbconnect_account.php';
		
		$deleteid = $conn->real_escape_string($_POST['submit_deletegame']);
		
		$findselectedcomp = "SELECT id FROM games WHERE id=$deleteid";
		$findcomp=$conn->query($findselectedcomp);
		if ($findcomp->num_rows !== 0)
		{
			//--- DELETE GAME ENTRY AND EXTERNAL DATA
			$deleteselectedcomp = "DELETE FROM games WHERE id=$deleteid";
			$deletecomp=$conn->query($deleteselectedcomp);
			//---------------------------------------
			
			$deleteselectedcomp = "DELETE FROM reviews WHERE gameid=$deleteid";
			$deletecomp=$conn->query($deleteselectedcomp);
			
			$deleteselectedcomp = "DELETE FROM wishlists WHERE gameid=$deleteid";
			$deletecomp=$conn->query($deleteselectedcomp);
		}
		
		$conn->close();
		
		header("refresh: 0");
		exit;
	}
	
	//---- USER MANAGEMENT OPTIONS -------------------------------------------
	
	//---- USER ADD
	
	if (isset($_POST['submit_adduser']))
	{
		require 'dbconnect_account.php';
		
		$ulevel = false;
		
		$uname = $conn->real_escape_string($_POST['user_name']);
		$uusername = $conn->real_escape_string($_POST['user_username']);
		
		if(filter_has_var(INPUT_POST,'user_level')) {
			$ulevel = $conn->real_escape_string($_POST['user_level']);
		}
		
		$ucountry = $conn->real_escape_string($_POST['user_country']);
		$upnumber = $conn->real_escape_string($_POST['user_pnumber']);
		$uemail = $conn->real_escape_string($_POST['user_email']);
		$upass = $conn->real_escape_string($_POST['user_password']);

		$upasshash = password_hash($upass, PASSWORD_DEFAULT);
		
		$uloggedin = false;
		
		$insertnewuser = "INSERT INTO users (name, username, country, phonenumber, email, password, level, loggedin) VALUES ('$uname', '$uusername', '$ucountry', '$upnumber', '$uemail', '$upasshash', '$ulevel', '$uloggedin')";
		
		$checknewuser = "SELECT * FROM users WHERE email = '$uemail'";
		
		$run = $conn->query($checknewuser);
		if ($run->num_rows === 0)
		{
			$runadd = $conn->query($insertnewuser);
			
			$getentryid = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
			$findid = $conn->query($getentryid);
			$row = $findid->fetch_array();
			
			//Create Checkout table
			require 'dbconnect_transact.php';
			
			$user_idef = $row['id'];
			$checkouttablename = $user_idef . "_checkout";
			
			$createtable = "CREATE TABLE $checkouttablename (gameid INT(10) NOT NULL, gamename VARCHAR(50) NOT NULL, baseprice INT(10) NOT NULL, salepercent INT(2) NOT NULL, saleprice INT(10) NOT NULL)";
			$create = $conn->query($createtable);
		}
		
		$conn->close();
	}
	
	//---- USER UPDATE
	
	if (isset($_POST['submit_updateuser']))
	{
		require 'dbconnect_account.php';
		
		$uid = $conn->real_escape_string($_POST['updateuser_id']);
		
		if ($_SESSION["user_id"] != $uid)
		{
			$getuserdata = "SELECT * FROM users WHERE id = '$uid'";
			$getdata = $conn->query($getuserdata);
			
			if (!($getdata->num_rows === 0))
			{
				$row = $getdata->fetch_array();
				
				$uname = $row['name'];
				if (!(empty($_POST['updateuser_name'])))
				{
					$uname = $conn->real_escape_string($_POST['updateuser_name']);
				}
				
				$uusername = $row['username'];
				if (!(empty($_POST['updateuser_username'])))
				{
					$uusername = $conn->real_escape_string($_POST['updateuser_username']);
				}
				
				$ucountry = $row['country'];
				$ucountrycheck = $conn->real_escape_string($_POST['updateuser_country']);
				if (!($ucountrycheck == "N/A"))
				{
					$ucountry = $conn->real_escape_string($_POST['updateuser_country']);
				}
				
				$upnumber = $row['phonenumber'];
				if (!(empty($_POST['updateuser_pnumber'])))
				{
					$upnumber = $conn->real_escape_string($_POST['updateuser_pnumber']);
				}
				
				$uemail = $row['email'];
				if (!(empty($_POST['updateuser_email'])))
				{
					$uemail = $conn->real_escape_string($_POST['updateuser_email']);
				}
				
				$upass = $row['password'];
				$upasshash = $upass;
				if (!(empty($_POST['updateuser_password'])))
				{
					$upass = $conn->real_escape_string($_POST['updateuser_password']);
					$upasshash = password_hash($upass, PASSWORD_DEFAULT);
				}
				
				$ulevel = $row['level'];
				if(filter_has_var(INPUT_POST,'updateuser_level')) {
					$ulevel = $conn->real_escape_string($_POST['updateuser_level']);
				}
				
				$updateuserdata = "UPDATE users SET name = '$uname', username = '$uusername', country = '$ucountry', phonenumber = '$upnumber', email = '$uemail', password = '$upasshash', level = '$ulevel' WHERE id = '$uid'";
				$updatedata = $conn->query($updateuserdata);
			}
		}
		
		$conn->close();
		
		header("refresh: 0");
		exit;
	}
	
	//---- USER DELETE
	
	if (isset($_POST['submit_deleteuser']))
	{
		require 'dbconnect_account.php';
		
		$deleteid = $conn->real_escape_string($_POST['submit_deleteuser']);
		
		if ($_SESSION["user_id"] != $deleteid)
		{
			$findselectedcomp = "SELECT id FROM users WHERE id=$deleteid";
			$findcomp=$conn->query($findselectedcomp);
			if ($findcomp->num_rows > 0)
			{
				$deleteselectedcomp = "DELETE FROM users WHERE id=$deleteid";
				$deletecomp=$conn->query($deleteselectedcomp);
				
				$deleteselectedcomp = "DELETE FROM wishlists WHERE userid=$deleteid";
				$deletecomp=$conn->query($deleteselectedcomp);
				
				$deleteselectedcomp = "DELETE FROM reviews WHERE userid=$deleteid";
				$deletecomp=$conn->query($deleteselectedcomp);
				
				$dbname = "gameforgetransact";
				$tablename = $deleteid . "_checkout";
				
				$deleteselectedcomp = "DROP TABLE $dbname.$tablename";
				$deletecomp=$conn->query($deleteselectedcomp);
			}
		}
		
		$conn->close();
		
		header("refresh: 0");
		exit;
	}
	
	if (isset($_POST['submit_removefeedback']))
	{
		require 'dbconnect_account.php';
		
		$deletefb = $conn->real_escape_string($_POST['submit_removefeedback']);
		
		$findfeedback = "SELECT id FROM feedback WHERE id=$deletefb";
		$findit=$conn->query($findfeedback);
		
		if ($findit->num_rows > 0)
		{
			$deletefeedback = "DELETE FROM feedback WHERE id=$deletefb";
			$deleteit=$conn->query($deletefeedback);
		}
		
		$conn->close();
		
		header("refresh: 0");
		exit;
	}
	
	//---- EXPORTING TO CSV --------------------------------------------------
	
	//---- USERS
	
	if (isset($_POST['submit_printusers']))
	{
		require 'dbconnect_account.php';
		
		date_default_timezone_set("Africa/Nairobi");
		$timestamp = date("Y-m-d") . "-" . date("h-i-sa");
        $filename = "Export_" . $timestamp . "_Users.csv";
		
		header("Content-Type: text/csv");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		
		$stream = fopen("php://output", "w");
		
		$stmt = "SELECT * FROM users";
		$get = $conn->query($stmt);
		
		$headings = ['id', 'name', 'username', 'country', 'phonenumber', 'email', 'level'];
		fputcsv($stream, $headings);
		
		while ($row = $get->fetch_array())
		{
			$data = [$row['id'], $row['name'], $row['username'], $row['country'], $row['phonenumber'], $row['email'], $row['level']];
			fputcsv($stream, $data);
		}
		
		fclose($stream);
		
		$conn->close();
		
		exit;
	}
	
	//---- GAMES
	
	if (isset($_POST['submit_printgames']))
	{
		require 'dbconnect_account.php';
		
		date_default_timezone_set("Africa/Nairobi");
		$timestamp = date("Y-m-d") . "-" . date("h-i-sa");
        $filename = "Export_" . $timestamp . "_Games.csv";
		
		header("Content-Type: text/csv");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		
		$stream = fopen("php://output", "w");
		
		$stmt = "SELECT * FROM games";
		$get = $conn->query($stmt);
		
		$headings = ['id', 'name', 'url', 'genre', 'gameplayone', 'gameplaytwo', 'gameplaythree', 'gameplayfour', 'gameplayfive', 'platform', 'inapppurchases', 'africanmade', 'releasestatus', 'videolink', 'baseprice', 'salepercent', 'saleprice'];
		fputcsv($stream, $headings);
		
		while ($row = $get->fetch_array())
		{
			$data = [$row['id'], $row['name'], $row['url'], $row['genre'], $row['gameplayone'], $row['gameplaytwo'], $row['gameplaythree'], $row['gameplayfour'], $row['gameplayfive'], $row['platform'], $row['inapppurchases'], $row['africanmade'], $row['releasestatus'], $row['videolink'], $row['baseprice'], $row['salepercent'], $row['saleprice']];
			fputcsv($stream, $data);
		}
		
		fclose($stream);
		
		$conn->close();
		
		exit;
	}
	
	//---- PURCHASES
	
	/* if (isset($_POST['submit_printweektransactions']))
	{
		require 'dbconnect_transact.php';
		
		date_default_timezone_set("Africa/Nairobi");
		$timestamp = date("Y-m-d") . "-" . date("h-i-sa");
        $filename = "Export_" . $timestamp . "_Transact_Week.csv";
		
		header("Content-Type: text/csv");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		
		$stream = fopen("php://output", "w");
		
		$stmt = "SELECT * FROM purchaselist WHERE date BETWEEN date_sub(now(),INTERVAL 1 WEEK) and now() ORDER BY date DESC";
		$get = $conn->query($stmt);
		
		$headings = ['id', 'date', 'userid', 'gameid', 'transactionid', 'transactioncode', 'baseprice', 'purchaseprice', 'salepercent'];
		fputcsv($stream, $headings);
		
		while ($row = $get->fetch_array())
		{
			$data = [$row['id'], $row['date'], $row['userid'], $row['gameid'], $row['transactionid'], $row['transactioncode'], $row['baseprice'], $row['purchaseprice'], $row['salepercent']];
			fputcsv($stream, $data);
		}
		
		fclose($stream);
		
		$conn->close();
		
		exit;
	} */
	
	/* if (isset($_POST['submit_printmonthtransactions']))
	{
		require 'dbconnect_transact.php';
		
		date_default_timezone_set("Africa/Nairobi");
		$timestamp = date("Y-m-d") . "-" . date("h-i-sa");
        $filename = "Export_" . $timestamp . "_Transact_Month.csv";
		
		header("Content-Type: text/csv");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		
		$stream = fopen("php://output", "w");
		
		$stmt = "SELECT * FROM purchaselist WHERE date BETWEEN date_sub(now(),INTERVAL 1 MONTH) and now() ORDER BY date DESC";
		$get = $conn->query($stmt);
		
		$headings = ['id', 'date', 'userid', 'gameid', 'transactionid', 'transactioncode', 'baseprice', 'purchaseprice', 'salepercent'];
		fputcsv($stream, $headings);
		
		while ($row = $get->fetch_array())
		{
			$data = [$row['id'], $row['date'], $row['userid'], $row['gameid'], $row['transactionid'], $row['transactioncode'], $row['baseprice'], $row['purchaseprice'], $row['salepercent']];
			fputcsv($stream, $data);
		}
		
		fclose($stream);
		
		$conn->close();
		
		exit;
	} */
	
	if (isset($_POST['submit_printtransactions']))
	{
		require 'dbconnect_transact.php';
		
		date_default_timezone_set("Africa/Nairobi");
		$timestamp = date("Y-m-d") . "-" . date("h-i-sa");
        $filename = "Export_" . $timestamp . "_Transact.csv";
		
		$date_low = "2020-01-01";
		if (!(empty($_POST['dateselect_low'])))
		{
			$date_low = $conn->real_escape_string($_POST['dateselect_low']);
		}
		
		$date_high = date("Y-m-d");
		if (!(empty($_POST['dateselect_high'])))
		{
			$date_high = $conn->real_escape_string($_POST['dateselect_high']);
		}
		
		header("Content-Type: text/csv");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		
		$stream = fopen("php://output", "w");
		
		$stmt = "SELECT * FROM purchaselist WHERE date >= '$date_low' AND date <= '$date_high' ORDER BY date DESC";
		$get = $conn->query($stmt);
		
		$headings = ['id', 'date', 'userid', 'gameid', 'transactionid', 'transactioncode', 'baseprice', 'purchaseprice', 'salepercent'];
		fputcsv($stream, $headings);
		
		while ($row = $get->fetch_array())
		{
			$data = [$row['id'], $row['date'], $row['userid'], $row['gameid'], $row['transactionid'], $row['transactioncode'], $row['baseprice'], $row['purchaseprice'], $row['salepercent']];
			fputcsv($stream, $data);
		}
		
		fclose($stream);
		
		$conn->close();
		
		exit;
	}
	
?>
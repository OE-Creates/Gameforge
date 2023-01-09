<?php
	//echo "core_logic_script loaded successfully";
	
	session_start();
	
	if (isset($_GET['submit_logout']))
	{
		require 'dbconnect_account.php';
		
		$uid = $_SESSION["user_id"];
		//Set loggedout status
		$setloggedin = "UPDATE users SET loggedin = 0 WHERE id = '$uid'";
		$set = $conn->query($setloggedin);

		$conn->close();
		
		session_unset();
		session_destroy();
		header("Location: ../pages/home.php");
		exit();
	}
	
	if (isset($_GET['submit_returntodb']))
	{
		header("Location: dashboard.php");
		exit();
	}
	
	if (isset($_GET['submit_management']))
	{
		header("Location: management.php");
		exit();
	}
	
	if (isset($_GET['submit_viewgamepage']))
	{	
		$_SESSION["gamepage_id"] = $_GET['submit_viewgamepage'];
		header("Location: game_page.php");
		exit();
	}
	
	if (isset($_GET['submit_checkoutcart']))
	{
		header("Location: checkout.php");
		exit();
	}
	
//---------------------------------------------------------------------------------------
	
	if (isset($_POST['submit_usersettings']))
	{	
		require 'dbconnect_account.php';
		
		$uid = $_SESSION["user_id"];
		
		$getuserdata = "SELECT * FROM users WHERE id = '$uid'";
		$getdata = $conn->query($getuserdata);
		
		if (!($getdata->num_rows === 0))
		{
			$row = $getdata->fetch_array();
			
			$uname = $row['name'];
			if (!(empty($_POST['settinguser_name'])))
			{
				$uname = $conn->real_escape_string($_POST['settinguser_name']);
				$_SESSION["user_name"] = $uname;
			}
			
			$uusername = $row['username'];
			if (!(empty($_POST['settinguser_username'])))
			{
				$uusername = $conn->real_escape_string($_POST['settinguser_username']);
				$_SESSION["user_username"] = $uusername;
			}
			
			$ucountry = $row['country'];
			$ucountrycheck = $conn->real_escape_string($_POST['settinguser_country']);
			if (!($ucountrycheck == "N/A"))
			{
				$ucountry = $conn->real_escape_string($_POST['settinguser_country']);
				$_SESSION["user_country"] = $ucountry;
			}
			
			$upnumber = $row['phonenumber'];
			if (!(empty($_POST['settinguser_pnumber'])))
			{
				$upnumber = $conn->real_escape_string($_POST['settinguser_pnumber']);
				$_SESSION["user_pnumber"] = $upnumber;
			}
			
			$uemail = $row['email'];
			if (!(empty($_POST['settinguser_email'])))
			{
				$uemail = $conn->real_escape_string($_POST['settinguser_email']);
				$_SESSION["user_email"] = $uemail;
			}
			
			$upass = $row['password'];
			$upasshash = $upass;
			if (!(empty($_POST['settinguser_password'])))
			{
				$upass = $conn->real_escape_string($_POST['settinguser_password']);
				$upasshash = password_hash($upass, PASSWORD_DEFAULT);
			}

			
			
			$settinguserdata = "UPDATE users SET name = '$uname', username = '$uusername', country = '$ucountry', phonenumber = '$upnumber', email = '$uemail', password = '$upasshash' WHERE id = '$uid'";
			$updatedata = $conn->query($settinguserdata);
		}
		
		$conn->close();
		
		header("refresh: 0");
		exit;
	}
	
//---------------------------------------------------------------------------------------

?>
<?php
	//echo "support_logic_script loaded successfully";
	
	if (isset($_POST["submit_forgotdetails"]))
	{
		require 'dbconnect_account.php';
		
		$fd_email = $conn->real_escape_string($_POST['forgotdetails_email']);
		
		$checkuserexists = "SELECT * FROM users WHERE email = '$fd_email'";
		$checkuser = $conn->query($checkuserexists);
		
		if ($checkuser->num_rows !== 0)
		{
			if (!(empty($_POST['forgotdetails_username'])))
			{
				$fd_username = $conn->real_escape_string($_POST['forgotdetails_username']);
				
				$row = $checkuser->fetch_array();
				
				if ($fd_username == $row['username'])
				{
					$temp_password = "Password@12345";
					$hash_password = password_hash($temp_password, PASSWORD_DEFAULT);
					$setpassword = "UPDATE users SET password = '$hash_password' WHERE email = '$fd_email'";
					$setit = $conn->query($setpassword);
					
					echo "<script  type='text/javascript'>alert('Password reset to Password@12345')</script>";
		
					header("refresh: 0");
					exit;
				}
				else
				{
					echo "<script  type='text/javascript'>alert('Password not reset.')</script>";
		
					header("refresh: 0");
					exit;
				}
			}
			
			if (!(empty($_POST['forgotdetails_password'])))
			{
				$fd_password = $conn->real_escape_string($_POST['forgotdetails_password']);
				
				$row = $checkuser->fetch_array();
				
				if (password_verify($fd_password, $row['password']))
				{
					$setusername = "UPDATE users SET username = 'TempResetAccount' WHERE email = '$fd_email'";
					$setit = $conn->query($setusername);
					
					echo "<script  type='text/javascript'>alert('Username reset to TempResetAccount')</script>";
		
					header("refresh: 0");
					exit;
				}
				else
				{
					echo "<script  type='text/javascript'>alert('Username not reset.')</script>";
		
					header("refresh: 0");
					exit;
				}
			}
		}
		else
		{
			echo "<script  type='text/javascript'>alert('Email Address not found.')</script>";
		
			header("refresh: 0");
			exit;
		}
	}
?>
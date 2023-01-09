<?php
	//echo "signup_logic_script loaded successfully";

	if (isset($_POST['submit_signup']))
	{
		require 'dbconnect_account.php';
		
		$uname = $conn->real_escape_string($_POST['user_name']);
		$uusername = $conn->real_escape_string($_POST['user_username']);
		$ucountry = $conn->real_escape_string($_POST['user_country']);
		$upnumber = $conn->real_escape_string($_POST['user_pnumber']);
		$uemail = $conn->real_escape_string($_POST['user_email']);
		$upass = $conn->real_escape_string($_POST['user_password']);

		$upasshash = password_hash($upass, PASSWORD_DEFAULT);
		
		$ulevel = 0;
		$uloggedin = true;
		
		$insertnewuser = "INSERT INTO users (name, username, country, phonenumber, email, password, level, loggedin) VALUES ('$uname', '$uusername', '$ucountry', '$upnumber', '$uemail', '$upasshash', '$ulevel', '$uloggedin')";
		
		$checknewuser = "SELECT * FROM users WHERE username = '$uusername'";
		
		$run = $conn->query($checknewuser);
		if ($run->num_rows === 0)
		{
			$runadd = $conn->query($insertnewuser);
			If ($runadd)
			{
				$getusers = "SELECT * FROM users";
				$run = $conn->query($getusers);
				
				while ($row = $run->fetch_array())
				{
					if ($uusername == $row['username'])
					{
						if (password_verify($upass, $row['password']))
						{
							$uid = $row['id'];
							//Set login status
							$setloggedin = "UPDATE users SET loggedin = true WHERE id = '$uid'";
							$set = $conn->query($setloggedin);
							
							$_SESSION["user_id"] = $row['id'];
							$_SESSION["user_name"] = $row['name'];
							$_SESSION["user_username"] = $row['username'];
							$_SESSION["user_country"] = $row['country'];
							$_SESSION["user_pnumber"] = $row['phonenumber'];
							$_SESSION["user_email"] = $row['email'];
							$_SESSION["user_level"] = $row['level'];
							$_SESSION["user_loggedin"] = 1;
							
							
							//Create Checkout table
							require 'dbconnect_transact.php';
							
							$user_idef = $row['id'];
							$checkouttablename = $user_idef . "_checkout";
							
							$createtable = "CREATE TABLE $checkouttablename (gameid INT(10) NOT NULL, gamename VARCHAR(50) NOT NULL, baseprice INT(10) NOT NULL, salepercent INT(2) NOT NULL, saleprice INT(10) NOT NULL)";
							$create = $conn->query($createtable);
							
							header("Location: ../pages/dashboard.php");
							exit();
						}
					}
				}
			}
		}
		else
		{
			echo "<script  type='text/javascript'>alert('Username already exists, please enter a different username.')</script>";
		
			header("refresh: 0");
			exit;
		}
		
		$conn->close();
	}
?>
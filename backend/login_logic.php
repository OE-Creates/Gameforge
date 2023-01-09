<?php
	//echo "login_logic_script loaded successfully";

	if (isset($_POST['submit_login']))
	{				  
		require 'dbconnect_account.php';
		
		$urememberme = false;
		
		$uusername = $conn->real_escape_string($_POST["login_username"]);
		$upass = $conn->real_escape_string($_POST["login_password"]);
		
		if(filter_has_var(INPUT_POST,'login_rememberme')) {
			$urememberme = $conn->real_escape_string($_POST['login_rememberme']);
		}
		
		$findusername = "SELECT * FROM users";
		$run = $conn->query($findusername);
		
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
					
					if ($_SESSION["user_level"] == 1)
					{
						header("Location: management.php");
						exit();
					}
					else
					{
						header("Location: dashboard.php");
						exit();
					}
				}
			}
		}
		$conn->close();
		
		echo "<script  type='text/javascript'>alert('Incorrect username and/or password.')</script>";
		
		header("refresh: 0");
		exit;
	}
?>
<?php
	//echo "dashboard_logic_script loaded successfully";
	
	if (!(isset($_SESSION["user_loggedin"])))
	{
		header("Location: home.php");
		exit();
	}
	
	if (isset($_POST['submit_removewishlist']))
	{
		require 'dbconnect_account.php';
		
		$user_idef = $_SESSION['user_id'];
		$game_idef = $conn->real_escape_string($_POST['submit_removewishlist']);
		
		$checkwishlist = "SELECT * FROM wishlists WHERE userid = '$user_idef' AND gameid = '$game_idef'";
		$check = $conn->query($checkwishlist);
		
		if (!($check->num_rows === 0))
		{
			$remtowishlist = "DELETE FROM wishlists WHERE userid = '$user_idef' AND gameid = '$game_idef'";
			$remgame = $conn->query($remtowishlist);
		}
		
		$conn->close();
	}
	
	if (isset($_POST['submit_dashremovereview']))
	{
		$userid = $_SESSION["user_id"];
		
		require 'dbconnect_account.php';
		
		$gameid = $conn->real_escape_string($_POST['submit_dashremovereview']);
		
		$remgamereview = "DELETE FROM reviews WHERE gameid = '$gameid' AND userid = '$userid'";
		$remreview = $conn->query($remgamereview);
		
		$conn->close();
		
		header("refresh: 0");
		exit;
	}
	
	if (isset($_POST['submit_postfeedback']))
	{
		require 'dbconnect_account.php';
		
		$userfeedback = $conn->real_escape_string($_POST['feedback_formdata']);
		
		$addfeedback = "INSERT INTO feedback (feedback_info) VALUES('$userfeedback')";
		$add = $conn->query($addfeedback);
		
		$conn->close();
		
		header("refresh: 0");
		exit;
	}
?>
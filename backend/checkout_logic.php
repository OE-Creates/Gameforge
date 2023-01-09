<?php
	//echo "checkout_logic_script loaded successfully";
	
	if (!(isset($_SESSION["user_loggedin"])))
	{
		header("Location: home.php");
		exit();
	}
	
	$totalcost = 0;
	
	require 'dbconnect_transact.php';
				
	$user_idef = $_SESSION['user_id'];
	$usercart = $user_idef . "_checkout";
	
	$checkincart = "SELECT * FROM $usercart";
	$check = $conn->query($checkincart);
	
	while ($row = $check->fetch_array())
	{	
		$newcost = $row['saleprice'];
		$totalcost += $newcost;
	}
	
	$_SESSION["chkout_totalcost"] = $totalcost;
	
	$conn->close();
	
//--------------------------------------------------------------
	
	if (!(isset($_SESSION["user_loggedin"])))
	{
		header("Location: home.php");
		exit();
	}
	
	if (isset($_GET['submit_proceedtopay']))
	{
		require 'dbconnect_transact.php';
				
		$user_idef = $_SESSION['user_id'];
		$usercart = $user_idef . "_checkout";
		
		$checkcart = "SELECT * FROM $usercart";
		$checkit = $conn->query($checkcart);
		
		if ($checkit->num_rows !== 0)
		{
			$transc_id = $user_idef . "-" . date("Y-m-d") . "-purchase";
			
			$_SESSION["transact_id"] = $transc_id;
			
			$conn->close();
			
			header("Location: transaction.php");
			exit();
		}
	}
	
	if (isset($_POST['submit_chkoutremoveitem']))
	{
		require 'dbconnect_transact.php';
		
		$remchkoutitem = $conn->real_escape_string($_POST['submit_chkoutremoveitem']);
				
		$user_idef = $_SESSION['user_id'];
		$usercart = $user_idef . "_checkout";
		
		$remfromcart = "DELETE FROM $usercart WHERE gameid = $remchkoutitem";
		$remove = $conn->query($remfromcart);
		
		$conn->close();
		
		header("refresh: 0");
		exit;
	}
?>
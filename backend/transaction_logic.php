<?php
	//echo "transaction_logic_script loaded successfully";
	
	if (!(isset($_SESSION["user_loggedin"])))
	{
		header("Location: home.php");
		exit();
	}
	
	if (isset($_POST['submit_transactpay']))
	{
		require 'dbconnect_transact.php';
		
		$user_idef = $_SESSION['user_id'];
		$usercart = $user_idef . "_checkout";
		
		$trans_transactcode = $conn->real_escape_string($_POST["payment_receiptid"]);
		
		$checkincart = "SELECT * FROM $usercart";
		$check = $conn->query($checkincart);
		
		while ($row = $check->fetch_array())
		{	
			$trans_gameid = $row['gameid'];
			$trans_transactid = $_SESSION["transact_id"];
			$trans_baseprice = $row['baseprice'];
			$trans_purchaseprice = $row['saleprice'];
			$trans_saleperc = $row['salepercent'];
			
			$inserttopurchaselist = "INSERT INTO purchaselist (userid, gameid, transactionid, transactioncode, baseprice, purchaseprice, salepercent) VALUES ('$user_idef', '$trans_gameid', '$trans_transactid', '$trans_transactcode', '$trans_baseprice', '$trans_purchaseprice', '$trans_saleperc')";
			$insertpurch = $conn->query($inserttopurchaselist);
		}
		
		$clearcheckout = "TRUNCATE TABLE gameforgetransact.$usercart";
		$clearcart = $conn->query($clearcheckout);
		
		$conn->close();
		
		header("Location: dashboard.php");
		exit();
	}
?>
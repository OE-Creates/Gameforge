<?php

	//echo "gamepage_logic_script loaded successfully";
	
	if (isset($_POST['submit_buygame']))
	{
		require 'dbconnect_account.php';
		
		$game_idef = $conn->real_escape_string($_POST['submit_buygame']);
		
		$getgamedetails = "SELECT * FROM games WHERE id = '$game_idef'";
		$getdetails = $conn->query($getgamedetails);
		
		if (!($getdetails->num_rows === 0))
		{
			$fetched = $getdetails->fetch_array();
			
			require 'dbconnect_transact.php';
				
			$user_idef = $_SESSION['user_id'];
			$usercart = $user_idef . "_checkout";
			
			$checkincart = "SELECT * FROM $usercart WHERE gameid = '$game_idef'";
			$check = $conn->query($checkincart);
			
			if ($check->num_rows === 0)
			{
				$chk_id = $fetched['id'];
				$chk_name = $fetched['name'];
				$chk_baseprice = $fetched['baseprice'];
				$chk_salepercent = $fetched['salepercent'];
				$chk_saleprice = $fetched['saleprice'];
				
				$movetocart = "INSERT INTO $usercart (gameid, gamename, baseprice, salepercent, saleprice) VALUES ('$chk_id', '$chk_name', '$chk_baseprice', '$chk_salepercent', '$chk_saleprice')";
				$move = $conn->query($movetocart);
			}
		}
		
		$conn->close();
	}
	
	if (isset($_POST['submit_buyfreegame']))
	{
		require 'dbconnect_transact.php';
				
		$user_idef = $_SESSION['user_id'];
		$game_idef = $conn->real_escape_string($_POST['submit_buyfreegame']);
		
		$trans_transactid = $user_idef . "-" . date("Y-m-d") . "-purchase";
		$trans_transactcode = "GF01161855";
		
		$trans_baseprice = $trans_purchaseprice = $trans_saleperc = 0;
		
		$inserttopurchaselist = "INSERT INTO purchaselist (userid, gameid, transactionid, transactioncode, baseprice, purchaseprice, salepercent) VALUES ('$user_idef', '$game_idef', '$trans_transactid', '$trans_transactcode', '$trans_baseprice', '$trans_purchaseprice', '$trans_saleperc')";
		$insertpurch = $conn->query($inserttopurchaselist);
		
		$conn->close();
		
		header("refresh: 0");
		exit;
	}
	
	if (isset($_POST['submit_addwishlist']))
	{
		require 'dbconnect_account.php';
		
		$user_idef = $_SESSION['user_id'];
		$game_idef = $conn->real_escape_string($_POST['submit_addwishlist']);
		
		$checkwishlist = "SELECT * FROM wishlists WHERE userid = '$user_idef' AND gameid = '$game_idef'";
		$check = $conn->query($checkwishlist);
		
		if ($check->num_rows === 0)
		{
			$addtowishlist = "INSERT INTO wishlists (userid, gameid) VALUES ('$user_idef', '$game_idef')";
			$addgame = $conn->query($addtowishlist);
		}
		
		$conn->close();
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
	
	if (isset($_POST['submit_addreview']))
	{
		$userid = $_SESSION["user_id"];
		$gameid = $_SESSION["gamepage_id"];
		
		require 'dbconnect_account.php';
		
		//$checkifreviewed = "SELECT gameid FROM reviews WHERE  gameid = '$gameid' AND userid = '$userid'";
		//$checkreviewed = $conn->query($checkifreviewed);
		
		$gamescore = $conn->real_escape_string($_POST['review_rategame']);
		$gamecomment = $conn->real_escape_string($_POST['review_gamecomment']);
		
		$addgamereview = "INSERT INTO reviews (gameid, userid, rating, comment) VALUES ('$gameid', '$userid', '$gamescore', '$gamecomment')";
		$addreview = $conn->query($addgamereview);
		
		$conn->close();
		
		header("refresh: 0");
		exit;
	}
	
	if (isset($_POST['submit_removereview']))
	{
		$gameid = $_SESSION["gamepage_id"];
		
		require 'dbconnect_account.php';
		
		$userid = $conn->real_escape_string($_POST['submit_removereview']);
		
		$remgamereview = "DELETE FROM reviews WHERE gameid = '$gameid' AND userid = '$userid'";
		$remreview = $conn->query($remgamereview);
		
		$conn->close();
		
		header("refresh: 0");
		exit;
	}
?>
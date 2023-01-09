<?php

	//echo "listdisplay_logic_script loaded successfully";
	
	require 'dbconnect_transact.php';
	
	$getlist = "SELECT * FROM purchaselist ORDER BY id DESC";
	$get = $conn->query($getlist);
	
	require 'dbconnect_account.php';

	while ($row = $get->fetch_array())
	{	
		$getusername = "SELECT name FROM users WHERE id = '" . $row['userid'] . "'";
		$getuser = $conn->query($getusername);
		
		$fetchuser = $getuser->fetch_array();
		
		$getgamename = "SELECT name FROM games WHERE id = '" . $row['gameid'] . "'";
		$getgame = $conn->query($getgamename);
		
		$fetchgame = $getgame->fetch_array();
		
		echo  "
				<div class='my-1 px-1 custom_border_radius_5' style='border: solid gray 1px; margin-left: 1px; margin-right: 1px;'>
					<p class='mb-0' style='font-size: 1.2em;'>REF ID: " . $row['id'] . " | DATE: " . $row['date'] . " | <a href='#' class='custom_colored_text_primary'>BUYER ID: " . $row['userid'] . "</a> | BUYER NAME: " . $fetchuser['name'] . " | <a href='#' class='custom_colored_text_primary'>GAME ID: " . $row['gameid'] . "</a> | GAME NAME: " . $fetchgame['name'] . "<br><a href='#' class='custom_colored_text_danger'>TRS ID: <b>" . $row['transactionid'] . "</b></a> | <a href='#' class='custom_colored_text_danger'>TRS CODE: <b>" . $row['transactioncode'] . "</b></a> | BASE PRICE: Ksh " . $row['baseprice'] . " | SALE %: " . $row['salepercent'] . "% Off | <a href='#' class='custom_colored_text_info'>SALE PRICE: <b>Ksh " . $row['purchaseprice'] . "</b></a></p>
				</div>
			";
	}
	
	$conn->close();

?>
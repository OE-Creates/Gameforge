<?php
	//echo "storefront_logic_script loaded successfully";
	
	if (isset($_POST['submit_storesearch']))
	{
		$_SESSION["searched_game"] = "";
		
		require 'dbconnect_account.php';
		
		$searchbox_game = $conn->real_escape_string($_POST['store_searchbox']);
		
		$_SESSION["searched_game"] = $searchbox_game;
		
		$conn->close();
		
		header("Location: storefront_search.php");
		exit();
	}
	
	if (isset($_POST['submit_storefilter']))
	{
		$_SESSION["filtered_game"] = "";
		
		require 'dbconnect_account.php';
		
		$filterbtn_game = $conn->real_escape_string($_POST['submit_storefilter']);
		
		$_SESSION["filtered_game"] = $filterbtn_game;
		
		$conn->close();
		
		header("Location: storefront_filter.php");
		exit();
	}
?>
<?php

	//echo "gamepage_generateddllink loaded successfully";
	
	$gamepageid = $_SESSION["gamepage_id"];
	
	if (!(isset($_SESSION["user_loggedin"])))
	{
		echo "
			<a class='custom_colored_text_warning' href='#'>Create an account or login to purchase this game</a>
			";
	}
	else
	{
		$curruserid = $_SESSION["user_id"];
		
		require 'dbconnect_transact.php';
		
		$checkownership = "SELECT * FROM purchaselist WHERE userid = '$curruserid' AND gameid = '$gamepageid'";
		$check = $conn->query($checkownership);
		
		if ($check->num_rows === 0)
		{
			echo "
				<a class='custom_colored_text_warning' href='#'>Purchased this game to receive a unique download link</a>
				";
		}
		else
		{
			echo "
				<a class='text-decoration-none text-danger' href='#'>Download Video Game</a>
				";
		}
	}
	
?>
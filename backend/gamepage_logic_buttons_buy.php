<?php

	//echo "gamepage_logic_button_buy_script loaded successfully";
	
	$gamepageid = $_SESSION["gamepage_id"];
	
	if (!(isset($_SESSION["user_loggedin"])))
	{
		echo "
			<p class='text-center text-warning'>Create an account or login to purchase this game.</p>
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
			require 'dbconnect_account.php';
			
			$checkgameprice = "SELECT * FROM games WHERE id = '$gamepageid'";
			$checkprice = $conn->query($checkgameprice);
			
			$row = $checkprice->fetch_array();
			
			if ($row['saleprice'] == 0)
			{
				echo "
					<form method='POST'>
						<button type='submit' class='btn btn-primary col-12' name='submit_buyfreegame' value='" . $gamepageid . "'>ADD TO LIBRARY</button>
					</form>
					";
			}
			else
			{
				echo "
					<form method='POST'>
						<button type='submit' class='btn btn-primary col-12' name='submit_buygame' value='" . $gamepageid . "'>ADD TO CART</button>
					</form>
					";
			}
		}
		else
		{
			$fetch = $check->fetch_array();
			
			echo "
				<h6 class='text-center text-warning'>Already Owned. Purchased on " . $fetch['date'] . "</h6>
				";
		}
	}
?>
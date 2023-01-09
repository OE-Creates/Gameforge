<?php

	//echo "gamepage_logic_button_wishlist_script loaded successfully";
	
	$gamepageid = $_SESSION["gamepage_id"];
	
	if (!(isset($_SESSION["user_loggedin"])))
	{
		echo "
			<p class='text-center text-warning'>Create an account or login to add this game to your wishlist.</p>
			";
	}
	else
	{
		$curruserid = $_SESSION["user_id"];
			
		require 'dbconnect_transact.php';
		
		$checkownership = "SELECT * FROM purchaselist WHERE userid = '$curruserid' AND gameid = '$gamepageid'";
		$check = $conn->query($checkownership);
		
		if (!($check->num_rows === 0))
		{
			echo "
				<div style='height: 20px; '>
				</div>
				";
		}
		else
		{
			require 'dbconnect_account.php';
			
			$checkwishlist = "SELECT * FROM wishlists WHERE userid = '$curruserid' AND gameid = '$gamepageid'";
			$check = $conn->query($checkwishlist);
			
			if ($check->num_rows === 0)
			{
				echo "
					<form method='POST'>
						<button type='submit' class='btn btn-sm btn-success col-12' name='submit_addwishlist' value='" . $gamepageid . "'>ADD TO WISHLIST</button>
					</form>
					";
			}
			else
			{
				echo "
					<form method='POST'>
						<button type='submit' class='btn btn-sm btn-danger col-12' name='submit_removewishlist' value='" . $gamepageid . "'>REMOVE FROM WISHLIST</button>
					</form>
					";
			}
		}
	}
?>
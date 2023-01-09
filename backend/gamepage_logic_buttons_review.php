<?php

	//echo "gamepage_logic_button_buy_script loaded successfully";
	
	$gamepageid = $_SESSION["gamepage_id"];
	
	if (!(isset($_SESSION["user_loggedin"])))
	{
		echo "
			<p class='text-center text-warning'>Create an account or login and purchase this game to post a review.</p>
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
				<p class='text-center text-warning'>Purchase this game to post a review.</p>
				";
		}
		else
		{
			require 'dbconnect_account.php';
			
			$checkforreview = "SELECT * FROM reviews WHERE gameid = '$gamepageid' AND userid = '$curruserid'";
			$checkit = $conn->query($checkforreview);
			
			if ($checkit->num_rows === 0)
			{
				echo "
					<button type='button' class='btn btn-warning col-12' data-bs-toggle='modal' data-bs-target='#writereview_modal'>WRITE REVIEW</button>
					";
			}
			else
			{
				echo "
					<p class='text-center text-warning'>You have already posted a review for this game.</p>
					";
			}
		}
	}
	
	$conn->close();
?>
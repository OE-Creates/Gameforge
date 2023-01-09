<?php
	//echo "dashboard_gamelist_script loaded successfully";
	
	require 'dbconnect_transact.php';
	
	$curruserid = $_SESSION["user_id"];
	
	$checkownership = "SELECT gameid FROM purchaselist WHERE userid = '$curruserid'";
	$check = $conn->query($checkownership);
	
	while ($row = $check->fetch_array())
	{
		$gameid = $row['gameid'];
		
		require 'dbconnect_account.php';
		
		$getgamedata = "SELECT name FROM games WHERE id = '$gameid'";
		$getdata = $conn->query($getgamedata);
		
		$fetch = $getdata->fetch_array();
		
		echo "
			<div class='w-100 row ms-0 p-1 bg-dark mb-1 custom_border_radius_5'>
				<div class='col-8 px-0 mx-0'>
					<p class='mb-0 ps-2 text-white'>" . $fetch['name'] . "</p>
				</div>
				<div class='col-4 px-0 mx-0'>
					<form method='GET'>
						<button type='submit' class='btn btn-sm btn-outline-primary col-12' name='submit_viewgamepage' value='" . $row['gameid'] . "'>VIEW</button>
					</form>
				</div>
			</div>
			";
	}
	
	$conn->close();
?>
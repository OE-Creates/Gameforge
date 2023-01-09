<?php
	//echo "dashboard_wishlist_script loaded successfully";
	
	require 'dbconnect_account.php';
	
	$curruserid = $_SESSION["user_id"];
	
	$checkwishlist = "SELECT gameid FROM wishlists WHERE userid = '$curruserid'";
	$check = $conn->query($checkwishlist);
	
	while ($row = $check->fetch_array())
	{
		$gameid = $row['gameid'];
		
		$getgamedata = "SELECT name FROM games WHERE id = '$gameid'";
		$getdata = $conn->query($getgamedata);
		
		$fetch = $getdata->fetch_array();
		
		echo "
			<div class='w-100 row ms-0 p-1 bg-light mb-1 custom_border_radius_5'>
				<div class='col-9 px-0 mx-0'>
					<p class='mb-0 ps-2 text-dark'>" . $fetch['name'] . "</p>
				</div>
				<div class='col-3 d-flex justify-content-end px-0 mx-0'>
					<form method='GET' class='mx-1'>
						<button type='submit' class='btn btn-sm btn-outline-primary col-12' name='submit_viewgamepage' value='" . $row['gameid'] . "'>VIEW</button>
					</form>
					<form method='POST'>
						<button type='submit' class='btn btn-sm btn-danger col-12' name='submit_removewishlist' value='" . $row['gameid'] . "'>REMOVE</button>
					</form>
				</div>
			</div>
			";
	}
	
	$conn->close();
?>
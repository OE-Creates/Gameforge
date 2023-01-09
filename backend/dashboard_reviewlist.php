<?php

	//echo "dashboard_reviewlist_script loaded successfully";
	
	require 'dbconnect_account.php';
	
	$userid = $_SESSION["user_id"];
	
	$getlist = "SELECT * FROM reviews WHERE userid = '$userid' ORDER BY date DESC";
	$get = $conn->query($getlist);
	
	while ($row = $get->fetch_array())
	{	
		$getgamename = "SELECT name FROM games WHERE id = '" . $row['gameid'] . "'";
		$getname = $conn->query($getgamename);
		
		$fetch = $getname->fetch_array();
		
		echo "
			<div class='card mb-2'>
				<div class='card-header'>
					<form method='POST'>
					<div class='row'>
						<div class='col-8'> 
							<h6 class='my-0'>Your " . $fetch['name'] . " Review</h6>
						</div>
						<div class='col-4'>
							<button type='submit' class='btn btn-sm btn-outline-danger py-0 col-12' value='" . $row['gameid'] . "' name='submit_dashremovereview'>DELETE</button>
						</div>
					</div>
					</form>
				</div>
				<div class='card-body'>
					<h6 class='card-title'>RATING: " . $row['rating'] . "/5 | " . $row['date'] . "</h6>
					<p class='card-text'>" . $row['comment'] . "</p>
				</div>
			</div>
			";
	}
	
	$conn->close();
?>
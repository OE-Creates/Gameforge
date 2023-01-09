<?php

	//echo "gamepage_reviewlist_script loaded successfully";
	
	require 'dbconnect_account.php';
	
	$gamepageid = $_SESSION["gamepage_id"];
	
	$getlist = "SELECT * FROM reviews WHERE gameid = '$gamepageid' ORDER BY date DESC";
	$get = $conn->query($getlist);
	
	while ($row = $get->fetch_array())
	{	
		if (!(isset($_SESSION["user_loggedin"])))
		{
			$getusername = "SELECT username FROM users WHERE id = '" . $row['userid'] . "'";
			$getname = $conn->query($getusername);
			
			$fetch = $getname->fetch_array();
			
			echo "
				<div class='card mb-2'>
					<div class='card-header'>
						<div class='row'>
							<div class='col-8'> 
								<h6 class='my-0'>" . $fetch['username'] . "'s Review</h6>
							</div>
							<div class='col-4'>
							</div>
						</div>
					</div>
					<div class='card-body'>
						<h6 class='card-title'>RATING: " . $row['rating'] . "/5 | " . $row['date'] . "</h6>
						<p class='card-text'>" . $row['comment'] . "</p>
					</div>
				</div>
				";
		}
		else
		{
			if ($_SESSION["user_level"] == 1)
			{
				$getusername = "SELECT username FROM users WHERE id = '" . $row['userid'] . "'";
				$getname = $conn->query($getusername);
				
				$fetch = $getname->fetch_array();
				
				echo "
					<div class='card mb-2'>
						<div class='card-header'>
							<form method='POST'>
							<div class='row'>
								<div class='col-8'> 
									<h6 class='my-0'>";
									if ($_SESSION["user_id"] == $row['userid'])
									{ echo "Your Review</h6>"; }
									else
									{ echo $fetch['username'] . "'s Review</h6>"; }
				echo			"</div>
								<div class='col-4'>
									<button type='submit' class='btn btn-sm btn-outline-danger py-0 col-12' value='" . $row['userid'] . "' name='submit_removereview'>DELETE</button>
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
			else
			{
				$getusername = "SELECT username FROM users WHERE id = '" . $row['userid'] . "'";
				$getname = $conn->query($getusername);
				
				$fetch = $getname->fetch_array();
				
				echo "
					<div class='card mb-2'>
						<div class='card-header'>
							<form method='POST'>
							<div class='row'>
								<div class='col-8'> 
									<h6 class='my-0'>";
									if ($_SESSION["user_id"] == $row['userid'])
									{ echo "Your Review</h6>"; }
									else
									{ echo $fetch['username'] . "'s Review</h6>"; }
				echo			"</div>";
									if ($_SESSION["user_id"] == $row['userid'])
									{
										echo "
											<div class='col-4'>
												<button type='submit' class='btn btn-sm btn-outline-danger py-0 col-12'  value='" . $row['userid'] . "' name='gamepage_deletereview'>DELETE</button>
											</div>
											";
									}
									else
									{
										echo "
											<div class='col-4'>
											</div>
											";
									}
				echo		"</div>
							</form>
						</div>
						<div class='card-body'>
							<h6 class='card-title'>RATING: " . $row['rating'] . "/5 | " . $row['date'] . "</h6>
							<p class='card-text'>" . $row['comment'] . "</p>
						</div>
					</div>
					";
			}
		}
	}
	
	$conn->close();
?>
<?php

	//echo "listdisplay_logic_script loaded successfully";
	
	require 'dbconnect_account.php';
	
	$getlist = "SELECT * FROM games ORDER BY RAND() LIMIT 10";
	$get = $conn->query($getlist);
	
	if ($get->num_rows === 0)
	{
		echo "
				<div class='card text-center text-bg-dark me-1 custom_card_min_width custom_card_max_width'>
					<img src='../images/ph-profile.jpg' class='card-img' alt='...'>
					<div class='card-img-overlay'><br><br><br><br><br><br>
						<h5 class='card-title text-dark'><b>Coming Soon</b></h5><br>
					</div>
				</div>
			";
	}
	else
	{
		while ($row = $get->fetch_array())
		{	
			echo "
					<div class='card text-bg-dark me-1' style='min-width: 9em; max-width: 9em; '>
						<img src='" . $row['imageone'] . "' class='card-img' alt='...'>
						<div class='card-img-overlay'>
							<form method='GET'>
								<button type='submit' class='btn btn-sm btn-primary custom_btn_opacity_35 col-12' name='submit_viewgamepage' value='" . $row['id'] . "'>";
								if ($row['saleprice'] == 0)
								{
									echo "Free";
								}
								else
								{
									echo "Buy | Ksh " . $row['saleprice'];
								}								
			echo				"</button>
							</form>
						</div>
					</div>
				";
		}
	}
	
	$conn->close();

?>
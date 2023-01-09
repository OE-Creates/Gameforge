<?php

	//echo "listdisplay_logic_script loaded successfully";
	
	require 'dbconnect_account.php';
	
	$getlist = "SELECT * FROM games ORDER BY RAND() LIMIT 5";
	$get = $conn->query($getlist);
	
	if ($get->num_rows === 0)
	{
		echo "
			<div class='carousel-item'>
				<img class='' width='100%' height='100%' src='../images/ph_banner.jpg' aria-hidden='true' preserveAspectRatio='xMidYMid slice' focusable='false'><rect width='100%' height='100%' fill='#777'></rect>

				<div class='container'>
					<div class='carousel-caption text-start'>
						<h1>Coming Soon.</h1>
						<p>Watch this space, new games coming soon.</p>
						<p><a class='btn btn-lg btn-primary' href='#'>Refresh</a></p>
					</div>
				</div>
			</div>
			";
	}
	else
	{
		while ($row = $get->fetch_array())
		{	
			echo "
				<div class='carousel-item'>
					<img class='' width='100%' height='100%' src='" . $row['bannerimage'] . "' aria-hidden='true' preserveAspectRatio='xMidYMid slice' focusable='false'><rect width='100%' height='100%' fill='#777'></rect>

					<div class='container'>
						<div class='carousel-caption text-start'>
							<h1>" . $row['name'] . "</h1>
							<p>" . $row['description'] . "</p>
							<form method='GET'>
								<p><button type='submit' class='btn btn-lg btn-primary' name='submit_viewgamepage' value='" . $row['id'] . "'>Play " . $row['name'] . "</button></p>
							</form>
						</div>
					</div>
				</div>
				";
		}
	}
	
	$conn->close();

?>
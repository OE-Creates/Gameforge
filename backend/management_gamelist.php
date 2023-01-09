<?php

	//echo "listdisplay_logic_script loaded successfully";
	
	require 'dbconnect_account.php';
	
	$getlist = "SELECT * FROM games";
	$get = $conn->query($getlist);
	
	$getnumgames = $get->num_rows;
	
	$_SESSION["manage_noofgames"] = $getnumgames;

	while ($row = $get->fetch_array())
	{	
		echo  "
				<div class='row my-1 py-1 custom_border_radius_5' style='border: solid gray 1px; margin-left: 1px; margin-right: 1px;'>
					<div class='col-9 px-0 ps-1'>
						<p class='mb-0' style='font-size: 1.2em;'>ID: " . $row['id'] . " | <a href='#' class='custom_colored_text_primary'>NAME: " .$row['name'] . "</a> | <a href='#' class='custom_colored_text_danger'>BASE PRICE: Ksh <b>" . $row['baseprice'] . "</b></a> | SALE (%): " . $row['salepercent'] . "% | <a href='#' class='custom_colored_text_info'>SALE PRICE: Ksh <b>" . $row['saleprice'] . "</b></a></p>
					</div>
					<div class='col-3 px-0 pe-1 d-flex justify-content-end'>
						<form method='GET'>
							<button type='submit' class='btn btn-sm btn-primary py-0 my-0 me-1' name='submit_viewgamepage' value='" . $row['id'] . "'>VIEW GAME</button>
						</form>
						<form method='POST'>
							<button type='submit' class='btn btn-sm btn-danger py-0 my-0' value='" . $row['id'] . "' name='submit_deletegame'>REMOVE GAME</button>
						</form>
					</div>
				</div>
			";
	}
	
	$conn->close();

?>
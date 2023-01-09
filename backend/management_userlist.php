<?php

	//echo "listdisplay_logic_script loaded successfully";
	
	require 'dbconnect_account.php';
	
	$getlist = "SELECT * FROM users";
	$get = $conn->query($getlist);
	
	$getnumusers = $get->num_rows;
	
	$_SESSION["manage_noofusers"] = $getnumusers;

	while ($row = $get->fetch_array())
	{	
		echo  "
				<div class='row my-1 p-1 custom_border_radius_5' style='border: solid gray 1px; margin-left: 1px; margin-right: 1px;'>
					<div class='col-11 px-0 ps-1'>
					<p class='mb-0' style='font-size: 1.2em;'>ID: " . $row['id'] . " | NAME: " .$row['name'] . " | <a href='#' class='custom_colored_text_primary'>USERNAME: <b>" . $row['username'] . "</b></a> | COUNTRY: " . $row['country'] . " | PHONE NUMBER: +254" . $row['phonenumber'] . "<br><a href='#' class='custom_colored_text_danger'>EMAIL: " . $row['email'] . "</a> |
			"; 
					if ($row['level'] == 0)
					{
						echo "ACCOUNT TYPE: <a href='#' class='custom_colored_text_success'>Client</a>";
					}
					else
					{
						echo "ACCOUNT TYPE: <a href='#' class='custom_colored_text_info'>Administrator</a>";
					}
		echo 		" | ";
					if ($row['loggedin'] == 0)
					{
						echo "Logged Out";
					}
					else
					{
						echo "<a href='#' class='custom_colored_text_warning bg-dark px-1 custom_border_radius_5' style='padding-top: 1px; padding-bottom: 3px; '>Logged In</a>";
					}
		echo "		</p></div>
					<div class='col-1 px-0 d-flex justify-content-end'>
						<form method='POST'>
							<button type='submit' class='btn btn-sm btn-danger mb-0 py-0' value='" . $row['id'] . "' name='submit_deleteuser'>REMOVE USER</button>
						</form>
					</div>
				</div>
			";
	}
	
	$conn->close();

?>
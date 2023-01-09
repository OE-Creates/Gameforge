<?php

	//echo "listdisplay_logic_script loaded successfully";
	
	require 'dbconnect_account.php';
	
	$getlist = "SELECT * FROM feedback";
	$get = $conn->query($getlist);

	while ($row = $get->fetch_array())
	{	
		echo  "
				<div class='d-flex my-1 py-1 custom_border_radius_5' style='border: solid gray 1px; margin-left: 1px; margin-right: 1px;'>
					<form method='POST' class='ms-1 me-2'>
						<button type='submit' class='btn btn-sm btn-danger py-0' value='" . $row['id'] . "' name='submit_removefeedback'>DELETE</button>
					</form>
					<p class='mb-0' style='font-size: 1.2em;'>" .$row['feedback_info'] . "</p>
				</div>
			";
	}
	
	$conn->close();

?>
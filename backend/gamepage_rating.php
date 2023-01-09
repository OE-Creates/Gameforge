<?php

	//echo "gamepage_rating_logic_script loaded successfully";
	
	$overallrating = "";
	$tallyrating = 0;
	
	require 'dbconnect_account.php';
	
	$thisgameid = $_SESSION["gamepage_id"];
	
	$getrating = "SELECT rating FROM reviews WHERE gameid = '$thisgameid'";
	$get = $conn->query($getrating);
	
	$noofrevs = $get->num_rows;
	
	if ($noofrevs == 0)
	{
		$overallrating = "No Reviews";
	}
	else
	{
		while ($row = $get->fetch_array())
		{
			$nextrating = $row['rating'];
			$tallyrating += $nextrating;
		}
		
		$calcrating = $tallyrating / $noofrevs;
		$rounded = round($calcrating, 1);
		$overallrating = $rounded . "/5";
	}
	
?>
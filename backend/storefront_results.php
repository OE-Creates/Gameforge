<?php
	//echo "storefront_results_script loaded successfully";
	
	$game_searched = $_SESSION["searched_game"];
	
	require 'dbconnect_account.php';
	
	$getlist = "SELECT * FROM games WHERE name LIKE '%$game_searched%'";
	$get = $conn->query($getlist);

	while ($row = $get->fetch_array())
	{	
		echo "
			<div class='col-md-3 my-2'>
				<div class='card text-bg-dark'>
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
			</div>
			";
	}
	
	$conn->close();
?>
<?php
	//echo "checkout_itemlist_script loaded successfully";
	
	require 'dbconnect_transact.php';
				
	$user_idef = $_SESSION['user_id'];
	$usercart = $user_idef . "_checkout";
	
	$checkincart = "SELECT * FROM $usercart";
	$check = $conn->query($checkincart);
	
	while ($row = $check->fetch_array())
	{	
		echo "
				<div class='card  mb-2'>
					<div class='card-body py-1'>
						<div class='row'>
							<div class='col-8'>
								<h5 class='card-title'>" . $row['gamename'] . " | <del>Ksh " . $row['baseprice'] . "</del> | SALE: " . $row['salepercent'] . "% Off | <b>Ksh " . $row['saleprice'] . "</b></h5>
							</div>
							<div class='col-4 d-flex justify-content-end'>
								<form method='POST'>
									<button type='submit' class='btn btn-sm btn-danger col-12' name='submit_chkoutremoveitem' value='" . $row['gameid'] . "'>REMOVE GAME</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			";
	}
	
	$conn->close();
?>
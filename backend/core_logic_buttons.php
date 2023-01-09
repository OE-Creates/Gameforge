<?php
	//echo "core_logic_buttons_script loaded successfully";

	if (!(isset($_SESSION["user_loggedin"])))
	{
		echo "
			<form>
				<div class='d-flex justify-content-end my-2'>
					<button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#login_modal'>LOGIN</button>
				</div>
			</form>
			";
	}
	else
	{
		if ($_SESSION["user_level"] == 1)
		{
			require 'dbconnect_transact.php';
				
			$user_idef = $_SESSION['user_id'];
			$usercart = $user_idef . "_checkout";
			
			$checkincart = "SELECT * FROM $usercart";
			$check = $conn->query($checkincart);
			
			if ($check->num_rows === 0)
			{
				echo "
					<form method='GET'>
						<div class='d-flex justify-content-end my-2'>
							<button type='submit' class='btn btn-success' name='submit_returntodb'>DASHBOARD</button>
							<div class='input-group mx-2'>
								<button type='button' class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#settings_modal'>SETTINGS</button>
								<button type='submit' class='btn btn-warning' name='submit_management'>MANAGE</button>
							</div>
							<button type='submit' class='me-2 btn btn-warning' name='submit_checkoutcart'>CART</button>
							<button type='submit' class='btn btn-outline-primary' name='submit_logout'>LOGOUT</button>
						</div>
					</form>
					";
			}
			else
			{
				echo "
					<form method='GET'>
						<div class='d-flex justify-content-end my-2'>
							<button type='submit' class='btn btn-success' name='submit_returntodb'>DASHBOARD</button>
							<div class='input-group mx-2'>
								<button type='button' class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#settings_modal'>SETTINGS</button>
								<button type='submit' class='btn btn-warning' name='submit_management'>MANAGE</button>
							</div>
							
							<button type='submit' class='me-2 btn btn-warning position-relative' name='submit_checkoutcart'>
								CART
								<span class='position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle'>
									<span class='visually-hidden'>New alerts</span>
								</span>
							</button>
							<button type='submit' class='btn btn-outline-primary' name='submit_logout'>LOGOUT</button>
						</div>
					</form>
					";
			}
		}
		else
		{
			require 'dbconnect_transact.php';
				
			$user_idef = $_SESSION['user_id'];
			$usercart = $user_idef . "_checkout";
			
			$checkincart = "SELECT * FROM $usercart";
			$check = $conn->query($checkincart);
			
			if ($check->num_rows === 0)
			{
				echo "
					<form method='GET'>
						<div class='d-flex justify-content-end my-2'>
							<button type='submit' class='btn btn-success' name='submit_returntodb'>DASHBOARD</button>
							<button type='button' class='btn btn-secondary mx-2' data-bs-toggle='modal' data-bs-target='#settings_modal'>SETTINGS</button>
							<button type='submit' class='me-2 btn btn-warning' name='submit_checkoutcart'>CART</button>
							<button type='submit' class='btn btn-outline-primary' name='submit_logout'>LOGOUT</button>
						</div>
					</form>
					";
			}
			else
			{
				echo "
					<form method='GET'>
						<div class='d-flex justify-content-end my-2'>
							<button type='submit' class='btn btn-success' name='submit_returntodb'>DASHBOARD</button>
							<button type='button' class='btn btn-secondary mx-2' data-bs-toggle='modal' data-bs-target='#settings_modal'>SETTINGS</button>
							<button type='submit' class='me-2 btn btn-warning position-relative' name='submit_checkoutcart'>
								CART
								<span class='position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle'>
									<span class='visually-hidden'>New alerts</span>
								</span>
							</button>
							<button type='submit' class='btn btn-outline-primary' name='submit_logout'>LOGOUT</button>
						</div>
					</form>
					";
			}
		}
	}
?>
<?php
	require "../backend/core_logic.php";
	require "../backend/transaction_logic.php";
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>GameForge</title>
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		
		<!-- Intergrated CSS -->
		<link rel="stylesheet" href="../css/styles.css?v=<?php echo time(); ?>">
	</head>
	<body>
		<!-- _____NAVBAR WITH NAME_______________________________________________________________________________________________ -->
		
		<nav class="navbar navbar-expand-lg fixed-top">
			<div class="container navbar-dark bg-dark custom_border_radius_5">
				<a  href="home.php" class="text-decoration-none"><h4 class="navbar-brand my-0">GameForge</h4></a>
				<button class="navbar-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarColor01">
					<ul class="navbar-nav me-auto">
					  <li class="nav-item">
						<a class="nav-link" href="storefront.php">STORE</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="aboutus.php">ABOUT</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="support.php">SUPPORT</a>
					  </li>
					</ul>
					<!--<form>
						<div class="input-group me-5">
							<input class="form-control" type="text" placeholder="Search">
							<button type="submit" class="btn btn-secondary">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
								<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
								</svg>
							</button>
						</div>
					</form>-->
					<?php require "../backend/core_logic_buttons.php"; ?>
				</div>
			</div>
		 </nav>
		
		<!-- ____________________________________________________________________________________________________________________ -->
		
		<div class="modal" id="settings_modal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="settingsButtonLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Settings</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					
						<form method="POST">
							<p class="my-0 mb-1">NAME: <?php echo $_SESSION["user_name"];?></p>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="settingusernamefield">Name</span>
								<input type="text" class="form-control" placeholder="Joseph Hughs" name="settinguser_name" pattern="[A-Za-z ]+" minlength="1" maxlength="25" title="Input a name using letters (UPPERCASE or lowercase) only.">
							</div>
							<p class="my-0 mb-1">USERNAME: <?php echo $_SESSION["user_username"];?></p>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="settinguserusernamefield">Username</span>
								<input type="text" class="form-control" placeholder="BigJosephH123" name="settinguser_username" pattern="[A-Za-z0-9@#&_-+ ]+" minlength="5" maxlength="25" title="Input a username using letters (UPPERCASE or lowercase) and numbers only.">
							</div>
							<p class="my-0 mb-1">COUNTRY: <?php echo $_SESSION["user_country"];?></p>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text">Country</span>
								<select class="form-select" name="settinguser_country">
									<option selected value="N/A">N/A</option>
									<option value="Algeria">Algeria</option>
									<option value="Angola">Angola</option>
									<option value="Benin">Benin</option>
									<option value="Botswana">Botswana</option>
									<option value="Burkina Faso">Burkina Faso</option>
									<option value="Burundi">Burundi</option>
									<option value="Cabo Verde">Cabo Verde</option>
									<option value="Cameroon">Cameroon</option>
									<option value="Central African Rep.">Central African Rep.</option>
									<option value="Chad">Chad</option>
									<option value="Comoros">Comoros</option>
									<option value="D.R.C.">D.R.C.</option>
									<option value="Republic of Congo">Republic of Congo</option>
									<option value="Cote D'ivoire">Cote D'ivoire</option>
									<option value="Djibuti">Djibuti</option>
									<option value="Egypt">Egypt</option>
									<option value="Equatorial Guinea">Equatorial Guinea</option>
									<option value="Eritrea">Eritrea</option>
									<option value="Gabon">Gabon</option>
									<option value="Gambia">Gambia</option>
									<option value="Ghana">Ghana</option>
									<option value="Guinea">Guinea</option>
									<option value="Guinea-Bissau">Guinea-Bissau</option>
									<option value="Kenya">Kenya</option>
									<option value="Lesotho">Lesotho</option>
									<option value="Liberia">Liberia</option>
									<option value="Libya">Libya</option>
									<option value="Madagascar">Madagascar</option>
									<option value="Malawi">Malawi</option>
									<option value="Mali">Mali</option>
									<option value="Mauritania">Mauritania</option>
									<option value="Mauritius">Mauritius</option>
									<option value="Morocco">Morocco</option>
									<option value="Mozambique">Mozambique</option>
									<option value="Namibia">Namibia</option>
									<option value="Niger">Niger</option>
									<option value="Nigeria">Nigeria</option>
									<option value="Rwanda">Rwanda</option>
									<option value="Sao Tome and Principe">Sao Tome and Principe</option>
									<option value="Senegal">Senegal</option>
									<option value="Seychelles">Seychelles</option>
									<option value="Sierra Leone">Sierra Leone</option>
									<option value="Somalia">Somalia</option>
									<option value="South Africa">South Africa</option>
									<option value="South Sudan">South Sudan</option>
									<option value="Sudan">Sudan</option>
									<option value="Swaziland">Swaziland</option>
									<option value="Tanzania">Tanzania</option>
									<option value="Togo">Togo</option>
									<option value="Tunisia">Tunisia</option>
									<option value="Uganda">Uganda</option>
									<option value="Zambia">Zambia</option>
									<option value="Zimbabwe">Zimbabwe</option>
								</select>
							</div>
							<p class="my-0 mb-1">PHONE NUMBER: +254<?php echo $_SESSION["user_pnumber"];?></p>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="settinguserpnumberfield">Phone Number</span>
								<input type="text" class="form-control" placeholder="0555-555-555" name="settinguser_pnumber" pattern="[0-9]+" minlength="7" maxlength="10">
							</div>
							<p class="my-0 mb-1">EMAIL: <?php echo $_SESSION["user_email"];?></p>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="settinguseremailfield">E-mail</span>
								<input type="email" class="form-control" placeholder="j.hughs@example.com" name="settinguser_email" pattern="[A-Za-z0-9._@]+" minlength="5" maxlength="30">
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="settinguserpasswordfield">Password</span>
								<input type="password" class="form-control" id="setpass" name="settinguser_password" minlength="7" maxlength="15">
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="settingusercpasswordfield">Confirm Password</span>
								<input type="password" class="form-control" id="confirm_setpass" name="settinguser_cpassword" minlength="7" maxlength="15" onkeyup="validate_setpassword()">
							</div>
							
							<div>
								<button type="submit" class="btn btn-primary col-12" id="confirm_setbutton" name="submit_usersettings">Update Settings</button>
							</div>
							<span id="wrong_pass_alert"></span>
						</form>
						
					</div>
				</div>
			</div>
		</div>
		
		<!-- _____BODY___________________________________________________________________________________________________________ -->
		
		<div class="container">
		
			<div class="custom_navbar_space"></div>
			
			<div class="row mt-1 bg-dark custom_border_radius_5">
				<div class="col">
					
					<div class="my-2">
						<h4 class="text-white">Purchase Completion</h4>
						<p class="text-warning">Carefully follow the steps listed below to complete your purchase and access your games.</p>
						<hr class="my-0" style="color: white; ">
						<div class="row p-1">
							<div class="text-light custom_border_radius_5 mt-1 col-lg-8">
								<h6>
								
								1. Open your <a href="#" class="custom_colored_text_success">M-PESA App</a>, select "Lipa na M-PESA", then "Pay Bill".<br><br>
								2. Enter <a href="#" class="custom_colored_text_warning">217839</a> as the business number, and <a href="" class="custom_colored_text_warning"><?php echo $_SESSION["transact_id"]; ?></a> as the account number.<br><br>
								3. Complete the MPesa payment for <a href="#" class="custom_colored_text_warning">Ksh <?php echo $_SESSION["chkout_totalcost"]; ?></a>.<br><br>
								4. Open the M-PESA digital receipt you received and copy the <a href="#" class="custom_colored_text_danger">case sensitive</a> 10-digit alpha-numeric code (<a href="#" class="custom_colored_text_info">eg. Q538UE54E8</a>) into the "Mpesa Receipt Code" box below.<br><br>
								5. Click the "Complete Payment" button.<br><br>
								6. Allow up to <a href="#" class="custom_colored_text_danger">5 Minutes</a> for our system to verify the payment.<br><br>
								
								</h6>
								
							</div>
							<div class="text-light text-center custom_border_radius_5 p-1 mt-1 col-lg-4">
								<h3>Business Number: <a href="#" class="custom_colored_text_warning">217839</a></h3>
							</div>
						</div>
						
						<h5 class="text-success">And that's it. A unique download link to your purchased game will now be available on the game's page.</h5>
								
						<p class="text-center text-warning">If you experience any payment issues, head over to the GameForge <a href="support.php#contactus" class="text-decoration-none">support page</a> and contact us regarding your specific issue.</p>
								
						
						<hr class="my-0 mb-2" style="color: white; ">
						
						<h4 class="text-white">Total Cost: <a href="#" class="custom_colored_text_warning">Ksh <?php echo $_SESSION["chkout_totalcost"]; ?></a></h4>
						
						<hr class="my-0" style="color: white; ">
						
						<form method="POST">
							<div class="row">
								<div class="col-md-8 mt-2">
									<div class="input-group">
										<span class="input-group-text" id="paymentidfield">M-PESA Receipt Code</span>
										<input type="text" class="form-control" placeholder="N4R473958W" name="payment_receiptid" pattern="[A-Za-z0-9]+" minlength="10" maxlength="10" title="Input the M-Pesa transaction code using letters (UPPERCASE or lowercase) and numbers only." required>
									</div>
								</div>
								<div class="col-md-4 mt-2">
									<button type="submit" class="btn btn-outline-success col-12" name="submit_transactpay">COMPLETE PAYMENT</button>
								</div>
							</div>
						</form>
					</div>
					
				</div>
			</div>
		
		</div>
		<!-- ____________________________________________________________________________________________________________________ -->
		
		<!-- _____FOOTER_________________________________________________________________________________________________________ -->
		
		<nav class="navbar navbar-expand-lg">
			<div class="container navbar-dark bg-dark custom_border_radius_5">
				<p class="d-flex justify-content-between text-white my-2">GameForge: <a class="nav-link mx-4" href="policy.php">Policies</a><a class="nav-link me-4" href="legal.php">Legal</a><a class="nav-link" href="support.php">Support</a></p>
			</div>
		</nav>
		
		 <!-- ____________________________________________________________________________________________________________________ -->
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../js/function.js"></script>
		
	</body>
</html>
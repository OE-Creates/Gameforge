<?php
	require "../backend/core_logic.php";
	require "../backend/login_logic.php";
	require "../backend/signup_logic.php";
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
		
		<div class="modal" id="signup_modal" tabindex="-1" aria-labelledby="signUpButtonLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Register</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form method="POST">
						
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="signupnamefield">Name</span>
								<input type="text" class="form-control" placeholder="Joseph Hughs" name="user_name" pattern="[A-Za-z ]+" minlength="1" maxlength="25" title="Input your name using letters (UPPERCASE or lowercase) only." required>
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="signupusernamefield">Username</span>
								<input type="text" class="form-control" placeholder="BigJosephH123" name="user_username" pattern="[A-Za-z0-9@#&_-+ ]+" minlength="5" maxlength="25" title="Input a username using letters (UPPERCASE or lowercase) and numbers only." required>
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text">Country</span>
								<select class="form-select" name="user_country" required>
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
									<option selected value="Kenya">Kenya</option>
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
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="signuppnumberfield">Phone Number</span>
								<input type="text" class="form-control" placeholder="0555-555-555" name="user_pnumber" pattern="[0-9]+" minlength="7" maxlength="10" required>
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="signupemailfield">E-mail</span>
								<input type="email" class="form-control" placeholder="j.hughs@example.com" name="user_email" pattern="[A-Za-z0-9._@]+" minlength="5" maxlength="30" required>
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="signuppasswordfield">Password</span>
								<input type="password" class="form-control" id="pass" name="user_password" minlength="7" maxlength="15" required>
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="signupcpasswordfield">Confirm Password</span>
								<input type="password" class="form-control" id="confirm_pass" name="user_cpassword" minlength="7" maxlength="15"  onkeyup="validate_password()" required>
							</div>
							
							<div>
								<button type="submit" class="btn btn-primary col-12" id="confirm_button" name="submit_signup">Sign Up</button>
							</div>
							<span id="wrong_pass_alert"></span>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal" id="login_modal" tabindex="-1" aria-labelledby="logInButtonLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Login</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form method="POST">
						
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="loginusernamefield">Username</span>
								<input type="text" class="form-control" placeholder="BigJosephH123" name="login_username" pattern="[A-Za-z0-9@#&_-+ ]+" minlength="5" maxlength="25" required>
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="loginpasswordfield">Password</span>
								<input type="password" class="form-control" name="login_password" minlength="7" maxlength="15" required>
							</div>
							
							<div>
								<div class="form-check mb-1">
									<input class="form-check-input" type="checkbox" value="1" id="loginremembermefield" name="login_rememberme">
									<label class="form-check-label" for="loginremembermefield">Keep me logged in</label>
								</div>
								<button type="submit" class="btn btn-primary col-12 mb-2" name="submit_login">Login</button>
								<div class="col-12 mb-3 text-center">
									<a class="text-decoration-none my-0 mb-2" href="support.php#forgotpassword">Forgot my password</a>
								</div>
								<hr class="my-0 mb-2">
								<button type='button' class='btn btn-primary col-12' data-bs-toggle='modal' data-bs-target='#signup_modal'>Sign Up</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
		
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
					
					<div class="mt-2 d-flex">
						<h4 class="text-white">Refund Policy</h4>
					</div>
					<hr style="color:white;" class="my-0">
					<div class="mt-1 mb-2 text-white">
						Thank you for shopping at GameForge!<br><br>
						We offer refund and/or exchange within the first 30 days of your purchase, if 30 days have passed since your purchase, you will not be offered a refund and/or exchange of any kind.<br><br>
						<h6 class="text-warning">Eligibility for Refunds</h6>
						•	If, at the users request, a game is removed form a user’s account due to <br>
						&emsp;o	Material issue with the game (Extensive bugs, Game not loading)<br>
						&emsp;o	Misrepresentation of a game<br>
						&emsp;o	Mistaken purchase<br>
						•	If a game is no longer hosted on the site and is removed by GameForge (No time limit applicable)<br><br>
						
						<h6 class="text-warning">Exempt Goods</h6>
						The following are exempt from refunds:
						•	Games bought with gift cards<br><br>
						
						<h6 class="text-warning">Games purchased on sale or with promo codes</h6>
						Users will only be refunded the amount paid at the time of purchase. The amount discounted on items as a result of sales and promo codes shall not be refunded. 
						Once your request for refund is sent along with the accompanying documents, we will send you an email to notify you that we have received your request. We will also notify you of the approval or rejection of your refund.
						If you are approved, then your refund will be processed, and a credit will automatically be applied to your credit card or original method of payment, within 10 business days.<br><br>
						<h6 class="text-warning">Late or missing refunds</h6>
						•	If you have not received a refund yet, first check your bank account again. Then contact your credit card company, it may take some time before your refund is officially posted.<br>
						•	If you have done all of this and you still have not received your refund yet, please contact us <a href="support.php#contactus" class="text-decoration-none">here</a>.

					</div>
					
				</div>
			</div>
			<div class="row mt-2 bg-dark custom_border_radius_5">
				<div class="col">
					
					<div class="mt-2 d-flex">
						<h4 class="text-white">Privacy Policy</h4>
					</div>
					<hr style="color:white;" class="my-0">
					<div class="mt-1 mb-2 text-white">
						This Privacy Policy describes how your personal information is collected, used, and shared when you visit or make a purchase from GameForge.io.<br><br>
						<h6 class="text-warning">WHAT PERSONAL INFORMATION WE COLLECT</h6>
						When you visit the Site, we automatically collect certain information about your device, including information about your web browser, IP address, time zone, and some of the cookies that are installed on your device.
						Additionally, as you browse the Site, we collect information about the individual web pages or products that you view, what websites or search terms referred you to the Site, and information about how you interact with the Site. We refer to this automatically collected information as Device Information.
						We collect Device Information using the following technologies:<br>
						•	Cookies are data files that are placed on your device or computer and often include an anonymous unique identifier.<br>
						•	Log files track actions occurring on the Site, and collect data including your IP address, browser type, Internet service provider, referring/exit pages, and date/time stamps.<br>
						Also, when you make a purchase or attempt to make a purchase through the Site, we collect certain information from you, including your name, email address, and phone number. This is called Order Information.<br>
						By Personal Information in this Privacy Policy, we are talking both about Device Information and Order Information.<br><br>
						<h6 class="text-warning">HOW DO WE USE YOUR PERSONAL INFORMATION</h6>
						We use the Order Information that we collect generally to fulfil any orders placed through the Site (including processing your payment information and providing you with invoices and/or order confirmations).
						Additionally, we use this Order Information to:<br>
						•	Communicate with you.<br>
						•	Screen our orders for potential risk or fraud.<br>
						•	When in line with the preferences you have shared with us, provide you with information or advertising relating to our products or services.<br>
						We use the Device Information that we collect to help us screen for potential risk and fraud (in particular, your IP address), and more generally to improve and optimize our Site.<br><br>
						<h6 class="text-warning">SHARING YOUR PERSONAL INFORMATION</h6>
						We share your Personal Information with third parties to help us use your Personal Information, as described above.<br>
						We also use Google Analytics to help us understand how our customers use GameForge<br>
						Finally, we may also share your Personal Information to comply with applicable laws and regulations, to respond to a subpoena, search warrant or other lawful requests for information we receive, or to otherwise protect our rights.<br><br>
						<h6 class="text-warning">YOUR RIGHTS</h6>
						If you are a European resident, you have the right to access the personal information we hold about you and to ask that your personal information is corrected, updated, or deleted. If you would like to exercise this right, please <a href="support.php#contactus" class="text-decoration-none">contact us</a>.<br>
						Additionally, if you are a European resident we note that we are processing your information in order to fulfil contracts we might have with you (for example if you make an order through the Site), or otherwise to pursue our legitimate business interests listed above.<br>
						Please note that your information will be transferred outside of Europe, including to Canada and the United States.<br><br>
						<h6 class="text-warning">DATA RETENTION</h6>
						When you place an order through the Site, we will maintain your Order Information for our records unless and until you ask us to delete this information.<br><br>
						<h6 class="text-warning">MINORS</h6>
						The Site is not intended for individuals under the age of 18 YEARS.<br><br>
						<h6 class="text-warning">CHANGES</h6>
						We may update this privacy policy from time to time in order to reflect, for example, changes to our practices or for other operational, legal or regulatory reasons.
						If you have questions and/or require more information, do not hesitate to <a href="support.php#contactus" class="text-decoration-none">contact us</a>.

					</div>
					
				</div>
			</div>
		
		</div>
		<!-- ____________________________________________________________________________________________________________________ -->
		
		<!-- _____FOOTER_________________________________________________________________________________________________________ -->
		
		<nav class="navbar navbar-expand-lg">
			<div class="container navbar-dark bg-dark custom_border_radius_5">
				<p class="d-flex justify-content-between text-white my-2">GameForge: <a class="nav-link mx-4" href="#">Policies</a><a class="nav-link me-4" href="legal.php">Legal</a><a class="nav-link" href="support.php">Support</a></p>
			</div>
		</nav>
		
		 <!-- ____________________________________________________________________________________________________________________ -->
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../js/function.js"></script>
		
	</body>
</html>
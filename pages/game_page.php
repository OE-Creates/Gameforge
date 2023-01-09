<?php
	require "../backend/core_logic.php";
	require "../backend/login_logic.php";
	require "../backend/signup_logic.php";
	require "../backend/gamepage_logic.php";
	require "../backend/gamepage_rating.php";
	
	require "../backend/dbconnect_account.php";
	
	$currgameid = $_SESSION["gamepage_id"];
	
	$pullgamedata = "SELECT * FROM games WHERE id = '$currgameid'";
	$pulldata = $conn->query($pullgamedata);
	
	$row = $pulldata->fetch_array();
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
			
			<div class="row mt-1 bg-dark custom_border_radius_5" style="background-image: url(<?php echo $row['bannerimage']; ?>); background-repeat: no-repeat; background-size: cover;">
				<div class="col">
				
					<div class="my-2">
						<div class="row">
							<div class="col-md-3">
								<div class="card text-bg-dark me-1 custom_card_min_width custom_card_max_width">
									<img src="<?php echo $row['imageone']; ?>" class="card-img" alt="...">
								</div>
							</div>
							<div class="col-md-9">
								<div>
									<h2 class="text-white"><?php echo $row['name']; ?></h2><br>
									<h6 class="text-white"><?php echo $row['description'];?></h6><br><br>
									<h5 class="text-white"><b>GENRE: <?php echo $row['genre'];?>, <?php echo $row['gameplayone'];?>, <?php echo $row['gameplaytwo'];?>, <?php echo $row['gameplaythree'];?></b></h5>
									<h5 class="text-white"><b>GAMEPLAY STYLE: <?php echo $row['gameplayfour'];?>, <?php echo $row['gameplayfive'];?></b></h5>
									<h5 class="text-white"><b>SCORE: <?php echo $overallrating; ?></b></h5>
									<h5 class="text-white"><b>PLATFORM: <?php echo $row['platform'];?></b></h5>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		
		<!-- ____________________________________________________________________________________________________________________ -->
		
		<div class="modal" id="writereview_modal" aria-labelledby="writereviewButtonLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content bg-dark text-white">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel"><?php echo $_SESSION["user_username"] . "'s " . $row['name']; ?> Review</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form method="POST">
						<div class="modal-body">
							<div class="d-flex">
								<p>Rate the game: </p>
								<div class="form-check mx-2">
									<input class="form-check-input" type="radio" name="review_rategame" id="flexRadioDefault1" value="1">
									<label class="form-check-label" for="flexRadioDefault1">1</label>
								</div>
								<div class="form-check me-2">
									<input class="form-check-input" type="radio" name="review_rategame" id="flexRadioDefault2" value="2">
									<label class="form-check-label" for="flexRadioDefault2">2</label>
								</div>
								<div class="form-check me-2">
									<input class="form-check-input" type="radio" name="review_rategame" id="flexRadioDefault3" value="3" checked>
									<label class="form-check-label" for="flexRadioDefault3">3</label>
								</div>
								<div class="form-check me-2">
									<input class="form-check-input" type="radio" name="review_rategame" id="flexRadioDefault4" value="4">
									<label class="form-check-label" for="flexRadioDefault4">4</label>
								</div>
								<div class="form-check me-2">
									<input class="form-check-input" type="radio" name="review_rategame" id="flexRadioDefault5" value="5">
									<label class="form-check-label" for="flexRadioDefault5">5</label>
								</div>
							</div>
							<textarea class="form-control" id="feedbackFormControlTextarea" rows="4" name="review_gamecomment" pattern="[A-Za-z0-9. ]+" minlength="10" maxlength="240" required></textarea>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" name="submit_addreview">POST</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<!-- ____________________________________________________________________________________________________________________ -->
			
			<div class="row mt-2 bg-dark custom_border_radius_5">
				<div class="col">
				
					<div>
						<p  class="m-0 py-2 text-light">
							Website: <a class="text-decoration-none" href="<?php echo $row['url']; ?>" target="_blank">Visit Offical Game Website</a>&emsp;&emsp;&emsp;
							Download: <?php require "../backend/gamepage_generatedllink.php"; ?>
						</p>
					</div>
					
				</div>
				
			</div>
			
			<div class="row mt-2 bg-dark custom_border_radius_5">
				<div class="col">
				
					<div class="row">
						<div class="col-md-3">
							<div class="container my-2 pt-1 bg-secondary custom_border_radius_5" style="height: 246px;">
								<h5 class="text-light">Ksh <del><?php echo $row['baseprice'];?></del><br>Ksh <?php echo $row['saleprice'];?> (<?php echo $row['salepercent'];?>% Off)</h5>
								<?php require "../backend/gamepage_logic_buttons_buy.php"; ?><br>
								<?php require "../backend/gamepage_logic_buttons_wishlist.php"; ?><br>
								<?php require "../backend/gamepage_logic_buttons_review.php"; ?>
							</div>
						</div>
						<div class="col-md-9">
							<div class="my-2 d-flex w-100 custom_div_overflow_x">
					
								<a href="#" class="text-decoration-none" data-bs-toggle='modal' data-bs-target='#img01_modal'><img class="me-2 custom_border_radius_5" style="border: solid lightgray 2px; max-height: 230px; "src="<?php echo $row['imagetwo']; ?>"></a>
								<a href="#" class="text-decoration-none" data-bs-toggle='modal' data-bs-target='#img02_modal'><img class="me-2 custom_border_radius_5" style="border: solid lightgray 2px;max-height: 230px; "src="<?php echo $row['imagethree']; ?>"></a>
								<a href="#" class="text-decoration-none" data-bs-toggle='modal' data-bs-target='#img03_modal'><img class="me-2 custom_border_radius_5" style="border: solid lightgray 2px;max-height: 230px; "src="<?php echo $row['imagefour']; ?>"></a>
								<a href="#" class="text-decoration-none" data-bs-toggle='modal' data-bs-target='#img04_modal'><img class="me-2 custom_border_radius_5" style="border: solid lightgray 2px;max-height: 230px; "src="<?php echo $row['imagefive']; ?>"></a>
								<a href="#" class="text-decoration-none" data-bs-toggle='modal' data-bs-target='#img05_modal'><img class="me-2 custom_border_radius_5" style="border: solid lightgray 2px;max-height: 230px; "src="<?php echo $row['imagethree']; ?>"></a>
								
		<!-- ____________________________________________________________________________________________________________________ -->

		<div class="modal" id="img01_modal" tabindex="-1" aria-labelledby="img01Label" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="">
					<div class="modal-body">
						<img class="custom_border_radius_5" style="max-height: 500px; "src="<?php echo $row['imagetwo']; ?>">
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal" id="img02_modal" tabindex="-1" aria-labelledby="img02Label" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="">
					<div class="modal-body">
						<img class="custom_border_radius_5" style="max-height: 500px; "src="<?php echo $row['imagethree']; ?>">
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal" id="img03_modal" tabindex="-1" aria-labelledby="img03Label" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="">
					<div class="modal-body">
						<img class="custom_border_radius_5" style="max-height: 500px; "src="<?php echo $row['imagefour']; ?>">
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal" id="img04_modal" tabindex="-1" aria-labelledby="img04Label" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="">
					<div class="modal-body">
						<img class="custom_border_radius_5" style="max-height: 500px; "src="<?php echo $row['imagefive']; ?>">
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal" id="img05_modal" tabindex="-1" aria-labelledby="img05Label" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="">
					<div class="modal-body">
						<img class="custom_border_radius_5" style="max-height: 500px; "src="<?php echo $row['imagethree']; ?>">
					</div>
				</div>
			</div>
		</div>

		<!-- ____________________________________________________________________________________________________________________ -->
		
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
			
			<div class="row mt-2 bg-dark custom_border_radius_5">
				<div class="col">
				
					<div class="row">
						<div class="col-md-6">
							<div class="container px-0 custom_div_height_300">
								<div class="embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item w-100" height="300" src="<?php echo $row['videolink']?>" allowfullscreen></iframe>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="container my-2 pt-2 bg-secondary custom_border_radius_5 custom_div_overflow_y" style="height: 284px;">
								<h6 class="text-white"><?php echo $row['name']; ?>'s Reviews</h6>
								<hr class="my-0 mb-2">
								<?php require "../backend/gamepage_reviewlist.php"; ?>
							</div>
						</div>
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
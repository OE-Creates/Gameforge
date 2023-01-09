<?php
	require "../backend/core_logic.php";
	require "../backend/management_logic.php";
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
		
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		
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
				<div class="col-lg-12">
					<div class="my-2">
						<h4 class="text-white">Inventory: Games</h4>
						<div class="container-lg my-2 bg-light custom_border_radius_5 custom_div_height_400 custom_div_overflow_y">
							<?php require "../backend/management_gamelist.php"; ?>
						</div>
						<form method="POST">
							<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#addgame_modal'>ADD GAME</button>
							<button type='button' class='btn btn-primary mx-2' data-bs-toggle='modal' data-bs-target='#updategame_modal'>UPDATE GAME</button>
							<button type='submit' class='btn btn-success' name="submit_printgames">EXPORT GAMES LIST [ <?php echo $_SESSION["manage_noofgames"]; ?> ]</button>
						</form>
		<!-- ____________________________________________________________________________________________________________________ -->

			<div class="modal" id="addgame_modal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addGameButtonLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticBackdropLabel">Add Game</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form method="POST" enctype="multipart/form-data">
								
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text" id="addgamenamefield">Name</span>
									<input type="text" class="form-control" placeholder="Destiny 2" name="addgame_name" pattern="[A-Za-z0-9!?@#$%^&*()-=_+,./\<> ]+" minlength="1" maxlength="40" title="Input your name using letters (UPPERCASE or lowercase), numbers and valid symbols only." required>
								</div>
								
								<h5>Details</h5>
								<hr class="mt-0 mb-1">
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text" id="addgamedescriptionfield">Description</span>
									<textarea type="text" class="form-control" placeholder="A space explorative game with..." rows="3" name="addgame_description" pattern="[A-Za-z0-9 ]+" minlength="5" maxlength="255" title="Input a description using letters (UPPERCASE or lowercase) and numbers only." required></textarea>
								</div>
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text" id="addgameurlfield">Website</span>
									<input type="text" class="form-control" placeholder="www.playdestiny.com" name="addgame_url" pattern="[A-Za-z0-9!?@#$%^&*()-=_+,./\<> ]+" minlength="4" maxlength="255" title="Input a website using letters (UPPERCASE or lowercase), numbers and valid symbols only.">
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text">Genre</span>
											<select class="form-select" name="addgame_genre" required>
												<option selected value="Action">Action</option>
												<option value="Action-adventure">Action-adventure</option>
												<option value="Adventure">Adventure</option>
												<option value="Role-playing">Role-playing</option>
												<option value="Simulation">Simulation</option>
												<option value="Strategy">Strategy</option>
												<option value="Sports">Sports</option>
												<option value="Puzzle">Puzzle</option>
												<option value="Idle">Idle</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text">Main Sub-Genre</span>
											<select class="form-select" name="addgame_mainsubgenre" required>
												<option value="Platformer">Platformer</option>
												<option value="Looter Shooter">Looter Shooter</option>
												<option selected value="First Person Shooter">First Person Shooter</option>
												<option value="Third Person Shooter">Third Person Shooter</option>
												<option value="Fighting">Fighting</option>
												<option value="Hack-n-Slash">Hack-n-Slash</option>
												<option value="Stealth">Stealth</option>
												<option value="Survival">Survival</option>
												<option value="Rhythm">Rhythm</option>
												<option value="Horror">Horror</option>
												<option value="Survival-Horror">Survival-Horror</option>
												<option value="Metroidvania">Metroidvania</option>
												<option value="Text Adventure">Text Adventure</option>
												<option value="Graphics Adventure">Graphics Adventure</option>
												<option value="Visual Novels">Visual Novels</option>
												<option value="Interactive Movie">Interactive Movie</option>
												<option value="Real-time 3D">Real-time 3D</option>
												<option value="Action RPG">Action RPG</option>
												<option value="MMORPG">MMORPG</option>
												<option value="Roguelikes">Roguelikes</option>
												<option value="Tactical RPG">Tactical RPG</option>
												<option value="Sandbox RPG">Sandbox RPG</option>
												<option value="Party-based RPG">Party-based RPG</option>
												<option value="Construction Sim">Construction Sim</option>
												<option value="Management Sim">Management Sim</option>
												<option value="Life Sim">Life Sim</option>
												<option value="Vehicle Sim">Vehicle Sim</option>
												<option value="4X">4X</option>
												<option value="Artilery">Artilery</option>
												<option value="Real-time Strategy">Real-time Strategy</option>
												<option value="Real-time Tactics">Real-time Tactics</option>
												<option value="MOBA">MOBA</option>
												<option value="Tower Defense">Tower Defense</option>
												<option value="Turn-based Strategy">Turn-based Strategy</option>
												<option value="Turn-based Tactics">Turn-based Tactics</option>
												<option value="Wargame">Wargame</option>
												<option value="Grand Strategy Wargame">Grand Strategy Wargame</option>
												<option value="Racing">Racing</option>
												<option value="Team Sports">Team Sports</option>
												<option value="Competitive">Competitive</option>
												<option value="Sports-based Fighting">Sports-based Fighting</option>
												<option value="Logic Game">Logic Game</option>
												<option value="Trivia Game">Trivia Game</option>
												<option value="Idler">Idler</option>
												<option value="Casual">Casual</option>
												<option value="Party Game">Party Game</option>
												<option value="Programming Game">Programming Game</option>
												<option value="MMO">MMO</option>
												<option value="Art Game">Art Game</option>
												<option value="Educational Game">Educational Game</option>
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text">Additional Sub-Genre 1</span>
											<select class="form-select" name="addgame_addsubgenre1" required>
												<option selected value="None">None</option>
												<option value="Platformer">Platformer</option>
												<option value="Looter Shooter">Looter Shooter</option>
												<option value="First Person Shooter">First Person Shooter</option>
												<option value="Third Person Shooter">Third Person Shooter</option>
												<option value="Fighting">Fighting</option>
												<option value="Hack-n-Slash">Hack-n-Slash</option>
												<option value="Stealth">Stealth</option>
												<option value="Survival">Survival</option>
												<option value="Rhythm">Rhythm</option>
												<option value="Horror">Horror</option>
												<option value="Survival-Horror">Survival-Horror</option>
												<option value="Metroidvania">Metroidvania</option>
												<option value="Text Adventure">Text Adventure</option>
												<option value="Graphics Adventure">Graphics Adventure</option>
												<option value="Visual Novels">Visual Novels</option>
												<option value="Interactive Movie">Interactive Movie</option>
												<option value="Real-time 3D">Real-time 3D</option>
												<option value="Action RPG">Action RPG</option>
												<option value="MMORPG">MMORPG</option>
												<option value="Roguelikes">Roguelikes</option>
												<option value="Tactical RPG">Tactical RPG</option>
												<option value="Sandbox RPG">Sandbox RPG</option>
												<option value="Party-based RPG">Party-based RPG</option>
												<option value="Construction Sim">Construction Sim</option>
												<option value="Management Sim">Management Sim</option>
												<option value="Life Sim">Life Sim</option>
												<option value="Vehicle Sim">Vehicle Sim</option>
												<option value="4X">4X</option>
												<option value="Artilery">Artilery</option>
												<option value="Real-time Strategy">Real-time Strategy</option>
												<option value="Real-time Tactics">Real-time Tactics</option>
												<option value="MOBA">MOBA</option>
												<option value="Tower Defense">Tower Defense</option>
												<option value="Turn-based Strategy">Turn-based Strategy</option>
												<option value="Turn-based Tactics">Turn-based Tactics</option>
												<option value="Wargame">Wargame</option>
												<option value="Grand Strategy Wargame">Grand Strategy Wargame</option>
												<option value="Racing">Racing</option>
												<option value="Team Sports">Team Sports</option>
												<option value="Competitive">Competitive</option>
												<option value="Sports-based Fighting">Sports-based Fighting</option>
												<option value="Logic Game">Logic Game</option>
												<option value="Trivia Game">Trivia Game</option>
												<option value="Idler">Idler</option>
												<option value="Casual">Casual</option>
												<option value="Party Game">Party Game</option>
												<option value="Programming Game">Programming Game</option>
												<option value="MMO">MMO</option>
												<option value="Art Game">Art Game</option>
												<option value="Educational Game">Educational Game</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text">Additional Sub-Genre 2</span>
											<select class="form-select" name="addgame_addsubgenre2" required>
												<option selected value="None">None</option>
												<option value="Platformer">Platformer</option>
												<option value="Looter Shooter">Looter Shooter</option>
												<option value="First Person Shooter">First Person Shooter</option>
												<option value="Third Person Shooter">Third Person Shooter</option>
												<option value="Fighting">Fighting</option>
												<option value="Hack-n-Slash">Hack-n-Slash</option>
												<option value="Stealth">Stealth</option>
												<option value="Survival">Survival</option>
												<option value="Rhythm">Rhythm</option>
												<option value="Horror">Horror</option>
												<option value="Survival-Horror">Survival-Horror</option>
												<option value="Metroidvania">Metroidvania</option>
												<option value="Text Adventure">Text Adventure</option>
												<option value="Graphics Adventure">Graphics Adventure</option>
												<option value="Visual Novels">Visual Novels</option>
												<option value="Interactive Movie">Interactive Movie</option>
												<option value="Real-time 3D">Real-time 3D</option>
												<option value="Action RPG">Action RPG</option>
												<option value="MMORPG">MMORPG</option>
												<option value="Roguelikes">Roguelikes</option>
												<option value="Tactical RPG">Tactical RPG</option>
												<option value="Sandbox RPG">Sandbox RPG</option>
												<option value="Party-based RPG">Party-based RPG</option>
												<option value="Construction Sim">Construction Sim</option>
												<option value="Management Sim">Management Sim</option>
												<option value="Life Sim">Life Sim</option>
												<option value="Vehicle Sim">Vehicle Sim</option>
												<option value="4X">4X</option>
												<option value="Artilery">Artilery</option>
												<option value="Real-time Strategy">Real-time Strategy</option>
												<option value="Real-time Tactics">Real-time Tactics</option>
												<option value="MOBA">MOBA</option>
												<option value="Tower Defense">Tower Defense</option>
												<option value="Turn-based Strategy">Turn-based Strategy</option>
												<option value="Turn-based Tactics">Turn-based Tactics</option>
												<option value="Wargame">Wargame</option>
												<option value="Grand Strategy Wargame">Grand Strategy Wargame</option>
												<option value="Racing">Racing</option>
												<option value="Team Sports">Team Sports</option>
												<option value="Competitive">Competitive</option>
												<option value="Sports-based Fighting">Sports-based Fighting</option>
												<option value="Logic Game">Logic Game</option>
												<option value="Trivia Game">Trivia Game</option>
												<option value="Idler">Idler</option>
												<option value="Casual">Casual</option>
												<option value="Party Game">Party Game</option>
												<option value="Programming Game">Programming Game</option>
												<option value="MMO">MMO</option>
												<option value="Art Game">Art Game</option>
												<option value="Educational Game">Educational Game</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text">Main Game Style</span>
											<select class="form-select" name="addgame_maingamestyle" required>
												<option value="Single Player">Single Player</option>
												<option value="Online Single Player">Online Single Player</option>
												<option value="Co-Op">Co-Op</option>
												<option selected value="Online Co-Op">Online Co-Op</option>
												<option value="Multiplayer">Multiplayer</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text">Sub Game Style</span>
											<select class="form-select" name="addgame_subgamestyle" required>
												<option selected value="None">None</option>
												<option value="Single Player">Single Player</option>
												<option value="Online Single Player">Online Single Player</option>
												<option value="Co-Op">Co-Op</option>
												<option value="Online Co-Op">Online Co-Op</option>
												<option value="Multiplayer">Multiplayer</option>
											</select>
										</div>
									</div>
								</div>
								
								<div class="col-md-8">
									<div class="input-group input-group-sm mb-3">
										<span class="input-group-text">Platform</span>
										<select class="form-select" name="addgame_platform" required>
											<option selected value="All">All</option>
											<option value="PC">PC</option>
											<option value="XBox">XBox</option>
											<option value="Play Station">Play Station</option>
											<option value="Ninetendo">Ninetendo</option>
											<option value="PC, XBox">PC, XBox</option>
											<option value="PC, Play Station">PC, Play Station</option>
											<option value="XBox, Play Station">XBox, Play Station</option>
											<option value="PC, XBox, Play Station">PC, XBox, Play Station</option>
											<option value="XBox, Play Station, Ninetendo">XBox, Play Station, Ninetendo</option>
											<option value="PC, XBox, Play Station, Ninetendo">PC, XBox, Play Station, Ninetendo</option>
											<option value="Handhelds">Handhelds</option>
											<option value="XBox 360">XBox 360</option>
											<option value="XBox One">XBox One</option>
											<option value="XBox Series S/Series X">XBox Series S/Series X</option>
											<option value="Play Station Vita">Play Station Vita</option>
											<option value="Play Station 3">Play Station 3</option>
											<option value="Play Station 4">Play Station 4</option>
											<option value="Play Station 5">Play Station 5</option>
											<option value="Wii U">Wii U</option>
											<option value="Ninetendo Switch">Ninetendo Switch</option>
											<option value="Mobile">Mobile</option>
											<option value="PC, Mobile">PC, Mobile</option>
											<option value="PC, XBox, Mobile">PC, XBox, Mobile</option>
											<option value="PC, Play Station, Mobile">PC, Play Station, Mobile</option>
											<option value="PC, XBox, Play Station, Mobile">PC, XBox, Play Station, Mobile</option>
											<option value="PC, XBox, Ninetendo, Mobile">PC, XBox, Ninetendo, Mobile</option>
											<option value="PC, Play Station, Ninetendo, Mobile">PC, Play Station, Ninetendo, Mobile</option>
											<option value="PC, XBox, Play Station, Ninetendo, Mobile">PC, XBox, Play Station, Ninetendo, Mobile</option>
											
										</select>
									</div>
								</div>
								
								<div class="form-check mb-3">
									<input class="form-check-input" type="checkbox" value="1" id="addgameinapppurchasefield" name="addgame_inapppurchase">
									<label class="form-check-label" for="addgameinapppurchasefield">In-App Purchases</label>
								</div>
								
								<h5>Availability</h5>
								<hr class="mt-0 mb-1">
								<div class="row">
									<div class="col-md-6">
										<div class="form-check mb-3">
											<input class="form-check-input" type="checkbox" value="1" id="addgameafricanmadefield" name="addgame_africanmade">
											<label class="form-check-label" for="addgameafricanmadefield">Made In Africa</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text">Release Status</span>
											<select class="form-select" name="addgame_releasestatus" required>
												<option value="Coming Soon">Coming Soon</option>
												<option selected value="New Release">New Release</option>
												<option value="Old Game">Old Game</option>
											</select>
										</div>
									</div>
								</div>
								
								<h5>Images/Videos</h5>
								<hr class="mt-0 mb-1">
								<div class="row">
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-1">
											<label class="input-group-text" for="addgamebannerimgfield">Banner Image</label>
											<input type="file" class="form-control" id="addgamebannerimgfield" name="addgame_bannerimg" onchange="FilevalidationAddBanner()" required>
										</div>
										<p class="text-danger mb-3">Banner Image must be of aspect ratio W24 x H9</p>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-1">
											<label class="input-group-text" for="addgameprofileimgfield">Profile Image</label>
											<input type="file" class="form-control" id="addgameprofileimgfield" name="addgame_profileimg" onchange="FilevalidationAddProfile()" required>
										</div>
										<p class="text-danger mb-3">Profile Image must be of aspect ratio W16 x H24</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-1">
											<label class="input-group-text" for="addgameadvimg1field">Advert Image 1</label>
											<input type="file" class="form-control" id="addgameadvimg1field" name="addgame_adv1img" onchange="FilevalidationAddAdv1()" required>
										</div>
										<p class="text-danger mb-3">Advert Image must be of aspect ratio W8 x H8</p>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-1">
											<label class="input-group-text" for="addgameadvimg2field">Advert Image 2</label>
											<input type="file" class="form-control" id="addgameadvimg2field" name="addgame_adv2img" onchange="FilevalidationAddAdv2()" required>
										</div>
										<p class="text-danger mb-3">Advert Image must be of aspect ratio W8 x H8</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-1">
											<label class="input-group-text" for="addgameadvimg3field">Advert Image 3</label>
											<input type="file" class="form-control" id="addgameadvimg3field" name="addgame_adv3img" onchange="FilevalidationAddAdv3()" required>
										</div>
										<p class="text-danger mb-3">Advert Image must be of aspect ratio W8 x H8</p>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-1">
											<label class="input-group-text" for="addgameadvimg4field">Advert Image 4</label>
											<input type="file" class="form-control" id="addgameadvimg4field" name="addgame_adv4img" onchange="FilevalidationAddAdv4()" required>
										</div>
										<p class="text-danger mb-3">Advert Image must be of aspect ratio W8 x H8</p>
									</div>
								</div>
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text" id="addgamevideolinkfield">Video Link</span>
									<input type="text" class="form-control" placeholder="www.playdestiny.com/trailer1" name="addgame_videolink" pattern="[A-Za-z0-9!?@#$%^&*()-=_+,./\<> ]+" minlength="4" maxlength="500" title="Input a website using letters (UPPERCASE or lowercase), numbers and valid symbols only.">
								</div>
								
								<h5>Pricing</h5>
								<hr class="mt-0 mb-1">
								<div class="row">
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text" id="addgamebasepricefield">Base Price (Ksh)</span>
											<input type="number" class="form-control" placeholder="6499" name="addgame_baseprice" pattern="[0-9]+" minlength="1" maxlength="10" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-1">
											<span class="input-group-text" id="addgamesalepercentfield">Sale Percent (%)</span>
											<input type="number" class="form-control" placeholder="25" name="addgame_salepercent" pattern="[0-9]+" minlength="1" maxlength="2" required>
										</div>
										<p class="text-danger mb-3">Input 0 for no sale percentage</p>
									</div>
								</div>
								
								<div>
									<button type="submit" class="btn btn-primary col-md-4" name="submit_addgame">Add Game</button>
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
			
			<div class="modal" id="updategame_modal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateGameButtonLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticBackdropLabel">Update Game</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						
							<form method="POST" enctype="multipart/form-data">
								
								<div class="row">
									<div class="col-md-3">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text" id="updategameidfield">Game ID</span>
											<input type="number" class="form-control" placeholder="134" name="updategame_id" pattern="[0-9]+" minlength="1" maxlength="10" title="Input a game id using numbers only." required>
										</div>
									</div>
									<div class="col-md-9">									
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text" id="updategamenamefield">Name</span>
											<input type="text" class="form-control" placeholder="Destiny 2" name="updategame_name" pattern="[A-Za-z0-9!?@#$%^&*()-=_+,./\<> ]+" minlength="1" maxlength="40" title="Input a name using letters (UPPERCASE or lowercase), numbers and valid symbols only.">
										</div>
									</div>
								</div>									
								
								<h5>Details</h5>
								<hr class="mt-0 mb-1">
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text" id="updategamedescriptionfield">Description</span>
									<textarea type="text" class="form-control" placeholder="A space explorative game with..." rows="3" name="updategame_description" pattern="[A-Za-z0-9 ]+" minlength="5" maxlength="255" title="Input a description using letters (UPPERCASE or lowercase) and numbers only."></textarea>
								</div>
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text" id="updategameurlfield">Website</span>
									<input type="text" class="form-control" placeholder="www.playdestiny.com" name="updategame_url" pattern="[A-Za-z0-9!?@#$%^&*()-=_+,./\<> ]+" minlength="4" maxlength="255" title="Input a website using letters (UPPERCASE or lowercase), numbers and valid symbols only.">
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text">Genre</span>
											<select class="form-select" name="updategame_genre">
												<option selected value="N/A">N/A</option>
												<option value="Action">Action</option>
												<option value="Action-adventure">Action-adventure</option>
												<option value="Adventure">Adventure</option>
												<option value="Role-playing">Role-playing</option>
												<option value="Simulation">Simulation</option>
												<option value="Strategy">Strategy</option>
												<option value="Sports">Sports</option>
												<option value="Puzzle">Puzzle</option>
												<option value="Idle">Idle</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text">Main Sub-Genre</span>
											<select class="form-select" name="updategame_mainsubgenre">
												<option selected value="N/A">N/A</option>
												<option value="Platformer">Platformer</option>
												<option value="Looter Shooter">Looter Shooter</option>
												<option value="First Person Shooter">First Person Shooter</option>
												<option value="Third Person Shooter">Third Person Shooter</option>
												<option value="Fighting">Fighting</option>
												<option value="Hack-n-Slash">Hack-n-Slash</option>
												<option value="Stealth">Stealth</option>
												<option value="Survival">Survival</option>
												<option value="Rhythm">Rhythm</option>
												<option value="Horror">Horror</option>
												<option value="Survival-Horror">Survival-Horror</option>
												<option value="Metroidvania">Metroidvania</option>
												<option value="Text Adventure">Text Adventure</option>
												<option value="Graphics Adventure">Graphics Adventure</option>
												<option value="Visual Novels">Visual Novels</option>
												<option value="Interactive Movie">Interactive Movie</option>
												<option value="Real-time 3D">Real-time 3D</option>
												<option value="Action RPG">Action RPG</option>
												<option value="MMORPG">MMORPG</option>
												<option value="Roguelikes">Roguelikes</option>
												<option value="Tactical RPG">Tactical RPG</option>
												<option value="Sandbox RPG">Sandbox RPG</option>
												<option value="Party-based RPG">Party-based RPG</option>
												<option value="Construction Sim">Construction Sim</option>
												<option value="Management Sim">Management Sim</option>
												<option value="Life Sim">Life Sim</option>
												<option value="Vehicle Sim">Vehicle Sim</option>
												<option value="4X">4X</option>
												<option value="Artilery">Artilery</option>
												<option value="Real-time Strategy">Real-time Strategy</option>
												<option value="Real-time Tactics">Real-time Tactics</option>
												<option value="MOBA">MOBA</option>
												<option value="Tower Defense">Tower Defense</option>
												<option value="Turn-based Strategy">Turn-based Strategy</option>
												<option value="Turn-based Tactics">Turn-based Tactics</option>
												<option value="Wargame">Wargame</option>
												<option value="Grand Strategy Wargame">Grand Strategy Wargame</option>
												<option value="Racing">Racing</option>
												<option value="Team Sports">Team Sports</option>
												<option value="Competitive">Competitive</option>
												<option value="Sports-based Fighting">Sports-based Fighting</option>
												<option value="Logic Game">Logic Game</option>
												<option value="Trivia Game">Trivia Game</option>
												<option value="Idler">Idler</option>
												<option value="Casual">Casual</option>
												<option value="Party Game">Party Game</option>
												<option value="Programming Game">Programming Game</option>
												<option value="MMO">MMO</option>
												<option value="Art Game">Art Game</option>
												<option value="Educational Game">Educational Game</option>
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text">Additional Sub-Genre 1</span>
											<select class="form-select" name="updategame_addsubgenre1">
												<option selected value="N/A">N/A</option>
												<option value="None">None</option>
												<option value="Platformer">Platformer</option>
												<option value="Looter Shooter">Looter Shooter</option>
												<option value="First Person Shooter">First Person Shooter</option>
												<option value="Third Person Shooter">Third Person Shooter</option>
												<option value="Fighting">Fighting</option>
												<option value="Hack-n-Slash">Hack-n-Slash</option>
												<option value="Stealth">Stealth</option>
												<option value="Survival">Survival</option>
												<option value="Rhythm">Rhythm</option>
												<option value="Horror">Horror</option>
												<option value="Survival-Horror">Survival-Horror</option>
												<option value="Metroidvania">Metroidvania</option>
												<option value="Text Adventure">Text Adventure</option>
												<option value="Graphics Adventure">Graphics Adventure</option>
												<option value="Visual Novels">Visual Novels</option>
												<option value="Interactive Movie">Interactive Movie</option>
												<option value="Real-time 3D">Real-time 3D</option>
												<option value="Action RPG">Action RPG</option>
												<option value="MMORPG">MMORPG</option>
												<option value="Roguelikes">Roguelikes</option>
												<option value="Tactical RPG">Tactical RPG</option>
												<option value="Sandbox RPG">Sandbox RPG</option>
												<option value="Party-based RPG">Party-based RPG</option>
												<option value="Construction Sim">Construction Sim</option>
												<option value="Management Sim">Management Sim</option>
												<option value="Life Sim">Life Sim</option>
												<option value="Vehicle Sim">Vehicle Sim</option>
												<option value="4X">4X</option>
												<option value="Artilery">Artilery</option>
												<option value="Real-time Strategy">Real-time Strategy</option>
												<option value="Real-time Tactics">Real-time Tactics</option>
												<option value="MOBA">MOBA</option>
												<option value="Tower Defense">Tower Defense</option>
												<option value="Turn-based Strategy">Turn-based Strategy</option>
												<option value="Turn-based Tactics">Turn-based Tactics</option>
												<option value="Wargame">Wargame</option>
												<option value="Grand Strategy Wargame">Grand Strategy Wargame</option>
												<option value="Racing">Racing</option>
												<option value="Team Sports">Team Sports</option>
												<option value="Competitive">Competitive</option>
												<option value="Sports-based Fighting">Sports-based Fighting</option>
												<option value="Logic Game">Logic Game</option>
												<option value="Trivia Game">Trivia Game</option>
												<option value="Idler">Idler</option>
												<option value="Casual">Casual</option>
												<option value="Party Game">Party Game</option>
												<option value="Programming Game">Programming Game</option>
												<option value="MMO">MMO</option>
												<option value="Art Game">Art Game</option>
												<option value="Educational Game">Educational Game</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text">Additional Sub-Genre 2</span>
											<select class="form-select" name="updategame_addsubgenre2">
												<option selected value="N/A">N/A</option>
												<option value="None">None</option>
												<option value="Platformer">Platformer</option>
												<option value="Looter Shooter">Looter Shooter</option>
												<option value="First Person Shooter">First Person Shooter</option>
												<option value="Third Person Shooter">Third Person Shooter</option>
												<option value="Fighting">Fighting</option>
												<option value="Hack-n-Slash">Hack-n-Slash</option>
												<option value="Stealth">Stealth</option>
												<option value="Survival">Survival</option>
												<option value="Rhythm">Rhythm</option>
												<option value="Horror">Horror</option>
												<option value="Survival-Horror">Survival-Horror</option>
												<option value="Metroidvania">Metroidvania</option>
												<option value="Text Adventure">Text Adventure</option>
												<option value="Graphics Adventure">Graphics Adventure</option>
												<option value="Visual Novels">Visual Novels</option>
												<option value="Interactive Movie">Interactive Movie</option>
												<option value="Real-time 3D">Real-time 3D</option>
												<option value="Action RPG">Action RPG</option>
												<option value="MMORPG">MMORPG</option>
												<option value="Roguelikes">Roguelikes</option>
												<option value="Tactical RPG">Tactical RPG</option>
												<option value="Sandbox RPG">Sandbox RPG</option>
												<option value="Party-based RPG">Party-based RPG</option>
												<option value="Construction Sim">Construction Sim</option>
												<option value="Management Sim">Management Sim</option>
												<option value="Life Sim">Life Sim</option>
												<option value="Vehicle Sim">Vehicle Sim</option>
												<option value="4X">4X</option>
												<option value="Artilery">Artilery</option>
												<option value="Real-time Strategy">Real-time Strategy</option>
												<option value="Real-time Tactics">Real-time Tactics</option>
												<option value="MOBA">MOBA</option>
												<option value="Tower Defense">Tower Defense</option>
												<option value="Turn-based Strategy">Turn-based Strategy</option>
												<option value="Turn-based Tactics">Turn-based Tactics</option>
												<option value="Wargame">Wargame</option>
												<option value="Grand Strategy Wargame">Grand Strategy Wargame</option>
												<option value="Racing">Racing</option>
												<option value="Team Sports">Team Sports</option>
												<option value="Competitive">Competitive</option>
												<option value="Sports-based Fighting">Sports-based Fighting</option>
												<option value="Logic Game">Logic Game</option>
												<option value="Trivia Game">Trivia Game</option>
												<option value="Idler">Idler</option>
												<option value="Casual">Casual</option>
												<option value="Party Game">Party Game</option>
												<option value="Programming Game">Programming Game</option>
												<option value="MMO">MMO</option>
												<option value="Art Game">Art Game</option>
												<option value="Educational Game">Educational Game</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text">Main Game Style</span>
											<select class="form-select" name="updategame_maingamestyle">
												<option selected value="N/A">N/A</option>
												<option value="Single Player">Single Player</option>
												<option value="Online Single Player">Online Single Player</option>
												<option value="Co-Op">Co-Op</option>
												<option value="Online Co-Op">Online Co-Op</option>
												<option value="Multiplayer">Multiplayer</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text">Sub Game Style</span>
											<select class="form-select" name="updategame_subgamestyle">
												<option selected value="N/A">N/A</option>
												<option value="None">None</option>
												<option value="Single Player">Single Player</option>
												<option value="Online Single Player">Online Single Player</option>
												<option value="Co-Op">Co-Op</option>
												<option value="Online Co-Op">Online Co-Op</option>
												<option value="Multiplayer">Multiplayer</option>
											</select>
										</div>
									</div>
								</div>
								
								<div class="col-md-8">
									<div class="input-group input-group-sm mb-3">
										<span class="input-group-text">Platform</span>
										<select class="form-select" name="updategame_platform" required>
											<option selected value="N/A">N/A</option>
											<option value="All">All</option>
											<option value="PC">PC</option>
											<option value="XBox">XBox</option>
											<option value="Play Station">Play Station</option>
											<option value="Ninetendo">Ninetendo</option>
											<option value="PC, XBox">PC, XBox</option>
											<option value="PC, Play Station">PC, Play Station</option>
											<option value="XBox, Play Station">XBox, Play Station</option>
											<option value="PC, XBox, Play Station">PC, XBox, Play Station</option>
											<option value="XBox, Play Station, Ninetendo">XBox, Play Station, Ninetendo</option>
											<option value="PC, XBox, Play Station, Ninetendo">PC, XBox, Play Station, Ninetendo</option>
											<option value="Handhelds">Handhelds</option>
											<option value="XBox 360">XBox 360</option>
											<option value="XBox One">XBox One</option>
											<option value="XBox Series S/Series X">XBox Series S/Series X</option>
											<option value="Play Station Vita">Play Station Vita</option>
											<option value="Play Station 3">Play Station 3</option>
											<option value="Play Station 4">Play Station 4</option>
											<option value="Play Station 5">Play Station 5</option>
											<option value="Wii U">Wii U</option>
											<option value="Ninetendo Switch">Ninetendo Switch</option>
											<option value="Mobile">Mobile</option>
											<option value="PC, Mobile">PC, Mobile</option>
											<option value="PC, XBox, Mobile">PC, XBox, Mobile</option>
											<option value="PC, Play Station, Mobile">PC, Play Station, Mobile</option>
											<option value="PC, XBox, Play Station, Mobile">PC, XBox, Play Station, Mobile</option>
											<option value="PC, XBox, Ninetendo, Mobile">PC, XBox, Ninetendo, Mobile</option>
											<option value="PC, Play Station, Ninetendo, Mobile">PC, Play Station, Ninetendo, Mobile</option>
											<option value="PC, XBox, Play Station, Ninetendo, Mobile">PC, XBox, Play Station, Ninetendo, Mobile</option>
										</select>
									</div>
								</div>
								
								<div class="form-check mb-3">
									<input class="form-check-input" type="checkbox" value="1" id="updategameinapppurchasefield" name="updategame_inapppurchase">
									<label class="form-check-label" for="updategameinapppurchasefield">In-App Purchases</label>
								</div>
								
								<h5>Availability</h5>
								<hr class="mt-0 mb-1">
								<div class="row">
									<div class="col-md-6">
										<div class="form-check mb-3">
											<input class="form-check-input" type="checkbox" value="1" id="updategameafricanmadefield" name="updategame_africanmade">
											<label class="form-check-label" for="updategameafricanmadefield">Made In Africa</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text">Release Status</span>
											<select class="form-select" name="updategame_releasestatus">
												<option selected value="N/A">N/A</option>
												<option value="Coming Soon">Coming Soon</option>
												<option value="New Release">New Release</option>
												<option value="Old Game">Old Game</option>
											</select>
										</div>
									</div>
								</div>
								
								<h5>Images/Videos</h5>
								<hr class="mt-0 mb-1">
								<div class="row">
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-1">
											<label class="input-group-text" for="updategamebannerimgfield">Banner Image</label>
											<input type="file" class="form-control" id="updategamebannerimgfield" name="updategame_bannerimg" onchange="FilevalidationUpdBanner()">
										</div>
										<p class="text-danger mb-3">Banner Image must be of aspect ratio W800 x H300</p>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-1">
											<label class="input-group-text" for="updategameprofileimgfield">Profile Image</label>
											<input type="file" class="form-control" id="updategameprofileimgfield" name="updategame_profileimg" onchange="FilevalidationUpdProfile()">
										</div>
										<p class="text-danger mb-3">Profile Image must be of aspect ratio W400 x H600</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-1">
											<label class="input-group-text" for="updategameadvimg1field">Advert Image 1</label>
											<input type="file" class="form-control" id="updategameadvimg1field" name="updategame_adv1img" onchange="FilevalidationUpdAdv1()">
										</div>
										<p class="text-danger mb-3">Advert Image must be of aspect ratio W800 x H800</p>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-1">
											<label class="input-group-text" for="updategameadvimg2field">Advert Image 2</label>
											<input type="file" class="form-control" id="updategameadvimg2field" name="updategame_adv2img" onchange="FilevalidationUpdAdv2()">
										</div>
										<p class="text-danger mb-3">Advert Image must be of aspect ratio W800 x H800</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-1">
											<label class="input-group-text" for="updategameadvimg3field">Advert Image 3</label>
											<input type="file" class="form-control" id="updategameadvimg3field" name="updategame_adv3img" onchange="FilevalidationUpdAdv3()">
										</div>
										<p class="text-danger mb-3">Advert Image must be of aspect ratio W800 x H800</p>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-1">
											<label class="input-group-text" for="updategameadvimg4field">Advert Image 4</label>
											<input type="file" class="form-control" id="updategameadvimg4field" name="updategame_adv4img" onchange="FilevalidationUpdAdv4()">
										</div>
										<p class="text-danger mb-3">Advert Image must be of aspect ratio W800 x H800</p>
									</div>
								</div>
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text" id="updategamevideolinkfield">Video Link</span>
									<input type="text" class="form-control" placeholder="www.playdestiny.com/trailer1" name="updategame_videolink" pattern="[A-Za-z0-9!?@#$%^&*()-=_+,./\<> ]+" minlength="4" maxlength="500" title="Input a website using letters (UPPERCASE or lowercase), numbers and valid symbols only.">
								</div>
								
								<h5>Pricing</h5>
								<hr class="mt-0 mb-1">
								<div class="row">
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text" id="updategamebasepricefield">Base Price (Ksh)</span>
											<input type="number" class="form-control" placeholder="6499" name="updategame_baseprice" pattern="[0-9]+" minlength="1" maxlength="10">
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-sm mb-1">
											<span class="input-group-text" id="updategamesalepercentfield">Sale Percent (%)</span>
											<input type="number" class="form-control" placeholder="25" name="updategame_salepercent" pattern="[0-9]+" minlength="1" maxlength="2">
										</div>
										<p class="text-danger mb-3">Input 0 for no sale percentage</p>
									</div>
								</div>
								
								<div>
									<button type="submit" class="btn btn-primary col-md-4" name="submit_updategame">Update Game</button>
								</div>
								
							</form>
							
						</div>
					</div>
				</div>
			</div>
			
		<!-- ____________________________________________________________________________________________________________________ -->
					</div>
				</div>
			</div>
			
			<div class="row mt-2 bg-dark custom_border_radius_5">
				<div class="col-lg-12">
					<div class="my-2">
						<h4 class="text-white">Accounts: Users</h4>
						<div class="container-lg mb-2 bg-light custom_border_radius_5 custom_div_height_400  custom_div_overflow_y">
							<?php require "../backend/management_userlist.php"; ?>
						</div>
						<form method="POST">
							<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#adduser_modal'>ADD USER</button>
							<button type='button' class='btn btn-primary mx-2' data-bs-toggle='modal' data-bs-target='#updateuser_modal'>UPDATE USER</button>
							<button type='submit' class='btn btn-success' name="submit_printusers">EXPORT USER LIST [ <?php echo $_SESSION["manage_noofusers"]; ?> ]</button>
						</form>
		<!-- ____________________________________________________________________________________________________________________ -->
		
		<div class="modal" id="adduser_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addUserButtonLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Add User</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					
						<form method="POST">
					
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="addusernamefield">Name</span>
								<input type="text" class="form-control" placeholder="Joseph Hughs" name="user_name" pattern="[A-Za-z ]+" minlength="1" maxlength="25" title="Input your name using letters (UPPERCASE or lowercase) only." required>
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="adduserusernamefield">Username</span>
								<input type="text" class="form-control" placeholder="BigJosephH123" name="user_username" pattern="[A-Za-z0-9@#&_-+ ]+" minlength="5" maxlength="25" title="Input a username using letters (UPPERCASE or lowercase) and numbers only." required>
							</div>
							<div class="form-check mb-3">
								<input class="form-check-input" type="checkbox" value="1" id="adduserlevelfield" name="user_level">
								<label class="form-check-label" for="adduserlevelfield">Administrator</label>
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
								<span class="input-group-text" id="adduserpnumberfield">Phone Number</span>
								<input type="text" class="form-control" placeholder="0555-555-555" name="user_pnumber" pattern="[0-9]+" minlength="7" maxlength="10" required>
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="adduseremailfield">E-mail</span>
								<input type="email" class="form-control" placeholder="j.hughs@example.com" name="user_email" pattern="[A-Za-z0-9._@]+" minlength="5" maxlength="30" required>
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="adduserpasswordfield">Password</span>
								<input type="password" class="form-control" id="pass" name="user_password" minlength="7" maxlength="15" required>
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="addusercpasswordfield">Confirm Password</span>
								<input type="password" class="form-control" id="confirm_pass" name="user_cpassword" minlength="7" maxlength="15"  onkeyup="validate_password()" required>
							</div>
							
							<div>
								<button type="submit" class="btn btn-primary col-12" id="confirm_button" name="submit_adduser">Add User</button>
							</div>
							<span id="wrong_pass_alert"></span>
						</form>
						
					</div>
				</div>
			</div>
		</div>
			
		<div class="modal" id="updateuser_modal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateUserButtonLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Update User Details</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					
						<form method="POST">
						
							<div class="row">
								<div class="col-md-4">
									<div class="input-group input-group-sm mb-3">
										<span class="input-group-text" id="updateuseridfield">User ID</span>
										<input type="number" class="form-control" placeholder="134" name="updateuser_id" pattern="[0-9]+" minlength="1" maxlength="10" title="Input a user id using numbers only." required>
									</div>
								</div>
								<div class="col-md-8">									
									<div class="input-group input-group-sm mb-3">
										<span class="input-group-text" id="updateusernamefield">Name</span>
										<input type="text" class="form-control" placeholder="Joseph Hughs" name="updateuser_name" pattern="[A-Za-z ]+" minlength="1" maxlength="25" title="Input a name using letters (UPPERCASE or lowercase) only.">
									</div>
								</div>
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="updateuserusernamefield">Username</span>
								<input type="text" class="form-control" placeholder="BigJosephH123" name="updateuser_username" pattern="[A-Za-z0-9@#&_-+ ]+" minlength="5" maxlength="25" title="Input a username using letters (UPPERCASE or lowercase) and numbers only.">
							</div>
							<div class="form-check mb-3">
								<input class="form-check-input" type="checkbox" value="1" id="updateuserlevelfield" name="updateuser_level">
								<label class="form-check-label" for="updateuserlevelfield">Administrator</label>
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text">Country</span>
								<select class="form-select" name="updateuser_country">
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
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="updateuserpnumberfield">Phone Number</span>
								<input type="text" class="form-control" placeholder="0555-555-555" name="updateuser_pnumber" pattern="[0-9]+" minlength="7" maxlength="10">
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="updateuseremailfield">E-mail</span>
								<input type="email" class="form-control" placeholder="j.hughs@example.com" name="updateuser_email" pattern="[A-Za-z0-9._@]+" minlength="5" maxlength="30">
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="updateuserpasswordfield">Password</span>
								<input type="password" class="form-control" id="updpass" name="updateuser_password" minlength="7" maxlength="15">
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="updateusercpasswordfield">Confirm Password</span>
								<input type="password" class="form-control" id="confirm_updpass" name="updateuser_cpassword" minlength="7" maxlength="15"  onkeyup="validate_updpassword()">
							</div>
							
							<div>
								<button type="submit" class="btn btn-primary col-12" id="confirm_updbutton" name="submit_updateuser">Update User</button>
							</div>
							<span id="wrong_pass_alert"></span>
						</form>
						
					</div>
				</div>
			</div>
		</div>
		
		<!-- ____________________________________________________________________________________________________________________ -->
					</div>
				</div>
			</div>
			
			<div class="row mt-2 bg-dark custom_border_radius_5">
				<div class="col-lg-12">
					<div class="my-2">
						<h4 class="text-white">Records: Purchase List</h4>
						<div class="container-lg my-2 bg-light custom_border_radius_5 custom_div_height_400 custom_div_overflow_y">
							<?php require "../backend/management_transactlist.php"; ?>
						</div>
						<!--<form method="POST">-->
							<div class="my-2">
								<!--<button type='submit' class='btn btn-success' name="submit_printweektransactions">EXPORT PAST WEEK LIST</button>
								<button type='submit' class='btn btn-success mx-1' name="submit_printmonthtransactions">EXPORT PAST MONTH LIST</button>-->
								<button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#datesel_modal'>EXPORT PURCHASE LIST</button>
								<button type='button' class='btn btn-success mx-1' data-bs-toggle='modal' data-bs-target='#datavisual_modal'>PURCHASE HISTORY</button>
							</div>
						<!--</form>-->
						
						<!-- ____________________________________________________________________________________________________________________ -->
		
		<div class="modal" id="datesel_modal" tabindex="-1" aria-labelledby="dateSelButtonLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Select Date Range to Export</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					
						<form method="POST">
							
							<div>
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text">Start Date (toward Past)</span>
									<input type="date" class="form-control" placeholder="dd-mm-yyyy" name="dateselect_low">
								</div>
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text">End Date (toward Present Day)</span>
									<input type="date" class="form-control" placeholder="dd-mm-yyyy" name="dateselect_high">
								</div>
							
								<button type="submit" class="btn btn-primary col-12" name="submit_printtransactions">Export List</button>
							</div>
							
						</form>
						
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal" id="datavisual_modal" tabindex="-1" aria-labelledby="dataVisualButtonLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Purchase History</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					
						<script type="text/javascript">
							google.load("visualization", "45", {packages:["corechart"]});
							
							google.setOnLoadCallback(drawChart);
							
							function drawChart()
							{
								var data = google.visualization.arrayToDataTable
								([
									['date','purchases'],
									
									<?php
										require "../backend/dbconnect_transact.php";
										
										$query = "SELECT COUNT(id), date FROM purchaselist GROUP BY date ORDER BY date ASC LIMIT 10";

										$exec = mysqli_query($conn,$query);
										while($row = mysqli_fetch_array($exec))
										{
											echo "['" . $row['date'] . "'," . $row['COUNT(id)'] . "],";
										}
									 ?> 
								]);

								var options = {
									title: '',
									width: '850',
									height: '250',
									legend: 'none'
								};
								
								var chart = new google.visualization.LineChart(document.getElementById("purchaseHistoryChart"));
								
								chart.draw(data,options);
							}
							
						</script>
					
						<div id="purchaseHistoryChart" class="w-100"></div>
						
					</div>
				</div>
			</div>
		</div>
		
		<!-- ____________________________________________________________________________________________________________________ -->
						
					</div>
				</div>
			</div>
				
			<div class="row mt-2 bg-dark custom_border_radius_5">
				<div class="col-lg-12">
					<div class="my-2">
						<h4 class="text-white">Accounts: Feedback</h4>
						<div class="container-lg my-2 bg-light custom_border_radius_5 custom_div_height_400 custom_div_overflow_y">
							<?php require "../backend/management_feedbacklist.php"; ?>
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
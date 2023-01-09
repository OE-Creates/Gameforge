<?php
	require "../backend/core_logic.php";
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
		
		<!-- _____BODY___________________________________________________________________________________________________________ -->
		
		<div class="container">
		
			<div class="custom_navbar_space"></div>
			
			<div class="row mt-1 bg-dark custom_border_radius_5">
				<div class="col">
					<div>
						<form method="POST">
							
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="addgamenamefield">Name</span>
								<input type="text" class="form-control" placeholder="Destiny 2" name="addgame_name" pattern="[A-Za-z0-9!?@#$%^&*()-=_+,./\<> ]+" minlength="1" maxlength="40" title="Input your name using letters (UPPERCASE or lowercase), numbers and valid symbols only." required>
							</div>
							
							<h5 class="text-white">Details</h5>
							<hr class="mt-0 mb-1" style="color: #ffffff;">
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
											<option selected value="Shooter">Shooter</option>
											<option value="Fighting">Fighting</option>
											<option value="Stealth">Stealth</option>
											<option value="Survival">Survival</option>
											<option value="Rhythm">Rhythm</option>
											<option value="Survival-Horror">Survival-Horror</option>
											<option value="Metriodvania">Metriodvania</option>
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
											<option value="Shooter">Shooter</option>
											<option value="Fighting">Fighting</option>
											<option value="Stealth">Stealth</option>
											<option value="Survival">Survival</option>
											<option value="Rhythm">Rhythm</option>
											<option value="Survival-Horror">Survival-Horror</option>
											<option value="Metriodvania">Metriodvania</option>
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
											<option value="Shooter">Shooter</option>
											<option value="Fighting">Fighting</option>
											<option value="Stealth">Stealth</option>
											<option value="Survival">Survival</option>
											<option value="Rhythm">Rhythm</option>
											<option value="Survival-Horror">Survival-Horror</option>
											<option value="Metriodvania">Metriodvania</option>
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
							<div class="form-check mb-3 text-white">
								<input class="form-check-input" type="checkbox" value="1" id="addgameinapppurchasefield" name="addgame_inapppurchase">
								<label class="form-check-label" for="addgameinapppurchasefield">In-App Purchases</label>
							</div>
							
							<h5 class="text-white">Images/Videos</h5>
							<hr class="mt-0 mb-1" style="color: #ffffff;">
							<div class="row">
								<div class="col-md-6">
									<div class="input-group input-group-sm mb-1">
										<label class="input-group-text" for="addgamebannerimgfield">Banner Image</label>
										<input type="file" class="form-control" id="addgamebannerimgfield" name="addgame_bannerimg" required>
									</div>
									<p class="text-danger mb-3">Banner Image must be of aspect ratio W800 x H300</p>
								</div>
								<div class="col-md-6">
									<div class="input-group input-group-sm mb-1">
										<label class="input-group-text" for="addgameprofileimgfield">Profile Image</label>
										<input type="file" class="form-control" id="addgameprofileimgfield" name="addgame_profileimg" required>
									</div>
									<p class="text-danger mb-3">Profile Image must be of aspect ratio W400 x H600</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="input-group input-group-sm mb-1">
										<label class="input-group-text" for="addgameadvimg1field">Advert Image 1</label>
										<input type="file" class="form-control" id="addgameadvimg1field" name="addgame_adv1img" required>
									</div>
									<p class="text-danger mb-3">Advert Image must be of aspect ratio W800 x H800</p>
								</div>
								<div class="col-md-6">
									<div class="input-group input-group-sm mb-1">
										<label class="input-group-text" for="addgameadvimg2field">Advert Image 2</label>
										<input type="file" class="form-control" id="addgameadvimg2field" name="addgame_adv2img" required>
									</div>
									<p class="text-danger mb-3">Advert Image must be of aspect ratio W800 x H800</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="input-group input-group-sm mb-1">
										<label class="input-group-text" for="addgameadvimg3field">Advert Image 3</label>
										<input type="file" class="form-control" id="addgameadvimg3field" name="addgame_adv3img" required>
									</div>
									<p class="text-danger mb-3">Advert Image must be of aspect ratio W800 x H800</p>
								</div>
								<div class="col-md-6">
									<div class="input-group input-group-sm mb-1">
										<label class="input-group-text" for="addgameadvimg4field">Advert Image 4</label>
										<input type="file" class="form-control" id="addgameadvimg4field" name="addgame_adv4img" required>
									</div>
									<p class="text-danger mb-3">Advert Image must be of aspect ratio W800 x H800</p>
								</div>
							</div>
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text" id="addgamevideolinkfield">Video Link</span>
								<input type="text" class="form-control" placeholder="www.playdestiny.com/trailer1" name="addgame_videolink" pattern="[A-Za-z0-9!?@#$%^&*()-=_+,./\<> ]+" minlength="4" maxlength="255" title="Input a website using letters (UPPERCASE or lowercase), numbers and valid symbols only.">
							</div>
							
							<h5 class="text-white">Pricing</h5>
							<hr class="mt-0 mb-1" style="color: #ffffff;">
							<div class="row">
								<div class="col-md-6">
									<div class="input-group input-group-sm mb-3">
										<span class="input-group-text" id="addgamebasepricefield">Base Price</span>
										<input type="text" class="form-control" placeholder="6499" name="addgame_baseprice" pattern="[0-9]+" minlength="0" maxlength="10" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group input-group-sm mb-1">
										<span class="input-group-text" id="addgamesalepricefield">Sale Price</span>
										<input type="text" class="form-control" placeholder="5499" name="addgame_saleprice" pattern="[0-9]+" minlength="0" maxlength="10" required>
									</div>
									<p class="text-danger mb-3">Sale Price = Base Price, if the game is not on sale</p>
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
		<!-- ____________________________________________________________________________________________________________________ -->
		
		<!-- _____FOOTER_________________________________________________________________________________________________________ -->
		
		<nav class="navbar navbar-expand-lg">
			<div class="container navbar-dark bg-dark custom_border_radius_5">
				<p class="d-flex justify-content-between text-white my-2">GameForge: <a class="nav-link mx-4" href="policy.php">Policies</a><a class="nav-link me-4" href="legal.php">Legal</a><a class="nav-link" href="support.php">Support</a></p>
			</div>
		</nav>
		 
		 <!-- ____________________________________________________________________________________________________________________ -->
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	</body>
</html>
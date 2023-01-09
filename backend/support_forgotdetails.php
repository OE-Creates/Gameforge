<?php
	//echo "contact-form_logic_script loaded successfully";
	
	if (isset($_SESSION["user_loggedin"]))
	{
		echo "
			<p class='text-warning'>
				Hooray! You're logged in so you clearly haven't forgotten your log in credentials.
			</p>
			";
	}
	else
	{
		echo "
			<div class='text-warning'>
				<p>Please enter the e-mail address you used to create your account.</p>
			</div>
			<div class='row'>
				<div class='col-lg-6'>
					<div class='mb-2'>
						<label for='inputEmail' class='form-label text-white'>Email address</label>
						<input type='email' class='form-control' id='inputEmail' name='forgotdetails_email' aria-describedby='emailHelp' pattern='[A-Za-z0-9._@]+' minlength='5' maxlength='30' required>
					</div>
					<div class='mt-5 text-warning'>
						<p>Please input the credential you currently know. Enter <a href='#' class='custom_colored_text_danger'>either</a> your current <a href='#' class='custom_colored_text_info'>USERNAME</a> or your current <a href='#' class='custom_colored_text_info'>PASSWORD</a>. <a href='#' class='custom_colored_text_danger'>NOT BOTH!</a>.</p>
					</div>
					<div class='mb-2'>
						<label for='inputUsername' class='form-label text-white'>Username</label>
						<input type='text' class='form-control' id='resetInputUsername' name='forgotdetails_username' aria-describedby='usernameHelp' pattern='[A-Za-z0-9@#&_-+ ]+' minlength='5' maxlength='25' title='Input a username using letters (UPPERCASE or lowercase) and numbers only.' onkeyup='Block_PasswordField()'>
					</div>
					<div class='mt-1 text-warning'>
						<p>If your credentials are verified, you will be able to log in with your current username and <a href='#' class='custom_colored_text_info'>PASSWORD: Password@12345</a>.</p>
					</div>
					<div class='mb-2'>
						<label for='inputPassword' class='form-label text-white'>Password</label>
						<input type='password' class='form-control' id='resetInputPassword' name='forgotdetails_password' aria-describedby='passwordHelp' minlength='7' maxlength='15' onkeyup='Block_UsernameField()'>
					</div>
					<div class='mt-1 text-warning'>
						<p>If your credentials are verified, you will be able to log in with your current password and <a href='#' class='custom_colored_text_info'>USERNAME: TempResetAccount</a>.</p>
					</div>
					<div>
						<button type='submit' class='btn btn-primary col-6' name='submit_forgotdetails'>Submit</button>
					</div>
				</div>
			</div>
			";
	}
?>
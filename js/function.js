//Homepage password validation
function validate_password() {

	var pass = document.getElementById('pass').value;
	var confirm_pass = document.getElementById('confirm_pass').value;
	if (pass != confirm_pass) {
		document.getElementById('wrong_pass_alert').style.color = 'red';
		document.getElementById('wrong_pass_alert').innerHTML = '☒ Passwords do not match';
		document.getElementById('confirm_button').disabled = true;
		document.getElementById('confirm_button').style.opacity = (0.4);
	}
	else {
		document.getElementById('wrong_pass_alert').style.color = 'green';
		document.getElementById('wrong_pass_alert').innerHTML = '🗹 Passwords Matched';
		document.getElementById('confirm_button').disabled = false;
		document.getElementById('confirm_button').style.opacity = (1);
	}
}

function validate_setpassword() {

	var pass = document.getElementById('setpass').value;
	var confirm_pass = document.getElementById('confirm_setpass').value;
	if (pass != confirm_pass) {
		document.getElementById('wrong_pass_alert').style.color = 'red';
		document.getElementById('wrong_pass_alert').innerHTML = '☒ Passwords do not match';
		document.getElementById('confirm_setbutton').disabled = true;
		document.getElementById('confirm_setbutton').style.opacity = (0.4);
	}
	else {
		document.getElementById('wrong_pass_alert').style.color = 'green';
		document.getElementById('wrong_pass_alert').innerHTML = '🗹 Passwords Matched';
		document.getElementById('confirm_setbutton').disabled = false;
		document.getElementById('confirm_setbutton').style.opacity = (1);
	}
}

function validate_updpassword() {

	var pass = document.getElementById('updpass').value;
	var confirm_pass = document.getElementById('confirm_updpass').value;
	if (pass != confirm_pass) {
		document.getElementById('wrong_pass_alert').style.color = 'red';
		document.getElementById('wrong_pass_alert').innerHTML = '☒ Passwords do not match';
		document.getElementById('confirm_updbutton').disabled = true;
		document.getElementById('confirm_updbutton').style.opacity = (0.4);
	}
	else {
		document.getElementById('wrong_pass_alert').style.color = 'green';
		document.getElementById('wrong_pass_alert').innerHTML = '🗹 Passwords Matched';
		document.getElementById('confirm_updbutton').disabled = false;
		document.getElementById('confirm_updbutton').style.opacity = (1);
	}
}

//Management page > Add Game >> Image Size and extension validation.
function FilevalidationAddBanner() {
	const fi = document.getElementById('addgamebannerimgfield');
	// Check if any file is selected.
	
	var filePath = fi.value;
			 
	// Allowing file type
	var allowedExtensions = /(\.jpg|\.jpeg)$/i;
	 
	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type. Only .jpg/.jpeg allowed');
		fi.value = '';
	}
	else
	{
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert("File too Big, please select a file less than 2mb");
					fi.value = '';
				}
			}
		}
	}
}

function FilevalidationAddProfile() {
	const fi = document.getElementById('addgameprofileimgfield');
	// Check if any file is selected.
	
	var filePath = fi.value;
			 
	// Allowing file type
	var allowedExtensions = /(\.jpg|\.jpeg)$/i;
	 
	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type. Only .jpg/.jpeg allowed');
		fi.value = '';
	}
	else
	{
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert("File too Big, please select a file less than 2mb");
					fi.value = '';
				}
			}
		}
	}
}

function FilevalidationAddAdv1() {
	const fi = document.getElementById('addgameadvimg1field');
	// Check if any file is selected.
	
	var filePath = fi.value;
			 
	// Allowing file type
	var allowedExtensions = /(\.jpg|\.jpeg)$/i;
	 
	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type. Only .jpg/.jpeg allowed');
		fi.value = '';
	}
	else
	{
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert("File too Big, please select a file less than 2mb");
					fi.value = '';
				}
			}
		}
	}
}

function FilevalidationAddAdv2() {
	const fi = document.getElementById('addgameadvimg2field');
	// Check if any file is selected.
	
	var filePath = fi.value;
			 
	// Allowing file type
	var allowedExtensions = /(\.jpg|\.jpeg)$/i;
	 
	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type. Only .jpg/.jpeg allowed');
		fi.value = '';
	}
	else
	{
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert("File too Big, please select a file less than 2mb");
					fi.value = '';
				}
			}
		}
	}
}

function FilevalidationAddAdv3() {
	const fi = document.getElementById('addgameadvimg3field');
	// Check if any file is selected.
	
	var filePath = fi.value;
			 
	// Allowing file type
	var allowedExtensions = /(\.jpg|\.jpeg)$/i;
	 
	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type. Only .jpg/.jpeg allowed');
		fi.value = '';
	}
	else
	{
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert("File too Big, please select a file less than 2mb");
					fi.value = '';
				}
			}
		}
	}
}

function FilevalidationAddAdv4() {
	const fi = document.getElementById('addgameadvimg4field');
	// Check if any file is selected.
	
	var filePath = fi.value;
			 
	// Allowing file type
	var allowedExtensions = /(\.jpg|\.jpeg)$/i;
	 
	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type. Only .jpg/.jpeg allowed');
		fi.value = '';
	}
	else
	{
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert("File too Big, please select a file less than 2mb");
					fi.value = '';
				}
			}
		}
	}
}

//------------------------

function FilevalidationUpdBanner() {
	const fi = document.getElementById('updategamebannerimgfield');
	// Check if any file is selected.
	
	var filePath = fi.value;
			 
	// Allowing file type
	var allowedExtensions = /(\.jpg|\.jpeg)$/i;
	 
	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type. Only .jpg/.jpeg allowed');
		fi.value = '';
	}
	else
	{
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert("File too Big, please select a file less than 2mb");
					fi.value = '';
				}
			}
		}
	}
}

function FilevalidationUpdProfile() {
	const fi = document.getElementById('updategameprofileimgfield');
	// Check if any file is selected.
	
	var filePath = fi.value;
			 
	// Allowing file type
	var allowedExtensions = /(\.jpg|\.jpeg)$/i;
	 
	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type. Only .jpg/.jpeg allowed');
		fi.value = '';
	}
	else
	{
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert("File too Big, please select a file less than 2mb");
					fi.value = '';
				}
			}
		}
	}
}

function FilevalidationUpdAdv1() {
	const fi = document.getElementById('updategameadvimg1field');
	// Check if any file is selected.
	
	var filePath = fi.value;
			 
	// Allowing file type
	var allowedExtensions = /(\.jpg|\.jpeg)$/i;
	 
	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type. Only .jpg/.jpeg allowed');
		fi.value = '';
	}
	else
	{
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert("File too Big, please select a file less than 2mb");
					fi.value = '';
				}
			}
		}
	}
}

function FilevalidationUpdAdv2() {
	const fi = document.getElementById('updategameadvimg2field');
	// Check if any file is selected.
	
	var filePath = fi.value;
			 
	// Allowing file type
	var allowedExtensions = /(\.jpg|\.jpeg)$/i;
	 
	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type. Only .jpg/.jpeg allowed');
		fi.value = '';
	}
	else
	{
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert("File too Big, please select a file less than 2mb");
					fi.value = '';
				}
			}
		}
	}
}

function FilevalidationUpdAdv3() {
	const fi = document.getElementById('updategameadvimg3field');
	// Check if any file is selected.
	
	var filePath = fi.value;
			 
	// Allowing file type
	var allowedExtensions = /(\.jpg|\.jpeg)$/i;
	 
	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type. Only .jpg/.jpeg allowed');
		fi.value = '';
	}
	else
	{
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert("File too Big, please select a file less than 2mb");
					fi.value = '';
				}
			}
		}
	}
}

function FilevalidationUpdAdv4() {
	const fi = document.getElementById('updategameadvimg4field');
	// Check if any file is selected.
	
	var filePath = fi.value;
			 
	// Allowing file type
	var allowedExtensions = /(\.jpg|\.jpeg)$/i;
	 
	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type. Only .jpg/.jpeg allowed');
		fi.value = '';
	}
	else
	{
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 2048) {
					alert("File too Big, please select a file less than 2mb");
					fi.value = '';
				}
			}
		}
	}
}

function Block_UsernameField() {
	
}

function Block_PasswordField() {
	
}
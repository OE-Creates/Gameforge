<?php
	$conn = new mysqli("localhost", "root", "", "gameforgetransact");
	if($conn->connect_errno > 0)
	{
		die('Connection failed [' . $conn->connect_error . ']');
	}
?>
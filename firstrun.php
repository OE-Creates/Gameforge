<?php

	$conn = new mysqli("localhost", "root", "");
	if($conn->connect_errno > 0)
	{
		die('Connection failed [' . $conn->connect_error . ']');
	}

	$sql = "CREATE DATABASE gameforgeaccount";
	if ($conn->query($sql) === TRUE)
	{
		echo "Database created successfully";
	} 
	else 
	{
		echo "Error creating database: " . $conn->error;
	}
	
	$sql = "CREATE DATABASE gameforgetransact";
	if ($conn->query($sql) === TRUE)
	{
		echo "Database created successfully";
	} 
	else 
	{
		echo "Error creating database: " . $conn->error;
	}

	$conn = new mysqli("localhost", "root", "", "gameforgeaccount");
	if($conn->connect_errno > 0)
	{
		die('Connection failed [' . $conn->connect_error . ']');
	}

	$createtable = "CREATE TABLE users (id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT, name VARCHAR(25) NOT NULL, username VARCHAR(25) NOT NULL, country VARCHAR(20) NOT NULL, phonenumber INT(10) NOT NULL, email VARCHAR(30) NOT NULL, password VARBINARY(1000) NOT NULL, level TINYINT(1) NOT NULL, loggedin TINYINT(1) NOT NULL)";
	$create = $conn->query($createtable);
	if ($create)
	{
	}
	
	$createtable = "CREATE TABLE wishlists (userid INT(10) NOT NULL, gameid INT(10) NOT NULL)";
	$create = $conn->query($createtable);
	if ($create)
	{
	}
	
	$createtable = "CREATE TABLE games (id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT, name VARCHAR(40) NOT NULL, description VARCHAR(255) NOT NULL, url VARCHAR(255), genre VARCHAR(25) NOT NULL, gameplayone VARCHAR(25) NOT NULL, gameplaytwo VARCHAR(25) NOT NULL, gameplaythree VARCHAR(25) NOT NULL, gameplayfour VARCHAR(25) NOT NULL, gameplayfive VARCHAR(25) NOT NULL, platform VARCHAR(255) NOT NULL, bannerimage VARCHAR(125) NOT NULL, imageone VARCHAR(125) NOT NULL, imagetwo VARCHAR(125) NOT NULL, imagethree VARCHAR(125) NOT NULL, imagefour VARCHAR(125) NOT NULL, imagefive VARCHAR(125) NOT NULL, imagesix VARCHAR(125) NOT NULL, inapppurchases TINYINT(1) NOT NULL, africanmade TINYINT(1) NOT NULL, releasestatus VARCHAR(30) NOT NULL, videolink VARCHAR(125), baseprice INT(10) NOT NULL, salepercent INT(2) NOT NULL, saleprice INT(10) NOT NULL)";
	$create = $conn->query($createtable);
	if ($create)
	{
	}
	
	$createtable = "CREATE TABLE reviews (gameid INT(10) NOT NULL, userid INT(10) NOT NULL, date DATE NOT NULL DEFAULT CURRENT_TIMESTAMP, rating INT(1) NOT NULL, comment VARCHAR(240) NOT NULL)";
	$create = $conn->query($createtable);
	if ($create)
	{
	}
	
	$createtable = "CREATE TABLE feedback (id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT, feedback_info VARCHAR(255) NOT NULL)";
	$create = $conn->query($createtable);
	if ($create)
	{
	}
	
	$conn = new mysqli("localhost", "root", "", "gameforgetransact");
	if($conn->connect_errno > 0)
	{
		die('Connection failed [' . $conn->connect_error . ']');
	}
	
	$createtable = "CREATE TABLE purchaselist (id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT, date DATE NOT NULL DEFAULT CURRENT_TIMESTAMP, userid INT(10) NOT NULL, gameid INT(10) NOT NULL, transactionid VARCHAR(125) NOT NULL, transactioncode VARCHAR(15) NOT NULL, baseprice INT(10) NOT NULL, purchaseprice INT(10) NOT NULL, salepercent INT(2) NOT NULL)";
	$create = $conn->query($createtable);
	if ($create)
	{
	}
	
	$conn->close();
	
	echo "	
			-> Exit GameForge through XAMPP<br>
			-> Rename 'index.php' to 'firstrun.php'<br>
			-> Rename 'index-BAK.php' to 'index.php'<br>
			-> Load GameForge through XAMPP
		";
?>
<?php
	$mysqlUserName = 'root';
	$mysqlPassword = 'root';
	$dbName = 'smart city';
	$host = 'localhost';
	$port = 3306;

	$conn = mysqli_connect(
	   $host,
	   $mysqlUser,
	   $mysqlPassword,
	   $db,
	   $port
	);
	$conn = new PDO("mysql:host=$host;dbname=$dbName;port=$port", $mysqlUserName, $mysqlPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
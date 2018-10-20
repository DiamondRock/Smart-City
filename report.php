<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $latitude = test-input($_POST['latitude']);
        $longitude = test-input($_POST['longitude']);
        $image = test-input($_POST['image']);
        $type = test-input($_POST['type']);
        $name = test-input($_POST['name']);
        $phoneNo = test-input($_POST['phoneNo']);
        $eventDateTime = test-input($_POST['eventDateTime']);
        $status = test-input($_POST['status']);
        $important = test-input($_POST['important']);
        $urgent = test-input($_POST['urgent']);
        require_once('connectDB.php');

        $reportDateTime = $_POST['reportDateTime'];

        $query = "INSERT INTO event (latitude, longitude, image, type, name, phoneNo, reportDateTime, eventDateTime, status, important, urgent) VALUES (:latitude, :longitude, :image, :type, :name, :phoneNo, reportDateTime, :eventDateTime, :status, :important, :urgent)";
        $params = [$latitude, $longitude, $image, $type, $name, $phoneNo, $eventDateTime, $status, $important, $urgent];
        executeQuery($conn, $query, $params);
        // prepare and bind

        // set parameters and execute
        $firstname = "John";
        $lastname = "Doe";
        $email = "john@example.com";
        $stmt->execute();

        $firstname = "Mary";
        $lastname = "Moe";
        $email = "mary@example.com";
        $stmt->execute();

        $firstname = "Julie";
        $lastname = "Dooley";
        $email = "julie@example.com";
        $stmt->execute();

        echo "New records created successfully";

        $stmt->close();
        $conn->close();


    }
    function test_input($data)
    {
    	$data = trim($data);
    	$data = stripslashes($data);
    	$data = htmlspecialchars($data);
    	return $data;
    }
    function executeQuery($conn, $query, $params)
    {
        try
        {
            $stmt = $conn->prepare($query);
            $stmt->execute();
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
?>
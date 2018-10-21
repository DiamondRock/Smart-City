<?php
    // $query = "INSERT INTO event (latitude, longitude, image, type, name, phoneNo, reportDateTime, eventDateTime, status, important, urgent) VALUES (:latitude, :longitude, :image, :type, :name, :phoneNo, reportDateTime, :eventDateTime, :status, :important, :urgent)";
    // $params = [2.2, 2.2, NULL, "1", "John", "9999999", "2018", "2018", "open", 0, 0];
    // require_once('connectDB.php');
    // executeQuery($conn, $query, $params);
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        echo "posting";
        $latitude = test_input($_POST['latitude']);
        echo $_POST['latitude'];
        echo $_POST;
        $longitude = test_input($_POST['longitude']);
        $image = test_input($_POST['image']);
        $type = test_input($_POST['type']);
        $name = test_input($_POST['name']);
        $phoneNo = test_input($_POST['phoneNo']);
        $eventDateTime = test_input($_POST['eventDateTime']);
        $status = test_input($_POST['status']);
        $important = test_input($_POST['important']);
        $urgent = test_input($_POST['urgent']);
        echo $urgent;
        require_once('connectDB.php');

        $reportDateTime = $_POST['reportDateTime'];

        $query = "INSERT INTO event (latitude, longitude, image, type, name, phoneNo, reportDateTime, eventDateTime, status, important, urgent) VALUES (:latitude, :longitude, :image, :type, :name, :phoneNo, reportDateTime, :eventDateTime, :status, :important, :urgent)";
        $params = [$latitude, $longitude, $image, $type, $name, $phoneNo, $eventDateTime, $status, $important, $urgent];
        executeQuery($conn, $query, $params);
        $conn->close();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'GET') 
    {
        echo "get";
        $foo = $_PUT['foo'];
        $latitude = test_input($_GET['latitude']);
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
            $regex = "/(\:[A-Za-z][A-Za-z0-9]*)(?:,|\))/";
            preg_match_all($regex, $query, $matches, PREG_OFFSET_CAPTURE);
            $matches = $matches[0];
            $counter = 0;
            foreach ($matches as $array)
            {
                //echo substr($array[0], 0, strlen($array[0]) - 1)."<br>";
                $stmt->bindParam(substr($array[0], 0, strlen($array[0]) - 1), $params[$counter]);
                $counter++;
            }
            $stmt->execute();
            $stmt->close();
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
?>
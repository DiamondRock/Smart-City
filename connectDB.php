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
    function executeQuery($conn, $query, $params, $queryIsUpdateOrInsert = TRUE)
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
                $stmt->bindParam(substr($array[0], 0, strlen($array[0]) - 1), $params[$counter]);
                //echo substr($array[0], 0, strlen($array[0]) - 1) . ":   " . $params[$counter] . "  END\n";
                $counter++;
            }
            $stmt->execute();
            if($queryIsUpdateOrInsert)
            {
                $stmt = null;
                return TRUE;
            }
            else
            {
                return $stmt;
            }
        }
        catch(PDOException $e)
        {
            return [FALSE, $e->getMessage()];
        }
    }
?>
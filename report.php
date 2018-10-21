<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        try
        {
            $valid = checkIfDataIsValid();
            if(!is_bool($valid))
            {
                throw new Exception($valid[1]);
            }
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            $image = $_POST['image'];
            $type = $_POST['type'];
            $name = $_POST['name'];
            $phoneNo = $_POST['phoneNo'];
            $important = $_POST['important'];
            $urgent = $_POST['urgent'];
            $description = $_POST['description'];
            [$latitude, $longitude, $image, $type, $name, $phoneNo, $important, $urgent, $description]
            = test_input_all($latitude, $longitude, $image, $type, $name, $phoneNo, $important, $urgent, $description);
            if(empty($important))
            {
                $important = 0;
            }
            if(empty($urgent))
            {
                $urgent = 0;
            }

            if(empty($image) && empty($description))
            {
                //throw new Exception("Either description or image should be present");
            }

            $reportDateTime = date("c");
            $status = "pending";

            require_once('connectDB.php');
            $query = "INSERT INTO event (latitude, longitude, image, type, name, phoneNo,
                reportDateTime, status, important, urgent, description) VALUES (:latitude, :longitude, :image, :type, :name,
                :phoneNo, :reportDateTime, :status, :important, :urgent, :description)";
            $params = [$latitude, $longitude, $image, $type, $name, $phoneNo,
                $reportDateTime, $status, $important, $urgent, $description];
            $stmt = executeQuery($conn, $query, $params);
            if(!is_bool($stmt))
            {
                throw new Exception($stmt[1]);
            }
            $conn = null;
        }
        catch(Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
    function test_input($param)
    {
        if(is_null($param))
        {
            return $param;
        }
        $param = trim($param);
        $param = stripslashes($param);
        $param = htmlspecialchars($param);
    	return $param;
    }
    function checkIfDataIsValid()
    {
        $valid = AnyPostParamIsNull();
        if(!is_bool($valid))
        {
            return AnyPostParamIsNull();
        }
        return TRUE;
    }
    function AnyPostParamIsNull()
    {
        $postParamsNotNull = ['latitude', 'longitude', 'type'];
        foreach($postParamsNotNull as $param)
        {
            if(!isset($_POST[$param]))
            {
                return [FALSE, "$param is empty"];
            }
        }
        return True;
    }
    function test_input_all()
    {
        for ($i = 0; $i < func_num_args(); $i++)
        {
            $result[$i] = test_input(func_get_arg($i));
        }
        return $result;
    }

    function nullStringIfNull()
    {
        for ($i = 0; $i < func_num_args(); $i++)
        {
            if(func_get_arg($i) == '')
            {
                $result[$i] = "NULL";
            }
            else
            {
                $result[$i] = func_get_arg($i);
            }
        }
        return $result;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="script/showReports.js"></script>
	<!-- <script src="script/login.html.js"></script> -->
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="style/showReports.css">
	<title>Log in</title>
</head>
<body>
	<div id="main">
	<form class="signup" action = "login.php" method = "post">
		<table id="table" class="table-dark" align="center">
<?php
	try
	{
		require_once('connectDB.php');
		$query = "SELECT * from event where status='pending'";
		$params = [];
		$stmt = executeQuery($conn, $query, $params, false);
		$columnNames= ["id","Latitude","Longitude","Image","Type","Name","Phone number","ReportDateTime","Status","Important","Urgent","Description"];
		$str = "<tr>";
		for ($i = 0; $i < count($columnNames); $i++)
		{
			$str .= "<th>$columnNames[$i]</th>";
		}
		$str .= "</tr>";
		echo $str;
		
        //echo "came here";
        while ($row = $stmt->fetch(PDO::FETCH_BOTH))
        {
            //echo "came here";

            $str= "<tr>";
            for ($i = 0; $i < count($row); $i++)
            {
                if($i == 3) continue;
                $str .= "<td>$row[$i]</td>";
            }
            $str .= "</tr>";
            echo $str;
        }

		$conn = null;
	}
	catch(Exception $e)
	{
		echo "Error: " . $e->getMessage();
	}
?>
		</table>
	</form>
	</div>
</body>
</html>

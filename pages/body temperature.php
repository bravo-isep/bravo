<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bravo Smart Office</title>
</head>
<body>
	<div>
		<img />
		<div>Your body temperature</div>
		<div>36.8°C</div>
	</div>
	<button class="button" onclick="reportIllness()">
		<img />
		<div class="buttonText1">report</div>
		<div class="buttonText2">illness</div>
	</button>
	<table border="1"><!--Don't let those Level-1 see this table-->
		<tr>
			<td>EMPLOYEE NUMBER</td>
			<td>NAME</td>
		</tr>
		<?php
		$servername = "localhost";
                $username = "bravo";
                $password = "%K9dyF%RTj?%K=peUWeDpZj.";
                $dbname = "bravo";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                                           }
		$sql = "SELECT iduser, username FROM user";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
    echo "<table><tr><th>Employee Number</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["iduser"]. "</td><td>" . $row["username"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
	
</body>
</html> 

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Bravo Smart Office</title>
</head>

<body>
	<?php
	include("../models/health.php");
	$tem = getUserTemperature(getUserId());
    $All = getUserAllTemperature(getUserId());
	?>
	<div>
		<img src="./image/1.png" />
		<div>Your body_temperature</div>
		<div><?php echo $tem; ?></div>
	</div>
	<button class="button" onclick="reportIllness()">
		<img src="./image/1.png" />
		<div class="buttonText1">report</div>
		<div class="buttonText2">illness</div>
	</button>
	<table border="1">
		<!--Don't let those Level-1 see this table-->
		<tr>
			<td>DATE(DD/MM/YYYY)</td>
			<td>TEMPERATURE</td>
			<td>EMPLOYEE NUMBER</td>
			<td>NAME</td>
		</tr>
		<?php
		for ($i = 0; $i < count($All); $i++) {
			$time = $All[$i]['time'];
			$temperature = $All[$i]['temperature'];
            $id = $All[$i]['iduser'];
            $name = getUserName($All[$i]['iduser']);
			echo ("
					<tr>
						<td> $time </td>
						<td> $temperature </td>
						<td> $id </td>
						<td> $name </td>
					</tr>
				");
		}
		?>
	</table>
</body>

</html>
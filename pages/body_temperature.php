<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Bravo Smart Office</title>
</head>

<body>
	<?php
	include_once("../models/user.php");
	include_once("../models/health.php");
	$tem = getUserTemperature(getUserId());
	$All = getAllUserTemperature();
	$my = getMyUserTemperature(getUserId());
	?>
	<div class="page_title">
		<img src="./image/bodytem.png" />
		<div class="buttonText1">Your body temperature</div>
		<div class="buttonText2"><?php echo $tem; ?>°C</div>
	</div>
	<button class="button" id="report_illness" onclick="reportIllness()">
		<img src="./image/health.png" />
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
		if (getUserLevel(getUserId()) == 1) {
            for ($i = 0; $i < count($my); $i++) {
				$time = $my[$i]['time'];
				$temperature = $my[$i]['temperature'];
				$id = $my[$i]['iduser'];
				$name = getUserName($my[$i]['iduser']);
				echo ("
					<tr>
						<td> $time </td>
						<td> $temperature </td>
						<td> $id </td>
						<td> $name </td>
					</tr>
				");
			}
		} else {
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
		}

		?>
	</table>
</body>

</html>
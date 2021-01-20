<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Bravo Smart Office</title>
</head>

<body>
	<div class="page_title">
		<img src="./image/device.png" />
		<div class="buttonText2">Device</div>
		<div class="buttonText2">Management</div>
	</div>
	<table border="1">
		<tr>
			<td>DEVICE ID</td>
			<td>DEVICE TYPE</td>
			<td>ROOM</td>
			<td>MANAGEMENT</td>
		</tr>
		<?php
		include_once("../models/device.php");
		$allAc = getAc();
		$allIdAc = array_column($allAc, "idac_sys");
		foreach ($allIdAc as $id1) {
			$acRoom = getAcRoom($id1);
			echo ("
					<tr>
						<td>AC#$id1</td>
						<td>Air Conditioner</td>
						<td>Room $acRoom</td>
						<td>
							<button class=\"delete\">Delete</button>
							<button class=\"log\">Log</button> <!--you can delete this, and also any other elements in any other files in order to fit the database-->
						</td>
					</tr>
				");
		}
		$allLight = getLight();
		$allIdLight = array_column($allLight, "idlighting_sys");
		foreach ($allIdLight as $id2) {
			$lightRoom = getLightRoom($id2);
			echo ("
					<tr>
						<td>L#$id2</td>
						<td>Light</td>
						<td>Room $lightRoom</td>
						<td>
							<button class=\"delete\">Delete</button>
							<button class=\"log\">Log</button> <!--you can delete this, and also any other elements in any other files in order to fit the database-->
						</td>
					</tr>
				");
		}
		?>
		<tr>
			<td><input></input></td>
			<td><input></input></td>
			<td><input></input></td>
			<td><button class="add">Add</button></td>
		</tr>
	</table>
	<button class="button" id="find_new_device" onclick="findDevice()">
		<img src="./image/device.png" />
		<div class="buttonText2">New Device</div>
	</button>
</body>

</html>
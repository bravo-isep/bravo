<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Bravo Smart Office</title>
	<script>
		window.location.href="../index.php"
	</script>
	<script src="./js/manage.js"></script>
</head>

<body>
	<div class="page_title">
		<img src="./image/device.png" />
		<div class="buttonText2">Device</div>
		<div class="buttonText2">Management</div>
	</div>
	<div id="table_block">
		<table id="table">
			<?php
			$table = '';
			$table .= "<tr>
			<td>DEVICE ID</td>
			<td>DEVICE TYPE</td>
			<td>ROOM</td>
			<td>MANAGEMENT</td>
			</tr>";


			//read the 'ac_sys' table and add the data to $table 
			try {
				header('Content-type:text/html;charset=utf-8');
				include("../models/connect.php");
				$db = connect();

				$stmt = $db->prepare("SELECT * FROM ac_sys");
				$stmt->execute();

				$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				echo "Error: " . $e->getMessage();
			}

			if (!empty($res)) {
				foreach ($res as $key => $value) {
					$table .= '<tr>';
					$table .= "<td>AC#{$value['idac_sys']}</td>";
					$table .= "<td>AC</td>";
					$table .= "<td>{$value['idroom']}</td>";
					$table .= "<td><button class=\"delete\" onclick='delete_device({$value['idac_sys']}, 1)'>Delete</button></td>";
					$table .= "</tr>";
				}
			}

			//read the 'lighting_sys' table and add the data to $table 
			try {
				$stmt = $db->prepare("SELECT * FROM lighting_sys");
				$stmt->execute();

				$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				echo "Error: " . $e->getMessage();
			}

			if (!empty($res)) {
				foreach ($res as $key => $value) {
					$table .= '<tr>';
					$table .= "<td>Light#{$value['idlighting_sys']}</td>";
					$table .= "<td>light</td>";
					$table .= "<td>{$value['idroom']}</td>";
					$table .= "<td><button class=\"delete\" onclick='delete_device({$value['idlighting_sys']}, 2)'>Delete</button></td>";
					$table .= "</tr>";
				}
			}

			//read the 'sensor' table and add the data to $table 
			try {
				$stmt = $db->prepare("SELECT * FROM sensor");
				$stmt->execute();
				$stmt_room = $db->prepare("SELECT * FROM room");
				$stmt_room->execute();

				$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$res_room = $stmt_room->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				echo "Error: " . $e->getMessage();
			}

			if (!empty($res)) {
				foreach ($res as $key => $value) {
					$table .= '<tr>';
					$table .= "<td>Sensor#{$value['idsensor']}</td>";
					$table .= "<td>{$value['type']}</td>";
					$table .= "<td>{$value['idroom']}</td>";
					$table .= "<td><button class=\"delete\" onclick='delete_device({$value['idsensor']}, 3)'>Delete</button></td>";
					$table .= "</tr>";
				}
			}
			$table .= "<form action='add.device.php' method='POST'>
			<tr><td><input type='text' name='id_device' id='id_device'></td>
			<td><select name='type' id='type'>
			<option value='AC'>AC</option>
			<option value='light'>light</option>
			<option value='temperature'>temperature</option>
			<option value='humidity'>humidity</option>
			<option value='brightness'>brightness</option>
			<option value='smoke'>smoke</option>
			<option value='intrusion'>intrusion</option>
			<option value='body temperature'>body temperature</option>
			</select></td>
			<td><select name='idroom' id='idroom'>";
			foreach ($res_room as $key => $room) {
				$table .= "<option value='{$room['idroom']}' >{$room['idroom']}</option>";
			}
			$table .= "</select></td>
			<td><button class=\"add\" onclick='add_device()'>Add</button></td>
			</tr></form>";
			echo $table;
			?>
		</table>
	</div>
	<button class="button" id="find_new_device" onclick="findDevice()">
		<img src="./image/device.png" />
		<div class="buttonText1">find</div>
		<div class="buttonText2">New Device</div>
	</button>
</body>

</html>
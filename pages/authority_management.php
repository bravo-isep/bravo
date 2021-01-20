﻿<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Bravo Smart Office</title>
</head>

<body>
	<div class="page_title">
		<img src="./image/authority.png" />
		<div class="buttonText2">Authority</div>
		<div class="buttonText2">Management</div>
	</div>
	<div id="table">
		<table border="1">
			<tr>
				<td>EMPLOYEE NUMBER</td>
				<td>USERNAME</td>
				<td>AUTHORITY</td>
				<td>ROOM</td>
				<td>MANAGEMENT</td>
			</tr>
			<?php
			//connecting the database
			//read the 'user' table and add the data
			try {
				header('Content-type:text/html;charset=utf-8');
				include("../models/connect.php");
				$db = connect();

				$stmt = $db->prepare("SELECT * FROM user");
				$stmt->execute();
				$stmt_room = $db->prepare("SELECT * FROM room");
				$stmt_room->execute();

				$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$res_room = $stmt_room->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				echo "Error: " . $e->getMessage();
			}

			$table = '';
			if (!empty($res)) {
				foreach ($res as $key => $value) {
					$table .= '<tr>';
					$table .= "<td>{$value['iduser']}</td>";
					$table .= "<td>{$value['username']}</td>";
					$table .= "<td>" . show_level($value['userlevel']) . "</td>";
					$table .= "<td>{$value['idroom']}</td>";
					$table .= "<td><button onclick='delete_user({$value['iduser']})'>Delete</button><td>";
					$table .= "</tr>";
				}
			}
			echo $table;

			function show_level($userlevel)
			{
				if ($userlevel == 1) {
					return 'Employee';
				}
				if ($userlevel == 2) {
					return 'Manager';
				}
				return 'Administrator';
			}
			?>
			<tr>
				<form action="./models/add.authority.php" method="POST">
					<td><input type="text" id="iduser"></td>
					<td><input type="text" id="username"></td>
					<td>
						<select name="userlevel" id="userlevel">
							<option value="1">Empleyee</option>
							<option value="2">Manager</option>
							<option value="3">Administrator</option>
						</select>
					</td>
					<td>
						<select name="idroom" id="idroom">
							<?php
							foreach ($res_room as $key => $room) {
								echo
								"<option value = '{$room['idroom']}' >{$room['idroom']}</option>";
							}
							?>
						</select>
					</td>
					<td><button type="button" onclick="add_user()"> Add </button></td>
				</form>
			</tr>
		</table>
	</div>
</body>

</html>
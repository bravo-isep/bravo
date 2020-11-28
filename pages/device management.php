<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bravo Smart Office</title>
</head>
<body>
	<div>
		<img />
		<div>Device</div>
		<div>Management</div>
	</div>
	<table border="1">
		<tr>
			<td>DEVICE ID</td>
			<td>DEVICE TYPE</td>
			<td>ROOM</td>
			<td>MANAGEMENT</td>
		</tr>
		<?php
			for ($i=0; $i<=3; $i++){
				echo('
					<tr>
						<td>AC#1001</td>
						<td>Air Conditioner 1</td>
						<td>Room 601</td>
						<td>
							<button class="delete">Delete</button>
							<button class="log">Log</button> <!--you can delete this, and also any other elements in any other files in order to fit the database-->
						</td>
					</tr>
				');
			}
		?>
		<tr>
			<td><input></input></td>
			<td><input></input></td>
			<td><input></input></td>
			<td><button class="add">add</button></td>
		</tr>
	</table>
	<button class="button" onclick="findDevice()">
		<img />
		<div class="buttonText1">find</div>
		<div class="buttonText2">New Device</div>
	</button>
</body>
</html> 
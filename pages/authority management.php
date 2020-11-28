<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bravo Smart Office</title>
</head>
<body>
	<div>
		<img />
		<div>Authority</div>
		<div>Management</div>
	</div>
	<table border="1">
		<tr>
			<td>DEVICE ID</td>
			<td>EMPLOYEE NUMBER</td>
			<td>AUTHORITY</td>
			<td>MANAGEMENT</td>
		</tr>
		<?php
            for ($i=0; $i<=3; $i++) {
                echo('
					<tr>
						<td>AC#1001</td>
						<td>331234</td>
						<td>Total control</td>
						<td><button class="delete">Delete</button></td>
					</tr>
				');
            }
        ?>
		<tr>
			<td><input></input></td>
			<td><input></input></td>
			<td><select>
				<option value ="none">None</option>
				<option value ="total control">Total control</option>
			</select></td>
			<td><button class="add">add</button></td>
		</tr>
	</table>
</body>
</html> 
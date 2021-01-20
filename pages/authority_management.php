<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Bravo Smart Office</title>
	<script type="text/javascript">
	
	</script>
</head>

<body>
	<?php
	include_once("../models/user.php");
    $allUsers = getUser();
	$allUserId = array_column($allUsers,"iduser");
    // print_r($allUserId);
	?>

	<div class="page_title">
		<img src="./image/authority.png" />
		<div class="buttonText2">Authority</div>
		<div class="buttonText2">Management</div>
	</div>
	<table border="1">
		<tr>
			<td>DEVICE ID</td>
			<td>EMPLOYEE NUMBER</td>
			<td>AUTHORITY</td>
			<td>MANAGEMENT</td>
		</tr>
		<?php
		foreach($allUserId as $id) {
			$room = getUserIdRoom($id);
			switch(getUserLevel($id)){
				case '1':
                    $level = 1;
					break;
				case '2':
					$level = 2;
					break;
				case '3':
					$level = 3;
					break;
				default :
                    $level = 'unknown';
			}
			echo ("
					<tr>
						<td>$room</td>
						<td>$id</td>
						<td>$level</td>
						<td><button class=\"delete\">Delete</button></td>
					</tr>
				");
		}
		?>
		<tr>
			<td><input></input></td>
			<td><input></input></td>
			<td><select>
					<option value="none">None</option>
					<option value="total control">Total control</option>
				</select></td>
			<td><button class="add">Add</button></td>
		</tr>
	</table>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Bravo Smart Office</title>
</head>

<body>
	<?php
	$roomId = $_GET['roomid'];
	?>
	<div>
		<img src="./image/1.png" />
		<div><?php echo $roomId; ?></div>
		<div><?php echo "L#$roomId"; ?></div>
	</div>
	<div id="light_panel">
		<img src="./image/1.png" />
		<button onclick="light_switch()">on/off</button>
		<br>
		<input id="intensity" type="range" value="50" onchange="change_intensity()">Light intensity</input>
		<br>
		<input id="curtain" type="range" value="50" onchange="control_curtain()">Curtain</input>
		<br>
	</div>
</body>

</html>
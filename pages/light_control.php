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
	<div class="page_title">
		<img src="./image/light.png" />
		<div class="buttonText2"><?php echo $roomId; ?></div>
		<div class="buttonText2"><?php echo "L#$roomId"; ?></div>
	</div>
	<div id="light_panel">
		<img src="./image/light.png" />
		<br>
		<img src="./image/onoff.png" id="picturebutton" onclick="light_switch();clickBtn(event)">
		<br>
		<div>Light intensity</div>
		<input id="intensity" type="range" value="50" onchange="change_intensity()">
		<br>
		<div>Curtain</div>
		<input id="curtain" type="range" value="50" onchange="control_curtain()">
		<br>
	</div>
</body>

</html>
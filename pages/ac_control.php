<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Bravo Smart Office</title>
	<script>
		window.location.href="../index.php"
	</script>
</head>

<body>
	<!--Got a problem here. After this page loaded, if ac is on, <div id="temperature">'s innerText should directly change into ac_temperature, but I don't know how-->
	<div class="page_title">
		<?php
		$idRoom = $_GET['roomid'];
		?>

		<img src="./image/ac.png" />
		<div class="buttonText2"><?php echo $idRoom; ?></div>
		<div class="buttonText2"><?php echo "AC#$idRoom"; ?></div>
	</div>
	<?php
	echo("
	<div id=\"ac_panel\">
		<div id=\"ac_text1\">Air Conditioner</div>
		<div id=\"ac_text2\">Temperature</div>
		<div id=\"temperature\"></div>
		<img src=\"./image/+.png\" id=\"picturebutton_up\"  onclick=\"ac_temperatureUp($idRoom);ac_showTemperature($idRoom)\">
		<img src=\"./image/-.png\" id=\"picturebutton_down\"  onclick=\"ac_temperatureDown($idRoom);ac_showTemperature($idRoom)\">
		<img src=\"./image/airconditioner.png\" id=\"ac_icon\" />
		<img src=\"./image/onoff.png\" id=\"picturebutton_onoff\" onclick=\"ac_switch($idRoom);ac_showTemperature($idRoom)\">
		<img src=\"./image/acmode1.png\" id=\"picturebutton_am1\" onclick=\"ac_modeChange(1,$idRoom)\">
		<img src=\"./image/acmode2.png\" id=\"picturebutton_am2\" onclick=\"ac_modeChange(2,$idRoom)\">
		<img src=\"./image/acmode3.png\" id=\"picturebutton_am3\" onclick=\"ac_modeChange(3,$idRoom)\">
		<img src=\"./image/acspeed1.png\" id=\"picturebutton_aw1\" onclick=\"ac_windChange(1,$idRoom)\">
		<img src=\"./image/acspeed2.png\" id=\"picturebutton_aw2\" onclick=\"ac_windChange(2,$idRoom)\">
		<img src=\"./image/acspeed3.png\" id=\"picturebutton_aw3\" onclick=\"ac_windChange(3,$idRoom)\">
	</div>")
	?>
</body>

</html>
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
	<?php
	include_once("../models/user.php");
	include_once("../models/sensor.php");
	$idUser = $_COOKIE['idUser'];
	$idRoom = getUserIdRoom($idUser);
	$temperature = getSensor($idRoom, 'temperature');
	$humidity = getSensor($idRoom, 'humidity');
	$brightness = getSensor($idRoom, 'brightness');
	?>

	<button class="button">
		<img src="./image/temperature.png" />
		<div class="buttonText1">Outside Temp</div>
		<div class="buttonText2"><?php echo $temperature; ?></div>
	</button>
	<button class="button">
		<img src="./image/humidity.png" />
		<div class="buttonText1">Humidity</div>
		<div class="buttonText2"><?php echo $humidity . '%'; ?></div>
	</button>
	<button class="button">
		<img src="./image/CO2.png" />
		<div class="buttonText1">CO2</div>
		<div class="buttonText2">82%</div>
	</button>
	<button class="button" id="energy">
		<img src="./image/energy.png" />
		<div class="buttonText1">Energy</div>
		<div class="buttonText2">55kWh</div>
	</button>
	<div class="button" id="menu_ac" style="float:left" onclick="setPage('./pages/ac_control.php','Air Conditioner',$.cookie('idRoom'))">
		<div id="ac_text1">Air Conditioner</div>
		<div id="ac_text2">Temperature</div>
		<div id="temperature"></div>

		<img src="./image/+.png" id="picturebutton_up" onclick="ac_temperatureUp();ac_showTemperature();clickBtn(event)">
		<img src="./image/-.png" id="picturebutton_down" onclick="ac_temperatureDown();ac_showTemperature();clickBtn(event)">
		<img src="./image/airconditioner.png" id="ac_icon" />
		<img src="./image/onoff.png" id="picturebutton_onoff" onclick="ac_switch();ac_showTemperature();clickBtn(event)">

		<img src="./image/acmode1.png" id="picturebutton_am1" onclick="ac_modeChange(1);clickBtn(event)">
		<img src="./image/acmode2.png" id="picturebutton_am2" onclick="ac_modeChange(2);clickBtn(event)">
		<img src="./image/acmode3.png" id="picturebutton_am3" onclick="ac_modeChange(3);clickBtn(event)">
		<img src="./image/acspeed1.png" id="picturebutton_aw1" onclick="ac_windChange(1);clickBtn(event)">
		<img src="./image/acspeed2.png" id="picturebutton_aw2" onclick="ac_windChange(2);clickBtn(event)">
		<img src="./image/acspeed3.png" id="picturebutton_aw3" onclick="ac_windChange(3);clickBtn(event)">
	</div>
	<div class="button" id="menu_notice" style="float:left">
		<div>Notice</div>
		<ul>
			<li>[13/09/2020]The office has been disinfected today.</li>
			<li>[12/09/2020]The office has been disinfected today.</li>
			<li>[11/09/2020]The office has been disinfected today.</li>
			<li>[10/09/2020]The office has been disinfected today.</li>
			<li>[10/09/2020]The office has been disinfected today.</li>
			<li>[09/09/2020]The office has been disinfected today.</li>
		</ul>
	</div>
	<div class="button" id="menu_light" style="float:left" onclick="setPage('./pages/light_control.php','Light',$.cookie('idRoom'))">
		<img src="./image/light.png" id="lightPicture" />
		<div class="buttonText1">Light</div>
		<img src="./image/onoff.png" id="picturebutton" onclick="light_switch();clickBtn(event)">
		<input id="intensity" type="range" value="50" onchange="change_intensity()" onclick="clickBtn(event)"></input><br>
		<input id="curtain" type="range" value="50" onchange="control_curtain()" onclick="clickBtn(event)"></input>
	</div>
	<button class="button" id="menu_security" onclick="setPage('./pages/room_select.php','Security',$.cookie('idRoom'))">
		<img src="./image/security.png" />
		<div class="buttonText1">Security</div>
		<div class="buttonText2">NORMAL</div>
	</button>
	<button class="button" id="menu_health" onclick="setPage('./pages/health.php','Health',$.cookie('idRoom'))">
		<img src="./image/health.png" />
		<div class="buttonText1">Health</div>
		<div class="buttonText2">NORMAL</div>
		<div class="buttonText3">COVID-19 Options</div>
	</button>
</body>

</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bravo Smart Office</title>
</head>
<body>
    <div style="float:left">
		<button class="button">
			<img />
			<div class="buttonText1">Outside Temp</div>
			<div class="buttonText2">18°C</div>
		</button>
		<button class="button">
			<img />
			<div class="buttonText1">Humidity</div>
			<div class="buttonText2">55%</div>
		</button>
		<button class="button">
			<img />
			<div class="buttonText1">CO2</div>
			<div class="buttonText2">82%</div>
		</button>
		<button class="button">
			<img />
			<div class="buttonText1">Energy</div>
			<div class="buttonText2">55kWh</div>
		</button>
	</div><br>
	<div style="float:left">
		<div class="button" id="menu_ac" style="border:1px solid;float:left" onclick="setPage('/pages/ac control.php','Air Conditioner')">					
			<div>Air Conditioner</div>
			<div>Temperature</div>
			<div id="temperature">--</div>
			<button onclick="ac_temperatureUp();ac_showTemperature();clickBtn(event)">+</button>		
			<button onclick="ac_temperatureDown();ac_showTemperature();clickBtn(event)">-</button>
			<img />
			<button onclick="ac_switch();ac_showTemperature();clickBtn(event)">on/off</button>
			<br>
			<button onclick="ac_modeChange(1);clickBtn(event)">mode1</button>
			<button onclick="ac_modeChange(2);clickBtn(event)">mode2</button>
			<button onclick="ac_modeChange(3);clickBtn(event)">mode3</button>
			<br>
			<button onclick="ac_windChange(1);clickBtn(event)">wind1</button>
			<button onclick="ac_windChange(2);clickBtn(event)">wind2</button>
			<button onclick="ac_windChange(3);clickBtn(event)">wind3</button>
		</div>
		<div class="button" id="menu_ac" style="border:1px solid;float:left">
			<div>Notice</div>
			<ul style="height:100px;overflow:scroll">
				<li>[13/09/2020]The office has been disinfected today.</li>
				<li>[12/09/2020]The office has been disinfected today.</li>
				<li>[11/09/2020]The office has been disinfected today.</li>
				<li>[10/09/2020]The office has been disinfected today.</li>
				<li>[10/09/2020]The office has been disinfected today.</li>
				<li>[09/09/2020]The office has been disinfected today.</li>
			</ul>
		</div>
	</div><br>
    <div style="float:left">
		<div class="button" id="menu_light" style="border:1px solid;float:left" onclick="setPage('/pages/light control.php','Light')">
			<img style="float:left"/>
			<div class="buttonText1" style="float:left">Light</div>
			<input id="intensity" type="range" value="50" onchange="change_intensity()" onclick="clickBtn(event)"></input><br>
			<button onclick="light_switch();clickBtn(event)">on/off</button>
			<input id="curtain" type="range" value="50" onchange="control_curtain()" onclick="clickBtn(event)"></input>
		</div>
		<button class="button" id="menu_security" onclick="setPage('/pages/room select.php','Security')">
			<img />
			<div class="buttonText1">Security</div>
			<div class="buttonText2">NORMAL</div>
		</button>
		<button class="button" id="menu_health" onclick="setPage('/pages/health.php','Health')">
			<img />
			<div class="buttonText1">Health</div>
			<div class="buttonText2">NORMAL</div>
			<div class="buttonText3" style="transform: scale(0.5);">COVID-19 Options</div>
		</button>
	</div>
</body>
</html> 
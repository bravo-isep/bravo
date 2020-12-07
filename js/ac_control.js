function ac_showTemperature() {
    tem = document.getElementById("temperature").innerText;
    if (ac_is_on == 1) {
        document.getElementById("temperature").innerText = ac_temperature;
    } else {
        document.getElementById("temperature").innerText = "--";
    }
}
function ac_switch() {
    ac_is_on = 1 - ac_is_on;
}
function ac_temperatureUp() {
    if (ac_is_on == 1) {
        ac_temperature += 1;
    }
}
function ac_temperatureDown() {
    if (ac_is_on == 1) {
        ac_temperature -= 1;
    }
}
function ac_modeChange(_mode) {
    if (ac_is_on == 1) {
        ac_mode = _mode;
    }
}
function ac_windChange(_wind) {
    if (ac_is_on == 1) {
        ac_wind = _wind;
    }
}

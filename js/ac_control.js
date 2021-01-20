function ac_showTemperature() {
    if (ac_is_on == 1) {
        $('#temperature').text(ac_temperature + '℃');
    } else {
        $('#temperature').text('');
    }
}
function ac_switch() {
    ac_is_on = 1 - ac_is_on;
    ac_update();
}

function ac_update() {
    $.ajax({
        type: "POST",
        url: "./controller/updateAC.php",
        data: {
            key: "123",
            idRoom: $.cookie('idRoom'),
            ac_is_on: ac_is_on,
            ac_temperature: ac_temperature,
            ac_mode: ac_mode,
            ac_wind: ac_wind,
        },
        dataType: "json",
        success: function () {
            console.log("AC update success");
        },
        error: function (err) {
            console.log("Device Request failed", err);
        },
    });
}

function ac_temperatureUp() {
    if (ac_is_on == 1) {
        ac_temperature += 1;
        ac_update();
    }
}
function ac_temperatureDown() {
    if (ac_is_on == 1) {
        ac_temperature -= 1;
        ac_update();
    }
}
function ac_modeChange(_mode) {
    if (ac_is_on == 1) {
        ac_mode = _mode;
        ac_update();
    }
}
function ac_windChange(_wind) {
    if (ac_is_on == 1) {
        ac_wind = _wind;
        ac_update();
    }
}

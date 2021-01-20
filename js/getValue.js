window.onload = function () {
    $.ajax({
        type: "POST",
        url: "./controller/getUser.php",
        data: {
            key: "123",
        },
        dataType: "json",
        success: function (resp) {
            if (resp.flag === 1) {
                employeeName = resp.userName;
                employeeNumber = resp.idUser;
                authorityLevel = resp.userLevel;
                employeeRoom = resp.userIdRoom; //1:Employee 2:Manager 3:Administrator
                console.log(employeeName, employeeNumber, authorityLevel, employeeRoom);
                getSensor(employeeRoom);
                getDevice(employeeRoom);
                setPage("./pages/main_menu.php", "Menu", $.cookie("idRoom"), employeeName);
            } else {
                console.log("getUser failed");
            }
        },
        error: function (err) {
            console.log("User Request failed", err);
        },
    });
};

function getSensor(idRoom) {
    $.ajax({
        type: "POST",
        url: "./controller/getSensor.php",
        data: {
            key: "123",
            idRoom: idRoom,
        },
        dataType: "json",
        success: function (resp) {
            temperature = resp.temperature;
            humidity = resp.humidity;
            brightness = resp.brightness;
            // console.log(temperature, humidity, brightness);
        },
        error: function (err) {
            console.log("Sensor Request failed", err);
        },
    });
}

function getDevice(idRoom) {
    $.ajax({
        type: "POST",
        url: "./controller/getDevice.php",
        data: {
            key: "123",
            idRoom: idRoom,
        },
        dataType: "json",
        success: function (resp) {
            ac_is_on = resp.AC_OnOff;
            ac_temperature = resp.AC_temp;
            ac_wind = resp.AC_fan;
            ac_mode = resp.AC_mode;
            light_is_on = resp.Light_OnOff;
            light_intensity = resp.Light_bri;
            curtain_position = resp.Curtain_position;
            setTimeout(ac_showTemperature(),1000);

            // console.log(
            //     ac_is_on,
            //     ac_temperature,
            //     ac_wind,
            //     ac_mode,
            //     light_is_on,
            //     light_intensity,
            //     curtain_position
            // );
        },
        error: function (err) {
            console.log("Device Request failed", err);
        },
    });
}

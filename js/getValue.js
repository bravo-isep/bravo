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
                employeeNumber = Number(resp.idUser);
                authorityLevel = Number(resp.userLevel);
                employeeRoom = Number(resp.userIdRoom); //1:Employee 2:Manager 3:Administrator
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
            temperature = Number(resp.temperature);
            humidity = Number(resp.humidity);
            brightness = Number(resp.brightness);
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
            ac_is_on = Number(resp.AC_OnOff);
            ac_temperature = Number(resp.AC_temp);
            ac_wind = Number(resp.AC_fan);
            ac_mode = Number(resp.AC_mode);
            light_is_on = Number(resp.Light_OnOff);
            light_intensity = Number(resp.Light_bri);
            curtain_position = Number(resp.Curtain_position);
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

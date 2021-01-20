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
                setPage("./pages/main_menu.php", "Menu", "0", employeeName);
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
            console.log(temperature, humidity, brightness);
        },
        error: function (err) {
            console.log("Sensor Request failed", err);
        },
    });
}

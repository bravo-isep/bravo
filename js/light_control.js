function light_switch() {
    light_is_on = 1 - light_is_on;
    light_update();
    if (light_is_on == 1) {
        $('#lightPicture').attr("src","./image/light.png");
        console.log("1");
    }else{
        $('#lightPicture').attr("src","./image/light_black.png");
        console.log("0");
    }
}
function change_intensity() {
    light_intensity = document.getElementById("intensity").value;
    light_update();
}
function control_curtain() {
    curtain_position = document.getElementById("curtain").value;
    light_update();
}

function light_update() {
    $.ajax({
        type: "POST",
        url: "./controller/updateLight.php",
        data: {
            key: "123",
            idRoom: $.cookie('idRoom'),
            light_is_on: light_is_on,
            light_intensity: light_intensity,
            curtain_position: curtain_position
        },
        dataType: "json",
        success: function () {
            console.log("Light update success");
        },
        error: function (err) {
            console.log("Device Request failed", err);
        },
    });
}
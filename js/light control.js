function light_switch() {
    light_is_on = 1 - light_is_on;
}
function change_intensity() {
    light_intensity = document.getElementById("intensity").value;
}
function control_curtain() {
    curtain_position = document.getElementById("curtain").value;
}

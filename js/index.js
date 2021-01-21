function sendAlarm(idRoom) {
    alert("Alarm"); //change this into sending an alarm to server
    var addtr = $(
        "<tr>" +
            "<td> time </td>" +
            "<td>idsensor</td>" +
            "<td>type</td>" +
            "<td>Room </td>" +
            "</tr>"
    );
    addtr.appendTo($('#alarmTable'));
}

function reportIllness() {
    alert("report illness"); //same as above
}

function findDevice() {
    alert("New device found"); //maybe automatically fill the device table's last<tr> with the information of the new device...whatever
}

function clickBtn(event) {
    //When a small button on a big button, I click the small one but the "onclick" of the big one will also react, this function is to stop it.
    event = event ? event : window.event;
    event.stopPropagation();
}

function logout() {
    var cookies = $.cookie();
    for (var cookie in cookies) {
        $.removeCookie(cookie, {
            path: "/",
        });
    }
    $.ajax({
        type: "POST",
        url: "./controller/logout.php",
        success: function (resp) {
            window.location.href = "./pages/login.php";
        },
        error: function (err) {
            console.log("err：", err);
            alert(err);
        },
    });
}

function setPage(page, name, room, employee_name = employeeName) {
    loadPage(page, name, room); //change the page in the main part
    document.getElementById("name").innerText = name; //change the text in the header
    document.getElementById("user").innerText = employee_name; //change username
}
function loadPage(page, name, room) {
    //refresh only the main part
    var xmlhttp;
    if (window.XMLHttpRequest) {
        //  IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_part").innerHTML = xmlhttp.responseText;
        }
    };
    //this three use the same page "room_select.php", the codes following is to distinguish them
    if (name == "Air Conditioner") {
        page = page + "?roomdevice=1&roomid=" + room;
    } else if (name == "Light") {
        page = page + "?roomdevice=2&roomid=" + room;
    } else if (name == "Security") {
        page = page + "?roomdevice=3&roomid=" + room;
    }

    xmlhttp.open("GET", page, true);
    xmlhttp.send();
}

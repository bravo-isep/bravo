function sub() {
    var user = $("#user").val();
    var passwd = $("#passwd").val();
    check(user, passwd);
}

function check(user, passwd) {
    if (passwd != "") {
        var passwd_sha1 = CryptoJS.SHA1(passwd).toString();
    } else {
        passwd_sha1 = "";
    }
    $.ajax({
        type: "POST",
        url: "../controller/login.php",
        data: {
            user: user,
            passwd: passwd_sha1,
        },
        dataType: "json",
        success: function (resp) {
            console.log("success：", resp);
            if (resp.success == "1") {
                $("#output").text("success").prop("class", "span_green");
                if ($("#remember_me").prop("checked")) {
                    saveCookie(user, passwd);
                } else {
                    clearCookie();
                }
                window.location.href = "../index.php";
                exit;
            } else {
                $("#output").text(resp.message).prop("class", "span_red");
            }
        },
        error: function (err) {
            $("#output").text("error").prop("class", "span_red");
            console.log("Request failed", err);
        },
    });
}

function saveCookie(user, passwd) {
    $.cookie("idUser", user, {
        expires: 7,
        path: "/",
    });
    var passwd_aes = CryptoJS.AES.encrypt(passwd, "123456").toString();
    $.cookie("passwd", passwd_aes, {
        expires: 7,
        path: "/",
    });
}

function clearCookie() {
    $.cookie("idUser", "", {
        expires: -1,
        path: "/",
    });
    $.cookie("passwd", "", {
        expires: -1,
        path: "/",
    });
}

window.onload = function () {
    idUser = $.cookie("idUser");
    passwd = $.cookie("passwd");
    console.log(passwd);
    if (idUser && passwd) {
        $("#remember_me").prop("checked", true);
        $("#user").val(idUser);
        $("#passwd").val(CryptoJS.AES.decrypt(passwd, "123456").toString(CryptoJS.enc.Utf8));
    }
};

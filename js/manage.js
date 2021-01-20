function delete_user(iduser)
{	
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('POST', './models/delete.authority.php', true)
    xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
    xmlhttp.send('iduser='+iduser);

    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("table").innerHTML = xmlhttp.responseText;
        }
        else
        {
            //
        }
    }
}


function delete_device(id_device, type)
{	

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('POST', './models/delete.device.php', true)
    xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
    xmlhttp.send('id_device='+id_device+'&type='+type);

    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("table").innerHTML = xmlhttp.responseText;
        }
        else
        {
            //
        }
    }
}


function add_user()
{	
    var iduser = document.getElementById('iduser').value;
    var username = document.getElementById('username').value;
    var userlevel = document.getElementById('userlevel').value;
    var idroom = document.getElementById('idroom').value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('POST', './models/add.authority.php', true)
    xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
    xmlhttp.send('iduser='+iduser+'&username='+username+'&userlevel='+userlevel+'&idroom='+idroom);

    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("table").innerHTML = xmlhttp.responseText;
        }
        else
        {
            //
        }
    }
}


function add_device()
{	
    var id_device = document.getElementById('id_device').value;
    var type = document.getElementById('type').value;
    var idroom = document.getElementById('idroom').value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('POST', './models/add.device.php', true)
    xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
    xmlhttp.send('id_device='+id_device+'&type='+type+'&idroom='+idroom);

    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("table").innerHTML = xmlhttp.responseText;
        }
        else
        {
            //
        }
    }
}
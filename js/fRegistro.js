var current_fs, next_fs, previous_fs;
var left, opacity, scale;
var animating;


//Validacion del codigo
function codigoU(e){
    var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46)) return true;
        return /\d/.test(String.fromCharCode(keynum));
}

function mouseoverPass1() {
    var obj = document.getElementById('myPassword');
    obj.type = "text";
}

function mouseoutPass1() {
    var obj = document.getElementById('myPassword');
    obj.type = "password";
}
function mouseoverPass2() {
    var obj = document.getElementById('myPassword2');
    obj.type = "text";
}

function mouseoutPass2() {
    var obj = document.getElementById('myPassword2');
    obj.type = "password";
}



